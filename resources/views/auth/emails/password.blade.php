
Hello {{$user->name }}, 
Your username is {{$user->username }}, 
<br>
Click here to reset your password: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
