@php
    $i=0;
@endphp

@if(session('error') || count($errors)>0 || session('success') || session('warningMessage'))
    <script>
        Swal.mixin({
            confirmButtonText: 'Продолжить',
        }).queue([
                @if(count($errors)>0)
                @foreach($errors->all() as $error)
            {
                title: 'Ошибка!',
                text: '{{$error}}',
                icon: 'error'
            },
                @php($i++)
                @endforeach
                @endif
                @if(session('error'))
            {
                title: 'Ошибка',
                text: '{{session('error')}}',
                icon: 'error'
            },
                @php($i++)
                @endif

                @if(session('success'))
            {
                title: 'Успешно!',
                text: '{{session('success')}}',
                icon: 'success'
            },
                @php($i++)
                @endif

                @if(session('warningMessage'))
            {
                title: 'Ошибка!',
                text: '{{session('warningMessage')}}',
                icon: 'warning'
            },
            @php($i++)
            @endif
        ])

        // Swal.insertQueueStep();
        @if($i>1)
        Swal.update({progressSteps: [@for($q=1;$q<=$i;$q++) '{{$q}}', @endfor]});
        @endif

        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endif
