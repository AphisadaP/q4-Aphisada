<?php include "connect.php"; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>Top 5 Ordered Items</title>
</head>
<body>
    <?php
        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare("
            SELECT 
                Item.ItemID,
                Item.ItemName,
                SUM(OrderItem.Quantity) AS TotalOrdered
            FROM 
                OrderItem 
            JOIN 
                Item ON OrderItem.ItemID = Item.ItemID
            JOIN 
                `Order` ON OrderItem.OrderID = `Order`.OrderID
            GROUP BY 
                Item.ItemID, Item.ItemName
            ORDER BY 
                TotalOrdered DESC
            LIMIT 5
        ");
        
        $stmt->execute();

        // Start generating the HTML table
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>รหัสสินค้า</th>";
        echo "<th>ชื่อสินค้า</th>";
        echo "<th>จำนวนที่สั่ง</th>";
        echo "</tr>";

        // Fetch and display each row of data
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["ItemID"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["ItemName"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["TotalOrdered"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
