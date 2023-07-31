@extends('timesheet.index')
@section('content')
    <style>
        body{
            background-color: #efe9e1;
        }
    </style>
    <div class="container mt-4">
        <a href="{{url()->route('developer.timesheet')}}" class="btn h-auto" style="background-color: #D2B8A4; border-radius: 8px"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg></a>
        <form method="post" action="{{route('developer.profile-update')}}">
            @method('PUT')
            @csrf
            <h1 style="color: #674737">Profile</h1>
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{$developer->name}}" name="name" required>
            </div>
            <div class="row g-3 mb-3">
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="{{$developer->email}}" name="email" required>
                </div>
                <div class="col">
                    <label for="mobile">Mobile</label>
                    <input type="number" class="form-control" value="{{$developer->mobile}}" name="mobile" required>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" value="{{$developer->location}}" name="location" required>
                </div>
                <div class="col">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" value="{{$developer->role}}" required disabled>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="row g-3">
                <div class="col">
                    <button type="submit" class="form-control btn text-white g-button" style="background-color:#674737;">UPDATE</button>
                </div>
                <div class="col">
                    <button type="button" class="btn form-control g-button" style="background-color: #d2b8a4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Delete Account
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (session('updated'))
        <div class="alert alert-success">
            {{ session('updated') }}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 4000);
        </script>
    @endif

    @if ($errors->userDeletion->has('password'))
        <div class="alert alert-success">
            {{ $errors->userDeletion->first('password') }}
        </div>
    @endif


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rad">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Enter password To delete</p>
                    <form method="post" action="{{route('developer.profile-delete')}}">
                        @csrf
                        @method('DELETE')
                        <input type="password" class="form-control" placeholder="enter your password" name="password">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="form-control btn g-button text-white" style="background-color: #674737;">DELETE</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
