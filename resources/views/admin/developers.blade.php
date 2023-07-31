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
    <div class="container" style="padding-top: 15vh">
        <h3 class="text-info mt-3">Developers</h3>
        <table class="table table-responsive table-borderless shadow" style="border-top-left-radius: 10px;margin-top: 18px">
            <tr>
                <th style="background-color: rgb(236,236,236);font-weight: 600;border-top-left-radius: 20px;" class="text-black">Dev ID</th>
                <th style="background-color: rgb(236,236,236);font-weight: 600;" class="text-black">Name</th>
                <th style="background-color: rgb(236,236,236);font-weight: 600;" class="text-black">Email</th>
                <th style="background-color: rgb(236,236,236);font-weight: 600;" class="text-black">Mobile</th>
                <th style="background-color: rgb(236,236,236);font-weight: 600;" class="text-black">Role</th>
                <th style="background-color: rgb(236,236,236);font-weight: 600;" class="text-black">Location</th>
                <th style="background-color: rgb(236,236,236);font-weight: 600;border-top-right-radius: 20px" class="text-black">Action</th>
            </tr>
            @foreach($developers as $dev)
                <tr>
                    <td>{{$dev->id}}</td>
                    <td>{{$dev->name}}</td>
                    <td>{{$dev->email}}</td>
                    <td>{{$dev->mobile}}</td>
                    <td>{{$dev->role}}</td>
                    <td>{{$dev->location}}</td>
                    <td class="d-flex">
                        <form method="get" action="{{route('admin.developer-entries',$dev->id)}}">
                            <button type="submit" class="btn btn-success btn-mb"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg></button>
                        </form>
                        <form method="post" action="{{route('admin.manage-dev',$dev->id)}}" style="margin-left: 4px">
                            @csrf
                        <button class="btn btn-info btn-mb" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                        </form>
                        <form method="post" action="{{route('admin.delete-dev',$dev->id)}}" style="margin-left: 4px">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger btn-mb" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg>
                        </button>
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
