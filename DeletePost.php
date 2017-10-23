<?php

$conn = new mysqli("mysql.eecs.ku.edu", "mnganga", "Za64v1sv", "mnganga");

/* check connection */
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

  foreach($_GET['del'] as $value)
  {

     $sql = "DELETE FROM Posts WHERE post_id='$value'";
     if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully<br>";
    echo 'Delete!! Post ID: ' .$value.'<br>';
    endbtn();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
    endbtn();
}

     //$result = $conn->query($sql);

  }
  mysqli_close($conn);
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
