@extends('admin.index')
@section('content')
    <div class="container w-50">
        <a href="{{route('admin.developers')}}" class="btn btn-secondary mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </a>
        <h3 class="text-primary mt-3">Developer - Name</h3>
            <form class="row g-3 mt-2" method="post" action="{{route('admin.update-dev',$dev->id)}}">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{$dev->name}}" name="dev_name">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{$dev->email}}" name="dev_email">
                </div>
                <div class="col-12">
                    <label for="inputMobile" class="form-label">Mobile</label>
                    <input type="number" class="form-control" value="{{$dev->mobile}}" name="dev_mobile">
                </div>
                <div class="col-md-6">
                    <label for="inputLocation" class="form-label">Location</label>
                    <input type="text" class="form-control" value="{{$dev->location}}" name="dev_location">
                </div>
                <div class="col-md-4">
                    <label for="inputRole" class="form-label">Role</label>
                    <select class="form-select" name="dev_role">
                        <option selected>Choose...</option>
                        <option value="Internship">Internship</option>
                        <option value="Junior Developer">Junior Developer</option>
                        <option value="Senior Developer">Senior Developer</option>
                        <option value="Team Lead">Team Lead</option>
                        <option value="Associate Team lead">Associate Team lead</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
@endsection
