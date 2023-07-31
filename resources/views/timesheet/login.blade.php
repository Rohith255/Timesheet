@extends('timesheet.index')
@section('content')
    <div class="login-page">
        <div class="login-image">
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTF8fGRldmVsb3BlcnxlbnwwfDB8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60">
        </div>
        <div class="login-details">
            <div class="login-box">
                <div class="login-header">
                    <h1 style="color:rosybrown"><span class="first-letter" style="font-size: 2.6rem">L</span>ogin</h1>
                </div>
                <div class="login-form">
                    <form method="post" action="{{route('developer.store')}}">
                        @csrf
                        <div class="mb-2">
                            <label for="email" class="col-form-label">Email</label>
                            <div class="">
                                <input id="email" type="email" class="form-control register-row-input" name="email" required placeholder="enter your email">
                            </div>
                            @error('email')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="password" class="col-form-label">Password</label>
                            <div class="">
                                <input id="password" type="password" class="form-control register-row-input" name="password" required placeholder="enter your password">
                                <p style="color: red">@error('password'){{$message}}@enderror</p>
                            </div>
                        </div>
                        <div class="row-cols-3 mt-3">
                            <button type="submit" class="btn">Login</button>
                        </div>
                        <p class="mt-2">Create an account! <a href="{{route('developer.register')}}" style="color: #674737">Register</a> </p>
                    </form>
                    <div style="height: 15%;width: 100%" class="d-flex justify-content-around">
                        <a href="{{route('provider.github-to-redirect','github')}}" class="btn text-center github-button">
                             Github
                        </a>
                    <a href="{{route('provider.github-to-redirect','google')}}" class="btn text-center google-button">
                        Google
                    </a>
                    </div>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger" style="background-color: red; border-color: red;">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('Created'))
                    <div class="alert alert-danger text-black" style="background-color:#d2b8a4; border-color: #d2b8a4;">
                    {{ session('Created') }}
                    </div>
                @endif
                @if (session('logout'))
                    <div class="alert alert-danger" style="background-color: #5b3b28; border-color: #5b3b28">
                        {{ session('logout') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            $('.alert').fadeOut('fast');
                        }, 4000);
                    </script>
                @endif
            </div>
        </div>
    </div>
@endsection
