<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$this->layout = 'maps';?>
<div id="mapContainer" >
		<script type="text/javascript">
		    function showPosition(map, position){
				map.setCenter({lat:position.coords.latitude, lng:position.coords.longitude});
				map.setZoom(15);
				
				// set current position as a marker
				var currentMarker = new H.map.DomMarker({lat:position.coords.latitude, lng:position.coords.longitude});
				map.addObject(currentMarker);
				
				
				$.ajax({method:"post", url:"/WalkMe/maps/nearby",data:{latitude:position.coords.latitude,longitude:position.coords.longitude}}).success(function(data){
				data = eval(data);
				var testMarker = new H.map.DomMarker({lat:data[0].lat,lng:data[0].lng});
				map.addObject(testMarker);
				});
			}
			var platform = new H.service.Platform({
			app_id: 'qB42RwI8Kum9fXo2xpsJ',
			app_code: 'XcdhsTMx5naHN3Zi-e6_iQ',
			useCIT: true,
			useHTTPS: true
			});
			
			var defaultLayers = platform.createDefaultLayers();
			//Step 2: initialize a map  - not specificing a location will give a whole world view.
			var map = new H.Map(document.getElementById('mapContainer'),
				defaultLayers.normal.map);

			//Step 3: make the map interactive
			// MapEvents enables the event system
			// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
			var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

			// Create the default UI components
			var ui = H.ui.UI.createDefault(map, defaultLayers);
			navigator.geolocation.getCurrentPosition(function (position){showPosition(map,position);});
			
		</script>
</div>