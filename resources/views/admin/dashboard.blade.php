@extends('admin.index')
@section('content')
    <p>Admin dashboard</p>
    <form method="post" action="{{route('admin.logout')}}">
        @csrf
        <button type="submit" class="btn btn-outline-danger">Logout</button>
    </form>
@endsection
