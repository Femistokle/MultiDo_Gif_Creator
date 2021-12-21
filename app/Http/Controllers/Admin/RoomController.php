<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function rooms()
    {
        $rooms = Room::all();
        $action = 'rooms_all';

        $title = 'Список кабинетов';

        return view('admin.rooms.all', compact('action', 'title', 'action', 'rooms'));
    }

    public function new()
    {
        $action = 'rooms_new';

        $title = 'Новый кабинет';

        return view('admin.rooms.new', compact('action', 'title', 'action'));
    }

    public function newStore(Request $request)
    {
        $request->validate([
            'number' => 'required|String',
        ]);
        $room = new Room();
        $room->number = $request->number;
        $room->save();

        return redirect()->route('admin.rooms.all')->with('success', 'Кабинет ' . $room->number . ' создан');
    }

    public function room(Room $room)
    {
        $action = 'rooms_room';
        $title = 'Кабинет "' . $room->number . '"';

        return view('admin.rooms.room', compact('action', 'title', 'action', 'room'));
    }

    public function edit(Room $room)
    {
        $action = 'rooms_new';
        $title = 'Изменить кабинет "' . $room->number . '"';

        return view('admin.rooms.edit', compact('action', 'title', 'action', 'room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'number' => 'required|String',
        ]);
        $room->number = $request->number;
        $room->save();

        return redirect()->route('admin.rooms.all')->with('success', 'Кабинет ' . $room->number . ' изменен');
    }

    public function delete(Room $room)
    {
        $room->delete();

        return redirect()->route('admin.rooms.all')->with('success', 'Кабинет ' . $room->number . ' удален');
    }
}
