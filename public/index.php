<?php

require_once '../app/init.php';

$app = new App\Core\App( ( new App\Core\Http\Request( $_POST ) ) );

$model = new App\Core\Model();sdf