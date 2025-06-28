<?php
include("./admin/db/db_connection.php");

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $select_query = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
  $execute = mysqli_query($connection, $select_query);

  $count_users = mysqli_num_rows($execute);
  if ($count_users > 0) {
    $get_users = mysqli_fetch_array($execute);


    if ($get_users['user_role'] == 0) {

      $_SESSION['admin_email'] = $get_users['user_email'];
      $_SESSION['admin_password'] = $get_users['user_password'];
      echo "<script>
        alert('Logged In Successfully');
        location.assign('./admin/index.php');
        </script>";
    } else {
      $_SESSION['user_email'] = $get_users['user_email'];
      $_SESSION['user_password'] = $get_users['user_password'];
      echo "<script>
        alert('Logged In Successfully');
        location.assign('index.php');
        </script>";
    }
    $_SESSION['email'] = $get_users['user_email'];
    $_SESSION['password'] = $get_users['user_password'];

    echo "<script>
        alert('Logged In Successfully');
        location.assign('index.php');
        </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

    * {
      font-family: "Poppins", sans-serif;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-blue-100 to-purple-100 min-h-screen flex items-center justify-center px-4">
  <div class="bg-white rounded-xl shadow-xl flex flex-col md:flex-row max-w-4xl w-full overflow-hidden">

    <!-- Left image -->
    <div class="md:w-1/2 hidden md:block">
      <img src="./images/registerPageImage.jpg" alt="Login Visual" class="w-full h-full object-cover" />
    </div>

    <!-- Right form -->
    <div class="w-full md:w-1/2 p-8">
      <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">CozaStore APP</h2>
        <p class="text-sm text-gray-600 mt-1">Welcome back!</p>
        <p class="text-sm text-gray-400">Login with your email and password to continue.</p>
      </div>

      <form class="space-y-4" method="POST">
        <div>
          <label class="block text-sm font-medium text-gray-700">Email address</label>
          <input type="email" placeholder="Enter your email"
            class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400"
            name="email" required />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" placeholder="Enter your password"
            class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400"
            name="password" required />
        </div>

        <button type="submit"
          class="w-full bg-teal-500 text-white py-2 rounded-lg hover:bg-teal-600 transition"
          name="login">Login</button>
      </form>

      <!-- Register redirect -->
      <p class="mt-6 text-sm text-center text-gray-600">
        Don't have an account?
        <a href="register.php" class="text-blue-600 font-medium hover:underline">Register</a>
      </p>
    </div>
  </div>
</body>

</html>