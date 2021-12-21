{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles" style="background: #fff">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.departments.all')}}">Группа</a></li>
                <li class="breadcrumb-item active"><a href="#">{{$title}}</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header border-0  pb-0">
                                <div>
                                    <h4 class="text-black fs-20">{{$group->name}}</h4>
                                    {{--                                    <p class="fs-12 mb-0">ID: {{$department->id}}</p>--}}
                                </div>
                                <div class="dropdown custom-dropdown mb-0">
                                    <div class="btn sharp pr-0 tp-btn" data-toggle="dropdown">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('admin.groups.edit', $group->id)}}">Изменить</a>
                                        <a class="dropdown-item text-danger" href="{{route('admin.groups.delete', $group->id)}}">Удалить</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <ul class="list-group list-group-flush">
{{--                                    <li class="list-group-item d-flex px-0 justify-content-between">--}}
{{--                                        <strong class="mr-2">Название</strong>--}}
{{--                                        <span class="mb-0">{{$department->name}}</span>--}}
{{--                                    </li>--}}
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong class="mr-2">ID</strong>
                                        <span class="mb-0">#{{$group->id}}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong class="mr-2">Кол-во студентов</strong>
                                        <span class="mb-0">{{$group->students->count()}}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong class="mr-2">Кол-во курсов</strong>
                                        <span class="mb-0">{{$group->courses->count()}}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong class="mr-2">Кол-во предметов</strong>
                                        <span class="mb-0">{{$group->lessons->count()}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#students" data-toggle="tab"
                                                            class="nav-link active show">Студенты
                                            ({{$group->students()->count()}})</a>
                                    </li>

                                    <li class="nav-item"><a href="#courses" data-toggle="tab"
                                                            class="nav-link show">Курсы
                                            ({{$group->courses()->count()}})</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="students" class="tab-pane fade active show">
                                        <a href="{{route('admin.students.new',['group', $group->id])}}" class="btn btn-primary btn-sm my-4 float-right"><i class="fa fa-plus mr-1"></i> Создать нового студента</a>

                                        <div class="table-responsive mt-4">
                                            <table id="example3" class="display">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>ФИО</th>
                                                    <th>Email</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($group->students as $student)
                                                    <tr>
                                                        <td>{{$student->id}}</td>
                                                        <td>
                                                            <a class="text-primary" href="{{route('admin.students.student',$student->id)}}">{{$student->name}}</a>
                                                        </td>
                                                        <td class="text-black">{{$student->email}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="courses" class="tab-pane fade">
                                        <div class="table-responsive mt-4">
                                            <table id="example2" class="display">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Название</th>
                                                    <th>ФИО преподавателя</th>
                                                    <th>Кол-во кредитов</th>
                                                    <th>Кол-во уроков</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($group->courses as $course)
                                                    <tr>
                                                        <td>{{$course->id}}</td>
                                                        <td>
                                                            <a class="text-primary" href="{{route('admin.courses.course',$course->id)}}">{{$course->name}}</a>
                                                        </td>
                                                        <td><a class="text-primary" href="{{route('admin.teachers.teacher',$course->teacher_id)}}">{{$course->teacher->name}}</a></td>
                                                        <td>{{$course->credits}}</td>
                                                        <td>{{$course->lessons()->count()}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
