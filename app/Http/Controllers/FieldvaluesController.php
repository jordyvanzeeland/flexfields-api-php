<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fieldvalue;
use DB;

class FieldvaluesController extends Controller
{
    public function getAllFieldvalues(Request $request){
        return Fieldvalue::all();
    }

    public function getValue(Request $request){
        return Fieldvalue::find($request->id);
    }
}