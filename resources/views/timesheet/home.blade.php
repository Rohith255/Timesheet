@extends('timesheet.index')
@section('content')
    <div class="navbar-timesheet">
        <form method="post" action="{{route('developer.entry-store')}}">
            @csrf
            <div class="timesheet-row">
                <a href="{{route('developer.profile')}}" class="text-primary">
                    <span class="material-symbols-outlined" style="font-size: 2rem; color: #674737">account_circle</span>
                </a>
                <div class="navbar-date">
                    <input type="date" value="{{now()->format('Y-m-d')}}" class="input-date" name="date">
                </div>
            </div>
            <div class="timesheet-row-text">
                <div class="navbar-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    <input type="text" placeholder="please enter details" name="description">
                </div>
            </div>
            <div class="timesheet-row-module">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#project">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                </button>
                <select id="pro" name="project_id" class="pro">
                    <option>Choose project</option>
                    @foreach($project as $project)
                        <option value="{{$project->id}}">{{$project->project_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="timesheet-row-module">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#mod">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                        <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
                    </svg>
                </button>
                <select id="module" name="module_id" class="module">
                    <option>Choose module</option>
                </select>
            </div>
            <div class="timesheet-row-module">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#tsk">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-kanban" viewBox="0 0 16 16">
                    <path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h11zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11z"/>
                    <path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3z"/>
                </svg>
                </button>
                <select id="task" name="task_id">
                    <option>Choose Task</option>
                </select>
            </div>
            <div class="timesheet-row-module" style="width: 10%">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                <select name="worked_time">
                    <option value="1:00">1:00</option>
                    <option value="2:00">2:00</option>
                    <option value="3:00">3:00</option>
                    <option value="3:30">3:30</option>
                </select>
            </div>
            <div class="timesheet-row-button">
                <button type="submit">Submit</button>
            </div>
            <a href="{{route('developer.logout')}}" class="btn text-white h-75" style="background-color: #674737;border-radius: 10px;margin-bottom: 6px;display: flex;align-items: center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg></a>
        </form>
    </div>
    <div class="timesheet-entries d-flex flex-column align-items-center">
        <h2 class="text-center" style="color: #674737">Timesheet Entries</h2>
        <table class="table  table-hover table-borderless table-striped table-responsive" style="width: 94%">
            <tr>
                <th style="border-top-left-radius: 10px;">DATE</th>
                <th>DESCRIPTION</th>
                <th>PROJECT</th>
                <th>MODULE</th>
                <th>TASK</th>
                <th>TIME</th>
                <th style="border-top-right-radius: 10px;">ACTION</th>
            </tr>
            @foreach($timesheet_entries as $entry)
            <tr style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
                @php
                    $date = \Illuminate\Support\Carbon::parse($entry->date);
                @endphp
                    <td style="border-bottom-left-radius: 10px;">{{ strtoupper($date->format('d M Y'))}}</td>
                    <td>{{$entry->description}}</td>
                    <td>{{$entry->task->module->project->project_name}}</td>
                    <td>{{$entry->task->module->module_name}}</td>
                    <td>{{$entry->task->task}}</td>
                    <td>{{$entry->worked_time}}.hrs</td>
                    <td class="d-flex justify-content-between" style="border-bottom-right-radius:10px">
                        <form method="post" action="{{route('update-entry',$entry->id)}}">
                            @method('PUT')
                            @csrf
                        <button class="btn" type="submit" style="background-color: #d2b8a4">Update</button>
                        </form>
                        <form method="post" action="{{route('delete-entry',$entry->id)}}">
                            @method('DELETE')
                            @csrf
                        <button class="btn text-white" type="submit" style="background-color: #674737">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @if (session('welcome'))
        <div class="alert alert-danger" style="background-color: #5b3b28">
            {{ session('welcome')}} {{Auth::guard('dev')->user()->name}}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 4000);
        </script>
    @endif

    @if (session('project-created'))
        <div class="alert alert-danger" style="background-color: #5b3b28">
            {{ session('project-created')}}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 4000);
        </script>
    @endif

    @if (session('module-created'))
        <div class="alert alert-danger" style="background-color: #5b3b28">
            {{ session('module-created')}}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 4000);
        </script>
    @endif

    @if (session('task-created'))
        <div class="alert alert-danger" style="background-color: #5b3b28">
            {{ session('task-created')}}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 4000);
        </script>
    @endif

    @if (session('entry-updated'))
        <div class="alert alert-danger" style="background-color: #5b3b28">
            {{ session('entry-updated')}}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 4000);
        </script>
    @endif

{{--    Create project --}}

    <div class="modal fade" id="project" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Project</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="project-create">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Project:</label>
                            <input type="text" class="form-control" placeholder="Create project" id="project_name" name="project_name" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #674737">Close</button>
                    <button type="submit" class="btn text-black" style="background-color: #d2b8a4">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create module</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="module_create">
                        @csrf
                        @php
                            $pro = \App\Models\Project::all();
                        @endphp
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">select project</label>
                            <select class="form-control" name="project_id" id="project_choose">
                                <option>Choose Project</option>
                                @foreach($pro as $pro)
                                    <option value="{{$pro->id}}">{{$pro->project_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Module</label>
                            <input type="text" placeholder="create module" class="form-control" name="module_name"id="module_name" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #674737">Close</button>
                    <button type="submit" class="btn text-black" style="background-color: #d2b8a4">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>

{{--    Task  --}}

    <div class="modal fade" id="tsk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="create_task">
                        @csrf
                        @php

                            $pro = \App\Models\Project::all();
                        @endphp
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">select Module</label>
                            <select class="form-control module" id="module_task" name="module_id">
                                <option>Choose Module</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Task</label>
                            <input type="text" placeholder="create module" class="form-control task_name" name="task_name" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #674737">Close</button>
                    <button type="submit" class="btn text-black" style="background-color: #d2b8a4">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
