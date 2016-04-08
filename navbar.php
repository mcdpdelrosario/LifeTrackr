 <nav class="navbar navbar-default" id="navbarsettings">

    
    <div class="container bar-align">

    
        <div class="navbar-header active">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" id = "hamburgerbutton"><span class="glyphicon glyphicon-menu-hamburger"></span> 
            </button>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbars" id = "searchbutton"><span class="glyphicon glyphicon-search"></span> 
            </button>

             <button type="button" class="navbar-toggle" data-toggle="collapse" id = "listbutton"><span class="glyphicon glyphicon-option-vertical"></span> 
            </button>

        </div>

        <div class = "logo">
            LF
            </div>

         <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" id="navbar-fix">
<!--                 <li>
                  <a href="#menu-but" id="menu-but"><span class="glyphicon glyphicon-user"></span> Profile</a>
                </li> -->
                <li>
                  <a href="userpage.php" id="signup-but"><span class="glyphicon glyphicon-home"></span> Home</a>
                </li>
                <li>
                  <a href="moments.php" id="signup-but"><span class="glyphicon glyphicon-film"></span> Moments</a>
                </li>
                <li>
                  <a href="notifications.php" id="signup-but" class="popper" data-toggle="popover" data-trigger="focus"><span class="glyphicon glyphicon-bell"></span> Notifications</a>
                </li>

                
                  
        </div>
    </div>
        <div class="collapse navbar-collapse" id="myNavbars">
           <ul class="nav navbar-nav">
             <li>
                      <form>
                      <?php
                      include "index.php"
                      ?>
                     <!-- <input type="search" class="form-control" placeholder=" Search" />
                     <i class="form-control-feedback glyphicon glyphicon-search" id = "search-but"></i>-->
                     </form>   
                </li>
            </ul>
            </li>
           </ul>
         </div> 

        <div class="collapse navbar-collapse" id="mySettings">
           <ul class="nav navbar-nav">
            
                 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-option-vertical" ></span></a>
                    <ul class="dropdown-menu" id="dropdown-settings">
                      <?php
                        include "list.php";
                      ?>
            </ul>
            </li>
           </ul>
         </div> 

         <div class="collapse navbar-collapse" id="mySearches">
           <ul class="nav navbar-nav">
                 <span class="glyphicon glyphicon-search" ></span></a>
            </li>
           </ul>
         </div> 
            
        

      


  </nav>
  

    <div id="wrapper">
        <div id="sidebar-wrapper">
 
            <ul class="sidebar-nav">
               <?php

                  include "list.php";

               ?>
            </ul>
           
        </div>
        <!-- /#sidebar-wrapper -->
    </div>



    <div id="searchwrapper">
        <div id="sidebar-searchwrapper">
 
            <ul class="sidebar-nav">
               <?php

                  include "list.php";

               ?>
            </ul>
           
        </div>
        <!-- /#sidebar-wrapper -->
    </div>





        <script>
    $("#listbutton").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

      <script>
    $("#mySearches").click(function(e) {
        e.preventDefault();
        $("#searchwrapper").toggleClass("toggled");
    });
    </script>

      

<!-- 
    <script>

     

         $( "#listbutton" ).click(function(e)
          {
              e.preventDefault();
              $( "#wrapper" ).click();
          });

    
    </script> -->