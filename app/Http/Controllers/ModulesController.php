<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use DB;

class ModulesController extends Controller
{
    public function getAllUserModules(){
        $user = auth()->user();
        return Module::where('userid', $user->id)->get();
    }

    public function insertModule(Request $request){
        $user = auth()->user();

        $module = Module::create([
            'userid' => $user->id,
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'New module added', 'module' => $module], 201);
    }

    public function updateModule(Request $request){
        $this->authorize('update', $module);

        $module->update([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Module updated', 'module' => $module], 200);
    }

    public function deleteModule(Request $request){
        $this->authorize('delete', $module);
        $module->delete();

        return response()->json(['message' => 'Module deleted'], 200);
    }
}
