{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.students.all')}}">Список студентов</a></li>
                <li class="breadcrumb-item active"><a href="#">Новый студент</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('admin.students.new')}}" method="POST">

                        <div class="card-header">
                            <div class="card-title">
                                Новый студент
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <input name="name" type="text" class="form-control"
                                               placeholder="ФИО студента">
                                    </div>
                                    <div class="col-12 mt-4">
                                        <input name="email" type="email" class="form-control"
                                               placeholder="Email студента">
                                    </div>
                                    <div class="col-12 mt-4">
                                        <select name="group_id" type="email" class="form-control">

                                            <option value="volvo" disabled selected>Группа студента...</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
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
