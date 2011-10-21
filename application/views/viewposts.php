<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<style type="text/css">
    
    div.entry
    {
       transition:width 2s, height 2s;
       -moz-transition:width 2s, height 2s, -moz-transform 2s; /* Firefox 4 */
       -webkit-transition:width 2s, height 2s, -webkit-transform 2s; /* Safari and Chrome */
       -o-transition:width 2s, height 2s, -o-transform 2s; /* Opera */ 
    }
    /*
    div.entry:hover
    {
        transform:rotate(360deg);
        -moz-transform:rotate(360deg); // Firefox 4 
        -webkit-transform:rotate(360deg); // Safari and Chrome 
        -o-transform:rotate(360deg); // Opera
    }
    // */
    div.sub
    {
        display: none;
    }
</style>
<script>
function mover(i)
{
    $("div#"+i).css("display","inline");
}
</script>
<title>View Posts</title>
</head>
<body>
   <br><br><br>
<?php 
   foreach ($posts as $row)
   {
            echo "<p><div class='entry' onMouseOver='mover(\"p".$row->id."\");'>";
            echo '<table border="1" width="200">';
            echo "<tr><td colspan='3'><p align='center'><a href='/index.php/category/show/".$row->cat."'>".$row->cat."</a></p></td></tr>";
            echo "<tr><td>".$row->id."</td><td>".$row->title."</td><td>".$row->adate."</td></tr>";
            echo "<tr><td colspan='3'>".$row->summary."</td></tr>";
            echo "<tr><td colspan='3'><div class='sub' id='p".$row->id."'>".$row->body."</div></td></tr>";
            echo "<tr><td colspan='3'><p align='center'><a href='/index.php/comments/show/".$row->id."'>Comment</a></p></td></tr></table></div>";
            echo "</p>";
   }
?>
</body>
</html>
