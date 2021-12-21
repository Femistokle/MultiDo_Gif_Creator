{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.courses.all')}}">Список курсов</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.courses.course', $course->id)}}">Курс
                        "{{$course->name}}"</a></li>
                <li class="breadcrumb-item active"><a href="">Новый урок</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('admin.lessons.new', $course->id)}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <div class="card-title">
                                Новый урок
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="form-group col-12 mt-4">
                                        <label>Номер кабинета</label>
                                        <select name="room_id" class="form-control">
                                            @foreach($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->number}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label>Тип урока</label>
                                        <select name="type" class="form-control">
                                            <option value="Лекция">Лекция</option>
                                            <option value="Лабораторная">Лабораторная</option>
                                            <option value="Практика">Практика</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label>День недели</label>
                                        <select name="day" class="form-control">
                                            <option value="1">Понедельник</option>
                                            <option value="2">Вторник</option>
                                            <option value="3">Среда</option>
                                            <option value="4">Четверг</option>
                                            <option value="5">Пятница</option>
                                            <option value="6">Суббота</option>
                                            <option value="7">Воскресение</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label>Начало урока</label>
                                        <select name="time_start" class="form-control">
                                            <option value="08:00">08:00</option>
                                            <option value="09:00">09:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:10">12:10</option>
                                            <option value="13:10">13:10</option>
                                            <option value="14:10">14:10</option>
                                            <option value="15:10">15:10</option>
                                            <option value="16:10">16:10</option>
                                            <option value="17:20">17:20</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:30">21:30</option>
                                        </select>
                                    </div>
{{--                                    <div class="col-12">--}}
{{--                                        <label>Начало урока</label>--}}
{{--                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top"--}}
{{--                                             data-autoclose="true">--}}
{{--                                            <input name="time_start" type="text" class="form-control" value="13:10">--}}
{{--                                            <span class="input-group-append">--}}
{{--                                                <span class="input-group-text">--}}
{{--                                                    <i class="fa fa-clock"></i>--}}
{{--                                                </span>--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label>Конец занятия</label>--}}
{{--                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top"--}}
{{--                                             data-autoclose="true">--}}
{{--                                            <input name="time_end" type="text" class="form-control" value="14:00">--}}
{{--                                            <span class="input-group-append">--}}
{{--                                                <span class="input-group-text">--}}
{{--                                                    <i class="fa fa-clock"></i>--}}
{{--                                                </span>--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
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
