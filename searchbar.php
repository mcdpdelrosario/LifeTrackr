<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php',
      select: function( event, ui ) { 
          var code = ui.item.id;
          if(code != '') {
            location.href = '/LifeTrackr/profile_user.php?user=' + code;
            }
      } 
    });
  });
  </script>

</head>
<body>
 
<div class="ui-widget">
  <label for="skills"></label>
  <input id="skills">
</div>
</body>
</html>