<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Lesson;
use App\Models\Room;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function schedule(Request $request)
    {
        $lessons = Lesson::all();
        if($request->type == 'ГРУППА:'){
            $group = Group::find($request->schedule['id']);
            $lessons = $group->lessons;
        }
        if($request->type == 'ПРЕПОДАВАТЕЛЬ:'){
            $teacher = Teacher::find($request->schedule['id']);
            $lessons = $teacher->lessons;
        }

        if($request->type == 'КАБИНЕТ:'){
            $room = Room::find($request->schedule['id']);
            $lessons = $room->lessons;
        }
        $returnHTML = view('layout.schedules')->with('lessons', $lessons)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function variants(Request $request)
    {
        $rooms = Room::with('lessons')->where('number', 'LIKE', '%' . $request->search_input . '%')->get();
        $teachers = Teacher::where('name', 'LIKE', '%' . $request->search_input . '%')->get();
        $groups = Group::where('name', 'LIKE', '%' . $request->search_input . '%')->get();

        return response()->json($groups->concat($rooms->concat($teachers)));
    }
}

