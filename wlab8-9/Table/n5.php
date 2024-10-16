<?php include "connect.php"; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer Spending</title>
</head>
<body>
    <?php
        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare("
            SELECT 
                Customer.CustomerID,
                Customer.Name,
                SUM(`Order`.TotalAmount) AS TotalSpent
            FROM 
                Customer
            JOIN 
                `Order` ON Customer.CustomerID = `Order`.CustomerID
            GROUP BY 
                Customer.CustomerID, Customer.Name
            HAVING 
                TotalSpent > 100
            ORDER BY 
                TotalSpent DESC
        ");
        
        $stmt->execute();

        // Start generating the HTML table
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Customer ID</th>";
        echo "<th>Name</th>";
        echo "<th>Total Spent</th>";
        echo "</tr>";

        // Fetch and display each row of data
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["CustomerID"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Name"]) . "</td>";
            echo "<td>" . htmlspecialchars(number_format($row["TotalSpent"], 2)) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
