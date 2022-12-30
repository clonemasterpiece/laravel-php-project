<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends MainController
{
    public function index(){
        return view('pages.main.author', $this->data);
    }
}
