<?php
	session_unset(); 
	session_destroy();
	 unset($_SESSION["myuser"]);
	 session_regenerate_id(true);
	$_SESSION["myuser"] = NULL;
	
	 if ($_SESSION["myuser"] == NULL)
    {
      header('Location: index.html');
    }
?>
