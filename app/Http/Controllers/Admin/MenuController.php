<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MenuController extends MainController
{
    public function index(){
        $this->data['panelMenus']=Menus::all();
        return view('pages.adminPanel.menu', $this->data);
    }

    public function changed(MenuRequest $request){
        $id = $request->hiddenId;
        $menu=Menus::where('id_menu','=',$id)->first();

        try{
            DB::beginTransaction();
            $menu->name_menu = $request->name;
            $menu->href_menu = $request->href;
            $menu->show_menu = $request->show;
            $menu->priority_menu = $request->priority;
            $menu->save();

            DB::commit();
            if ($menu->save()) {
                return redirect()->back()->with([
                    "msg" =>  $request->name." row has been updated!"
                ]);
            }
            }

        catch(\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }

    }
    public function delete(Request $request){
        $id=$request->hiddenId2;
        try {
            DB::beginTransaction();
            $menu=Menus::find($id);
            $menu->delete();
            DB::commit();


            return redirect()->back()->with([
                "msg" =>  "Deleting was successful!"
            ]);

        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("error", ["errorId" => $guid]);
        }

    }

    public function store(MenuRequest $request){

        try{
            DB::beginTransaction();
            $insertMenu=Menus::create([
                "name_menu"=>$request->name,
                "href_menu"=>$request->href,
                "show_menu"=>$request->show,
                "priority_menu"=>$request->priority
            ]);

            DB::commit();

            if($insertMenu){
                return redirect()->back()->with([
                    "msg" => "Inserting ".$request->name." menu was successful!"
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
