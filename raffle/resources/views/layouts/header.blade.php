<header>
    <div class="container-fluid mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-bottom">

            <a class="navbar-brand" href="/">Raffler</a>

            @if (Auth::check())
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('raffle') }}"> Raffle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('addTicket') }}"> New Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('entrants') }}"> Entrants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('winners') }}"> Winners</a>
                    </li>
                </ul>
            @endif

                <ul class="nav navbar-nav ml-auto">

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu bg-dark border-0 dropdown-menu-right" role="menu">
                                <li class="nav-item">
                                    <a class="dropdown-item bg-dark text-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                         Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</header>