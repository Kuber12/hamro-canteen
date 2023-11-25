<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

    <h2>Wallet Data</h2>

    <?php
    include("./php/connection.php");

    // Select all rows from the 'wallet' table
    $sql = "SELECT * FROM wallet";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>S.N</th><th>Email</th><th>Phone</th><th>Amount</th></tr>";

        // Output data of each row
        $ID = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $ID++ . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["amount"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found.";
    }

    $conn->close();
    ?>

</body>
</html>
