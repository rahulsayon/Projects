<!DOCTYPE html>
<html lang="en">
<head>
  <title> Validation Error</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div> <?php 
         
            echo validation_errors();
        if($this->session->tempdata('scuccess')){

            echo "<span> User Is Created </span>";
        }

   ?> </div>
  <h2>Registration Form</h2>
      <form  action=""  method="post"  enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo set_value('name'); ?>">
       <span class="text-danger">       <?php echo form_error('name') ; ?> </span>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value="<?php echo set_value('pwd'); ?>">
           <span class="text-danger"> <?php echo form_error('pwd') ; ?> </span>

    </div>

    <div class="form-group">
      <label for="cpwd">Confirm Password:</label>
      <input type="password" class="form-control" id="cpwd" placeholder="Confirm password" name="cpwd" value="<?php echo set_value('cpwd'); ?>">
         <span class="text-danger"> <?php echo form_error('cpwd') ; ?> </span>

    </div>

      <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo set_value('email'); ?>">
           <span class="text-danger"> <?php echo form_error('email') ; ?> </span>

    </div>

    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="mobile" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile" value="<?php echo set_value('mobile'); ?>">
     <span class="text-danger"> <?php echo form_error('mobile') ; ?> </span>
    </div>

    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image"  name="image" >
     <span class="text-danger"> <?php echo form_error('image') ; ?> </span>
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
         <?php  echo form_close()  ?>
</div>

</body>
</html>
