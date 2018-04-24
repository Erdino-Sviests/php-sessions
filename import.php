<?php
session_start();
include 'db.php';
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
?>

<!DOCTYPE html>
<html lang="en" >
	<style>
		body{
			margin:0px;
			padding:0px;
			font-family:arial;
			background-color:rgba(0,0,0,0.8);
		}
		#container{
			top:50px;
			width:500px;
			position:relative;
			margin-left:auto;
			margin-right:auto;
			background-color:rgb(255,255,255);
			border: 1px solid rgba(0,155,255,0.8);
			padding: 10px;
			box-shadow: 5px 8px rgba(0,155,255,0.7);
			border-radius: 25px;
		}
		#import{
			width:100%;

			overflow:auto;
		}
		#import .title{
			text-align:center;
			text-weight:bold;
			font-size:40px;
			padding:10px;
		}
		#import .content{
			padding:10px;
		}
		
		#import .submit{
			float:right;
			margin:5px;
			padding:5px;
			padding-left:10px;
			padding-right:10px;
		}
		#import_details{
			width:100%;
		}
		#import_details .imported_users{
			width:100%;
		}
	</style>
	<head>
	</head>
	<body>
		<div id="container">
			<form id="import" method="post" enctype="multipart/form-data">
				<div class="title">Import users</div>
				<div class="content">
					<label>File: </label><input type="file" accept=".xls"  name="fails"><br>
					<hr>
					<label>Show registered users: </label><input type="checkbox" value="value" name="show_r" checked><br>
					<label>Show already existing users: </label><input type="checkbox" value="value"  name="show_ae" checked><br>
					<hr>
					<input class="submit" type="submit" value="Import" name="import">
				</div>
			</form>
			<div id="import_details">
				<?php
				$extenstions = array('xls');
				if (isset($_POST["import"])){
					if(file_exists($_FILES["fails"]["name"])){
						$f = $_FILES["fails"];
						$ext = pathinfo($f["name"], PATHINFO_EXTENSION);
						if(!in_array($ext,$extenstions) ) {
							echo "<script>alert('Selected file format not supported!');</script>";
						}else{
							$data = new Spreadsheet_Excel_Reader($f["name"],false);
							$rcount = $data->rowcount($sheet=0);
							$ccount = $data->colcount($sheet=0);
							$db = read_db();
							$id_c = nil;
							$pass_c = nil;
							$new_users = array();
							$found = false;
							$new = 0;
							$ae = 0;
							for($col = 1; $col <= $ccount; $col++){
								if ($data->val(1,$col) == 'id')
								{
									$id_c = $col;
								}elseif ($data->val(1,$col) == 'password'){
									$pass_c = $col;
								}
							}
							if ($id_c != nil and $pass_c != nil){
								for($row = 2; $row <= $rcount; $row++){
									$found = false;
									$id = $data->val($row,$id_c);
									$pass = $data->val($row,$pass_c);
									if (get_data($id) == ''){
										$new_users[$id] = array();
										$new_users[$id]["status"] = 1;
										register($id, $pass);
										activate_account($id,get_token($id));
										$new = $new +1;
									}else{
										$new_users[$id] = array();
										$new_users[$id]["status"] = 0;
										$ae = $ae +1;
									}
								}
								echo "<table class='imported_users' border='1' cellpadding='5px' cellspacing='0' >";
									echo "<tr style='background-color:rgba(155,155,155,0.4)'><td>User</td><td>Status</td></tr>";
									foreach($new_users as $id=>$val)
									{
										if ($val["status"] == 0 and isset($_POST["show_ae"])){
											echo "<tr><td>".$id."</td><td style='background-color:rgba(255,0,0,0.6)'>Account already exists</td></tr>";
										}elseif ($val["status"] == 1 and isset($_POST["show_r"])) {
											echo "<tr><td>".$id."</td><td style='background-color:rgba(0,255,0,0.6)'>Registered and activated</td></tr>";
										}
										
									}
									echo "<tr><td colspan='2'>Found users: ".count($new_users)."</td></tr>";
									echo "<tr><td colspan='2'>Already existing users: $ae</td></tr>";
									echo "<tr><td colspan='2'>New users: $new</td></tr>";
								echo "</table>";
								echo "<script>alert('Import successful!');</script>";
							}else{
								echo "<script>alert('Your selected file doesnt contain id or password column!');document.location.href = 'import.php'</script>";
							}
						}
					}else{
						echo "<script>alert('Please select valid excel file!');</script>";
					}
				}
				
				?>
			</div>
		</div>
	</body>
</html>

