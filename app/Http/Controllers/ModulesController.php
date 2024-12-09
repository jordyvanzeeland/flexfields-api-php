<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use DB;

class ModulesController extends Controller
{
    public function getAllUserModules(){
        $user = auth()->user();
        $userModules = Module::where('userid', $user['id'])->get();
        return $userModules;
    }

    public function insertModule(Request $request){
        $data = $request->all();
        $user = auth()->user();

        if(!$request->name || $request->name && $request->name === ''){
            return response()->json(['message' => 'No module name specified']);
        }

        $module = new Module;
        $module->userid = $user->id;
        $module->name = $request->name;
        $module->save();

        return response()->json(['message' => 'New module added'], 200);
    }
}
