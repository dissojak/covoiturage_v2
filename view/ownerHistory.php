<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Owner History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Location ID</th>
                    <th>Departure City</th>
                    <th>Destination City</th>
                    <th>Departure Date</th>
                    <th>Total Earnings</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($history)) {
                    foreach ($history as $record) {
                        echo "<tr>";
                        echo "<td>" . $record['idLocation'] . "</td>";
                        echo "<td>" . $record['villedepare'] . "</td>";
                        echo "<td>" . $record['villefin'] . "</td>";
                        echo "<td>" . $record['datedepare'] . "</td>";
                        echo "<td>" . $record['totalEarnings'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No history found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>
</html>
