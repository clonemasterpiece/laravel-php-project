<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\Users;
use App\Models\UsersActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UsersActivityController extends MainController
{
    public function index()
    {
        $this->data['users'] = Users::with(["role"])->get();

        return view("pages.adminPanel.usersActivity", $this->data);
    }

    public function registrationFilter(Request $request){
        $valueDate=$request->valueDate;

        try{
            DB::beginTransaction();
            $dateUsers=Users::with(["role"])
                ->where("created_at","LIKE", "$valueDate%")
                ->get();

            DB::commit();

            if($dateUsers){
                return json_encode([
                    "dateUsers"=>$dateUsers
                ]);
            }
        }
        catch (\Exception $e) {
            DB::rollBack();
            $guid = uniqid();
            Log::error($guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }
    }


    public function loginFilter(Request $request){
        $valueDate=$request->valueDate;

        try{
            DB::beginTransaction();
            $users=UsersActivity::with(['user'])
                ->where("dateLogin","=", $valueDate)
                ->get();

            $roles=Roles::all();

            DB::commit();

            if($users){
                return json_encode([
                    "users"=>$users,
                    "roles"=>$roles
                ]);
            }
        }
        catch (\Exception $e) {
            DB::rollBack();
            $guid = uniqid();
            Log::error($guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }
    }

    public function loggedOutFilter(Request $request){
        $valueDate=$request->valueDate;

        try{
            DB::beginTransaction();
            $users=UsersActivity::with(['user'])
                ->where("dateLoggingOut","=", $valueDate)
                ->get();

            $roles=Roles::all();

            DB::commit();

            if($users){
                return json_encode([
                    "users"=>$users,
                    "roles"=>$roles
                ]);
            }
        }
        catch (\Exception $e) {
            DB::rollBack();
            $guid = uniqid();
            Log::error($guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }
    }
}
