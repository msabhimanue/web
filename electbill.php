<!DOCTYPE html>
<head>
<title>Electricity Bill</title>
<style>
body{
font-family: Arial, sans-serif;
}
input[type="submit"] {
padding: 8px;
margin-bottom: 30px;
border-radius: 3px;
border: 1px solid #ccc;
width: 40%;
background-color: #174d5a;
color: white;
cursor: pointer;
}
.result {
margin-top: 20px;
padding: 10px;
border: 1px solid #ddd;
border-radius: 3px;
background-color: #f9f9f9;
}
</style>
</head>
<?php
$total = $result =$cname =$cnum = $units= '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$cname = test_input($_POST["cname"]);
$cnum = test_input($_POST["cnum"]);
$units = test_input($_POST["units"]);
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
if (isset($_POST['unit_submit'])) {
$units = $_POST['units'];
if (!empty($units)) {
$result = calculate_bill($units);
$total = 'Amount to be paid : ₹'. $result;
$cname = 'Consumer Name : ' . $cname;
$cnum = 'Consumer Number : ' . $cnum;
$units = 'Units Consumed : ' . $units;
}
}
function calculate_bill($units) {
$unit_cost_first = 3.50;
$unit_cost_second = 4.50;
$unit_cost_third = 5.50;
$unit_cost_fourth = 6.50;

if($units <= 50) {
$bill = $units * $unit_cost_first;
}
else if($units > 50 && $units <= 100) {
$temp = 50 * $unit_cost_first;
$remaining_units = $units - 50;
$bill = $temp + ($remaining_units * $unit_cost_second);
}
else if($units > 100 && $units <= 200) {
$temp = (50 * 3.5) + (100 * $unit_cost_second);
$remaining_units = $units - 150;
$bill = $temp + ($remaining_units * $unit_cost_third);
}
else {
$temp = (50 * 3.5) + (100 * $unit_cost_second) + (100 * $unit_cost_third);
$remaining_units = $units - 250;
$bill = $temp + ($remaining_units * $unit_cost_fourth);
}
return number_format((float)$bill, 2, '.', '');
}
?>
<body>
<form action="" method="post" id="quiz-form">
<br><br><br>
<div id="page-wrap">
<table style="border-style:outset" cellspacing="1" cellpadding="10" align="center" 
bgcolor="white" width="600">
<tr><td colspan="2" align="center"><h1>Calculate Electricity Bill</h1>
<tr><td>Enter the consumer name :</td><td><input type="text" name="cname" 
id="cname"/></td></tr>

<tr><td>Enter the consumer number :</td><td><input type="number" name="cnum" 

id="cnum"/></td></tr>
<tr><td>Enter the units consumed :</td><td><input type="number" name="units" 
id="units"/></td></tr>
<tr><td></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="unit_submit" 
id="unit_submit" value="Submit" /></td><td>
<tr><td colspan="2" align="center"><div class="result">
<?php
echo $cname.'<br>';
echo $cnum.'<br>';
echo $units.'<br>';
echo $total;
?>
</div></td></tr>
</div>
</table>
</form>
</body>
</html>
