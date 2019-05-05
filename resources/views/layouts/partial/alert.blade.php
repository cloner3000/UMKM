<script>
    @if(session('success_products'))
    swal( 'Data Produk', '{{session('success_products')}}',  'success')
    @elseif(session('error'))
    swal('Oops!!','{{session('error')}}','error')
    @endif
</script>
