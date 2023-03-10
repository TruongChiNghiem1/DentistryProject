<script src="{{ asset('website/js/compressed.js') }}"></script>
        <script src="{{ asset('website/js/main.js') }}"></script>
        <!-- Map Scripts -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0pr5xCHpaTGv12l73IExOHDJisBP2FK4"></script>
        <script type="text/javascript">
            var lat;
            var lng;
            var map;
            var styles = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#a4d7ec"},{"visibility":"on"}]}];
            
            //type your address after "address="
            jQuery.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address=619%20Broadway,%20Santa%20Monica,%20CA%2090401&amp;sensor=false', function(data) {
            	lat = data.results[0].geometry.location.lat;
            	lng = data.results[0].geometry.location.lng;
            }).complete(function(){
            	dxmapLoadMap();
            });
            
            function attachSecretMessage(marker, message)
            {
            	var infowindow = new google.maps.InfoWindow(
            		{ content: message
            		});
            	google.maps.event.addListener(marker, 'click', function() {
            		infowindow.open(map,marker);
            	});
            }
            
            window.dxmapLoadMap = function()
            {
            	var center = new google.maps.LatLng(lat, lng);
            	var settings = {
            		mapTypeId: google.maps.MapTypeId.ROADMAP,
            		zoom: 14,
            		draggable: true,
            		scrollwheel: false,
            		center: center,
            		styles: styles 
            	};
            	map = new google.maps.Map(document.getElementById('map'), settings);
            
            	var marker = new google.maps.Marker({
            		position: center,
            		title: 'Map title',
            		map: map,
            		icon: './{{ asset('website/img/marker.png') }}'
            	});
            	marker.setTitle('Map title'.toString());
            //type your map title and description here
            attachSecretMessage(marker, '<h3>Map title</h3><p>Map HTML description</p>');
            }
        </script>
<script>
$(document).ready(function () {

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $("select[name='services_id']").change(function () {
        var services_id = 1;
        services_id = $(this).val();
        $.ajax({
            //Gửi data vào fetchDoctor
            url: '{{ route('website.login.fetchDoctor') }}',
            method: "POST",
            data: {'services_id' : services_id},

            //Thành công thì nhận lại data
            //data = "<option value='".$dt->doctors_id."'>".$dt->doctor_name."</option>"
            success: function (data) {
                //xuất data lên html
                $("select[name='doctors_id']").html(data)
            },
        })
    });


    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $("select[name='doctors_id']").change(function () {
        var doctors_id = 1;
        doctors_id = $(this).val();
        $.ajax({
            url: '{{ route('website.login.fetchWorktime') }}',
            method: "POST",
            data: {'doctors_id' : doctors_id},
            success: function (data) {
                $("select[name='booking_date']").html(data)
            },
        })
    });
});
</script>