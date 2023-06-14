<?php
include 'DB.php';
var_dump(['result' => (new DB())->get('products', [['price', '>', 1]])]);