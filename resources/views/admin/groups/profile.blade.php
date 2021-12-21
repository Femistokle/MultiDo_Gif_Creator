{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Группы</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Список</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Группа {{$group->name}}</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-statistics mb-5">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-12 mb-5">
                                        <h1>{{$group->name}}</h1>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">{{$group->lessons()->count()}}</h3><span>Уроков</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Уроки</a>
                                    </li>
                                    <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">Ученики</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Преподаватели</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="my-posts" class="tab-pane fade active show">
                                        <div class="my-post-content pt-3">
                                            <div class="card-body">
                                                <div class="table-responsive table">
                                                    <table  class="display">
                                                        <thead>
                                                        <tr>
                                                            <th>Название</th>
                                                            <th>Учитель</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($group->lessons as $lesson)
                                                            <tr>
                                                                <td>{{$lesson->name}}</td>
                                                                <td>{{$lesson->teacher->name}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="about-me" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Ученики</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Преподаватели</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
