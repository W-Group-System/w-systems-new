<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::all();
        return view( 'departments.index', compact('departments'));
    }

    public function store(Request $request){
        $new_department = new Department();
        $new_department->name = $request->name;
        $new_department->save();
        return back();
    }

    public function edit(Request $request, $id){
        $edit_department = Department::findOrFail($id);
        $edit_department->name = $request->name;
        $edit_department->save();
        return back();
    }

    public function delete($id)
    {
        $request = Department::findOrFail($id);

        $request->delete();

        return back();
    }
}
