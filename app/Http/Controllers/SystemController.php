<?php

namespace App\Http\Controllers;

use App\Department;
use App\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function system_setup() {
        $systems = System::all();
        $departments = Department::all();
        return view( 'system_setup.index', compact('systems', 'departments'));
    }

    public function store(Request $request){
        $new_system = new System();
        $new_system->name = $request->name;
        $new_system->link = $request->link;
        $new_system->description = $request->description;
        $new_system->department_id = json_encode($request->departments);
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $new_system->logo = $path;
        }

        $new_system->save();
        $new_system->departments()->attach($request->departments);
        return back();
    }

    public function edit(Request $request, $id){
        $edit_system = System::findOrFail($id);
        $edit_system->name = $request->name;
        $edit_system->link = $request->link;
        $edit_system->description = $request->description;
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $edit_system->logo = $path;
        }

        $edit_system->save();
        $edit_system->departments()->sync($request->departments);
        return back();
    }

    public function show($name, $id)
    {
        $department = Department::with('systems')
            ->where('id', $id)
            ->where('name', $name)
            ->firstOrFail();

        return view('system_setup.show', compact('department'));
    }

    public function all_systems(Request $request) {
        $query = System::query();
         if ($request->filled('department')) {
           $query->whereJsonContains('department_id', $request->department);
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        }
        // $all_systems = System::all();
        $all_systems = $query->get();
        $departments = Department::all();
        return view( 'system_setup.all_systems', compact('all_systems', 'departments'));
    }

    public function delete($id)
    {
        $request = System::findOrFail($id);
        $request->departments()->detach();
        $request->delete();
        

        return back();
    }

}
