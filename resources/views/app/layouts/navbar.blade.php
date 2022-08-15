<nav class="navbar-custom">    
    <ul class="list-unstyled topbar-nav float-right mb-0">  
        <li class="dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('resources/templates3/view/assets/images/users/user-5.jpg') }}" alt="profile-user" class="rounded-circle" />                                 
                <span class="ml-1 nav-user-name hidden-sm">Hello, <strong> {{ Auth::user()->name }} </strong></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('logout') }}" class="dropdown-item ai-icon"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i> Profile</a>
                <div class="dropdown-divider mb-0"></div>
                <a href="{{ route('logout') }}" class="dropdown-item ai-icon"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Logout</a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {!! csrf_field() !!}
                </form>
            </div>
        </li>
    </ul><!--end topbar-nav-->

    <ul class="list-unstyled topbar-nav mb-0">                        
        <li>
            <button class="nav-link button-menu-mobile">
                <i data-feather="menu" class="align-self-center topbar-icon"></i>
            </button>
        </li> 
        <li class="creat-btn">
            <div class="brand mt-3">
                <a href="#" class="logo">
                    <span>
                        <img src="http://localhost/daycare/resources/templates3/view/assets/images/daycare.png" alt="logo-small" class="logo-lg logo-light">
                    </span>
                </a>
              
                {{-- <h5 class="mb-0 text-success">Yayasan Semen Padang</h5>
                <h6 class="mb-0 text-warning">Day Care</h6> --}}
            </div>                                
        </li>                           
    </ul>
</nav>