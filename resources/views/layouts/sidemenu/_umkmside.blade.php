<li class="header">MAIN</li>
<a href="{{route('umkm.home')}}">
    <i class="zmdi zmdi-home"></i><span>Dashboard</span></a>


<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-case-check"></i><span>Produk</span>
    </a>
    <ul class="ml-menu">
        <li><a href="{{route('umkm.produk')}}">Daftar Produk</a></li>
        <li><a href="{{route('umkm.review.show')}}">Review</a></li>
        <li><a href="{{route('umkm.komentar.show')}}">Komentar</a></li>
    </ul>
</li>

<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Pesanan</span>
    </a>
    <ul class="ml-menu">
        <li><a href="{{route('umkm.order',['condition' => 'today'])}}">Pesanan Masuk</a></li>
        <li><a href="{{route('umkm.order.handle')}}">Pesanan Tertangani</a></li>

    </ul>
</li>

<a href="{{route('umkm.show.akun')}}"><i class="zmdi zmdi-settings"></i><span>Pengaturan</span></a>

