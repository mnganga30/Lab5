
<!-- ///PHP has a built in class that handles the interaction with a MySQL database called mysqli. (Yep, it's a type but doesn't start with a capital letter. I'll apologize for them.)

Here's an example of connecting, checking connection, querying, and displaying the results from the database using mysqli: -->

<?php
$newName = $_POST['addingName'];

$conn = new mysqli("mysql.eecs.ku.edu", "mnganga", "Za64v1sv", "mnganga");

/* check connection */
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

function addUser()
{
  $newName = $_POST['addingName'];

  $conn = new mysqli("mysql.eecs.ku.edu", "mnganga", "Za64v1sv", "mnganga");

$sql = "INSERT INTO Users (userid) VALUES ('$newName')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

$sql = "SELECT userid FROM Users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  echo "   Name " . $row["userid"]. "<br>";
      if($row["userid"] == $newName)
      {
        echo "Name already exists";
      }
      else {
        addUser();
      }
    }
} else {
  addUser();
    echo "0 results";
}


mysqli_close($conn);

/* close connection */
$mysqli->close();


addUser();
?>
