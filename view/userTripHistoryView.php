<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Trip History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background: url('../assets/bg-image.png') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="text-white">
    <div class="container">
        <h1>User Trip History</h1>
        <table class="table text-white">
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
        <a href="ShowLocation.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>

</html>