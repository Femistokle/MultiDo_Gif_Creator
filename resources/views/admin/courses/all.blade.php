{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Список курсов</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Список курсов</h4>
                        <a href="{{route('admin.courses.new')}}" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-1"></i> Создать новый курс</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название курса</th>
                                    <th>Название группы</th>
                                    <th>ФИО преподавателя</th>
                                    <th>Кол-во кредитов</th>
                                    <th>Кол-во уроков</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{$course->id}}</td>
                                        <td><a class="text-primary" href="{{route('admin.courses.course', $course->id)}}">{{$course->name}}</a></td>
                                        <td><a href="{{route('admin.groups.group', $course->group_id)}}">{{$course->group->name}}</a></td>
                                        <td><a href="{{route('admin.teachers.teacher', $course->teacher_id)}}">{{$course->teacher->name}}</a></td>
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

@endsection
