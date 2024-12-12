<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fieldtype;
use DB;

class FieldtypesController extends Controller
{
    public function getAllFieldtypes(Request $request){
        return Fieldtype::all();
    }

    public function getType(Request $request){
        return Fieldtype::find($request->id);
    }
}