<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
@if(Auth::guard('admin')->check())
    @include('admin.navbar')
@endif
@yield('content')
<script>
    $(document).ready(function (){

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

       $("#create_project").submit(function (e){

          e.preventDefault();

          var project_name = $("#project_name").val();

          var project_create_url = '{{route('admin.create-project')}}';

          $.ajax({
             method:"POST",
             url:project_create_url,
             data:{project_name:project_name},
              success:function (response){

                 var data = JSON.parse(response)

                  $("#create_project")[0].reset();

                  $("#create_project_modal").modal('hide');


                 $("#admin_project").empty();

                 $.each(data,function (index,item){
                     $("#admin_project").append('<option value="'+item.id+'">'+ item.project_name +'</option>')
                 });

                 alert('Project Created!');

              },
              error:function (error){
                 console.log(error);
              },
          });

       });

       $("#admin_project").change(function (event){

            var id = $(this).val();

            $.ajax({
               method:"POST",
               url:'{{route('admin.choose-project')}}',
               data:{
                   id:id,
               },
                success:function (response){
                   var data = JSON.parse(response);

                   $("#admin_module_view").empty();

                   $("#admin_module_view").append('<option>View Module</option>');

                   $.each(data,function (index,item){
                       $("#admin_module_view").append('<option value="'+ item.id +'">'+ item.module_name +'</option>')
                   });

                   console.log(data);

                },
                error:function (error,status){
                   console.log(error,status);
                },
            });
       });

       $("#admin_module_view").change(function (){

           var module_id = $('#admin_module_view').val();

           let module_url = '{{route('admin.choose-module')}}';

           $.ajax({
              method:"POST",
              url:module_url,
              data:{
                  id:module_id,
              },
               success:function (response){
                 var data = JSON.parse(response);

                 $("#admin_view_task").empty();

                 $("#admin_view_task").append('<option>View Task</option>');

                 $.each(data,function (index,item){
                    $("#admin_view_task").append('<option value="'+ item.id +'">'+ item.task +'</option>');
                 });

                 console.log(data);

               },
               error:function (error,status){
                  console.log(error,status);
               },
           });
       });

       $("#admin_create_module").submit(function (e){
          e.preventDefault();

          let project_id = $("#admin_project_id").val();

          let module_name = $("#module_name").val();

          let module_create_url = '{{route('admin.create-module')}}';

          $.ajax({
             method:"POST",
             url:module_create_url,
             data:{
                 id:project_id,
                 name:module_name,
             },
              success:function (response){

                 $("#create_module").modal('hide');

                 $("#admin_create_module")[0].reset();

                 alert('Module Created!');
              },
              error:function (error,status){
                 console.log(error,status);
              },
          });

       });

    });
</script>
</body>
</html>
