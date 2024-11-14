<!DOCTYPE html>
<html>
<head>
    <title>Restock Needed</title>
</head>
<body>
    <h1>Restock Notification</h1>
    <p>The following item needs to be restocked:</p>
    <p><strong>Item Name:</strong> {{ $item->name }}</p>
    @if($item->itemQuantity)
        <p><strong>Remaining Quantity:</strong> {{ $item->quantity }}</p>
    @else
        <p><strong>Remaining Quantity:</strong> Not available (no stock record found)</p>
    @endif
    <p><strong>Reorder Level:</strong> {{ $item->reorder_level }}</p>
    <p>Please restock this item as soon as possible.</p>
</body>
</html>
