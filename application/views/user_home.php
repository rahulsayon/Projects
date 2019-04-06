<!DOCTYPE html>
<html>
<head>
	<title> CRUD Application </title>
	<!-- Latest compiled and minified CSS -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
	<h2>Read Operation in CRUD applicaiton</h2>
		<table class="table "> 
		<thead> 
			<tr> 
				<th>#</th> 
				<th>Full Name</th> 
				<th>E-Mail</th> 
				<th>Mobile</th> 
				<th>Password</th> 
				<th>City</th>
			</tr> 
		</thead> 
		<tbody> 
			<?php  foreach ($data as  $value) {   ?>
			<tr> 
				<th scope="row">1</th> 
				<td><?php echo $value['name'];  ?></td> 
				<td><?php echo $value['email'];  ?></td> 
				<td><?php echo $value['mobile'];  ?></td> 
				<td><?php echo $value['pwd'] ;   ?></td> 
				<td><?php echo $value['city'];  ?></td> 
				<td>
					<a href="update.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
					<a href="<?php echo base_url() . 'my/delete/' . $value['id']; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			</tr>
			<?php  } ?> 
		</tbody> 
		</table>
	</div>
</div>
</body>
</html>