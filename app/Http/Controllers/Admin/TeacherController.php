<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teachers()
    {
        $teachers = Teacher::all();
        $action = 'teachers_all';

        $title = 'Список преподавателей';

        return view('admin.teachers.all', compact('action', 'title', 'action', 'teachers'));
    }

    public function new()
    {
        $departments = Department::all();
        $action = 'teachers_new';

        $title = 'Новый преподаватель';

        return view('admin.teachers.new', compact('action', 'title', 'action', 'departments'));
    }

    public function newStore(Request $request)
    {
        $request->validate([
            'name' => 'required|String',
            'email' => 'nullable|String|email',
            'department_id' => 'required|exists:departments,id'
        ]);
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->department_id = $request->department_id;
        $teacher->save();

        return redirect()->route('admin.teachers.all')->with('success', 'Преподаватель ' . $teacher->name . ' создан');
    }

    public function teacher(Teacher $teacher)
    {
        $action = 'teachers_teacher';
        $title = 'Преподаватель "' . $teacher->name . '"';

        return view('admin.teachers.teacher', compact('action', 'title', 'action', 'teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $action = 'teachers_new';
        $departments = Department::all();
        $title = 'Изменить преподавателя "' . $teacher->name . '"';

        return view('admin.teachers.edit', compact('action', 'title', 'action', 'teacher', 'departments'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|String',
            'email' => 'nullable|String|email',
            'department_id' => 'required|exists:departments,id'
        ]);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->department_id = $request->department_id;
        $teacher->save();

        return redirect()->route('admin.teachers.all')->with('success', 'Преподаватель ' . $teacher->name . ' изменен');
    }

    public function delete(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('admin.teachers.all')->with('success', 'Преподаватель ' . $teacher->name . ' удален');
    }
}
