<?php
include 'connect.php';

$sql = "SELECT * FROM product";

$res = $con->query($sql);
if ($res) {
    foreach ($res as $key => $row) {
        echo $row['name'] . '<br/>';
    }
}