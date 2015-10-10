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
$this->layout = 'default';
?>
<?php if ($userId !== null): ?>
<div class="vertical-center">
	<div class="container-fluid full-btn">
		<div class="container-fluid">
    		<div class="col-sm-2 col-sm-offset-5">
        		<a class="btn btn-primary full-btn" href="/WalkMe/users/login">Login</a>
    		</div>
		</div>
		<br>
		<div class="container-fluid">
    		<div class="col-sm-2 col-sm-offset-5">
				<a class="btn btn-primary full-btn" href="/WalkMe/users/add" style="full-btn">Register</a>
			</div>
		</div>
	</div>
</div>
<?php else: ?>
<meta http-equiv="refresh"
   content="0; url=/WalkMe/maps">
<?php endif; ?>