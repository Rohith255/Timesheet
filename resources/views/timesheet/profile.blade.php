@extends('timesheet.index')
@section('content')
    <div class="container mt-4">
        <a href="#" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg></a>
        <form>
            <h1 class="text-primary">Profile</h1>
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" value="name">
            </div>
            <div class="row g-3 mb-3">
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="email@gmail.com" required>
                </div>
                <div class="col">
                    <label for="mobile">Mobile</label>
                    <input type="number" class="form-control" value="873473382" required>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" value="location" required>
                </div>
                <div class="col">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" value="Web dev" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="form-control form-control btn btn-primary">Update</button>
            </div>
            <div class="mb-3">
                <p>Delete your Account? </p>
                <button type="submit" class="form-control btn btn-outline-danger">Update</button>
            </div>
        </form>
    </div>
@endsection
