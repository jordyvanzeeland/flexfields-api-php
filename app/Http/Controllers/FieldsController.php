<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use DB;

class FieldsController extends Controller
{
    public function getAllFieldsOfModule(Request $request){
        $user = auth()->user();
        return Field::where('moduleid', $request->header('module'))->where('userid', $user->id)->get();
    }
}