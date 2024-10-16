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
                `Order`.OrderDate,
                `Order`.TotalAmount
            FROM 
                Customer
            JOIN 
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
        echo "<th>วันที่สั่งซื้อ</th>";
        echo "<th>ยอดสั่งซื้อ</th>";
        echo "</tr>";

        // Fetch and display each row of data
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["CustomerID"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["OrderDate"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["TotalAmount"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
