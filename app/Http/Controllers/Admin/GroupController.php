<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function groups()
    {
        $groups = Group::all();
        $action = 'groups_all';
        $title = 'Список групп';

        return view('admin.groups.all', compact('action', 'groups', 'title'));
    }

    public function new()
    {
        $title = 'Новая группа';
        $action = 'groups_new';

        return view('admin.groups.new', compact('action', 'title'));
    }

    public function newStore(Request $request)
    {
        $request->validate([
            'name' => 'required|String'
        ]);
        $group = new Group();
        $group->name = $request->name;
        $group->save();

        return redirect()->route('admin.groups.all')->with('success', 'Группа ' . $group->name . ' создана');

    }

    public function calendar()
    {
        $action = 'calendar';
        $title = 'Расписание группы';
        return view('admin.groups.calender', compact('action', 'title'));
    }

    public function profile(Group $group)
    {
        $action = 'app_profile';
        $title = 'Группа .' . $group->name;

        return view('admin.groups.profile', compact('action', 'group'));
    }

    public function group(Group $group)
    {
        $action = 'groups_group';
        $title = 'Группа "' . $group->name . '"';

        return view('admin.groups.group', compact('action', 'title', 'action', 'group'));
    }

    public function edit(Group $group)
    {
        $action = 'groups_new';
        $title = 'Изменить группу "' . $group->name . '"';

        return view('admin.groups.edit', compact('action', 'title', 'action', 'group'));
    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|String'
        ]);
        $group->name = $request->name;
        $group->save();

        return redirect()->route('admin.groups.all')->with('success', 'Группа ' . $group->name . ' изменена');
    }

    public function delete(Group $group)
    {
        $group->delete();

        return redirect()->route('admin.groups.all')->with('success', 'Группа ' . $group->name . ' удалена');
    }
}
