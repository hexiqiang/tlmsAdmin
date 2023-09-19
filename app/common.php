<?php
// 应用公共文件


function returnJson($code = 0, $msg = "", $data = [], $statusCode = 200)
{
    $json = [
        "statusCode" => $statusCode,
        "code" => $code,
        "msg" => $msg,
        "data" => $data
    ];
    return json_encode($json);
}
