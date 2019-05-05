<script>
    var map;
    function init() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -7.6300605 , lng: 111.4930318},
            zoom: 12
        });
        var marker = new google.maps.Marker({position: {lat: {{$umkm->lat}}, lng: {{$umkm->long}}}, map: map});
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIljHbKjgtTrpZhEiHum734tF1tolxI68&libraries=places&callback=init"
        async defer></script>
