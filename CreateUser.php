
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
$exists =false;
  $conn = new mysqli("mysql.eecs.ku.edu", "mnganga", "Za64v1sv", "mnganga");

$sql = "INSERT INTO Users (user_id) VALUES ('$newName')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

$sql = "SELECT user_id FROM Users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  echo "   Name " . $row["user_id"]. "<br>";
      if($row["user_id"] == $newName)
      {
      $exists = true;
      }
    }

      if($exists == true)
      {
        echo "Name already exists";
        endbtn();
      }else {
        addUser();
        endbtn();
      }


} else {
  addUser();
    echo "0 results";
    endbtn();
}


mysqli_close($conn);

/* close connection */
$mysqli->close();
function endbtn()
{
echo"<html>";
echo "<style> form {}
button {
  background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }

button:hover {opacity: 0.8;}</style><body><form>";
echo'<br><button  formaction="lab5.html">ALL Return to lab5</button>';
echo'<button  formaction="createUser.html">Create New User</button>';
echo'<button  formaction="createPosts.html">Post Page</button>';
echo'<button  formaction="AdminHome.html">Admin Page</button>';
echo"</form></body></html>";
}
endbtn();
addUser();
?>
