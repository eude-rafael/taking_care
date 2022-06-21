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
            if(@curl_init($valor->link)){
                $curl = curl_init($valor->link);
                $response = curl_exec($curl);
                $info = curl_getinfo($curl);
            
                $test_records = new Test_record();
                $test_records->link_id = $valor->id; 
                $test_records->error = $info["http_code"];
                $test_records->save();
            }             
        }
    }
}
