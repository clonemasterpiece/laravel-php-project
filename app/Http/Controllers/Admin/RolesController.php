<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RolesController extends MainController
{
    public function index(){
        $this->data['panelRoles']=Roles::all();
        return view('pages.adminPanel.roles',$this->data);
    }

    public function changed(RolesRequest $request){
        $id=$request->hiddenId;
        $role=Roles::where("id_roles","=",$id)->first();

        try {
            DB::beginTransaction();
            $role->role = $request->name;
            $role->save();

            DB::commit();

            if ($role->save()) {
                return redirect()->back()->with([
                    "msg" =>  ucfirst($request->name)." role updated successfully!"
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

    public function delete(Request $request){
        $id=$request->hiddenId;

        try {
            DB::beginTransaction();
            $role=Roles::find($id);
            $role->delete();

            DB::commit();


            return redirect()->back()->with([
                "msg" =>  "Role deleted successfully!"
            ]);

        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }

    }

    public function store(RolesRequest $request){

        try{
            DB::beginTransaction();
            $insertRole=Roles::create([
                "role"=>$request->name
            ]);

            DB::commit();

            if($insertRole){
                return redirect()->back()->with([
                    "msg" => "Role ".$request->name." inserted successfully!"
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
