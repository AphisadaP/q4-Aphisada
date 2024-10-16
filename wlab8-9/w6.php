<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8">
<script>
function confirmDelete(username) {
    var ans = confirm("ต้องการลบสมาชิก" + username);
    if (ans==true)
        document.location = "member-delete.php?username=" + username;
}
</script>
</head>
<body>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo "username : " . $row ["username"] . "<br>";
        echo "ชื่อสมาชิก : " . $row ["name"] . "<br>";
        echo "ที่อยู่ : " . $row ["address"] . "<br>";
        echo "อีเมล : " . $row ["email"] . " <br>";
        echo "<a href='editform.php?username=" . $row ["username"] . "'>แก้ไข</a> | ";
        echo "<a href='#' onclick='confirmDelete(\"" . $row["username"] . "\")'>ลบ</a>";
        echo "<hr>\n";
}
?>

<?php
                $stmt = $pdo->prepare("SELECT * FROM member");
                $stmt->execute();
                ?>
                <?php while ($row = $stmt->fetch()) : ?>
                    <a href="detail.php?username=<?= $row['username'] ?>">
                        <img src='<?php
                                    if (isset($row["imgmember"])) echo $row["imgmember"];
                                    else echo "member_photo/" . $row["username"];
                                    ?>' width='100'>
                    </a>
                    ชื่อสมาชิก : <?= $row["name"] ?><br>
                    <a class="edit" href='editform.php?username=<?= $row["username"] ?>'>แก้ไข</a> |
                    <a class="delete" href='#' onclick='confirmDelete("<?= $row["username"] ?>")'>ลบ</a>
                    <hr>
                <?php endwhile; ?>
</body>
</html>