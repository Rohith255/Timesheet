@extends('admin.index')
@section('content')
    <div class="container mt-3">
        <h4 class="text-center text-primary">Timesheet Entries</h4>
        @php
            $previous_day = null;
        @endphp

        @foreach($entries as $ent)
            @if($previous_day != $ent->date)
                @if($previous_day !== null)
                    </table> <!-- Close the previous table if it exists -->
        @endif

        <h5 class="text-primary">Date - {{ $ent->date }}</h5>
        <table class="table table-bordered table-fit">
            <tr>
                <th style="background-color: rgb(236,236,236);">Date</th>
                <th style="background-color: rgb(236,236,236);">Description</th>
                <th style="background-color: rgb(236,236,236);">Project</th>
                <th style="background-color: rgb(236,236,236);">Module</th>
                <th style="background-color: rgb(236,236,236);">Task</th>
                <th style="background-color: rgb(236,236,236);">Time</th>
            </tr>
            @php
                $previous_day = $ent->date;
            @endphp
            @endif

            <tr>
                <td>{{ $ent->date }}</td>
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
