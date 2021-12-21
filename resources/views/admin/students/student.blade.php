{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles" style="background: #fff">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.students.all')}}">Список студентов</a></li>
                <li class="breadcrumb-item active"><a href="#">{{$title}}</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header border-0 pb-0">
                                <div>
                                    <h4 class="text-black fs-20">{{$student->name}}</h4>
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
                                        <a class="dropdown-item"
                                           href="{{route('admin.students.edit', $student->id)}}">Изменить</a>
                                        <a class="dropdown-item text-danger"
                                           href="{{route('admin.students.delete', $student->id)}}">Удалить</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong class="mr-2">ID</strong>
                                        <span class="mb-0">#{{$student->id}}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong class="mr-2">Email</strong>
                                        <span class="mb-0">{{$student->email}}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong class="mr-2">Группа</strong>
                                        <span class="mb-0"><a class="text-primary" href="{{route('admin.groups.group',$student->group_id)}}">{{$student->group->name}}</a></span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong class="mr-2">Кол-во курсов</strong>
                                        <span class="mb-0">{{$student->group->courses()->count()}}</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <strong class="mr-2">Кол-во уроков</strong>
                                        <span class="mb-0">{{$student->group->lessons()->count()}}</span>
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
                                    <li class="nav-item">
                                        <a href="#courses" data-toggle="tab" class="nav-link active show">Курсы
                                            ({{$student->group->courses()->count()}})</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#lessons" data-toggle="tab" class="nav-link">Уроки
                                            ({{$student->group->lessons()->count()}})</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="courses" class="tab-pane fade active show">
                                        <div class="table-responsive mt-4">
                                            <table id="example2" class="display">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Название курса</th>
                                                    <th>ФИО преподавателя</th>
                                                    <th>Кол-во кредитов</th>
                                                    <th>Кол-во уроков</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($student->group->courses as $course)
                                                    <tr>
                                                        <td>{{$course->id}}</td>
                                                        <td>
                                                            <a class="text-primary" href="{{route('admin.courses.course',$course->id)}}">{{$course->name}}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-primary" href="{{route('admin.teachers.teacher',$course->teacher_id)}}">{{$course->teacher->name}}</a>
                                                        </td>
                                                        <td>{{$course->credits}}</td>
                                                        <td>{{$course->lessons()->count()}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="lessons" class="tab-pane fade">
                                        <div class="table-responsive mt-4">
                                            <table id="example3" class="display">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Название курса</th>
                                                    <th>Номер кабинета</th>
                                                    <th>День недели</th>
                                                    <th>Начало</th>
                                                    <th>Конец</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($student->group->lessons as $lesson)
                                                    <tr>
                                                        <td>
                                                            <a class="text-primary" href="{{route('admin.lessons.lesson',$lesson->id)}}">{{$lesson->id}}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-primary" href="{{route('admin.courses.course',$lesson->course_id)}}">{{$lesson->course->name}}</a>
                                                        </td>
                                                        <td>
                                                            <a class="text-primary" href="{{route('admin.rooms.room',$lesson->room_id)}}">{{$lesson->room->number}}</a>
                                                        </td>
                                                        <td>{{$lesson->day_string}}</td>
                                                        <td>{{$lesson->time_start}}</td>
                                                        <td>{{$lesson->time_end}}</td>
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
