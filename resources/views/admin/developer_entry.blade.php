@extends('admin.index')
@section('content')
    <div class="container" style="padding-top: 14vh">
        <a href="{{\Illuminate\Support\Facades\URL::previous()}}" class="btn btn-primary mt-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
        </a>
    <h4 class="text-center text-primary mt-3">Developer - {{$dev->name}}</h4>
        @php
            $previous_day = null;
        @endphp

        @foreach($entries as $ent)
            @if($previous_day != $ent->date)
                @if($previous_day !== null)
{{--                    check two values are not equal--}}
                    @php
                        $table = '</table>';
                        echo $table;
                    @endphp
                @endif

                <h5 class="text-primary">{{\Illuminate\Support\Carbon::parse($ent->date)->format('d M Y')}}</h5>
                <table class="table table-borderless shadow table-fit">
                    <tr>
                        <th style="background-color: rgb(236,236,236);border-top-left-radius: 20px">Description</th>
                        <th style="background-color: rgb(236,236,236);">Project</th>
                        <th style="background-color: rgb(236,236,236);">Module</th>
                        <th style="background-color: rgb(236,236,236);">Task</th>
                        <th style="background-color: rgb(236,236,236);border-top-right-radius: 20px">Time</th>
                    </tr>
                    @php
                        $previous_day = $ent->date;
                    @endphp
                    @endif

                    <tr>
                        <td>{{ $ent->description }}</td>
                        <td>{{ $ent->task->module->project->project_name }}</td>
                        <td>{{ $ent->task->module->module_name }}</td>
                        <td>{{ $ent->task->task }}</td>
                        <td>{{ $ent->worked_time }}</td>
                    </tr>
                    @endforeach

                    @if($previous_day !== null)
                </table> <!-- Close the last table if it exists -->
            @endif
    </div>
@endsection
