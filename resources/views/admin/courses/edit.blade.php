{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.courses.all')}}">Список курсов</a></li>
                <li class="breadcrumb-item active"><a href="">Изменить курс</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('admin.courses.edit', $course->id)}}" method="POST">

                        <div class="card-header">
                            <div class="card-title">
                                Изменить курс "{{$course->name}}"
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <input name="name" type="text" class="form-control"
                                               placeholder="Название курса" value="{{$course->name}}">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <input name="credits" type="number" class="form-control"
                                               placeholder="Кол-во кредитов" value="{{$course->credits}}">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <select name="teacher_id" class="form-control">
                                            <option disabled selected>Выберите преподавателя...</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}" @if($course->teacher_id == $teacher->id) selected @endif>{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <select name="group_id" class="form-control">
                                            <option disabled selected>Выберите группу...</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}" @if($course->group_id == $group->id) selected @endif>{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
