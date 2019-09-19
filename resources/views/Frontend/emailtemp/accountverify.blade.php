<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Dear User {{ $user->name }}</p>
	<p>Your account has been create. Please click the following link auto activate your account:</p>
	<p><a href="{{route('account.varify',$user->email_verification_token)}}">click here</a></p>
	<br>
	<p>thanks</p>
</body>
</html>