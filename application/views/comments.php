<html>
    <head>
        <title>Comments</title>
    </head>
    <body>
        
            <?php 
                foreach ($posts as $row)
                {
                    $articleid=$row->articleid;
                    echo '<table width="100%" border="1">';
                    echo "<tr><td>".$row->cdate."</td></tr>";
                    echo "<tr><td>".$row->comment."</td></tr>";
                    echo "</table><br><br>";
                }
                ?>

                
                <?php echo validation_errors(); ?>
                <?php echo form_open('comments'); ?>
                <?php
                    echo '<input type="hidden" name="articleid" value="'.$articleid.'" />';
                ?>
                <h5>New Comment:</h5>
                <textarea name="comment">
                </textarea>
                <br>
                <input type="submit" value="Submit" />
                </form>
    </body>
</html>