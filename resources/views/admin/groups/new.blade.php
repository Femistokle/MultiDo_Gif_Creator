{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Группы</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Новая группа</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('admin.groups.new')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <div class="card-title">
                                Новая группа
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-12">
                                        <input name="name" type="text" class="form-control"
                                               placeholder="Название группы">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Создать группу</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
