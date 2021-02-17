<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Balance;

class UploadController extends Controller
{

    private $user;
    private $balance;

    public function __construct(User $userModel, Balance $balanceModel){
        $this->user = $userModel;
        $this->balance = $balanceModel;
    }


    public function upload(){
        
        $file = file_get_contents('json/results.json');                
        $json = json_decode($file);


        foreach($json->Results as $result):
            ///echo 'cpf: ' . $result->cpf . '<br/>';
            
            /// Retona id usuario caso cpf exista
            $userId = $this->checkCpf($result->cpf);
            if($userId){
                ///echo $userId. '<br>';
                
                $this->balanceStore($result->balance, $userId);
            }

        endforeach;               

    }

    public function balanceStore($balance, $userId){
        $balance = [
            'user_id' => $userId,
            'balance' => $balance
        ];

        ///dd($balance);

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
