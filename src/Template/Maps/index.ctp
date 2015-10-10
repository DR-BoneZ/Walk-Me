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
<div id="mapContainer" style="width:600;height:600">
		<script type="text/javascript">
			nokia.Settings.set("app_id", "qB42RwI8Kum9fXo2xpsJ");
			nokia.Settings.set("app_code", "XcdhsTMx5naHN3Zi-e6_iQ");
			var map = new nokia.maps.map.Display(
				document.getElementById("mapContainer"), {
				// Zoom level for the map
				zoomLevel: 15,
				// Map center coordinates
				center: [37.8668, -122.2536]
			}
		);
	</script>
</div>