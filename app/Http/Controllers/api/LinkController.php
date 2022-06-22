<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register_link;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Test_record;



class LinkController extends Controller
{
    public function __construct()
    {
        // if(!auth()->check()){
        //     return ['error'=>true, 'message'=> 'acesso negado!'];
        // }
    }

    public function list_all_links(Request $request){
        return  $links = Register_link::whereIn('id_user', [$request->user()->id])->get();
    }


    public function store(Request $request){
        $register_link = new Register_link();

        $register_link->link = $request->link;
        $register_link->status = true;
        $register_link->id_user = $request->user()->id;

        $register_link->save();
        return ['error'=> false, 'message'=> 'salvo com sucesso!'];
    }

    public function list_link_links_actions(Request $request){
        return  Test_record::whereIn('link_id', [$request->id_link])->get();
    }
}

 