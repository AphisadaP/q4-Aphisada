<?php include "connect.php"; ?>

<?php
$member_photo = "member_photo/";
$member_id = uniqid();
$memberdir = $member_photo . basename($memberdir . "_" . $_FILES["mem_img"]["name"]);

if (move_uploaded_file($_FILES["mem_img"]["tmp_name"], $memberdir)) {
    //Insert the product data along with the image path into the database
    $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->bindParam(7, $memberdir); // Save the full image path in the database
    $stmt->execute();
    $username = $_POST["username"];
    //Redirect to the product page or show success message
    header("location: memberdetail.php?username=".$username);
} else {
    echo "Failed to upload the image!";
}

?>