<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\Menus;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public $data;
    public function __construct(){
        $this->data['menusA']=DB::table("menus")
            ->where("show_menu", '=', '1')
            ->orWhere("show_menu", '=', '2')
            ->orWhere("show_menu", '=', '3')
            ->orderBy("priority_menu")
            ->get();

        $this->data['menusU']=DB::table("menus")
            ->where("show_menu", "=", "1")
            ->orWhere("show_menu", "=", "2")
            ->orderBy("priority_menu")
            ->get();


        $this->data['menusO']=DB::table("menus")
            ->where("show_menu","=","1")
            ->orWhere("show_menu","=","0")
            ->orderBy("priority_menu")
            ->get();

    }
}
