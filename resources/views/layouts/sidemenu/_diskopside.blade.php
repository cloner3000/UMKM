<li class="header">MAIN</li>
<a href="{{route('diskop.home')}}">
    <i class="zmdi zmdi-home"></i><span>Dashboard</span></a>

<li><a href="javascript:void(0);" class="menu-toggle "><i class="zmdi zmdi-accounts"></i><span>Manajemen Umkm</span>
    </a>
    <ul class="ml-menu">
        <li><a href="{{route('diskop.show.umkm')}}">Umkm Baru</a></li>
        <li><a href="{{route('diskop.show.umkm.nonvalid')}}">Umkm Tidak Valid</a></li>
        <li><a href="{{route('diskop.show.umkm.all')}}">Umkm Valid</a></li>
    </ul>
</li>

<li><a href="javascript:void(0);" class="menu-toggle "><i class="zmdi zmdi-shopping-cart"></i><span>Manajemen Order</span>
    </a>
    <ul class="ml-menu">
        <li><a href="{{route('diskop.order')}}">Pesanan Baru</a></li>
        <li><a href="{{route('diskop.order.all')}}">Pemesanan keseluruhan</a></li>
    </ul>
</li>

<a href="{{route('diskop.show.akun')}}"><i class="zmdi zmdi-settings"></i><span>Setting</span></a>

