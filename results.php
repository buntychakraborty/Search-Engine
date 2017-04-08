<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php  echo $_GET['user_query']; ?></title>
<link rel="shortcut icon" href="images/icon.ico"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
.fa fa-heart{
color:red;
}
.textbox{
height:33px;

}

.results{
margin-left:10%;
margin-right:10%;


}


body{
margin-top:2%;
}


</style>

<body>

<div class="container">
<form action="results.php" method="get">
<img src="images/logo.png" width="50" height="15"/>
<input  class="textbox" heigtid="usr" class="textbox" type="text" name="user_keyword" placeholder="Enter Your Query" size="120"/>

<input class="btn btn-success" type="submit" name="search" value="Search Now" />
<hr>
<?php
include('connection.php');
if(isset($_GET['search'])){
$get_value=$_GET['user_query'];

$result_query="select * from sites where site_keywords like'%$get_value%'";
$run=mysqli_query($conn,$result_query) or die("Error".mysqli_error($conn));
if(mysqli_num_rows($run)<1){
echo "
<b>
<h2><p>Your search - $get_value - did not match any documents.<br/></p>
Suggestions:
<ul align='justify'>
<li>Make sure that all words are spelled correctly.</li>
<li>Try different keywords.</li>
<li>Try more general keywords.</li>
</ul>
</h2>
</b>
";
exit();



}
while($row=mysqli_fetch_array($run)){
$title=$row['site_title'];
$link=$row['site_link'];
$keyword=$row['site_keywords'];
$desc=$row['site_desc'];
$image=$row['site_image'];
echo "<div class='results'>
<h2>$title</h2>
<a href='$link' target='_blank'>$link</a>

<p align='justify'>$desc</p>
<img src='images/$image' width='120' height='100'/>
</div>
";

}
}

?>


</form>
<hr>
</br>
</div>
<footer class="footer">
        <div class="container text-center">
                <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href=#" target="_blank">Bunty Chakraborty</a> </small>
        </div><!--//container-->
    </footer><!--//footer-->
 
    <!-- Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>    
    <script type="text/javascript" src="assets/plugins/jquery-rss/dist/jquery.rss.min.js"></script> 
    <!-- github activity plugin -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>
    <script type="text/javascript" src="http://caseyscarborough.github.io/github-activity/github-activity-0.1.0.min.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/js/main.js"></script>            
</body>
</html> 











?>
