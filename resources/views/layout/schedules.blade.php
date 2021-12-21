@foreach($lessons->groupBy('day') as $dayLessons)
    <div class="col">
        @foreach($dayLessons as $lesson)
            <div class="timetable-card" data-day="1" data-time="11">
                <p class="m-0"><i class="fa fa-clock mr-2"></i>{{$lesson->day_string}} - {{$lesson->time_start}}</p>
                <p class="m-0"><i class="fa fa-book mr-2"></i>{{$lesson->course->name}}</p>
                <p class="m-0"><i class="fa fa-users mr-2"></i>{{$lesson->type}}: {{$lesson->course->group->name}}</p>
                <p class="m-0"><i class="fa fa-location-arrow mr-2"></i> {{$lesson->room->number}}</p>
                <p class="m-0"><i class="fa fa-user-tie mr-2"></i> {{$lesson->course->teacher->name}}</p>
            </div>
        @endforeach
    </div>
@endforeach
