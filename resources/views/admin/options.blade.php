@extends('admin.index')
@section('content')
    <style>
        .form-select:focus {
            outline: none;
            box-shadow: none;
        }
    </style>
    <div class="container">
        <h3 class="mt-3 text-primary">Manage - Project,Module and Task</h3>
        <div class="row gy-2 gx-3 align-items-center mt-5">
            <div class="col-auto">
                <h5>Choose Project</h5>
                <div class="input-group">
                    <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#create_project_modal">
                        +
                    </button>
                    <select class="form-select bg-light" id="admin_project">
                        <option class="form-control">Choose Project</option>
                        @foreach($project as $project)
                            <option value="{{$project->id}}" class="form-control">{{$project->project_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-auto">
                <h5>Module</h5>
                <div class="input-group">
                    <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#create_module">
                        +
                    </button>
                    <select class="form-select bg-light" id="admin_module_view">
                        <option>View Module</option>
                    </select>
                </div>
            </div>
            <div class="col-auto">
                <h5>View Task</h5>
                <div class="input-group">
                        <select class="form-select bg-light" id="admin_view_task">
                            <option>View Task</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    Create Project--}}

    <div class="modal fade" id="create_project_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Project</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="create_project">
                        <div class="mb-3">
                            <input type="text" placeholder="Create project" class="form-control" id="project_name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{--    Create module--}}

    <div class="modal fade" id="create_module" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Module</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="admin_create_module">
                        @csrf
                        <div class="mb-3">
                            <select class="form-select" id="admin_project_id">
                                <option>Choose project...</option>
                                @php
                                    $pro = \App\Models\Project::all();
                                @endphp
                               @foreach($pro as $project)
                                   <option value="{{$project->id}}">{{$project->project_name}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" placeholder="Create module" class="form-control" id="module_name">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{--    Create Task--}}

    <div class="modal fade" id="create_task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Module</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="#">
                        @csrf
                        <div class="mb-3">
                            <select class="form-select">
                                <option>Choose project...</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select">
                                <option>Choose module...</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" placeholder="Create task" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
