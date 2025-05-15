<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Trip History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>User Trip History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Location ID</th>
                    <th>Departure City</th>
                    <th>Destination City</th>
                    <th>Date of Trip</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($trips)) {
                    foreach ($trips as $trip) {
                        echo "<tr>";
                        echo "<td>" . $trip['idLocation'] . "</td>";
                        echo "<td>" . $trip['villedepare'] . "</td>";
                        echo "<td>" . $trip['villefin'] . "</td>";
                        echo "<td>" . $trip['dateOfTrip'] . "</td>";
                        echo "<td>" . $trip['price'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No trip history found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="userDashboard.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>
</html>
