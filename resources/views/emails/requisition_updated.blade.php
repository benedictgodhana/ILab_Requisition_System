<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisition Updated</title>
</head>
<body>
    <h1>Hello, {{ $requisition->user->name }}</h1>
    <p>Your requisition with Order Number: {{ $requisition->order_number }} has been <strong>
            @if($requisition->status->name == 'Declined')
                <span style="color: red; font-weight: bold;">{{ $requisition->status->name }}</span>
            @elseif($requisition->status->name == 'Approved')
                <span style="color: green; font-weight: bold;">{{ $requisition->status->name }}</span>
            @else
                {{ $requisition->status->name }}
            @endif
        </strong></p>



    <p>Remarks: {{ $requisition->remarks ?? 'No remarks provided' }}</p>
    <p>Thank you for using our system!</p>
</body>
</html>
