<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Balance;
use App\Robot;
use App\RobotUser;

class UploadController extends Controller
{

    //private $logSuccess;
    //private $logError;
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
                
                $this->balanceStore($result->balance, $userId);
                $robotId = $this->robotStore($result->magic_number, $result->paper);
                $this->robotUserStore($userId, $robotId);                                

            

            }

        endforeach; 

    }

    public function robotUserStore($userId, $robotId){
        $robotUser = [
            'user_id' => $userId,
            'robot_id' => $robotId
        ];

        $store = $this->robotUser->create($robotUser);
        if($store){
            echo 'Pivot RobotUser save with success! <br>';
        }else
            echo 'Error Try save pivot RobertUser! <br>';
    }

    public function robotStore($magicNumber, $paper){
        $robot = [
            'magic_number' => $magicNumber,
            'paper' => $paper
        ];

        $result = $this->robot->create($robot);
        if($result){
            echo 'Robot save wicth success! <br>';
            return $result->id;
        }else{
            echo 'Error try save robot <br>';
        }                    
    }

    public function balanceStore($balance, $userId){
        $balance = [
            'user_id' => $userId,
            'balance' => $balance
        ];

        if($this->balance->create($balance)){
            echo 'Balance save wicth success! <br>';
        }else{
            echo 'Error try save balance <br>';
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
