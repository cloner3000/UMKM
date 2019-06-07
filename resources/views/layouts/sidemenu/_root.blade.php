<li class="header">MAIN</li>
<a href="{{route('diskop.home')}}">
    <i class="zmdi zmdi-home"></i><span>Dashboard</span></a>

<li><a href="javascript:void(0);" class="menu-toggle "><i class="zmdi zmdi-view-list"></i><span>Data Master</span>
    </a>
    <ul class="ml-menu">
        <li><a href="{{route('root.fav.umkm')}}">Umkm Favorit</a></li>
        <li><a href="{{route('root.jenis.umkm')}}">Jenis UMkm</a></li>
        <li><a href="{{route('root.kategori')}}">Kategori</a></li>
        <li><a href="{{route('root.role')}}">Role</a></li>
    </ul>
</li>

<li><a href="javascript:void(0);" class="menu-toggle "><i class="zmdi zmdi-account"></i><span>Data User</span>
    </a>
    <ul class="ml-menu">
        <li><a href="">Data Petugas Diskop</a></li>
        <li><a href="">Data Umkm</a></li>
        <li><a href="ec-product-List.html">Product List</a></li>
    </ul>
</li>

<a href="{{route('diskop.show.akun')}}"><i class="zmdi zmdi-settings"></i><span>Setting</span></a>

