<?php include "connect.php" ?>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>username</th>
                <th>ชื่อ</th>
                <th>ที่อยู่</th>
                <th>เบอร์</th>
                <th>อีเมล</th>
            </tr>

            <?php
            $stmt = $pdo->prepare("SELECT * FROM member");
            $stmt->execute();
            while ($row = $stmt->fetch()):
            ?>

            <tr>
                <td><?=$row ["username"]?></td>
                <td><?=$row ["name"]?></td>
                <td><?=$row ["address"]?></td>
                <td><?=$row ["mobile"]?></td>
                <td><?=$row ["email"]?></td>
            </tr>

            <?php endwhile?>
        </table>

    </body>
</html>