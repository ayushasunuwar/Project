<?php 
    session_start(); 
    $title = 'Forgot password';
    $page = 'Forgot password';
    include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Inter', sans-serif;
      }
    </style>
</head>
<div class="header">
    <?php include 'header.php';?>
</div>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md flex items-center justify-center">
        <div class="w-full">
        <div class="text-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock mx-auto text-gray-700">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            <h2 class="text-2xl font-semibold text-gray-900 mt-4">Trouble logging in?</h2>
            <p class="text-gray-600 mt-2 text-sm">Enter your email and we'll send you a link to get back into your account.</p>
        </div>
        <form class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="username" name="username" placeholder="Email" required class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Send login link
            </button>
        </form>
        
        <div class="mt-8 text-center" >
            <a href="login.php" class="text-gray-600 text-sm hover:underline" style="text-decoration: none; hover: text-decoration: underline;">Back to login</a>
        </div>
        </div>
    </div>
</body>
</html>
