Click here to reset:<br>
<a href="{{ $link = url('password/reset/', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>