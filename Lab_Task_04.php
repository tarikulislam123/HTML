<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nameErr = $username = $password = $conpassword = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }    
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Club Member Registration</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  Username: <input type="text" name="username">
  <span class="error"> <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="text" name="password">
  <span class="error"> <?php echo $passwordErr;?></span>
  <br><br>
  Confirm Password: <input type="text" name="conpassword">
  <span class="error"> <?php echo $conpasswordErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>
  Phone: <input type="text" name="phone">
  <span class="error"> <?php echo $phoneErr;?></span>
  <br><br>
  Address: <input type="text" name="email">
  <span class="error"> <?php echo $addressErr;?></span>
  <br><br>
  <input type="text" name="email">
  <input type="text" name="email"><br><br>
  <input type="text" name="email"><br><br>
  BirthDate: <input type="date" name="birthdate">
  <span class="error"> <?php echo $birthdateErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="female">Female
  <span class="error"> <?php echo $genderErr;?></span>
  <br><br>
  Where did you Hear about us: <br><br>
  <input type="checkbox" name="gender" value="friend">A Friend Or Colleague<br><br>
  <input type="checkbox" name="gender" value="google">Google<br><br>
  <input type="checkbox" name="gender" value="blockpost">Block Post<br><br>
  <input type="checkbox" name="gender" value="newsarticle">News Article<br><br>
  Bio: <textarea name="bio" rows="5" cols="40"></textarea>
  <br><br>
  
  <input type="submit" name="submit" value="Register">  
</form>


</body>
</html>