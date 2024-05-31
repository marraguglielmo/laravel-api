<header class="text-white">

    <nav class="h-100">
        <div class="container-fluid h-100 d-flex align-items-center">
            <div class="collapse navbar-collapse d-flex justify-content-between ">
                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="{{ route('home') }}">Vedi il
                            sito</a>
                    </li>
                </ul>
                <ul class="navbar-nav d-flex flex-row justify-content-around">
                    <li class="nav-item mx-2">
                        <span href="" class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>
