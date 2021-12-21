{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.teachers.all')}}">Список преподавателей</a></li>
                <li class="breadcrumb-item active"><a href="">Новый преподаватель</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('admin.teachers.new')}}" method="POST">

                        <div class="card-header">
                            <div class="card-title">
                                Новый преподаватель
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <input name="name" type="text" class="form-control"
                                               placeholder="ФИО преподователя">
                                    </div>
                                    <div class="col-12 mt-4">
                                        <input name="email" type="email" class="form-control"
                                               placeholder="Email преподователя">
                                    </div>
                                    <div class="col-12 mt-4">
                                        <select name="department_id" type="email" class="form-control">

                                            <option value="volvo" disabled selected>Кафедра преподователя...</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
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
