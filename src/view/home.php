<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Username and Email Form</title>
</head>
<body>
<h1>Register</h1>
<form action="/RLC/public/addUser" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Enter your username" required>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>
    <br><br>
    <button type="submit">Submit</button>
</form>
</body>
</html>