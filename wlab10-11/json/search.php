<?php
include "../register/connect.php";

$keyword = $_GET["keyword"];

// ค้นหาข้อมูลสมาชิก
$stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE :keyword");
$stmt->execute(['keyword' => '%' . $keyword . '%']);
$row = $stmt->fetch();

if ($row) {
?>
    <div>
        <?php if (!empty($row["imgmember"]) && file_exists('../../../phpDBlab8-9/csshop/member_photo/' . $row["imgmember"])): ?>
            <img src='../../../phpDBlab8-9/csshop/member_photo/<?= htmlspecialchars($row["imgmember"]) ?>' width='200' alt='Member Photo'>
        <?php else: ?>
            <img src='../../../phpDBlab8-9/csshop/member_photo/default.jpeg' width='200' alt='Default Photo'>
        <?php endif; ?>
    </div>

    <div style="padding: 15px">
        <h2><?= htmlspecialchars($row["name"]) ?></h2>
        Address: <?= htmlspecialchars($row["address"]) ?><br>
        Tel.: <?= htmlspecialchars($row["mobile"]) ?><br>
        Email: <?= htmlspecialchars($row["email"]) ?><br>
    </div>
<?php
} else {
    echo "<p>No member found with that username.</p>";
}
?>
