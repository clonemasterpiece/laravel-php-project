<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\MyMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends MainController
{
    public function index(){
        return view("pages.main.contact", $this->data);
    }

    public function store(ContactRequest $request){

        $message=$request->message;
        $id=$request->session('user')->get('user')->id_user;

        try{
            DB::beginTransaction();
            $messageInsert=Message::create([
                "message_user"=>$message,
                "id_user"=>$id
            ]);

            $user=DB::table("user")
                ->where("id_user", "=", $id)
                ->first();

            DB::commit();
            if($messageInsert){
                $details = [
                    'message_user' => $message,
                    'user' => $user->email_user
                ];
                Mail::to('bojan.stefanovski.165.17@ict.edu.rs')->send(new MyMail($details));

                return redirect()->back()->with([
                    "msg" => "Your message has been sent to our administrators email. Thank you!"
                ]);
            }
            else{
                return redirect("/contact");
            }
        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }
    }

}
