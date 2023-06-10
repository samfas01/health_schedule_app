<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="/">HOSPITAL</a></h1>



        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Home</a></li>

                @if (!Auth::check())
                    <li><a class="nav-link scrollto" href="/login">Login</a></li>
                @endif

                @if (!Auth::check())
                    <li><a class="nav-link scrollto" href="/register">Register</a></li>
                @endif
                
                @if (Auth::check())
                <li><a class="nav-link scrollto" href="{{ route('student.home') }}">Dashboard</a></li>
                <li><a class="nav-link scrollto" href="{{ route('student.schedules') }}">My Schedules</a></li>
                @endif
                <li><a class="nav-link scrollto" href="{{ route('contact') }}">Contact</a></li>


                @if (Auth::check())
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                    <li>
                        <a class="btn btn-danger" type="submit" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            style="color:white">
                            {{ __('Logout') }}</a>
                    </li>
                @endif

            </ul>

        </nav>


    </div>
</header>
