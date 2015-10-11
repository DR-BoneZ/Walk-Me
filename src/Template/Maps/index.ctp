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
		var globEvt, globMarker, dict, datas, id, latLong, map, pos, requestMarker, polyline;
		var polling = false;
		var makeRoute = true;
		var icon = new H.map.Icon('/WalkMe/img/user.png');
		var wicon = new H.map.Icon('/WalkMe/img/walker.png');
		var dicon = new H.map.Icon('/WalkMe/img/marker.png');
			function onClick(evt){
				//$('#myModal').modal('show')
				if(evt.target == null || evt.target == undefined) return;
				console.log(evt);
				globEvt = evt;
				if(evt.target.getId() in dict){
					id = dict[evt.target.getId()];
					$('#myModal').modal('show');
					$('#myModal #walkerName').text(datas[id].name);
					$('#myModal #walkerBio').text(datas[id].bio);
					$('#myModal #walkerImg').html('<img class="media-object profile-pic" src="/WalkMe/img/users/'+datas[id].id+'.jpg">')
				}
			}

			function request(){				                    
				$('#requestModal').modal('show');
				$('#requestModal #titleModal').text('Request a Route');
				$('#requestModal #formModal').html('Enter Address: <input type="text" id="request"/> ');
				$.ajax({
					url: '/WalkMe/maps/req',
					method: 'POST',
					data: {
						id: datas[id].id,
						dlat: pos.coords.latitude,
						dlng: pos.coords.longitude
					}
				})
			}

			function go(){
					$.ajax({
 					url: 'https://geocoder.cit.api.here.com/6.2/geocode.json',
  					type: 'GET',
  					dataType: 'jsonp',
  					jsonp: 'jsoncallback',
  					data: {
    					searchtext: $("#request").val(),
    					app_id: 'qB42RwI8Kum9fXo2xpsJ',
    					app_code: 'XcdhsTMx5naHN3Zi-e6_iQ',
    					gen: '8'
  				},
  				success: function (data) {
    				latLong = data.Response.View[0].Result[0].Location.DisplayPosition;
    				if (requestMarker != null && requestMarker != undefined)
    					map.removeObject(requestMarker);
    				requestMarker = new H.map.Marker({lat:latLong.Latitude, lng:latLong.Longitude},{icon : dicon});
					map.addObject(requestMarker);
					map.setCenter({lat:latLong.Latitude, lng:latLong.Longitude});
					polling = true;
  				}
				});
			}

			function route() {
				$.ajax({
					url: '/WalkMe/maps/req',
					method: 'POST',
					data: {
						id: datas[id].id,
						dlat: latLong.Latitude,
						dlng: latLong.Longitude
					}
				});
				// Now use the map as required...
				if (!makeRoute && polyline != undefined && polyline != null) {
					map.removeObject(polyline);
				}
				calculateRouteFromAtoB (platform);

			}

			function calculateRouteFromAtoB (platform) {
				makeRoute = false;
  				var router = platform.getRoutingService(),
    			routeRequestParams = {
      				mode: 'shortest;pedestrian',
      				representation: 'display',
      				waypoint0: pos.coords.latitude+','+ pos.coords.longitude , 
      				waypoint1: latLong.Latitude+','+latLong.Longitude , // Destination
      				routeattributes: 'waypoints,summary,shape,legs',
     			 	maneuverattributes: 'direction,action'
    			};
  				router.calculateRoute(
    				routeRequestParams,
    				onSuccess,
    				onError
  				);
			}

			function onError(error) {
  				console.log(error);
			}

			function onSuccess(result) {
  				var route = result.response.route[0];
  				addRouteShapeToMap(route);
  				addManueversToMap(route);
  			}

		    function showPosition(map, position, make, currentMarker, testMarkers){
		    	pos = position;
		    	if (make) {
					map.setCenter({lat:position.coords.latitude, lng:position.coords.longitude});
					map.setZoom(15);
				}
				
				// set current position as a marker
				if (!make) {
					map.removeObject(currentMarker);
				}
				currentMarker = new H.map.Marker({lat:position.coords.latitude, lng:position.coords.longitude},{icon : icon});
				globMarker = currentMarker;
				map.addObject(currentMarker);
				
				
				$.ajax({method:"post", url:"/WalkMe/maps/nearby",data:{lat:position.coords.latitude,lng:position.coords.longitude}}).success(function(data){
					datas = eval(data);
					dict = {};
					for (i=0; i<datas.length; i++) {
						if (!make && testMarkers[i] != undefined && testMarkers[i] != null) {
							map.removeObject(testMarkers[i]);
						}
						testMarkers [i] = new H.map.Marker({lat:datas[i].lat,lng:datas[i].lng},{icon : wicon});
						dict[testMarkers[i].getId()] = i;
						map.addObject(testMarkers[i]);
					}
					if (id != undefined && id != null && id in datas && datas[id].lat >= position.coords.latitude - 0.002 && datas[id].lat <= position.coords.latitude + 0.002 && datas[id].lng >= position.coords.longitude - 0.004 && datas[id].lng <= position.coords.longitude + 0.004 && polling) {
						route();
						polling = false;
					}
					window.setTimeout(function () {navigator.geolocation.getCurrentPosition(function (position){showPosition(map,position, false, currentMarker, testMarkers);});}, 10000);
				}).error(function() {
					window.setTimeout(function () {navigator.geolocation.getCurrentPosition(function (position){showPosition(map,position, false, currentMarker, testMarkers);});}, 10000);
				});
			}
			var platform = new H.service.Platform({
			app_id: 'qB42RwI8Kum9fXo2xpsJ',
			app_code: 'XcdhsTMx5naHN3Zi-e6_iQ',
			useCIT: true,
			useHTTPS: true
			});
			
			function addRouteShapeToMap(route){
  				var strip = new H.geo.Strip(),
    			routeShape = route.shape;

  				routeShape.forEach(function(point) {
    				var parts = point.split(',');
    				strip.pushLatLngAlt(parts[0], parts[1]);
  				});

  				polyline = new H.map.Polyline(strip, {
    				style: {
      					lineWidth: 4,
      					strokeColor: 'rgba(0, 128, 255, 0.7)'
    				}
  				});
 				// Add the polyline to the map
  				map.addObject(polyline);
  				// And zoom to its bounding rectangle
 				map.setViewBounds(polyline.getBounds(), true);
			}

			function addManueversToMap(route){
  				/*var svgMarkup = '<svg width="18" height="18" ' +
    			'xmlns="http://www.w3.org/2000/svg">' +
    			'<circle cx="8" cy="8" r="8" ' +
      			'fill="#1b468d" stroke="white" stroke-width="1"  />' +
    			'</svg>',
    			dotIcon = new H.map.Icon(svgMarkup, {anchor: {x:8, y:8}}),
    			group = new  H.map.Group(),
   				i,
    			j;

  				// Add a marker for each maneuver
  				for (i = 0;  i < route.leg.length; i += 1) {
    				for (j = 0;  j < route.leg[i].maneuver.length; j += 1) {
      					// Get the next maneuver.
     					maneuver = route.leg[i].maneuver[j];
      					// Add a marker to the maneuvers group
      					var marker =  new H.map.Marker({
        					lat: maneuver.position.latitude,
        					lng: maneuver.position.longitude} ,
        					{icon: dotIcon});
      					marker.instruction = maneuver.instruction;
      					group.addObject(marker);
    				}
  				}
  				// Add the maneuvers group to the map
  				map.addObject(group);*/
			}

			var defaultLayers = platform.createDefaultLayers();
			//Step 2: initialize a map  - not specificing a location will give a whole world view.
			map = new H.Map(document.getElementById('mapContainer'),
				defaultLayers.normal.map);

			//make the map interactive
			// MapEvents enables the event system
			// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
			var mapEvents = new H.mapevents.MapEvents(map);
			var behavior = new H.mapevents.Behavior(mapEvents);
			// Add event listener:
			map.addEventListener('tap', onClick);


			// Create the default UI components
			var ui = H.ui.UI.createDefault(map, defaultLayers);
			navigator.geolocation.getCurrentPosition(function (position){showPosition(map,position, true, null, []);});
			Number.prototype.toMMSS = function () {
  				return  Math.floor(this / 60)  +' minutes '+ (this % 60)  + ' seconds.';
			}			

			
		</script>
</div>
<div class="modal fade" id="myModal" role="dialog" style="top: 72px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content panel panel-primary">
      <div class="modal-header panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="walkerName">Modal title</h4>
      </div>
      <div class="modal-body panel-body">
        <div class="media">
  			<div class="media-left" id="walkerImg"></div>
  			<div class="media-body" id="walkerBio"></div>
		</div>
      </div>
      <div class="modal-footer panel-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="request()">Request</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="requestModal" role="dialog" style="top: 72px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content panel panel-primary">
      <div class="modal-header panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleModal">Modal title</h4>
      </div>
      <div class="modal-body panel-body" id="formModal">
        
      </div>
      <div class="modal-footer panel-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancel()">Cancel</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="go()">GO!</button>
      </div>
    </div>
  </div>
</div>