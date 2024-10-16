
<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
$stmt->bindParam(1, $_GET["pid"]); // 2. น าค่า pid ที่สงมากับ ่ URL ก าหนดเป็ นเงื่อนไข
$stmt->execute(); // 3. เริ่มค้นหา
$row = $stmt->fetch(); // 4. ดึงผลลัพธ์ (เนื่องจากมีข้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
?>
<html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <script src="mpage.js"></script>
</head>

<body>

    <header>
        <div class="logo">
            <img src="cslogo.jpg" width="200" alt="Site Logo">
        </div>
        <div class="search">
            <form>
                <input type="search" placeholder="Search the site...">
                <button>Search</button>
            </form>
        </div>
    </header>

    <div class="mobile_bar">
        <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
        <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif"
                alt="Menu"></a>
    </div>

    <main>
        <article>
        <form action="product-edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="pid" value="<?= $row["pid"] ?>">
            ชื่อสินค้า : <input type="text" name="pname" value="<?= $row["pname"] ?>"><br>
            รายละเอียดสินค้า : <br>
            <textarea name="pdetail" rows="3" cols="40"><?= $row["pdetail"] ?></textarea><br>
            ราคา: <input type="number" name="price" value="<?= $row["price"] ?>"><br>

            <?php if (!empty($row["image_path"])): ?>
                รูปสินค้าปัจจุบัน: <?= basename($row['image_path']) ?><br>
            <?php else: ?>
                รูปสินค้าปัจจุบัน: <?= $row["pid"] ?>.jpg<br>
            <?php endif; ?>

            รูปสินค้าใหม่: <input type="file" name="image_path" accept="image/jpg,image/jpeg,image/png"><br>
            <input type="submit" value="แก้ไขสินค้า ">

        </form>
        </article>
        <nav id="menu">
            <h2>Navigation</h2>
            <ul class="menu">
                <li class="dead"><a href="./mpage.html">Home</a></li>
                <li><a href="./allproduct.php">All Products</a></li>
                <li><a href="./product-table.php">Table of All Products</a></li>
                <li><a href="./insertproduct.php">Insert Product</a></li>
                <li><a href="./editproduct.php">Edit Product</a></li>
        </nav>
        <aside>
            <h2>Aside</h2>
            <nav id="menu">
                <ul class="menu">
                    <li class="dead"><a href="./mpage.html">Home</a></li>
                    <li><a href="./allmember.php">All Members</a></li>
                    <li><a href="./member-table.php">Table of All Members</a></li>
                    <li><a href="./insertmember.php">Insert Members</a></li>
                    <li><a href="./editmember.php">Edit Members</a></li>
            </nav>
        </aside>
    </main>
    <footer>
        <a href="#">Sitemap</a>
        <a href="#">Contact</a>
        <a href="#">Privacy</a>
    </footer>
</body>

</html>