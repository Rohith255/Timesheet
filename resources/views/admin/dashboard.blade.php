@extends('admin.index')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 40vh">
    <div class="card w-75">
        <div class="card-body d-flex justify-content-between">
            <button class="btn btn-outline-dark">Developers - {{$total['developer_count']}}</button>
            <button class="btn btn-outline-dark">Projects - {{$total['project_count']}}</button>
            <button class="btn btn-outline-dark">Modules - {{$total['module_count']}}</button>
            <button class="btn btn-outline-dark">Task - {{$total['task_count']}}</button>
        </div>
    </div>
    </div>
@endsection
