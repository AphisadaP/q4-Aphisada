<?php
if (isset($_GET['language'])){
    $language = $_GET['language'];
    if($language == 'en'){
        setcookie('lang','en',time() + 3600 * 24, "/");
    }
    else if($language == 'th'){
        setcookie('lang','th',time() + 3600 * 24, "/");
    }

    header("Location: main.php");
    exit();
}