@extends('timesheet.index')
@section('content')
    <div class="navbar-timesheet">
        <form>
            <div class="timesheet-row">
                <div class="navbar-date">
                    <a href="#" class="text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
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
                <select class="js-example-basic-multiple" name="states[]">
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                    <option value="AA">Alabama</option>
                    <option value="WQ">Wyoming</option>
                </select>
            </div>
            <div class="timesheet-row-text" style="width: 20%">
                <div class="navbar-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"/>
                        <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"/>
                        <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"/>
                    </svg>
                    <input type="text" placeholder="please enter task">
                </div>
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
                <button type="submit">Submit</button>
            </div>
            <a href="#" class="btn btn-warning">Logout</a>
        </form>
    </div>
    <div class="timesheet-entries">
        <h2 class="text-center">Timesheet Entries</h2>
    <table class="table table-borderless table-hover table-striped container-lg border-gray-400 table-responsive">
        <tr>
        <th>{{now()->format('d M Y')}}</th>
        <th>DESCRIPTION</th>
        <th>MODULE</th>
        <th>TASK</th>
        <th>TIME</th>
        <th>ACTION</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <button class="btn btn-outline-primary">Update</button>
                <button class="btn btn-outline-danger">Delete</button>
            </td>
        </tr>
    </table>
    </div>
@endsection
