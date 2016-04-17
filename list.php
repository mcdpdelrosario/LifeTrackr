<li>
 
  
  <a id="listdropdown-name" href="profile_user.php?user=<?=$_SESSION['userid']?>">
    <?php
      echo $_SESSION["firstname"]." ". $_SESSION["lastname"];
      echo "<br>@" . $_SESSION['username'];
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