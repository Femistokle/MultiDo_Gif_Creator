{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.rooms.all')}}">Список кабинетов</a></li>
                <li class="breadcrumb-item active"><a href="">Изменить кабинет</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('admin.rooms.edit', $room->id)}}" method="POST">

                        <div class="card-header">
                            <div class="card-title">
                                Изменить кабинет "{{$room->number}}"
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <input name="number" type="text" class="form-control"
                                               placeholder="Номер кабинета" value="{{$room->number}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
