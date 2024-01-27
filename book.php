<!DOCTYPE HTML>
<html>
<head>
<title></title>
<style>
#regform{
background-color: white;
text-align: center;
width: 500px;
height: 800px;
margin:auto;
}
body{
font-family: Arial, sans-serif;
background-image: url('books5.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
}
th{
background-color: #0766ad;
color:white;
}
.required{
color:red;
}
input[type=submit] {
background-color: #0766ad;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 100%;
}
</style>
</head>
<script>
function validateForm() {
var Bookid = document.forms["myForm"]["bookid"].value;
var Title = document.forms["myForm"]["title"].value;
var Author = document.forms["myForm"]["author"].value;
var Edition = document.forms["myForm"]["edition"].value;
var Publisher = document.forms["myForm"]["publisher"].value;
if (Bookid === "" || Title === "" || Title === "" || Edition === "" || Publisher === "") {
alert("All fields must be filled out");
return false;
}
return true;
}
</script>
<body>
<center>
<div id="regform">
<br>
<h2 style='color: #485551'> Book Information</h2>
<h4>Add the details of the book</h4>
<form name="myForm" action="books.php" method="post" onsubmit="return 
validateForm()">
<table border='0' cellspacing='1' cellpadding='6' align='center' bgcolor='white'>
<tr><td>Book ID<span class="required">*</span>:</td><td><input type="number" 
name="bookid" required></td></tr>
<tr><td>Title<span class="required">*</span>: </td><td><input type="text" 
name="title" required pattern="^[A-Z]+[a-zA-Z ]*$" title="Name Allows Only 
Alphabets,Spaces and First Letter Must Be Capital Letter"></td></tr>
<tr><td>Author<span class="required">*</span>: </td><td><input type="text" 
name="author" required pattern="^[A-Z]+[a-zA-Z ]*$" title="Name Allows Only 
Alphabets,Spaces and First Letter Must Be Capital Letter"></td></tr>
<tr><td>Edition<span class="required">*</span>: </td><td><input type="text" 
name="edition" required></td></tr>
<tr><td>Publisher<span class="required">*</span>: </td><td><input type="text" 
name="publisher" required pattern="^[A-Z]+[a-zA-Z ]*$" title="Name Allows Only 
Alphabets,Spaces and First Letter Must Be Capital Letter"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" 
value="Submit"></td></tr>
</table></form>
<h4>Do you want to search books?</h4>
<form name="searchForm" action="books.php" method="post">
<table border='0' cellspacing='1' cellpadding='10' align='center' bgcolor='white'>
<tr><td>Author:</td><td><input type="text" name="author" required></td><td 
align="center"><input type="submit" name="search" value="Search"></td></tr>
</table></form>
<?php
$conn=mysqli_connect("localhost","root","","book");
echo "<center>";
if (!$conn)
{
echo "Error in connection!";
}
else{
echo "Connected successfully!";
}
if(isset($_POST['submit']))
{
$Bookid=$_POST['bookid'];
$Title=$_POST['title'];
$Author=$_POST['author'];
$Edition=$_POST['edition'];
$Publisher=$_POST['publisher'];
$sql="INSERT INTO bdetails (BookId,Title,Author,Edition,Publisher) 
values('$Bookid','$Title' ,'$Author' ,'$Edition' ,'$Publisher')";
if(mysqli_query($conn, $sql))
{
echo "<br>Inserted record successfully";
}
else{
echo "<br>Error in record insertion";
}
echo "<center><h3 style='color: #485551'>Book Details</h3></center>";
echo "<center><table border='1' cellspacing='1' cellpadding='10' align='center' 
bgcolor='white'>
<tr>
<th>BookId</th>
<th>Title</th>
<th>Author</th>
<th>Edition</th>
<th>Publisher</th>
</tr>
<tr>
<td>$Bookid</td>
<td>$Title</td>
<td>$Author</td>
<td>$Edition</td>
<td>$Publisher</td>
</tr>";
}
if(isset($_POST['search']))
{
$Author=$_POST['author'];
$sql="select * from bdetails where Author='$Author'";
$res= mysqli_query($conn, $sql);
$totRows = mysqli_num_rows($res);
if($totRows==0)
{
echo "<br><br>No records found!";
}
else{
echo "<center><h3 style='color: #8B4513'>Search Result</h3></center>";
echo "<center><table border='1' cellspacing='1' cellpadding='6' align='center' 
bgcolor='white'>
<tr>
<th>BookId</th>
<th>Title</th>
<th>Author</th>
<th>Edition</th>
<th>Publisher</th>
</tr>";
while($row = mysqli_fetch_assoc($res))
{
echo "<tr>";
echo "<td>".$row["BookId"]."</td>";
echo "<td>".$row["Title"]."</td>";
echo "<td>".$row["Author"]."</td>";
echo "<td>".$row["Edition"]."</td>";
echo "<td>".$row["Publisher"]."</td>";
echo "</tr>";
}
echo "</table></center>";
}}
echo "</center>";
mysqli_close($conn);
?>
</center>
<br>
</div>
</body>
</html>



