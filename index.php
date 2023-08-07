<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Table</title>
</head>
<body>
    <?php
$mysqli = new mysqli("localhost","root","","employee");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "select * from `employeetable`";
$result = $mysqli -> query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Position</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"] . "</td> <td>" . $row["Position"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}


// Free result set
$result -> free_result();

$mysqli -> close();
?>
</body>
</html>