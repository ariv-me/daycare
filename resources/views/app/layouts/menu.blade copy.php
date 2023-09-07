<ul class="metismenu left-sidenav-menu">
    <li class="menu-label">Main</li>

    <li>
        <a href="{{ route('home') }}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
    </li>

    @foreach($menu['menu_utama'] as $menu_utama)

    <li>
        <a href="#"><i class="{{ $menu_utama->fitur_icon }}"></i><span>  {{ $menu_utama->fitur_nama }}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="nav-second-level" aria-expanded="false">

            @foreach($menu['menu_sub'] as $menu_sub)
                 @if($menu_sub->fitur_parent == $menu_utama->fitur_id) 

                    @if($menu_sub->fitur_link == '#') 
                        <li>
                            <a href="#"><i class="ti-control-record"></i>{{ $menu_sub->fitur_nama }}<span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                @foreach($menu['menu_anak'] as $menu_anak)
                                    @if($menu_anak->fitur_parent == $menu_sub->fitur_id) 
                                        <li><a href="{{ route($menu_anak->fitur_link) }}">  {{ $menu_anak->fitur_nama }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>  
                    @else
                        <li><a href="{{ route($menu_sub->fitur_link) }}"><span>{{ $menu_sub->fitur_nama }}</span></a></li>
                    @endif

                 @endif
            @endforeach

           
           
        </ul>
    </li>

    @endforeach
        
</ul>

<div class="update-msg text-center">
    <a href="javascript: void(0);" class="float-right close-btn text-white" data-dismiss="update-msg" aria-label="Close" aria-hidden="true">
        <i class="mdi mdi-close"></i>
    </a>
    <h5 class="mt-3">Day Care</h5>
    <p class="mb-3">Yayasan Semen Padang</p>
    <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm">Upgrade your plan</a>
</div>