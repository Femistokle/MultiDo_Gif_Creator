{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Уроки</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Список</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Список уроков</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Учитель</th>
                                    <th>Группа</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lessons as $lesson)
                                    <tr>
                                        <td>{{$lesson->name}}</td>
                                        <td>{{$lesson->teacher->name}}</td>
                                        <td>{{$lesson->group->name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Название</th>
                                    <th>Учитель</th>
                                    <th>Группа</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
