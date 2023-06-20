@extends('timesheet.index')
@section('content')
    <div class="login-page">
        <div class="login-image">
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTF8fGRldmVsb3BlcnxlbnwwfDB8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60">
        </div>
        <div class="login-details">
            <div class="login-box">
                <div class="login-header">
                    <h2><span class="first-letter">L</span>ogin</h2>
                </div>
                <div class="login-form">
                    <form>
                        <div class="login-row">
                            <input type="email" placeholder="enter your email">
                        </div>
                        <div class="login-row">
                            <input type="password" placeholder="enter your email">
                        </div>
                        <div class="login-row">
                            <button type="submit">Login</button>
                        </div>
                        <p>Create an account! <a href="#">Register</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
