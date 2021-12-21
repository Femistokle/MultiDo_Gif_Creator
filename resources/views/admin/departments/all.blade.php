{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Список кафедр</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Список кафедр</h4>
                        <a href="{{route('admin.departments.new')}}" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-1"></i> Создать новую кафедру</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Количество учителей</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{$department->id}}</td>
                                        <td><a href="{{route('admin.departments.department',$department->id)}}">{{$department->name}}</a></td>
                                        <td>{{$department->teachers()->count()}}</td>
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
