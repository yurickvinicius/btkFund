<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UploadController extends Controller
{

    private $userModel;

    public function __construct(User $user){
        $this->userModel = $user;
    }


    public function upload(){
        
        $file = file_get_contents('json/results.json');                
        $json = json_decode($file);


        foreach($json->Results as $result):
            ///echo 'cpf: ' . $result->cpf . '<br/>';
            
            if($this->checkCpf($result->cpf) == true){

            }
            


        endforeach;               

    }

    public function checkCpf($cpf){
        $check = $this->userModel
            ->where('cpf','=',$cpf)
            ->first();

        if($check === null)
            return true;
        else
            return false;
    }
}
