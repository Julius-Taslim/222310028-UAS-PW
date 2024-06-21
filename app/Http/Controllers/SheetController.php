<?php

namespace App\Http\Controllers;

use App\Models\Sheets;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function index()
    {
        $sheets = Sheets::all();
        return view("layout")->with(['sheets' => $sheets]);
    }

    public function sheet($id)
    {
        $sheet = Sheets::find($id);
        $sheets = Sheets::all();
        return view("sheet")->with(['sheet' => $sheet, 'sheets' => $sheets]);
    }

    public function createSheet()
    {
        $sheet = new Sheets;
        // $sheet->user_id = "1";
        $sheet->title = "Untitled";
        $sheet->body = "<p>Hello World!</p>";
        $sheet->save();
        return redirect('/');
    }

    public function editSheet(Request $request, Sheets $sheets)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $result = $sheets->where("id", $sheets->id)->update($validateData);
        if ($result){
            return redirect ('/') -> with('success', "Data Berhasil diedit");
        } else {
            return redirect ('/') -> with('success', "Data tidak Berhasil diedit");
        }
    }
}
