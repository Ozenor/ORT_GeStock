<?php
$result = json_encode(array('status'=>'failed', 'result' => "Unauthorized access"));
header('Content-Type: application/json; charset=utf-8');
echo $result;