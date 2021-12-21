@if(count($errors)>0)

    @foreach($errors->all() as $error)
        <div class="alert alert-outline alert-icon alert-danger alert-dismissible fade show">
            <div class="alert--icon">
                <i class="fa fa-exclamation-triangle"></i>
            </div>
            <div class="alert-text">
                <strong>Ошибка!</strong> {{$error}}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endforeach

@endif

@if(session('success'))
    <div class="alert alert-outline alert-icon alert-success alert-dismissible fade show">
        <div class="alert--icon">
            <i class="fa fa-check"></i>
        </div>
        <div class="alert-text">
            <strong>Успешно!</strong> {{session('success')}}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

@if(session('warningMessage'))
    <div class="alert alert-outline alert-icon alert-warning alert-dismissible fade show">
        <div class="alert--icon">
            <i class="fa fa-exclamation-triangle"></i>
        </div>
        <div class="alert-text">
            <strong>Внимание!</strong> {{session('warningMessage')}}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif


@if(session('error'))
    <div class="alert alert-outline alert-icon alert-danger alert-dismissible fade show">
        <div class="alert--icon">
            <i class="fa fa-exclamation-triangle"></i>
        </div>
        <div class="alert-text">
            <strong>Ошибка!</strong> {{session('error')}}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
