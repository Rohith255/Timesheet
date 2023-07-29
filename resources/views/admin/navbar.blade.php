<style>
    /* Custom styles for the navbar */
    body {
        background-color: #f8f9fa;
    }

    .navbar {
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .navbar-toggler {
        border: none;
        outline: none;
        font-size: 22px;
        color: #555;
    }

    .navbar-nav .nav-link {
        font-size: 16px;
        color: #555;
        margin-left: 20px;
        transition: color 0.2s;
    }

    .navbar-nav .nav-link:hover {
        color: #007bff;
    }

    .nav-item.dropdown .dropdown-menu {
        background-color: #fff;
        border: none;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .nav-item.dropdown .dropdown-menu a {
        color: #555;
        font-size: 16px;
        padding: 8px 20px;
        display: block;
        transition: background-color 0.2s;
    }

    .nav-item.dropdown .dropdown-menu a:hover {
        background-color: #f8f9fa;
    }

    /* Custom styles for search, profile, and logout options in desktop view */
    @media (min-width: 992px) {
        .navbar .navbar-nav .form-inline {
            margin-right: 20px;
        }

        .navbar .navbar-nav .nav-link {
            padding-right: 0;
        }
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('admin.home')}}">Admin</a>
        <!-- Hamburger Menu Icon for Mobile View -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('admin.developers')}}">Developers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.options')}}">Project's</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.timesheet-entries')}}">Timesheet entrie's</a>
                </li>
            </ul>
            <!-- Search, Profile, and Logout Options -->
        </div>
        <form method="post" action="{{route('admin.logout')}}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
</nav>
