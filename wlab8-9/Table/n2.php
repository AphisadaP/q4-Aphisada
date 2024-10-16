<?php include "connect.php"; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer Orders</title>
</head>
<body>
    <?php
        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare("
            SELECT 
                Customer.CustomerID,
                Customer.Name,
                Customer.Phone,
                Customer.Address,
                `Order`.OrderID,
                `Order`.OrderDate,
                `Order`.TotalAmount,
                `Order`.PaymentStatus,
                `Order`.DeliveryStatus
            FROM 
                Customer
            LEFT JOIN 
                `Order` ON Customer.CustomerID = `Order`.CustomerID
            ORDER BY 
                Customer.CustomerID, `Order`.OrderDate
        ");
        
        $stmt->execute();

        // Start generating the HTML table
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>รหัสสมาชิก</th>";
        echo "<th>ชื่อสมาชิก</th>";
        echo "<th>เบอร์โทร</th>";
        echo "<th>ที่อยู่</th>";
        echo "<th>รหัสออเดอร์</th>";
        echo "<th>วันที่สั่งซื้อ</th>";
        echo "<th>ยอดสั่งซื้อ</th>";
        echo "<th>สถานะการจ่ายเงิน</th>";
        echo "<th>สถานะการจัดส่ง</th>";
        echo "</tr>";

        // Fetch and display each row of data
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["CustomerID"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Phone"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Address"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["OrderID"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["OrderDate"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["TotalAmount"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["PaymentStatus"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["DeliveryStatus"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
