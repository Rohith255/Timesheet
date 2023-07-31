@extends('admin.index')
@section('content')
<div class="d-flex justify-content-center pt-5" style="height: 100vh;background-color: #EFE9E1;padding-top: 15vh;">
                    <div class="col-lg-4 mx-auto bg-white" style="border-radius: 14px;height: 65%;">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h4 style="color: #674737">Hello! Admin</h4>
                            <h6 class="fw-light" style="color: #674737">Sign in to continue.</h6>
                            <form class="pt-3" method="post" action="{{route('admin.store')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" required>
                                    <p class="text-danger">@error('email'){{$message}}@enderror</p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
                                    <p class="text-danger">@error('password'){{$message}}@enderror</p>
                                </div>
                                <div class="my-2 d-flex justify-content-end align-items-center">
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-block btn-lg text-white font-weight-medium auth-form-btn" value="SIGN IN" style="background-color: #674737">
                                </div>
                            </form>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-fill-danger">
                                {{ session('error') }}
                            </div>
                            <script>
                                setTimeout(function() {
                                    $('.alert').fadeOut('fast');
                                }, 4000);
                            </script>
                        @endif
                    </div>
</div>

            <!-- content-wrapper ends -->
@endsection
