<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Confirmation</title>
</head>
<body>
    <h1>Payment Successful!</h1>
    <p>Thank you for your purchase, {{ $email }}!</p>
    <p>Package Name: <strong>{{ $package_name }}</strong></p>
    <p>Package Price: <strong>{{ $package_price }}</strong></p>
    <p>Payment Date: <strong>{{ $payment_date }}</strong></p>
    <p>Transaction ID: <strong>{{ $transaction_id }}</strong></p>
    <p>We will contact you soon with more details.</p>
    <p>If you have any questions, feel free to contact us.</p>
</body>
</html>
