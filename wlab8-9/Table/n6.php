<?php include "connect.php"; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>Promotion Usage</title>
</head>
<body>
    <?php
        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare("
            SELECT 
                Promotion.PromotionID,
                Promotion.PromotionName,
                COUNT(`Order`.PromotionID) AS TimesUsed
            FROM 
                Promotion
            LEFT JOIN 
                `Order` ON Promotion.PromotionID = `Order`.PromotionID
            GROUP BY 
                Promotion.PromotionID, Promotion.PromotionName
            ORDER BY 
                TimesUsed DESC
        ");
        
        $stmt->execute();

        // Start generating the HTML table
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Promotion ID</th>";
        echo "<th>Promotion Name</th>";
        echo "<th>Times Used</th>";
        echo "</tr>";

        // Fetch and display each row of data
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["PromotionID"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["PromotionName"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["TimesUsed"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
