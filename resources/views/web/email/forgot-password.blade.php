<p>
Dear {{ $customer->name }},
<div>
We noticed that you recently requested a password reset for your account on Bemet.
</div>
<div>
To reset your password, please  <a href="{{ route("account.reset-password",$token) }}"> click here</a> to reset password

</div>
<div>
If you did not initiate this password reset request, please disregard this email. Your account security is important to us.

</div>

<div>
Thank you for using Bemet.

</div>

<div>Best regards,</div>
<div>Bemet</div>
<div>dungtran122cq@gmail.com</div>
</p>