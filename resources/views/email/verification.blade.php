<!doctype html>
<html lang="en">
<body>
    <div>
        <p>Dear {{ $user->username }},</p>
        <p>Your account has been created. Please click the following link to activate your account</p>
        <a href="{{ route('verify', $user->email_verification_token) }}">
            {{ route('verify', $user->email_verification_token) }}
        </a>
        <br/>
        <p>Thanks</p>
    </div>
</body>
</html>
