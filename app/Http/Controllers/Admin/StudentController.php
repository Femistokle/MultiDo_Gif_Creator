<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function students()
    {
        $students = Student::all();
        $action = 'students_all';

        $title = 'Список учеников';

        return view('admin.students.all', compact('action', 'title', 'action', 'students'));
    }

    public function new()
    {
        $groups = Group::all();
        $action = 'students_new';

        $title = 'Новый студент';

        return view('admin.students.new', compact('action', 'title', 'action', 'groups'));
    }

    public function newStore(Request $request)
    {
        $request->validate([
            'name' => 'required|String',
            'email' => 'required|email',
            'group_id' => 'required|exists:groups,id'
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt('123');
        $student->group_id = $request->group_id;
        $student->save();

        return redirect()->route('admin.students.all')->with('success', 'Студент ' . $student->name . ' создан');
    }


    public function student(Student $student)
    {
        $action = 'students_student';
        $title = 'Студент "' . $student->name . '"';

        return view('admin.students.student', compact('action', 'title', 'action', 'student'));
    }

    public function edit(Student $student)
    {
        $action = 'students_new';
        $teachers = Teacher::all();
        $groups = Group::all();
        $title = 'Изменить студента "' . $student->name . '"';

        return view('admin.students.edit', compact('action', 'title', 'action', 'student', 'teachers', 'groups'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|String',
            'email' => 'required|email',
            'group_id' => 'required|exists:groups,id'
        ]);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt('123');
        $student->group_id = $request->group_id;
        $student->save();

        return redirect()->route('admin.students.all')->with('success', 'Студент ' . $student->name . ' изменен');
    }

    public function delete(Student $student)
    {
        $student->delete();

        return redirect()->route('admin.students.all')->with('success', 'Студент ' . $student->name . ' удален');
    }
}
