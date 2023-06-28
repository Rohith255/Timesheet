@extends('timesheet.index')
@section('content')
    <div class="navbar-timesheet">
        <form>
            <div class="timesheet-row">
                <div class="navbar-date">
                    <a href="{{route('developer.profile')}}" class="text-primary">
                        <span class="material-symbols-outlined" style="font-size: 2rem; color: #674737">account_circle</span>
                    </a>
                    <input type="date" value="{{now()->format('Y-m-d')}}" class="input-date">
                </div>
            </div>
            <div class="timesheet-row-text">
                <div class="navbar-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    <input type="text" placeholder="please enter details">
                </div>
            </div>
            <div class="timesheet-row-module">
                <select class="js-example-basic-multipl" name="states[]">
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                    <option value="AA">Alabama</option>
                    <option value="WQ">Wyoming</option>
                </select>
            </div>


            <div class="timesheet-row-module">
                <select class="js-example-basic-multiple" name="states[]">
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                    <option value="AA">Alabama</option>
                    <option value="WQ">Wyoming</option>
                </select>
            </div>
            <div class="timesheet-row-module">
                <select class="js-example-basic-multiple" name="states[]">
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                    <option value="AA">Alabama</option>
                    <option value="WQ">Wyoming</option>
                </select>
            </div>
            <div class="timesheet-row-module">
                <select class="js-example-basic-multiple" name="time[]">
                    <option value="1">1:00</option>
                    <option value="2">2:00</option>
                    <option value="3">3:00</option>
                    <option value="3.3">3:30</option>
                </select>
            </div>
            <div class="timesheet-row-button">
                <button type="submit" >Submit</button>
            </div>
            <a href="{{route('developer.logout')}}" class="btn text-white h-75" style="background-color: #674737;border-radius: 11px">Logout</a>
        </form>
    </div>
    <div class="timesheet-entries">
        <h2 class="text-center" style="color: #674737">Timesheet Entries</h2>
        <table class="table  table-hover table-borderless table-striped container-lg table-responsive">
            <tr>
                <th style="border-top-left-radius: 10px;">{{strtoupper(now()->format('d M Y'))}}</th>
                <th>DESCRIPTION</th>
                <th>PROJECT</th>
                <th>MODULE</th>
                <th>TASK</th>
                <th>TIME</th>
                <th style="border-top-right-radius: 10px;">ACTION</th>
            </tr>
            <tr>
                <td style="border-bottom-left-radius: 10px"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style="border-bottom-right-radius:10px">
                    <button class="btn" style="background-color: #d2b8a4">Update</button>
                    <button class="btn text-white" style="background-color: #674737">Delete</button>
                </td>
            </tr>
        </table>
    </div>
    @if (session('welcome'))
        <div class="alert alert-danger" style="background-color: #5b3b28">
            {{ session('welcome')}} {{Auth::guard('dev')->user()->name}}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 4000);
        </script>
    @endif
@endsection
