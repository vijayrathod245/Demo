<?php 
//include('db.php');
$connection=mysqli_connect('localhost','root','','shopping_db');

$request_method = $_SERVER["REQUEST_METHOD"];
	switch($request_method){
		case 'GET':
			// Retrive Products
			if(!empty($_GET["product_id"])){
				$product_id = intval($_GET["product_id"]);
				get_products($product_id);
			}
			else{
				get_products();
			}
			break;
		case 'POST':
			// Insert Product
			insert_product();
			break;
		case 'PUT':
			// Update Product
			$product_id = intval($_GET["product_id"]);
			update_product($product_id);
			break;
		case 'DELETE':
			// Delete Product
			$product_id = intval($_GET["product_id"]);
			delete_product($product_id);
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
	
	function get_products($product_id=0){
		global $connection;
			$per_page=10;
			if (isset($_GET["page"])) {
				$page = $_GET["page"];
			}else {
				$page=1;
			}
			/*Page will start from 0 and Multiple by Per Page*/
			$start_from = ($page-1) * $per_page;
			$qry_sel = "select * from product LIMIT $start_from, $per_page";
			$res_sel = mysqli_query($connection, $qry_sel);
			$response=array();
			while($row = mysqli_fetch_array($res_sel)){
				$response[]=$row;
			}
			if(count($response) > 0 ){
				$response['MESSAGE'] = "DATA FOUND";
				$response['STATUS'] = "200";
			}else{
				$response['MESSAGE'] = "DATA NOT FOUND";
				$response['STATUS'] = "400";
			}
		//$response['message'] = "Please Enter Action name";
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function delete_product($product_id){
		global $connection;
		$product_id = $_GET['product_id'];
		$qry_del = "DELETE FROM product WHERE product_id = $product_id";
		$res_del = mysqli_query($connection, $qry_del);
		if($res_del){
			$response=array(
				'status' => 1,
				'status_message' =>'Product Deleted Successfully.'
			);
		}
		else{
			$response=array(
				'status' => 0,
				'status_message' =>'Product Deletion Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function insert_product(){
		global $connection;
		$productname = $_POST["productname"];
		$price = $_POST["price"];
		$quantity = $_POST["quantity"];
		$seller = $_POST["seller"];
		$qry_ins = "INSERT INTO product (`productname`,`price`,`quantity`,`seller`)values('$productname','$price','$quantity','$seller')";
		$res_ins = mysqli_query($connection, $qry_ins);
		if($res_ins){
			$response=array(
				'status' => 1,
				'status_message' =>'Product Added Successfully.'
			);
		}
		else{
			$response=array(
				'status' => 0,
				'status_message' =>'Product Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function update_product($product_id)
	{
		global $connection;
		parse_str(file_get_contents("php://input"),$post_vars);
		$productname=$post_vars["productname"];
		$price=$post_vars["price"];
		$quantity=$post_vars["quantity"];
		$seller=$post_vars["seller"];
		$query="UPDATE products SET productname='{$productname}', price={$price}, quantity={$quantity}, seller='{$seller}' WHERE id=".$product_id;
		if($query)
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Product Updated Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Product Updation Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
?>