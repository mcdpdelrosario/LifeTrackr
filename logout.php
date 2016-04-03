<?php
  $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
  
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 
  
  else 
  {
    if ($_SESSION["myuser"] == NULL)
    {
      header('Location: index.html');
    }
  }
?>
