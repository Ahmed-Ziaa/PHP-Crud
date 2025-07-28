<?php

include 'connection.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `app`.`users` (username, email, password) VALUES ('$username', '$email', '$password')";

    $result = mysqli_query($connect, $sql); 

    if($result){
        // header('location: update.php');
    }
    echo "
    <script>
    alert('form has been submitted');
    window.location.href = 'display.php'
    </script>
    ";
    // else{
    //     die(mysqli_connect_error($connect));
    // }

    mysqli_close($connect);

}

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
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
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
      margin: 50px auto;
      font-family: Arial, sans-serif;
    }

    input {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      box-sizing: border-box;
    }

    input.error {
      border: 2px solid red;
    }

    .error-message {
      color: red;
      font-size: 12px;
      display: none;
      margin-bottom: 10px;
    }

    button {
      padding: 10px;
      width: 100%;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    h2 {
      text-align: center;
    }
  </style>
</head>
<body>

   
<div class="form-container">
  <h2>Create Account</h2>
  <form id="accountForm" method="post" novalidate>
    <label>Username</label>
    <input type="text" name="username" id="username" placeholder="Username">
    <div class="error-message" id="usernameError">This field is required</div>

    <label>Email</label>
    <input type="email" name="email" id="email" placeholder="Email">
    <div class="error-message" id="emailError">This field is required</div>

    <label>Password</label>
    <input type="password" name="password" id="password" placeholder="Password">
    <div class="error-message" id="passwordError">This field is required</div>

    <button type="submit" name="submit">Submit</button>
  </form>
</div>

</body>
<script>
  const form = document.getElementById('accountForm');

  form.addEventListener('submit', function (e) {
    let isValid = true;

    const fields = ['username', 'email', 'password'];

    fields.forEach(function(field) {
      const input = document.getElementById(field);
      const error = document.getElementById(field + 'Error');

      if (input.value.trim() === '') {
        input.classList.add('error');
        error.style.display = 'block';
        isValid = false;
      } else {
        input.classList.remove('error');
        error.style.display = 'none';
      }
    });

    if (!isValid) {
      e.preventDefault(); // prevent form from submitting
    }
  });
</script>
</html>
