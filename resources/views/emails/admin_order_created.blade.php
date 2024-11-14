<!-- resources/views/emails/admin_order_created.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>New Requisition Notification</title>
</head>
<body>
    <h1>New Requisition Created</h1>
    <p>Hello Admin,</p>
    <p>A new requisition has been created by {{ $order->user->name }}.</p>

    <h2>Requisition Details</h2>
    <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
    <p><strong>Status:</strong> Pending</p>

    

<p>Please review the requisition in the system.</p>

    <p>Thank you.</p>
</body>
</html>
