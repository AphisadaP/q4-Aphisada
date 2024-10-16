<?php session_start(); ?>
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
    <style>
        a.logout{
            color : blue;
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
        <h1>สวัสดี <?=$_SESSION["fullname"]?></h1>
        หากต้องการออกจากระบบโปรดคลิก <a class="logout" href='logout.php'>ออกจากระบบ</a>
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