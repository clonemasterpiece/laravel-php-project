<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\MyMail;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderControler extends MainController
{
    public function store(OrderRequest $request){

        $id=$request->hiddenId;
        try{
            DB::beginTransaction();
            $insertOrder=Orders::create([
                "user_id"=>$id,
                "user_address"=>$request->address,
                "user_phone"=>$request->number,
                "id_food"=>$request->product_id
            ]);

            DB::commit();
            $user=session('user')->name_user;
            $chosenProduct = Products::find($request->product_id)->first();
            $nameProduct = $chosenProduct->name;
            if($insertOrder){
                $details = [
                    'message_user' => 'Order Address: '.$request->address.'; Phone number: '. $request->number.' Food: '.$nameProduct,
                    'user' => $user,

                ];
                Mail::to('bojan.stefanovski.165.17@ict.edu.rs')->send(new MyMail($details));

                return redirect()->back()->with([
                    "msg" => "Your order has been sent to our team. Thank you!"
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
