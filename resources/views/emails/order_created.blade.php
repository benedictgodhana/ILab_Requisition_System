<!DOCTYPE html>
<html>
<head>
    <title>New Requisition Created</title>
</head>
<body>
    <h1>Your Requisition Has Been Created Successfully</h1>
    <p>Dear {{ Auth::user()->name }},</p>
    <p>We have received your requisition with the following details:</p>
    <ul>
        <li><strong>Order Number:</strong> {{ $orderNumber }}</li>
        <li><strong>Order Date:</strong> {{ $orderDate }}</li>
        <li><strong>Status:</strong> {{ $status }}</li>
    </ul>
    <p>You will be notified once there are any updates on the requisition.</p>

    <p>Thank you for using our requisition system!</p>
</body>
</html>
