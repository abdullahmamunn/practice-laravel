<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
</head>
<body>
 <p>Hello, {{$user['name']}} click <a href="{{route('verify.account',$user['remember_token'])}}">here</a> to verify your account</p>
 <p>Thank you</p>
 <p>From Shome</p>
</body>
</html>
