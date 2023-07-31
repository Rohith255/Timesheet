@extends('admin.index')
@section('content')
    <div class="container" style="padding-top: 15vh">
        <h4 class="text-center text-primary">Timesheet Entries</h4>
        @php
            $previous_day = null;
        @endphp

        @foreach($entries as $ent)
            @if($previous_day != $ent->date)
                @if($previous_day !== null)
                    @php
                        $table = '</table>';
                        echo $table;
                    @endphp
                    <!-- Close the previous table if it exists -->
        @endif

        <h5 class="text-primary">{{ \Carbon\Carbon::parse($ent->date)->format('d M Y') }}</h5>
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
