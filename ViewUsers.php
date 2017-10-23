
<!-- ///PHP has a built in class that handles the interaction with a MySQL database called mysqli. (Yep, it's a type but doesn't start with a capital letter. I'll apologize for them.)

Here's an example of connecting, checking connection, querying, and displaying the results from the database using mysqli: -->

<?php

$conn = new mysqli("mysql.eecs.ku.edu", "mnganga", "Za64v1sv", "mnganga");

/* check connection */
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}


//$sql = "SELECT post_id, content, author  FROM Posts";
$sql = "SELECT user_id  FROM Users";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<html><table>";
    while($row = $result->fetch_assoc()) {

      echo "<tr><td>";
      echo$row['user_id'];
      echo" </tr></td>";
    }
echo "</table></html>";
endbtn();
} else {
    echo "0 are in the table!!!!";
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
?>
