<?php include "connect.php"; ?>

<?php
// กำหนดโฟลเดอร์เก็บรูปภาพ
$member_photo = "member_photo/";

// ตรวจสอบว่ามีการอัปโหลดไฟล์ใหม่หรือไม่
if (!empty($_FILES["mem_img"]["name"])) {
    // สร้างชื่อไฟล์ใหม่เพื่อป้องกันการชนกัน
    $photo_id = uniqid();
    $memberdir = $member_photo . $photo_id . "_" . $_FILES["mem_img"]["name"]; // ไม่ต้องใช้ basename ที่นี่

    // พยายามอัปโหลดไฟล์
    if (move_uploaded_file($_FILES["mem_img"]["tmp_name"], $memberdir)) {
        // ถ้าอัปโหลดสำเร็จ ให้บันทึกพาธรูปใหม่
        $mem_img = $memberdir;
    } else {
        echo "Failed to upload the image!";
        exit(); // จบการทำงานถ้าอัปโหลดไม่สำเร็จ
    }
} else {
    // ถ้าไม่มีการอัปโหลดรูปใหม่ ให้ใช้พาธรูปเก่า
    $stmt = $pdo->prepare("SELECT mem_img FROM member WHERE username = ?");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->execute();
    $row = $stmt->fetch();
    $mem_img = $row["mem_img"]; // ใช้พาธรูปเก่าจากฐานข้อมูล
}

// อัปเดตข้อมูลสมาชิกในฐานข้อมูล
$stmt = $pdo->prepare("UPDATE member SET password = ?, name = ?, address = ?, mobile = ?, email = ?, mem_img = ? WHERE username = ?");
$stmt->bindParam(1, $_POST["password"]);
$stmt->bindParam(2, $_POST["name"]);
$stmt->bindParam(3, $_POST["address"]);
$stmt->bindParam(4, $_POST["mobile"]);
$stmt->bindParam(5, $_POST["email"]);
$stmt->bindParam(6, $mem_img); // บันทึกพาธรูปใหม่หรือเก่า
$stmt->bindParam(7, $_POST["username"]);

$stmt->execute();

// หลังจากแก้ไขเสร็จเรียบร้อย ให้เปลี่ยนเส้นทางไปที่หน้ารายละเอียดสมาชิก
header("Location: memberdetail.php?username=" . $_POST["username"]);
exit(); // จบการทำงานหลังจากเปลี่ยนเส้นทาง
?>
