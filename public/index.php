<?php

require_once __DIR__ . '/../bootstrap/init.php';

$app_name = $_ENV['APP_NAME'];

use Illuminate\Database\Capsule\Manager as Capsule;
$user= Capsule::table('categories')->get();

