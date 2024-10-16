<?php include "connect.php"; ?>

<?php
$product_photo = "product_photo/";
$photo_id = uniqid();
$productdir = $product_photo . basename($productdir . "" . $_FILES["image_path"]["name"]);
if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $productdir)) {
    //Insert the product data along with the image path into the database
    $stmt = $pdo->prepare("INSERT INTO product (pid, pname, pdetail, price, image_path) VALUES (?, ?, ?, ?, ?)");
    $pid = (int)$_POST["pid"];
    $stmt->bindParam(1, $pid, PDO::PARAM_INT);
    $stmt->bindParam(2, $_POST["pname"]);
    $stmt->bindParam(3, $_POST["pdetail"]);
    $price = (int)$_POST["price"];
    $stmt->bindParam(4, $price);
    $stmt->bindParam(5, $productdir); // Save the full image path in the database
    $stmt->execute();
    //Redirect to the product page or show success message
    header("Location: product-detail.php?pid=" . $pid);
} else {
    echo "Failed to upload the image!";
}

?>
