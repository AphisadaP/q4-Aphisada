<?php
try {
	$pdo = new PDO("mysql:host=localhost;dbname=sec1_20;charset=utf8", "Wstd20", "FpsUcSSf");
} catch (PDOException $e) {
	echo "เกิดข้อผิดพลาด : ".$e->getMessage();
}
?>
