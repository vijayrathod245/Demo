<?php 
		include('db.php');
		include('menu.php');
		if(@$_GET['status'])
			{
				$id = $_GET['id'];
				$qry1 = "select * from admin where id=$id";
				$res1 = mysql_query($qry1);
				$arr = mysql_fetch_array($res1);
			}
		
		if(@$_POST['submit'])
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$image =rand(0,1000).$_FILES['image']['name'];
			$path = 'image/';
			move_uploaded_file($_FILES['image']['tmp_name'],$path.$image);
			$type = $_POST['type'];
			
			if($type=='update'){
				
				$qry = "update admin set `name`='$name',`email`='$email',`password`='$password',`image`='$image' where id=$id";
			}else
			{
			$qry = "insert into admin(`name`,`email`,`password`,`image`)values('$name','$email','$password','$image')";
			}
			mysql_query($qry);
			header("location:adminview.php");
		}
		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="js/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="js/bootstrap.js" rel="stylesheet" type="text/css"/>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
		<?php if(@$_GET['status']){?>
    
    <input type="hidden" name="type" value="update"/>
    <?php }else
	
	{?>
	<input type="hidden" name="type" value="add"/>
    <?php }?>
		<div class="container-fluid">
        		<div class="container">
                	<div class="row">
  						<div class="col-xs-3 top-margin">
                        <label><b>Admin</b></label>&nbsp; &nbsp; &nbsp;
                        <label><b><a href="adminview.php">Adminview</a></b></label>
    				<input type="text" class="form-control" name="name" value="<?php echo @$arr['name'];?>" placeholder="Enter Your Name">
  						</div>
					</div>
                </div>
        </div>
        
        <div class="container-fluid">
        		<div class="container">
                	<div class="row">
  						<div class="col-xs-3 top-margin">
    				<input type="text" class="form-control" name="email" value="<?php echo @$arr['email'];?>" placeholder="Enter Your Email">
  						</div>
					</div>
                </div>
        </div>
		
        <div class="container-fluid">
        		<div class="container">
                	<div class="row">
  						<div class="col-xs-3 top-margin">
    				<input type="password" class="form-control" name="password" value="<?php echo @$arr['password'];?>" placeholder="Enter Your Password">
  						</div>
					</div>
                </div>
        </div>
        
        <div class="container-fluid">
        		<div class="container">
                	<div class="row">
  						<div class="col-xs-3 top-margin">
    				<input type="file" name="image">
  						</div>
					</div>
                </div>
        </div>
        
        <div class="container-fluid">
        		<div class="container">
                	<div class="row">
  						<div class="col-xs-3 top-margin">
    							<input type="submit" name="submit" value="Save"/>
  						</div>
					</div>
                </div>
        </div>
</form>
</body>
</html>