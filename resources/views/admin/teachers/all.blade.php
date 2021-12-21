{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Список преподавателей</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Список преподавателей</h4>
                        <a href="{{route('admin.teachers.new')}}" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-1"></i> Создать нового преподавателя</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ФИО</th>
                                    <th>Кафедра</th>
                                    <th>Почта</th>
                                    <th>Кол-во курсов</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{$teacher->id}}</td>
                                        <td><a class="text-primary" href="{{route('admin.teachers.teacher', $teacher->id)}}">{{$teacher->name}}</a></td>
                                        <td><a class="text-primary" href="{{route('admin.departments.department', $teacher->department_id)}}">{{$teacher->department->name}}</a></td>
                                        <td>{{$teacher->email}}</td>
                                        <td>{{$teacher->courses()->count()}}</td>
{{--                                        <td>{{$teacher->lessons()->count()}}</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
{{--                                <tr>--}}
{{--                                    <th>Имя</th>--}}
{{--                                    <th>Количество уроков</th>--}}
{{--                                </tr>--}}
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
