<ul class="sidebar-menu" data-widget="tree" id="main-menu">	
    <li class="header">Dashboard & Apps</li>
    <li>
        <a href="{{ route ('home') }}">
        <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
            <span>Dashboard</span>
        </a>
    </li>

    @foreach($menu['menu_utama'] as $menu_utama)

    <li class="treeview">
        <a href="#">
            <i class="{{ $menu_utama->fitur_icon }}"><span class="path1"></span><span class="path2"></span></i>
            <span>
                {{ $menu_utama->fitur_nama }}
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" aria-expanded="false">
            @foreach($menu['menu_sub'] as $menu_sub)
            
                @if($menu_sub->fitur_parent == $menu_utama->fitur_id) 
                    @if($menu_sub->fitur_link == '#') 
                   
                       
                            @foreach($menu['menu_anak'] as $menu_anak)
                                @if($menu_anak->fitur_parent == $menu_sub->fitur_id)
                                
                                    <li>
                                        <a href="{{ route($menu_anak->fitur_link) }}" aria-expanded="false">
                                            <i class="icon-Layout-4-blocks">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>   
                                            {{ $menu_anak->fitur_nama }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        
                    
                    @else
                    <li>
                        <a href="{{ route($menu_sub->fitur_link) }}" aria-expanded="false">
                            <i class="icon-Commit">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i> 
                            {{ $menu_sub->fitur_nama }}
                        </a>
                    </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </li>
    @endforeach

</ul>

{{-- <ul class="metismenu" id="menu">
    <li>
        <a href="{{ route('home') }}" aria-expanded="false">
            <i class="flaticon-381-networking"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>

    @foreach($menu['menu_utama'] as $menu_utama)

    <li>
        <a href="#" class="has-arrow ai-icon">
            <i class="{{ $menu_utama->fitur_icon }}"></i>
            <span class="nav-text">{{ $menu_utama->fitur_nama }}</span>
        </a>

        <ul aria-expanded="false">
            @foreach($menu['menu_sub'] as $menu_sub)
            
                @if($menu_sub->fitur_parent == $menu_utama->fitur_id) 
                    @if($menu_sub->fitur_link == '#') 
                    <li>
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

</ul> --}}