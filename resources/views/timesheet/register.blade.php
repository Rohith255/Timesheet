@extends('timesheet.index')
@section('content')
    <div class="register-page">
        <div class="register-image-section">
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTF8fGRldmVsb3BlcnxlbnwwfDB8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60">
        </div>
        <div class="register-details">
            <div class="register-box">
                <div class="register-header">
                    <h2><span class="first-letter">R</span>egister Form</h2>
                </div>
                <div class="register-form">
                    <form method="post" action="">
                        <div class="register-row">
                            <input type="text" placeholder="Enter your name">
                        </div>
                        <div class="register-row">
                            <input type="email" placeholder="Enter your email">
                        </div>
                        <div class="register-row">
                            <input type="number" placeholder="Enter your Mobile">
                        </div>
                        <div class="register-row">
                            <input type="password" placeholder="Enter your password">
                        </div>
                        <div class="register-row">
                            <button type="submit">Submit</button>
                        </div>
                        <p>Already have an account? </p>
                        <a href="#">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
