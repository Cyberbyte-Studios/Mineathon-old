Click here to reset your password: {{ secure_url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}
