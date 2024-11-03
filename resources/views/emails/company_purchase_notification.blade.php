<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Purchase Notification</title>
</head>
<body>
    <h1>New Package Purchase</h1>
    <p>A new package purchase has been completed.</p>
    <p>Purchaser Name: <strong>{{ $email }}</strong></p>
    <p>Purchaser Email: <strong>{{ $email }}</strong></p>
    <p>Package Name: <strong>{{ $package_name }}</strong></p>
    <p>Package Price: <strong>{{ $package_price }}</strong></p>
    <p>Payment Date: <strong>{{ $payment_date }}</strong></p>
    <p>Transaction ID: <strong>{{ $transaction_id }}</strong></p>
</body>
</html>
