<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Created</title>
</head>
<body>
    <h2>Hello {{ $user->name }}</h2>
    <p>Your Account has been created by Admin.</p>

    <p><strong>Email:</strong>{{ $user->email }}</p>
    <p><strong>Password:</strong>{{ $password }}</p>

    <p>Please Login and secure your credentials for Login</p>

    <br>
    <br>
    <p>Thanks,</p>
    <p><strong>Admin Team</strong></p>
</body>
</html>