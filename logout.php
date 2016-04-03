<?php
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
