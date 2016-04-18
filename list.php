<li>
 
  
  <a id="listdropdown-name" href="profile_user.php?user=<?=$_SESSION['userid']?>">
    <?php
      echo $_SESSION["firstname"]." ". $_SESSION["lastname"];
      echo "<br>@" . $_SESSION['username'];
    ?>

  </a>                        
  
</li>	

