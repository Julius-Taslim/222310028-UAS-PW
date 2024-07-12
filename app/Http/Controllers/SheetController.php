<?php

namespace App\Http\Controllers;

use App\Models\Sheets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SheetController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $sheets = Sheets::where('user_id', $userId)->get();
        return view("layout")->with(['sheets' => $sheets]);
    }

    public function createSheet()
    {
        $sheet = new Sheets;
        $sheet->user_id = Auth::id();
        $sheet->title = "Untitled";
        $sheet->body = "<p>Hello World!</p>";
        $sheet->save();
        return redirect()->route('user.sheet', ['user' =>Auth::id()]);
    }

    public function sheet($id)
    {
        $userId = Auth::id();
        $sheet = Sheets::find($id);
        if (!$sheet || $sheet->user_id != $userId) {
            return redirect()->route('user.sheet')->with('incorrectSheet', "Trying to access unavaliable/incorrect sheet");
        }
        $sheets = Sheets::where('user_id', $userId)->get();
        return view("sheet")->with(['sheet' => $sheet, 'sheets' => $sheets]);
    }

    public function editSheet(Request $request, Sheets $sheet)
    {
        $newData = [
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ];
        $result = $sheet->where('id', $sheet->id)->update($newData);
         return redirect ("/sheet/{$sheet->id}")->with('successEdit',"Sheet berhasil di save.");
    }

    public function deleteSheet(Sheets $sheet)
    {
        $userId = Auth::id();
        if ($sheet && $sheet->user_id == $userId) {
            $sheet->where('id', $sheet->id)->delete();
            return redirect()->route('user.sheet')->with('successDelete', 'Sheet deleted successfully.');
        }

        return redirect()->route('user.sheet')->with('errorDelete', 'You do not have permission to delete this sheet.');
    }
}
