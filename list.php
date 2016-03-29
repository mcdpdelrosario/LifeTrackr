			   <li>
                    <?php
                      $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
                      if (mysqli_connect_errno())
                      {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      } 
                      else 
                      {
                        //$query = "select first_name,last_name from userinfo where username = '".$_SESSION["myuser"]."'";
                        $query = "select first_name,last_name from userinfo where username = 'Gio'";
                        $result = mysqli_query($con, $query) or mysqli_error($con);
                        
                        while ($row = mysqli_fetch_array($result)) 
                        {
                          $_SESSION["fname"] = $row['first_name'];
                          $_SESSION["lname"] = $row['last_name'];
                        }
                      }
                      ?>
                        <a id="listdropdown-but" href="#">
                          <?php
                            echo $_SESSION["fname"]." ". $_SESSION["lname"];
                          ?>
                        </a>
                        
               </li>	

			   <li>
                   <a id="listdropdown-buts" href="#"></a>
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
