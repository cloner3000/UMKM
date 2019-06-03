<script>
    @if(session('success_products'))
    swal( 'Data Produk', '{{session('success_products')}}',  'success')
    @elseif(session('error'))
    swal('Oops!!','{{session('error')}}','error')
    @elseif(session('login'))
    swal('Berhasil','{{session('login')}}','success')
    @elseif(session('error_verify'))
    swal('Oops!!','{{session('error_verify')}}','error')
    @elseif(session('success_verify'))
    swal('Berhasil','{{session('success_verify')}}','success')
    @elseif(session('success_umkm'))
    swal('Berhasil','{{session('success_umkm')}}','success')
    @endif
</script>
