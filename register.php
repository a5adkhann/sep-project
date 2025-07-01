<?php
include("./admin/db/db_connection.php");

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $insert_query = "INSERT INTO users(user_name, user_email, user_password) VALUES('$name', '$email', '$password')";
    $execute = mysqli_query($connection, $insert_query);
    echo "<script>
        alert('Registered Successfully');
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-100 to-purple-100 min-h-screen flex items-center justify-center px-4">
  <div class="bg-white rounded-xl shadow-xl flex flex-col md:flex-row max-w-4xl w-full overflow-hidden">
    
    <!-- Left image -->
    <div class="md:w-1/2 hidden md:block">
      <img src="./images/registerPageImage.jpg" alt="House" class="w-full h-full object-cover" />
    </div>

    <!-- Right form -->
    <div class="w-full md:w-1/2 p-8">
      <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">CozaStore APP</h2>
        <p class="text-sm text-gray-600 mt-1">Free Sign Up</p>
        <p class="text-sm text-gray-400">Enter your email address and password to access account.</p>
      </div>

      <form class="space-y-4" method="POST">
        <div>
          <label class="block text-sm font-medium text-gray-700">Full Name</label>
          <input type="text" placeholder="Enter your name" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" name="name" required />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Email address</label>
          <input type="email" placeholder="Enter your email" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" name="email" required/>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" placeholder="Enter your password" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" name="password" required/>
        </div>

        <div class="flex items-center">
          <input type="checkbox" id="terms" class="mr-2" name="acceptTerms" required/>
          <label for="terms" class="text-sm text-gray-600">I accept Terms and Conditions</label>
        </div>

        <button type="submit" class="w-full bg-teal-500 text-white py-2 rounded-lg hover:bg-teal-600 transition" name="register">Sign Up</button>
      </form>
      <!-- Login redirect -->
      <p class="mt-6 text-sm text-center text-gray-600">
        Already have an account?
        <a href="login.php" class="text-blue-600 font-medium hover:underline">Log In</a>
      </p>
    </div>
  </div>
</body>
</html>
