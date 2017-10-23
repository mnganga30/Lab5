
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

function addPost()
{
  $authorName = $_POST['addingName'];
  $textContent = $_POST['addingName'];



  $conn = new mysqli("mysql.eecs.ku.edu", "mnganga", "Za64v1sv", "mnganga");

$sql = "INSERT INTO Posts (content, author_id) VALUES ('$textContent', '$author_id')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

//$sql = "SELECT post_id, content, author  FROM Posts";
$sql = "SELECT user_id  FROM Users";

$result = $conn->query($sql);
// $checker = $conn->query($list);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  echo "   Name " . $row["userid"]. "<br>";
      if($row["userid"] == $newName)
      {
        addPost();
      }
    }
} else {

    echo "Currently no users Are in table";
}


mysqli_close($conn);

/* close connection */
$mysqli->close();


addPost();
?>
