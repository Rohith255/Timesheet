@extends('admin.index')
@section('content')
    <div class="container w-50">
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
