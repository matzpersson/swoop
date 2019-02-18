<?php
require '../resources/models/Messages.php';

$method = $_REQUEST['method'];
switch ($method) {
    case 'getCumulative':
        $classType = $_REQUEST['classType'];
        $fromDate = date('Y-m-d', strtotime($_REQUEST['fromDate']));
        $toDate = date('Y-m-d', strtotime($_REQUEST['toDate']));
        $messages = new Messages();
        $result = $messages->getCumulative($classType, $fromDate, $toDate);
        echo json_encode($result);
    break;
}
?>