<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courses()
    {
        $courses = Course::all();
        $action = 'courses_all';

        $title = 'Список курсов';

        return view('admin.courses.all', compact('action', 'title', 'action', 'courses'));
    }

    public function new()
    {
        $teachers = Teacher::all();
        $groups = Group::all();
        $action = 'courses_new';

        $title = 'Новый курс';

        return view('admin.courses.new', compact('action', 'title', 'action', 'teachers', 'groups'));
    }

    public function newStore(Request $request)
    {
        $request->validate([
            'name' => 'required|String',
            'credits' => 'required|Integer',
            'teacher_id' => 'required|exists:teachers,id',
            'group_id' => 'required|exists:groups,id'
        ]);
        $course = new Course();
        $course->name = $request->name;
        $course->credits = $request->credits;
        $course->teacher_id = $request->teacher_id;
        $course->group_id = $request->group_id;
        $course->save();

        return redirect()->route('admin.courses.all')->with('success', 'Курс ' . $course->name . ' создан');
    }

    public function course(Course $course)
    {
        $action = 'courses_course';
        $title = 'Курс "' . $course->name . '"';

        return view('admin.courses.course', compact('action', 'title', 'action', 'course'));
    }

    public function edit(Course $course)
    {
        $action = 'courses_new';
        $teachers = Teacher::all();
        $groups = Group::all();
        $title = 'Изменить курс "' . $course->name . '"';

        return view('admin.courses.edit', compact('action', 'title', 'action', 'course', 'teachers', 'groups'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|String',
            'credits' => 'required|Integer',
            'teacher_id' => 'required|exists:teachers,id',
            'group_id' => 'required|exists:groups,id'
        ]);
        $course->name = $request->name;
        $course->credits = $request->credits;
        $course->teacher_id = $request->teacher_id;
        $course->group_id = $request->group_id;
        $course->save();

        return redirect()->route('admin.courses.all')->with('success', 'Курс ' . $course->name . ' изменен');
    }

    public function delete(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.all')->with('success', 'Курс ' . $course->name . ' удален');
    }
}
