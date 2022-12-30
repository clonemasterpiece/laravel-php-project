<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MessagesController extends MainController
{
    public function index()
    {
        try {
            $this->data['messages']=Message::with('user')->get();
        } catch (\Throwable $e) {
            dd([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTrace(),
                'trace' => $e->getTrace(),
            ]);
        }

        return view("pages.adminPanel.messages", $this->data);
    }

    public function delete(Request $request)
    {
        $ids = $request->hiddenId;

        try {
            DB::beginTransaction();
            $message=Message::find($ids);
            $message->delete();

            DB::commit();

            return redirect()->back()->with([
                "msg" => "Message deleted successfully!"
            ]);


        } catch (\Exception $e) {
            DB::rollBack();
            $guid = uniqid();
            Log::error($guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }
    }
}
