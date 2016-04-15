<li>
  <?php
    $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
    
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } 
    else 
    {
      $query = "SELECT * FROM userinfo WHERE user_id = '".$_SESSION["myuser"]."'";
      $result = mysqli_query($con, $query) or mysqli_error($con);
      
      while ($row = mysqli_fetch_array($result)) 
      {
        $_SESSION["uname"] = $row['user_id'];
      }

      $query = "SELECT first_name,last_name FROM userinfo WHERE user_id = '".$_SESSION["uname"]."'";
      $result = mysqli_query($con, $query) or mysqli_error($con);
                        
      while ($row = mysqli_fetch_array($result)) 
      {
        $_SESSION["fname"] = $row['first_name'];
        $_SESSION["lname"] = $row['last_name'];
      }
    }
  ?>
  
  <a id="listdropdown-name" href="profile_user.php?userid=<?=$_SESSION['myuser']?>">
    <?php
      echo $_SESSION["fname"]." ". $_SESSION["lname"];
    ?>
  </a>                        
</li>	


<li>
  <a href="#" id="listdropdown-buts">My Commits</a>
</li>
				
<li>
  <a href="#" id="listdropdown-buts">Settings</a>
</li>

<li>
  <a href="#" id="listdropdown-buts">Logout</a>
</li>