<?php

include_once 'config.php';

$select_configuration_sql = "SELECT `system_status` FROM `configuration`";
$select_configuration_result = $aria2_remote_connection->query($select_configuration_sql);

$result_array = array();
$result_array[] = mysqli_fetch_assoc($select_configuration_result);
echo json_encode($result_array);


