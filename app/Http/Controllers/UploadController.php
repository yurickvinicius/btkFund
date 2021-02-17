<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Balance;
use App\Robot;
use App\RobotUser;

class UploadController extends Controller
{

    private $logSuccess=[];
    private $logError=[];
    private $cpfsErrors=[];
    private $user;
    private $balance;
    private $robot;
    private $robotUser;

    public function __construct(User $userModel, Balance $balanceModel, Robot $robotModel, RobotUser $robotUserModel){
        $this->user = $userModel;
        $this->balance = $balanceModel;
        $this->robot = $robotModel;
        $this->robotUser = $robotUserModel;
    }


    public function upload(){
        
        $file = file_get_contents('json/results.json');                
        $json = json_decode($file);


        foreach($json->Results as $result): 
            
            /// Retona id usuario caso cpf exista
            $userId = $this->checkCpf($result->cpf);
            if($userId){   
                
                $cpf = $result->cpf;
                $this->balanceStore($result->balance, $userId, $cpf);
                $robotId = $this->robotStore($result->magic_number, $result->paper, $cpf);
                $this->robotUserStore($userId, $robotId, $cpf);                                            

            }else{
                $this->cpfsErrors[] = $result->cpf;
            }

        endforeach;
        
        print_r($this->logSuccess);
        print_r($this->logError);
        print_r($this->cpfsErrors);

    }    

    public function robotUserStore($userId, $robotId, $cpf){
        $robotUser = [
            'user_id' => $userId,
            'robot_id' => $robotId
        ];

        $store = $this->robotUser->create($robotUser);
        if($store){
            $this->logSuccess[$cpf]['pivot'] = 'Pivot RobotUser save with success!';
        }else
            $this->logError[$cpf]['pivot'] = 'Error Try save pivot RobertUser! <br>';
    }

    public function robotStore($magicNumber, $paper, $cpf){
        $robot = [
            'magic_number' => $magicNumber,
            'paper' => $paper
        ];

        $result = $this->robot->create($robot);
        if($result){
            $this->logSuccess[$cpf]['robot'] = 'Robot save wicth success!';
            return $result->id;
        }else{
            $this->logError[$cpf]['robot'] = 'Error try save robot <br>';
        }                    
    }

    public function balanceStore($balance, $userId, $cpf){
        $balance = [
            'user_id' => $userId,
            'balance' => $balance
        ];

        if($this->balance->create($balance)){
            $this->logSuccess[$cpf]['balance'] = 'Balance save wicth success!';
        }else{
            $this->logError[$cpf]['balance'] = 'Error try save balance <br>';
        }
    }

    public function checkCpf($cpf){
        $check = $this->user
            ->where('cpf','=',$cpf)
            ->first();

        if($check === null)
            return false;
        else
            return $check->id;
    }

}
