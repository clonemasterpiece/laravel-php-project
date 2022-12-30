<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterController extends MainController
{
    public function index(){
        return view("pages.auth.register",  $this->data);
    }

    public function register(RegisterRequest $request){
        try{
            DB::beginTransaction();

            $registered=Users::create([
                "name_user"=>ucfirst($request->name),
                "last_name"=>ucfirst($request->lastName),
                "email_user"=>$request->email,
                "password_user"=>md5($request->password),
                "id_roles"=>2,
            ])->id;

            DB::commit();


            return redirect()->back()->with([
                "msg" => "You have been registered!"
            ]);


        }
        catch(\Exception $exception){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $exception->getMessage());
            return view("pages.main.error", ["errorId" => $exception->getMessage()]);
        }

    }
}
