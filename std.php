<!DOCTYPE HTML>
<html>
<head>
<title>Students details</title>
<style>
table{
font-family: Arial, sans-serif;
border-collapse: collapse;
}
th{
background-color: black;
color:white;
}
</style>
</head>
<body>
<center>
<?php
$conn = mysqli_connect("localhost", "root", "", "college");
if (!$conn) {
echo "Connection Failed" . "<br>";
} else {
echo "Connected successfully" . "<br>";
}
$sql = "INSERT INTO student (Rollno, Name, Age, course_id) VALUES (101, 'Abhimanue', 21, 
111),(102,'Jose',22,112),(103,'Hari', 21, 113),(104,'Jo',22,114)";
if (mysqli_query($conn, $sql)) {
echo "Inserted Successfully" . "<br>";
} else {
echo "Insertion Failed" . "<br>";
}
$select_query = "SELECT * FROM student";
$result = mysqli_query($conn, $select_query);
 if (mysqli_num_rows($result) > 0){
echo "<center><h1 style='color: #34568B'>Student List</h1></center>";
echo "<center><table border='1' cellspacing='1' cellpadding='10' align='center' bgcolor='white'>
<tr>
<th>Roll No</th>
<th>Name</th>
<th>Age</th>
<th>Course ID</th>
</tr>";
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row['Rollno'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Age'] . "</td>";
echo "<td>" . $row['course_id'] . "</td>";
echo "</tr>";
}
echo "</table></center>";
} else {
echo "No records found in the student table";
}
mysqli_close($conn);
?>
</center>
</body>
</html>
