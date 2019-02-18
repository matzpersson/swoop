<?php
$service = $_REQUEST['service'];
require './api_' . $service . '.php';
?>