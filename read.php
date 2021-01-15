<?php
echo "HI";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

echo " HELLO";

include_once '../config/Database.php';
include_once '../class/Ac.php';

echo " HELLO AFTER";

$database = new Database();
$db = $database->getConnection();

echo " 17 ";

$items = new Ac($db);
echo " 20 ";

$items->uid = (isset($_GET['acid']) && $_GET['acid']) ? $_GET['acid'] : '0';

echo " 24 ";

$result = $items->read();

echo " 28 ";

$stmt = $items->read();
$count = $stmt->rowCount();

if($count > 0){


    $products = array();
    $products["Ac"] = array();
    $products["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $p  = array(
            "acid" => $acid,
            "acname" => $acname,
            "descr" => $descr
        );

        array_push($products["Ac"], $p);
    }

    echo json_encode($products);
}

else {

    echo json_encode(
        array
        ("Ac"
        => array(),
        "count" =>
        0)
        );
}

