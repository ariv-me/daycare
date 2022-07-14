<ul class="metismenu" id="menu">
    <li>
        <a href="{{ route('home') }}" aria-expanded="false">
            <i class="flaticon-381-networking"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>

    @foreach($menu['menu_utama'] as $menu_utama)

    <li class="has-submenu">
        <a href="#" class="has-arrow"><i class="{{ $menu_utama->fitur_icon }}"></i>{{ $menu_utama->fitur_nama }}</a>

        <ul class="submenu">
            @foreach($menu['menu_sub'] as $menu_sub)
            
                @if($menu_sub->fitur_parent == $menu_utama->fitur_id) 
                    @if($menu_sub->fitur_link == '#') 
                    <li class="has-submenu">
                        <a href="#">{{ $menu_sub->fitur_nama }}</a>
                        <ul class="submenu">
                            @foreach($menu['menu_anak'] as $menu_anak)
                                @if($menu_anak->fitur_parent == $menu_sub->fitur_id) 
                                    <li><a href="{{ route($menu_anak->fitur_link) }}">{{ $menu_anak->fitur_nama }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @else
                        <li><a href="{{ route($menu_sub->fitur_link) }}">{{ $menu_sub->fitur_nama }}</a></li>
                    @endif
                @endif
                
            @endforeach
        </ul>
        
    </li>

    @endforeach

</ul>