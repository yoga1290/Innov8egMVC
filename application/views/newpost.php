<html>
<head>
<title>New Post</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('newpost'); ?>

<h5>Title:</h5>
<input type="text" name="title" value="" size="50" />

<h5>Summary:</h5>
<input type="text" name="summ" value="" size="50" />

<h5>Body:</h5>
<textarea name="body">
</textarea>

<h5>Category:</h5>
<select name="cat">
    <option value="other">Other</option>
<?php
    foreach($cats as $v)
        echo "  <option value='".$v->name."'>".$v->name."</option>";
        //better value by ID
?>
</select>
<input type="text" name="cat2" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>
