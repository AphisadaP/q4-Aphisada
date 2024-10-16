<?php include "connect.php" ?>
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
    <script>
        function confirmDelete(username) {
            var ans = confirm("ต้องการลบสมาชิก " + username);
            if (ans == true)
                document.location = "deletemem.php?username=" + username;
        }

    </script>
    <style>
        a.edit,
        a.delete {
            color: blue;
        }
    </style>
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
            <?php
            $stmt = $pdo->prepare("SELECT * FROM member");
            $stmt->execute();
            ?>
            <?php while ($row = $stmt->fetch()): ?>
                <a href="memberdetail.php?username=<?= $row['username'] ?>">
                    <img src='<?php
                    if (isset($row["mem_img"]))
                        echo $row["mem_img"];
                    else
                        echo "member_photo/" . $row["username"];
                    ?>' width='150'>
                </a><br>
                ชื่อสมาชิก : <?= $row["name"] ?><br>
                <a class="edit" href='editform-member.php?username=<?= $row["username"] ?>'>แก้ไข</a> |
                <a class="delete" href='#' onclick='confirmDelete("<?= $row["username"] ?>")'>ลบ</a>
                <hr>
            <?php endwhile; ?>
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