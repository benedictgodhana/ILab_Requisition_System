<!DOCTYPE html>
<html>
<head>
    <title>Item Quantity Assigned</title>
</head>
<body>
    <h1>Item Quantity Assigned</h1>
    <p>Dear </p>
    <p>We regret to inform you that the quantity you requested for the item <strong>{{ $itemName }}</strong> exceeds the available stock.</p>
    <p>You requested <strong>{{ $assignedQuantity }}</strong> items, and we have assigned these to you. However, there are <strong>{{ $remainingQuantity }}</strong> items pending restocking.</p>
    <p>Once the item is restocked, we will issue the remaining items to you. Thank you for your understanding.</p>
    <p>Best regards,<br>Inventory Management Team</p>
</body>
</html>
