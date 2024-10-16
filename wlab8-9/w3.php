<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <div style="display:block">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        ?>
        <?php while ($row = $stmt->fetch()) : ?>
        <div style="padding: 15px; text-align: left">
            ชื่อสมาชิก : <?=$row ["name"]?><br>
            ที่่อยู่ : <?=$row ["address"]?><br>
            อีเมล : <?=$row ["email"]?><br>
            <img src='member_photo/<?=$row["username"]?>.jpg' width='100'><br><hr>
        </div>
        <?php endwhile; ?>
    </div>
</body></html>