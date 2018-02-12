<?php

include_once 'config.php';

/* @var $host type */
$host = filter_input(INPUT_GET, 'host');

$select_tasks_sql = "SELECT `id`, `url` FROM `tasks` WHERE `host_id`=(SELECT `id` FROM `hosts` WHERE `name`='$host') AND `status`=0";

$result_array = array();

if (!$select_tasks_result = $aria2_remote_connection->query($select_tasks_sql)) {
    array_push($result_array, array("error_status" => "1", "error_number" => $aria2_remote_connection->errorno, "error" => $aria2_remote_connection->error));
} else {
    if ($select_tasks_result->num_rows === 0) {
        array_push($result_array, array("error_status" => "1", "error" => "Empty result set"));
    } else {
        array_push($result_array, array("error_status" => "0"));

        while ($task_row = $select_tasks_result->fetch_assoc()) {
            $emptyarray[] = $task_row;
        }
    }
}

echo json_encode($emptyarray);
