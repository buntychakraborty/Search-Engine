<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert SITES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
body{

background:CornflowerBlue;
} </style>
</head>
<body>
<div class="container">
<form action="#" method="post" enctype="multipart/form-data">

<h2 align="center"><strong>Inserting New Website</strong></h2>
      
  <table class="table table-hover"  width="500"  cellspacing="2" align="center" >
    
    <tbody>
      
<tr>
        <td align="right"><strong>Site Title:</strong></td>
        <td ><input type="text" name="site_title" size="50"/></td>
      </tr>
<tr>
        <td align="right"><strong>Site Link:</strong></td>
        <td ><input type="text" name="site_link" size="50"/></td>
      </tr>
      <tr>
        <td align="right"><strong>Site Keywords:</strong></td>
        <td><input type="text" name="site_keyword" size="50"/></td>
    
      </tr>
       <tr>
        <td align="right"><strong>Site Description:</strong></td>
        <td><textarea cols="49" rows="8" name="site_desc" size="50"> </textarea></td>
       
      </tr>

<tr>
        <td align="right"><strong>Site Image:</strong></td>
        <td><input type="file" name="site_image" /></td>
       
      </tr>
<tr>
      
        <td align="center" colspan="8"><input class="btn btn-success" type="submit" name="submit" value="Add Site Now" /></td>
       
      </tr>
    </tbody>
  </table>





</form>


</div>


</body>

</html>









<?php
include('connection.php');



if(isset($_POST['submit'])){

$site_title=$_POST['site_title'];
$site_link=$_POST['site_link'];
$site_keyword=$_POST['site_keyword'];
$site_desc=$_POST['site_desc'];
$site_image=$_FILES['site_image']['name'];
$site_tmp_image=$_FILES['site_image']['tmp_name'];

move_uploaded_file($site_tmp_image,"images/{$site_image}");
$insert_query="insert into sites(site_title,site_link,site_keywords,site_desc,site_image) values('$site_title','$site_link','$site_keyword','$site_desc','$site_image')";
$run=mysqli_query($conn,$insert_query) or die("Error".mysqli_error($conn));
if($run){
echo "<script>alert('Successfully Inserted into Database');</script>";

}

else{
echo "<script>alert('Insertion Failed!!!');</script>";

exit();
}
}





?>
