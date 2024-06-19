<?php

namespace App\Http\Controllers;

use App\Models\Sheets;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function index(){
        $sheets = Sheets::all();
        return view("sheet")->with(['sheets'=>$sheets]);
    }

    public function createSheet(){
        $sheet = new Sheets;
        $sheet->user_id = "1";
        $sheet->title = "Untitled";
        $sheet->body = "";
        $sheet->save();

        $sheets = Sheets::all();

        return redirect('/');
    }
}

