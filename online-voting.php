<!--This is an Online Voting System Project which I have created out of Boredom :P. This Web App goes ahead and ask you to rate your favorite actress and it will show the real time percetage of votes.

Actress Nominated: 1.Shraddha Kapoor 2.Disha Patani 3.Jacqueline Fernandez

NB:Your contribution is higly appreciable. :)

Owner:Bunty Chakraborty

-->



<!DOCTYPE html>
<html>
<head>
<title>Online Voting System</title>
<link rel="icon" type="image/gif/ico" href="icon.ico">
<style>
body {
background-color:skyblue;
padding:0;
margin:0;
}
#con {
margin:auto;
width:1000px;
padding:10px;
background-color:green;
}
#stars {
width:1000px;
margin:auto;
}
#stars img {
border:3px solid orange;
border-radius:100%;
padding:5px;
}form input {
padding:10px;
margin:50px;
}
h2{color:white;}
</style>
</head>
<body>
<div id="con">
<h2 align="center">Your Vote to the Cutest Smile of the Year!</h2>
<div id="stars" align="center">
<img src="shraddha.jpg" width="200" height="200"/>
<img src="disha.jpg" width="200" height="200"/>
<img src="jacqueline.jpg" width="200" height="200"/>
</div>
<form action="#" method="post" align="center">
<input type="submit" name="shraddha" value="Vote to Shraddha"  size="35" />
<input type="submit" name="disha" value="Vote to Disha" size="35"/>
<input type="submit" name="jacqueline" value="Vote to Jacqueline"  size="35"/>
</form>
<?php
$con = mysqli_connect("localhost","root","12345","Php");

if(isset($_POST['shraddha'])){
$shraddha = "update stars set shraddha=shraddha+1";
$run_shraddha = mysqli_query($con,$shraddha);
echo "<center><h2>Your Vote Has Been Cast! <br/>";
echo "<a href='online-voting.php?results'>See Results</a></h2></center>";
}
if(isset($_POST['disha'])){
$disha = "update stars set disha=disha+1";
$run_disha = mysqli_query($con,$disha);
echo "<center><h2>Your Vote Has Been Cast!<br/>";
echo "<a href='online-voting.php?results'>See Results</a></h2></center>";
}
if(isset($_POST['jacqueline'])){
$jacqueline = "update stars set jacqueline=jacqueline+1";
$run_jacqueline = mysqli_query($con,$jacqueline);
echo "<center><h2>Your Vote Has Been Cast!<br/>";
echo "<a href='online-voting.php?results'>See Results</a></h2></center>";
}
?>
<?php
if(isset($_GET['results'])){
$sel = "select * from stars";
$run = mysqli_query($con,$sel);
$row=mysqli_fetch_array($run);
$shraddha_votes = $row['shraddha'];
$disha_votes = $row['disha'];
$jacqueline_votes = $row['jacqueline'];
$count_all = $shraddha_votes +$disha_votes+$jacqueline_votes;
$per_shraddha = round($shraddha_votes*100/$count_all) . "%";
$per_disha = round($disha_votes*100/$count_all) . "%";
$per_jacqueline = round($jacqueline_votes*100/$count_all) . "%";
echo "
<div align='center'>
<h2>Results So Far:</h2>
<p style='color:white; background:black; width:400px;
padding:10px;'>Shraddha Kapoor: $shraddha_votes Votes ($per_shraddha)</p>
<p style='color:white; background:black; width:400px; padding:10px;'>Ricky
Disha Patani: $disha_votes Votes ($per_disha)</p>
<p style='color:white; background:black; width:400px;
padding:10px;'>Jacqueline Fernandez: $jacqueline_votes Votes ($per_jacqueline)</p>
</div>
";
}
?>
</div></body>
</html>
