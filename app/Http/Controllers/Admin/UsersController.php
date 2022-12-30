<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UsersController extends MainController
{
    public function index(){
        $this->data['adminUsers']=Users::with('role')->get();
        return view('pages.adminPanel.users',$this->data);
    }

    public function delete(Request $request)
    {
        $id = $request->hiddenId;

        try {
            DB::beginTransaction();
            $user = Users::find($id);
            $user->delete();

            DB::commit();


            return redirect()->back()->with([
                "msg" => "User ".$user->name_user ." ".$user->last_name. " deleted successfully!"
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            $guid = uniqid();
            Log::error($guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }
    }
}
