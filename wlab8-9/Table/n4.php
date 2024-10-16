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
                AVG(`Order`.TotalAmount) AS AverageSpent,
                COUNT(`Order`.OrderID) AS TotalOrders
            FROM 
                Customer 
            JOIN 
                `Order` ON Customer.CustomerID = `Order`.CustomerID
            GROUP BY 
                Customer.CustomerID, Customer.Name
            HAVING 
                TotalOrders > 0
            ORDER BY 
                AverageSpent DESC
        ");
        
        $stmt->execute();

        // Start generating the HTML table
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Customer ID</th>";
        echo "<th>Name</th>";
        echo "<th>Average Spent</th>";
        echo "<th>Total Orders</th>";
        echo "</tr>";

        // Fetch and display each row of data
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["CustomerID"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Name"]) . "</td>";
            echo "<td>" . htmlspecialchars(number_format($row["AverageSpent"], 2)) . "</td>";
            echo "<td>" . htmlspecialchars($row["TotalOrders"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
