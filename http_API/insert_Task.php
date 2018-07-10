<?php

include_once 'config.php';

header('Access-Control-Allow-Origin: *');

$url = filter_input(INPUT_GET, 'url');
echo "Encoded URL is " . $url . '<br/>';

$encoding_result = base64_decode($url, TRUE);
if ($encoding_result != FALSE) {
    echo "Decoded URL is " . $encoding_result . '<br/>';
} else {
    echo "Failed to decode the URL..." . '<br/>';
}

$insert_task_sql = "INSERT INTO `tasks` (`url`,`insertion_date_time`) VALUES ('$encoding_result', CONVERT_TZ(NOW(),'-05:30','+00:00'))";

echo "Insert Task SQL is " . $insert_task_sql. '<br/>';

if (!$aria2_remote_connection->query($insert_task_sql)) {
    echo "Insertion Error, Error_number " . $aria2_remote_connection->errorno . ", Error " . $aria2_remote_connection->error. '<br/>';
} else {
    echo "Insertion success". '<br/>';
}