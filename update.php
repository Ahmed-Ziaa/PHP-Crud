<?php
include 'connection.php';

$id = $_GET['updateid'];

$sql = "select * from `crudapp`.`users` where id=$id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "update `app`.`users` set 
    username = '$username',
    email = '$email',
    password = '$password'
    where  `users`. `id` = $id";

    $result = mysqli_query($connect, $sql); 

    if($result){
        // header('location: update.php');
    }
    echo "
    <script>
    alert('form has been updated');
    window.location.href = 'display.php'
    </script>
    ";
    // else{
    //     die(mysqli_connect_error($connect));
    // }

    mysqli_close($connect);

}


// echo $id;
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <title>Curd App</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2980b9, #6dd5fa);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 350px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      background: #f0f0f0;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #3498db;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background: #2980b9;
    }

     .form-container {
    width: 300px;
    margin: 0 auto;
  }

  input.error {
    border: 2px solid red;
    background-color: #ffe6e6;
  }

  .error-message {
    color: red;
    font-size: 12px;
    margin-bottom: 10px;
  }
  </style>
</head>

<body>

<div class="form-container">
  <h2><u>Update Data</u></h2>
  <form method="post" onsubmit="return validateForm()">
    <label>Username</label>
    <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username ?>">
    <div id="usernameError" class="error-message"></div>

    <label>Email</label>
    <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email ?>">
    <div id="emailError" class="error-message"></div>

    <label>Password</label>
    <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $password ?>">
    <div id="passwordError" class="error-message"></div>

    <button type="submit" name = "submit">Update</button>
  </form>
</div>

</body>


<script>
  function validateForm() {
    let isValid = true;

    // Get form fields
    const username = document.getElementById("username");
    const email = document.getElementById("email");
    const password = document.getElementById("password");

    // Get error message containers
    const usernameError = document.getElementById("usernameError");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");

    // Reset errors
    [username, email, password].forEach(input => input.classList.remove("error"));
    [usernameError, emailError, passwordError].forEach(error => error.innerText = "");

    // Validate Username
    if (username.value.trim() === "") {
      username.classList.add("error");
      usernameError.innerText = "Username is required";
      isValid = false;
    }

    // Validate Email
    if (email.value.trim() === "") {
      email.classList.add("error");
      emailError.innerText = "Email is required";
      isValid = false;
    }

    // Validate Password
    if (password.value.trim() === "") {
      password.classList.add("error");
      passwordError.innerText = "Password is required";
      isValid = false;
    }

    return isValid; // return false to prevent form submission
  }
</script>

</html>