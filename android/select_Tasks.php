<?php

include_once 'config.php';
/* @var $host type */
$host = filter_input(INPUT_GET, 'host');
$select_tasks_sql = "SELECT `id`, `url` FROM `tasks` WHERE `host_id`=(SELECT `id` FROM `hosts` WHERE `name`='$host') AND `status`=0";

$status_result = $aria2_remote_connection->query($select_tasks_sql);

$emptyarray = array();

if (mysqli_num_rows($status_result) != 0) {

    array_push($emptyarray, array("status" => "0"));

    while ($status_row = mysqli_fetch_assoc($status_result)) {
        $emptyarray[] = $status_row;
    }
} else {
    array_push($emptyarray, array("status" => "1"));
}

echo json_encode($emptyarray);
