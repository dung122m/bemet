<p>
Dear {{ $account->name }},
<div>We hope this email finds you well. Thank you for choosing our platform.</div>

<div>
    
To ensure the security of your account, we require you to verify your email address by <a href="{{ route("account.verify", $account->email) }}">click here</a>
</div> 


<div>
    Please note that this link is only valid for a limited time. If you encounter any issues or have questions, feel free to reach out to our support team at dungtran122cq@gmail.com.
</div>
<div>
    Thank you for your cooperation.
</div>

<div>Best regards,</div>
<div>Bemet</div>
<div>dungtran122cq@gmail.com</div>
</p>