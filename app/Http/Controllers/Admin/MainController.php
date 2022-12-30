<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public $data;

    public function __construct(){
        $this->data['panelMenu']=[
            [
                "href"=>"/adminMessages",
                "name"=>"Messages"
            ],
            [
                "href"=>"/adminStatistics",
                "name"=>"Statistics"
            ],
            [
                "href"=>"/adminMenu",
                "name"=>"Menu"
            ],
            [
                "href"=>"/adminCategories",
                "name"=>"Categories"
            ],
            [
                "href"=>"/adminUsers",
                "name"=>"Users"
            ],
            [
                "href"=>"/adminRoles",
                "name"=>"Roles"
            ],
            [
                "href"=>"/adminProducts",
                "name"=>"Products"
            ],
            ];
    }
}
