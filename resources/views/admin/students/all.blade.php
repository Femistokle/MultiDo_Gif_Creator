{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
{{--        <div class="page-titles">--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li class="breadcrumb-item active"><a href="#">Список студентов</a></li>--}}
{{--            </ol>--}}
{{--        </div>--}}
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Список студентов</h4>
                        <a href="{{route('admin.students.new')}}" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-1"></i> Создать нового студента</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Группа</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td><a class="text-primary" href="{{route('admin.students.student', $student->id)}}">{{$student->name}}</a></td>
                                        <td>{{$student->email}}</td>
                                        <td><a class="text-primary" href="{{route('admin.groups.group', $student->group_id)}}">{{$student->group->name}}</a></td>
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
