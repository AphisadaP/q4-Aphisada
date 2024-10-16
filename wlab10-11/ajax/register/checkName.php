<?php

include "connect.php";

$stmt = $pdo->prepare("SELECT username FROM member");
$stmt->execute();

$takenUsernames = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

sleep(1);

if (!in_array($_GET["username"], $takenUsernames)) {
    echo "okay";
} else {
    echo "denied";
}

?>
