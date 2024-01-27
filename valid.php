<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registration Form</title>
<style>
#container {
  width: 602px;
  height: 600px;
  margin: 8px auto;
  border-radius: 15px;
  padding: 5px;
  border: 5px solid black;
  font-family: 'Times New Roman', Times, serif;
  background-color: powderblue; 
}

input[type="text"],
input[type="email"],
input[type="password"] {
  margin-right: 5px;
  width: 98%;
  height: 40px;
  padding: 2px 0px 2px 4px;
  border-radius: 6px;
  background: white;
  border: 2px solid rgba(0, 0, 0, 1);
  color: black;
}

input[type="submit"] {
  width: 17%;
  height: 30px;
  margin-top: 14px;
  border-radius: 6px;
  font: 14px bold;
  color: white;
  background: black;
  text-transform: uppercase;
  border: 3px solid #000;
  padding: 3px 10px;
}

input[type="submit"]:hover {
  opacity: 2;
  cursor: pointer;
  background-color: green;
}

</style>
</head>
<body>
<div id="container">
  <h2><center><b>Registration Form</b></center></h2>
  <form action="valid.php" method="post">
    <b> <label for="username">Username:</label>
      <input type="text" id="username" name="username"><br><br>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>

      <label for="pno">Phone Number:</label><br>
      <input type="text" id="pno" name="pno" pattern="[0-9]{10}"><br><br>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br><br>

      <label for="confirm_password">Confirm Password:</label>
      <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    </b>

    <center><input type="submit" value="REGISTER" style="background-color: lightgreen; color: black;"></center>

  </form>
</div>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = clean_input($_POST["username"]);
  $email = clean_input($_POST["email"]);
  $pno= clean_input($_POST["pno"]);
  $password = clean_input($_POST["password"]);
  $confirm_password = clean_input($_POST["confirm_password"]);

  if (empty($username) || empty($email) || empty($password) || empty($pno) || empty($confirm_password)) {
    echo '<script>alert("All fields are required.")</script>';
  } elseif ($password !== $confirm_password || strlen($password) < 8) {
    echo '<script>alert("Passwords do not match or password must be at least 8 characters.")</script>';
  } else {
    echo '<script>alert("Registration successful!")</script>';
  }
}

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data); 
  return $data;
}
?>
