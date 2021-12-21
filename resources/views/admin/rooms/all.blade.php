{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Список кабинетов</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Список кабинетов</h4>
                        <a href="{{route('admin.rooms.new')}}" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-1"></i> Создать новый кабинет</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Номер кабинета</th>
                                    <th>Кол-во уроков</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rooms as $room)
                                    <tr>
                                        <td>{{$room->id}}</td>
                                        <td><a class="text-primary" href="{{route('admin.rooms.room', $room->id)}}">{{$room->number}}</a></td>
                                        <td>{{$room->lessons()->count()}}</td>
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
