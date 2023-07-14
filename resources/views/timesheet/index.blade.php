<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
{{--    <script src="{{asset('js/home.js')}}"></script>--}}
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <title>Timesheet</title>
</head>
<body>
@yield('content')
<script>


    $(document).ready(function () {


        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".pro").change(function (){

            $project_id = $(this).val();

            var id = $project_id;

             var project_url = '{{route('developer.choose-project')}}';

             console.log(project_url);

            if ($project_id){

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url:project_url,
                    method:"POST",
                    data:JSON.stringify({
                        id:id
                    }),
                    headers:{
                        'Accept':'application/json',
                        'Content-type':'application/json',
                    },
                    success:function (response){
                        var data = JSON.parse(response);

                        $(".module").empty();

                        $(".module").append('<option>Choose module</option>');

                        $.each(data,function (index,item){
                            $('.module').append('<option value="' + item.id + '">' + item.module_name + '</option>');
                        });
                    },
                    error:function (xhr,status,error){
                        console.log(xhr,status,error);
                    },
                });
            }
        });

        $("#module").change(function (){

            var module_id = $(this).val();

            var module_url = '{{route('developer.choose-module')}}';

            if (module_id){
                $.ajax({
                    url: module_url,
                    method: "POST",
                    data: JSON.stringify({
                        module_id:module_id,
                    }),
                    headers:{
                        'Accept':'application/json',
                        'Content-type':'application/json',
                    },
                    success:function (response){
                        var module_data = JSON.parse(response);

                        $("#task").empty();

                        $.each(module_data,function (index,item){
                            $('#task').append('<option value="' + item.id + '">' + item.task + '</option>');
                        });

                        console.log(module_data);

                    },
                    error:function (xhr,status,error){
                        console.log(xhr,status,error);
                    },
                })
            }
        });

        $("#project-create").submit(function (e){

           e.preventDefault();

           var project_create_url = '{{route('project.create')}}';

           var project_name = $(this).serialize();


           $.ajax({
               url:project_create_url,
               method:"POST",
               data:project_name,
               success:function (response){
                   if (response){

                       $("#project").modal('hide');

                       var project_data = JSON.parse(response);

                       $("#pro").empty();

                       $("#pro").append('<option>Choose project</option>');


                       $.each(project_data,function (index,item){
                          $("#pro").append('<option value="'+ item.id+'" class="form-control">'+item.project_name+'</option>')
                       });

                       $("#project_choose").empty();

                       $("#project_choose").append('<option>Choose Project</option>')

                       $.each(project_data,function (index,item){
                           $("#project_choose").append('<option value="'+ item.id+'" class="form-control">'+item.project_name+'</option>')
                       });

                       alert('Project created successfully');
                   }
               },
               error:function (error){
                 console.log(error);
               },
           });
        });


        $("#module_create").submit(function (e){
            e.preventDefault();

            var project_id = $("#project_choose").val();
            var module_name = $("#module_name").val();

            var module_create_url = '{{route('create.module')}}';

            console.log(project_id,module_name);

            $.ajax({
                url:module_create_url,
                method:"POST",
                data:{
                    project_id:project_id,
                    module_name:module_name,
                },
                success:function (response){
                    console.log(response);

                    $("#mod").modal('hide');

                    alert('Module Created successfully');
                },
                error:function (error){
                    console.log(error);
                }
            });
        });

        $("#create_task").submit(function (e){
            e.preventDefault();

            var task_create_url = '{{route('create.task')}}';

            var task_name = $(".task_name").val();

            var module_id = $("#module_task").val();

            $.ajax({
                url:task_create_url,
                method:"POST",
                data:{
                    task_name:task_name,
                    module_id:module_id,
                },
                success:function (response){
                    console.log(response);
                },
                error:function (error){
                    console.log(error);
                }
            });
        });

    });
</script>
</body>
</html>
