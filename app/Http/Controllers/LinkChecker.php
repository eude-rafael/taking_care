<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//teste para desenvolvimento 
use App\Models\Register_link;
use App\Models\Test_record;


class LinkChecker extends Controller
{
    public function index(){
        $allLinks = Register_link::all();

        foreach ($allLinks as &$valor) {

            // $curl = curl_init("https://www.google.com/");
            // $response = curl_exec($curl);
            // $info = curl_getinfo($curl);

            if(@curl_init($valor->link)){
                $curl = curl_init($valor->link);
                $response = curl_exec($curl);
                $info = curl_getinfo($curl);
            
                echo '<h1>'.$info["http_code"].'</h1>';
                echo '<br>';
            }

            // if(@file_get_contents($valor->link)){
            //     echo '<h3>'.$valor->link . '</h3>';
            //     file_get_contents($valor->link);
            //     var_dump($http_response_header[0]);
            //     echo '<hr/>';
            //     unset($valor);
            // }else{
            //     $test_records = new Test_record();
            //     $test_records->link_id = $valor->id; 
            //     $test_records->error = 'access error';
            //     $test_records->save();
            // }
             
        }
    }

 
}
