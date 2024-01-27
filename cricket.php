
<?php
$indian_cricket_players = array("Virat Kohli", "MS Dhoni", "Rohit Sharma", "Hardik Pandya", "Mohammed Shami", "Yuzvendra Chahal", "Shikhar Dhawan", "KL Rahul", "Bhuvneshwar Kumar", "Jasprit Bumrah");
?>
<!DOCTYPE html>
<html>
<head>
<title>Indian Cricket Players</title>
<style>
body {
  max-width: 750px;
  margin: auto;
  border-style: outset;
}

table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
  background-color: powderblue;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: center;
}

th {
  background-color: #000000;
  color: white; 
}
</style>
</head>
<body>
<center><h2>List of Indian Cricket Players</h2></center>
<table>
  <tr>
    <th>Name</th>
  </tr>
  <?php
    foreach($indian_cricket_players as $player) {
      echo "<tr><td>$player</td></tr>";
    }
  ?>
</table>
</body>
</html>
