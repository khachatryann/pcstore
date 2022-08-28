<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @if(Auth::user()->role_id == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::is("users") ? 'active' : '') }}" href="{{ route("peoples_list") }}">All_Users</a>
                    </li>
                @endif

                @if(Auth::user()->role_id == 2)
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::is("posts") ? 'active' : '') }}" href="{{ route("posts.index") }}">Posts</a>
                    </li>
                @endif

                @if(Auth::user()->role_id == 3)
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is("stores") ? 'active' : '') }}" href="{{ route("stores.index") }}">Store</a>
                        </li>
                @endif
            </ul>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    @if(empty(Auth::user()->avatar))
                        <img src="{{ asset("assets/uploads/avatars/default.png" . Auth::user()->avatar) }}" style="width:50px; height:50px;border-radius:50%" alt="">
                        {{ Auth::user()->name }}
                    @else
                    <img src="{{ asset("assets/uploads/avatars/" . Auth::user()->avatar) }}" style="width:50px; height:50px;border-radius:50%" alt="">
                    {{ Auth::user()->name }}
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    @if(Auth::user()->role_id ==2 || Auth::user()->role_id == 3)
                    <li><a class="dropdown-item" href="{{ route('delete', Auth::user()->id) }}" style="background: #ff0000; color: white">Delete Account</a></li>
                    @else
                        <li><a class="dropdown-item" href="#">Another Action</a></li>
                    @endif
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route("logout") }}">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
