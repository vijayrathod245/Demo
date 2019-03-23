<?php 
		include('db.php');
		include('menu.php');
		$qry = "select * from admin";
		$res = mysql_query($qry);
		$arr = mysql_fetch_array($res);
		
		if(@$_GET['action'])
		{
			$id = $_GET['id'];
			$qry_del = "delete from admin where id=$id";
			mysql_query($qry_del);
			header("location:adminview.php");
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="js/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="js/bootstrap.js" rel="stylesheet" type="text/css"/>

</head>

<body>
<form method="post">
	<div class="container-fluid">
    	<div class="container">
		<table>
        		<tr>
                		<td><h4><span>AdminView</span></h4></td>
                </tr>
        </table>
		<table class="table table-striped text-center">
        		<tr>
                	<td><b>Id</b></td>
                    <td><b>Name</b></td>
                    <td><b>Email</b></td>
                    <td><b>Password</b></td>
                    <td><b>Image</b></td>
                    <td><b>Action</b></td>
                </tr>
                
                <?php while($arr=mysql_fetch_array($res)){?>
                <tr>
                   	<td><?php echo $arr['id'];?></td>
                    <td><?php echo $arr['name'];?></td>
                    <td><?php echo $arr['email'];?></td>
         			<td><?php echo $arr['password'];?></td>
                    <td><img src="image/<?php echo @$arr['image'];?>" width="30px;" height="30px;" /></td>
                    <td><a href="adminview.php?action=delete&id=<?php echo $arr['id'];?>">Delete</a> || <a href="adminadd.php?status=update&id=<?php echo $arr['id'];?>">Update</a></td>
                </tr>
                <?php }?>
        </table>
        	</div>
       </div>
</form>
</body>
</html>