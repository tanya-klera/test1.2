<?php $mts_options = get_option(MTS_THEME_NAME);
if (!isset($mts_options['mts_maps_api_key'])) {
  $mts_options['mts_maps_api_key'] = '';
}
 ?>
	<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
		<div class="container">
            <div class="copyrights">
				<?php mts_copyrights_credit(); ?>
			</div>
		</div><!--.container-->
	</footer><!--footer-->
</div><!--.main-container-->
<?php mts_footer(); ?>
<?php wp_footer(); ?>

<?php if ( !empty($mts_options['mts_show_contact_map']) && !empty($mts_options['mts_contact_location']) && !is_archive()): ?>
<script type="text/javascript">
      var mapLoaded = false;
      function initialize() {
        mapLoaded = true;

        var geocoder = new google.maps.Geocoder();
        var lat='';
        var lng='';
        geocoder.geocode( { 'address': '<?php echo addslashes($mts_options['mts_contact_location']); ?>'}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    lat = results[0].geometry.location.lat(); //getting the lat
                    lng = results[0].geometry.location.lng(); //getting the lng
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                       map: map,
                       position: results[0].geometry.location
                    });
                 }
        });

        var latlng = new google.maps.LatLng(lat, lng);

        var mapOptions = {
            zoom: 12,
            center: latlng,
            scrollwheel: false,
            navigationControl: false,
            scaleControl: false,
            streetViewControl: false,
            draggable: true,
            panControl: false,
            mapTypeControl: false,
            zoomControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]}]
        };

        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }
      //google.maps.event.addDomListener(window, 'load', initialize);
      jQuery(window).load(function() {
        jQuery(window).scroll(function() {
          if (jQuery('.contact_map').isOnScreen() && !mapLoaded) {
            mapLoaded = true;
            jQuery('body').append('<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $mts_options['mts_maps_api_key']; ?>&sensor=false&v=3&callback=initialize"></'+'script>');
          }
        });
      });
</script>
<?php endif ?>
</body>
</html>