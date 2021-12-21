<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Room;
use Illuminate\Http\Request;

class LessonController extends Controller
{
//    public function lessons()
//    {
//        $lessons = Lesson::all();
//        $action = 'lessons_all';
//
//        return view('admin.lessons.all', compact('action', 'lessons'));
//    }

    public function new(Course $course)
    {
        $action = 'lessons_new';
        $title = 'Новый урок';
        $rooms = Room::all();

        return view('admin.lessons.new', compact('action', 'title', 'course', 'rooms'));
    }

    public function newStore(Request $request, Course $course)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'type' => 'required|string',
            'day' => 'required|integer',
            'time_start' => 'required|string',
        ]);
        $lesson = new Lesson();
        $lesson->course_id = $course->id;
        $lesson->room_id = $request->room_id;
        $lesson->type = $request->type;
        $lesson->day = $request->day;
        switch ($request->day) {
            case 1:
                $lesson->day_string = 'Понедельник';
            case 2:
                $lesson->day_string = 'Вторник';
            case 3:
                $lesson->day_string = 'Среда';
            case 4:
                $lesson->day_string = 'Четверг';
            case 5:
                $lesson->day_string = 'Пятница';
            case 6:
                $lesson->day_string = 'Суббота';
            case 7:
                $lesson->day_string = 'Воскресение';
            default:
                $lesson->day_string = 'Понедельник';
        }
        $lesson->time_start = $request->time_start;
        $lesson->save();

        return redirect()->route('admin.courses.course', $course->id)->with('success', 'Урок создан');
    }
}
