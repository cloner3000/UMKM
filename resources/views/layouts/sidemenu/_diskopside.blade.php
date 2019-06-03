<li class="header">MAIN</li>
<a href="{{route('diskop.home')}}">
    <i class="zmdi zmdi-home"></i><span>Dashboard</span></a>

<li><a href="javascript:void(0);" class="menu-toggle "><i class="zmdi zmdi-accounts"></i><span>Manajemen Umkm</span>
    </a>
    <ul class="ml-menu">
        <li><a href="{{route('diskop.show.umkm')}}">Umkm Baru</a></li>
        <li><a href="{{route('diskop.show.umkm.nonvalid')}}">Umkm Tidak Valid</a></li>
        <li><a href="ec-product-List.html">Product List</a></li>
    </ul>
</li>

<a href="{{route('diskop.show.akun')}}"><i class="zmdi zmdi-settings"></i><span>Setting</span></a>

