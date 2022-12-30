<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductsController extends MainController
{
    public function index()
    {
        $this->data['panelProducts'] = Products::with('category')->get();
        $this->data['panelCategories'] = Categories::all();

        return view('pages.adminPanel.products', $this->data);
    }

    public function changed(ProductsUpdateRequest $request){
        $id=$request->hiddenId;
        $product=Products::where("id","=",$id)->first();


        if($request->fileP != null){
            $name=$request->fileP->getClientOriginalName();
            $nameArray=explode( ".",$name);
            $src=$nameArray[0].time().".".$nameArray[1];
        }
        else{
            $src=$product->src;
        }


        try {
            DB::beginTransaction();
            $product->name = $request->name;
            $product->src = $src;
            $product->kategorija_id = $request->category;
            $product->cena = $request->price;
            $product->save();


            if($request->fileP != null){
                $request->fileP->move(public_path("assets/img/smallGallery"), $src);
            }

            DB::commit();

            if ($product->save()) {
                return redirect()->back()->with([
                    "msg" =>  ucfirst($request->name)." product updated successfully!"
                ]);
            }

        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $e->getMessage()]);
        }

    }

    public function delete(Request $request){
        $id=$request->hiddenId;

        try {
            DB::beginTransaction();
            $product=Products::find($id);
            $productImg=Products::find($id)->src;
            $product->delete();
            File::delete("asset/img/smallGallery/".$productImg);


            DB::commit();

            if($product->delete()){
                return redirect()->back()->with([
                    "msg" =>  "Deleting was successful!"
                ]);
            }
        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }

    }

    public function store(ProductsRequest $request){


        if($request->file!=null){
            $name=$request->file->getClientOriginalName();
            $nameArray=explode(".",$name);
            $src=$nameArray[0].time().".".$nameArray[1];
        }
        else{
            return redirect()->back()->with([
                "msgerror" => "The file products field is required."
            ]);
        }
        if($request->category == 0){
            return redirect()->back()->with([
                "msgerror" => "Category must be chosen."
            ]);
        }

        try{
            DB::beginTransaction();
            $insertProduct=Products::create([
                "name"=>$request->name,
                "cena"=>$request->price,
                "alt"=>$request->name,
                "src"=>$src,
                "kategorija_id"=>$request->category,
            ])->id;



            $request->file->move(public_path("assets/img/smallGallery"), $src);

            DB::commit();

            if($insertProduct){
                return redirect()->back()->with([
                    "msg" => "Inserting ".$request->name." product was successful!"
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
