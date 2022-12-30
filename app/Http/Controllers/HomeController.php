<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class   HomeController extends MainController
{
    public function index(){
        $this->data['products']=Products::with('category')->paginate(3);
        $this->data['categories']=Categories::all();
        return view('pages.main.index', $this->data);
    }

    public function search($keyword){

        $this->data['products']=Products::with('category')
            ->where("name", "LIKE", "%$keyword%")->get();

        return json_encode($this->data['products']);

    }
    public function filter($category_id){
        if($category_id == 0){
            $this->data['product']=Products::all();
        }
        $this->data['products']=Products::with('category')
            ->where("kategorija_id", "LIKE", $category_id)->get();


        return json_encode($this->data['products']);

    }

    public function filterAll(){
        $this->data['products']=Products::all();

        return json_encode($this->data['products']);

    }


}
