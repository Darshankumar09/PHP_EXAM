<?php

header("Access-Control-Allow-Methods: POST");

include("../Config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $post = $_POST['post'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];

    $res = $config->insert($name, $post, $email, $salary);

    if ($res) {
        $arr['msg'] = "Data Insert Successfully...";
    } else {
        $arr['msg'] = "Data Insertion Failed...";
    }

} else {
    $arr['error'] = "Only POST HTTP Methods are Allowed...";
}

echo json_encode($arr);

?>