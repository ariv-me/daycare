<ul class="metismenu left-sidenav-menu">
    <li class="menu-label">Main</li>

    <li>
        <a href="{{ route('home') }}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
    </li>

    <li>
        <a href="javascript: void(0);"> <i class="mdi mdi-playlist-edit" class="align-self-center menu-icon"></i><span>Pendaftaran</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="nav-second-level" aria-expanded="false">
            <li class="nav-item"><a class="nav-link" href="{{ route('pendaftaran.transaksi.index') }}"><i class="ti-control-record"></i>Transaksi</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pendaftaran.tagihan.index') }}"><i class="ti-control-record"></i>Tagihan</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript: void(0);"> <i class="mdi mdi-cash-multiple" class="align-self-center menu-icon"></i><span>Tarif</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="nav-second-level" aria-expanded="false">
            <li class="nav-item"><a class="nav-link" href="{{ route('tarif.jenis.index') }}"><i class="ti-control-record"></i>Jenis</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('tarif.kategori.index') }}"><i class="ti-control-record"></i>Kategori</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('tarif.item.index') }}"><i class="ti-control-record"></i>Item</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('tarif.index') }}"><i class="ti-control-record"></i>Paket</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript: void(0);"> <i class="mdi mdi-food-fork-drink" class="align-self-center menu-icon"></i><span>Catering</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="nav-second-level" aria-expanded="false">
            <li class="nav-item"><a class="nav-link" href="{{ route('catering.kategori.index') }}"><i class="ti-control-record"></i>Kategori</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('catering.menu.index') }}"><i class="ti-control-record"></i>Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('catering.order.index') }}"><i class="ti-control-record"></i>Order</a></li>
        </ul>
    </li>
        
</ul>

<div class="update-msg text-center">
    <a href="javascript: void(0);" class="float-right close-btn text-white" data-dismiss="update-msg" aria-label="Close" aria-hidden="true">
        <i class="mdi mdi-close"></i>
    </a>
    <h5 class="mt-3">Day Care</h5>
    <p class="mb-3">Yayasan Semen Padang</p>
    <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm">Upgrade your plan</a>
</div>