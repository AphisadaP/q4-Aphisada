<html>
<body>
<?php
if (isset($_COOKIE["lang"])) {
    $lang = $_COOKIE['lang'];
    if($lang == 'en'){
        echo "welcome";
    }
    else if($lang == 'th'){
        echo "ยินดีต้อนรับ";
    }
} else {
    echo "error";
}
?>
</body>
</html>