<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function departments()
    {
        $departments = Department::all();
        $action = 'departments_all';
        $title = 'Список кафедр';

        return view('admin.departments.all', compact('action', 'title', 'action', 'departments'));
    }

    public function new()
    {
        $action = 'departments_new';
        $title = 'Новая кафедра';

        return view('admin.departments.new', compact('action', 'title', 'action'));
    }

    public function newStore(Request $request)
    {
        $request->validate([
            'name' => 'required|String'
        ]);
        $department = new Department();
        $department->name = $request->name;
        $department->save();

        return redirect()->route('admin.departments.all')->with('success', 'Кафедра ' . $department->name . ' создана');
    }

    public function department(Department $department)
    {
        $action = 'departments_department';
        $title = 'Кафедра "' . $department->name . '"';

        return view('admin.departments.department', compact('action', 'title', 'action', 'department'));

    }

    public function edit(Department $department)
    {
        $action = 'departments_new';
        $title = 'Изменить кафедру "' . $department->name . '"';

        return view('admin.departments.edit', compact('action', 'title', 'action', 'department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|String'
        ]);
        $department->name = $request->name;
        $department->save();

        return redirect()->route('admin.departments.all')->with('success', 'Кафедра ' . $department->name . ' изменена');
    }

    public function delete(Department $department)
    {
        $department->delete();

        return redirect()->route('admin.departments.all')->with('success', 'Кафедра ' . $department->name . ' удалена');
    }
}
