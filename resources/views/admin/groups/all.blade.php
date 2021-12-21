{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Список групп</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Список групп</h4>
                        <a href="{{route('admin.groups.new')}}" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-1"></i> Создать новую группу</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название группы</th>
                                    <th>Кол-во студентов</th>
                                    <th>Кол-во курсов</th>
                                    <th>Кол-во уроков</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($groups as $group)
                                    <tr>
                                        <td>{{$group->id}}</td>
                                        <td><a class="text-primary" href="{{route('admin.groups.group', $group->id)}}">{{$group->name}}</a></td>
                                        <td>{{$group->students()->count()}}</td>
                                        <td>{{$group->courses()->count()}}</td>
                                        <td>{{$group->lessons()->count()}}</td>
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
