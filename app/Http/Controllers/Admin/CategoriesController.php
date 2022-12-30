<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoriesController extends MainController
{
    public function index(){
        $this->data['categoriesAdmin']=Categories::all();

        return view('pages.adminPanel.categories',$this->data);
    }

    public function changed(CategoriesRequest $request){
        $id=$request->hiddenId;
        $category=Categories::where('id_cat','=',$id)->first();

        try {
            DB::beginTransaction();
            $category->name_cat = $request->name;
            $category->save();
            DB::commit();

            if ($category->save()) {
                return redirect()->back()->with([
                    "msg" =>  ucfirst($request->name)." category updated successfully!"
                ]);
            }

        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("error", ["errorId" => $guid]);
        }

    }

    public function delete(Request $request){
        $id=$request->hiddenId;

        try {
            DB::beginTransaction();
            $category=Categories::find($id);
            $category->delete();

            DB::commit();


            return redirect()->back()->with([
                "msg" =>  "Category ". $category->name_cat. " deleted successfully!"
            ]);

        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }

    }

    public function store(CategoriesRequest $request){

        try{
            DB::beginTransaction();
            $insertCategory=Categories::create([
                "name_cat"=>$request->name
            ]);

            DB::commit();

            if($insertCategory){
                return redirect()->back()->with([
                    "msg" => "The ".$request->nameCategory." category inserted successfully!"
                ]);
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $exception->getMessage());
            dd($exception->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }
    }
}
