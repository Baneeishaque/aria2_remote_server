<?php

include_once 'config.php';

$url = filter_input(INPUT_GET, 'url');

$insert_task_sql = "INSERT INTO `tasks` (`url`,`insertion_date_time`) VALUES ('$url', CONVERT_TZ(NOW(),'-05:30','+00:00'))";

echo $insert_task_sql;

if (!$aria2_remote_connection->query($insert_task_sql)) {
    echo "<br/>error, error_number " . $aria2_remote_connection->errorno . ", error " . $aria2_remote_connection->error;
} else {
    echo "<br/>success";
}