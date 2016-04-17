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
      source: 'search.php'
    });
  });
  </script>

<!--<script>
$(function onclick(){
    $( "#skills" ).autocomplete({
      source: 'search1.php'
});
  });
</script>-->

<script>
[$data].onkeyup = function(e){
  e = e || event;
  if (e.keyCode === 13 && !e.ctrlKey) {
    // start your submit function
  }
  return true;
 }
</script>

</head>
<body>
 
<div class="ui-widget">
  <label for="skills"></label>
  <input id="skills">
</div>
</body>
</html>