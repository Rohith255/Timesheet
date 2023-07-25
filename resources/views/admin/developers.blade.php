@extends('admin.index')
@section('content')
    <style>
        .alert {
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 20px;
            position: fixed;
            bottom: 0;
            left: 8px;
            animation-duration: 0.5s;
            animation-name: slidein;
        }

        @keyframes slidein {
            from {
                bottom: -50px;
            }
            to {
                bottom: 0;
            }
        }

    </style>
    <div class="container">
        <h3 class="text-primary mt-3">Developers</h3>
        <table class="table table-striped table-responsive table-hover table-bordered" style="border-top-left-radius: 10px;margin-top: 18px">
            <tr style=" background-color: #d2b8a4">
                <th>Dev ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
            @foreach($developers as $dev)
                <tr>
                    <td>{{$dev->id}}</td>
                    <td>{{$dev->name}}</td>
                    <td>{{$dev->email}}</td>
                    <td>{{$dev->mobile}}</td>
                    <td>{{$dev->role}}</td>
                    <td>{{$dev->location}}</td>
                    <td class="d-flex justify-content-between">
                        <form method="post" action="{{route('admin.manage-dev',$dev->id)}}">
                            @csrf
                        <button class="btn btn-primary" type="submit">Manage</button>
                        </form>
                        <form method="post" action="{{route('admin.delete-dev',$dev->id)}}">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @if (session('updated'))
        <div class="alert bg-primary">
           <p class="text-white">{{ session('updated')}}</p>
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 4000);
        </script>
    @endif

    @if (session('deleted'))
        <div class="alert bg-danger">
            <p class="text-white">{{ session('deleted')}}</p>
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 4000);
        </script>
    @endif
@endsection
