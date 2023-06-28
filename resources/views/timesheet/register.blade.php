@extends('timesheet.index')
@section('content')
    <div class="register-page">
        <div class="register-image-section">
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTF8fGRldmVsb3BlcnxlbnwwfDB8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60">
        </div>
        <div class="register-details">
            <div class="register-box">
                <div class="register-header">
                    <h4><span class="first-letter">R</span>egister Form</h4>
                </div>
                <div class="register-form">
                    <form method="post" action="{{route('developer.store-dev')}}">
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control register-row-input" placeholder="enter your name" name="name" required>
                            <p style="color: red">@error('name'){{$message}}@enderror</p>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" class="form-control register-row-input" placeholder="enter your email" name="email" required>
                                <p style="color: red">@error('email'){{$message}}@enderror</p>
                            </div>
                            <div class="col">
                                <label for="mobile">Mobile</label>
                                <input type="number" class="form-control register-row-input" placeholder="enter your mobile" name="mobile" required>
                                <p style="color: red">@error('mobile'){{$message}}@enderror</p>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="location">Location</label>
                                <input type="text" class="form-control register-row-input" placeholder="enter your location" name="location" required>
                                <p style="color: red">@error('location'){{$message}}@enderror</p>
                            </div>
                            <div class="col">
                                <label for="role">Role</label>
                                <select class="form-control register-row-input" name="role">
                                    <option value="junior dev">Junior Dev</option>
                                    <option value="senior dev">Senior Dev</option>
                                    <option value="internship">Internship</option>
                                    <option value="associate team lead">Associate Team Lead</option>
                                    <option value="team leader">Team Leader</option>
                                    <option value="manager">Manager</option>
                                </select>
                                <p style="color: red">@error('role'){{$message}}@enderror</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control register-row-input" placeholder="enter your new password" name="password" required>
                            <p style="color: red">@error('password'){{$message}}@enderror</p>
                        </div>
                        @csrf
                        <div class="mb-3">
                            <button type="submit" class="form-control register-row-button">Register</button>
                        </div>
                        <p>Already have an account? <a href="{{route('developer.login')}}">Login</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
