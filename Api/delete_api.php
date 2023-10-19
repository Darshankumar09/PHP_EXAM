<?php

header("Access-Control-Allow-Methods: DELETE");

include("../Config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $input = file_get_contents("php://input");

    parse_str($input, $_DELETE);

    $id = $_DELETE['id'];

    $res = $config->delete($id);

    if ($res) {
        $arr['msg'] = "Data Deleted Successfully...";
    } else {
        $arr['msg'] = "Data Deletion Failed...";
    }

} else {
    $arr['error'] = "Only DELETE HTTP Methods are Allowed...";
}

echo json_encode($arr);

?>