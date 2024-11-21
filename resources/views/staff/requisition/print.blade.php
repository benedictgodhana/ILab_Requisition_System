<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisitions Report</title>
    <style>
        /* Import Poppins font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        /* General styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        h1 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
            color: #fff;
            background-color:navy;
            padding: 10px 0;
            font-size: 14px;
        }

        .container {
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header .user-info {
            font-size: 14px;
            color: #555;
        }

        .header .unique-code {
            font-size: 14px;
            font-weight: bold;
            color: #2c3e50;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        thead tr {
            background-color: #2c3e50;
            color: #fff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            font-size: 14px;
        }

        th {
            font-weight: 500;
            text-transform:capitalize;
            letter-spacing: 0.5px;
        }

        td {
            color: #555;
        }

        tbody tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        tbody tr:hover {
            background-color: #e8f8ff;
        }

        td, th {
            border: 1px solid #ddd;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header section -->
        <div class="header">
            <div class="user-info">
                <p>Printed by: {{ auth()->user()->name }}</p>
            </div>

        </div>

        <h1>Requisitions Report</h1>

        <!-- Requisitions Table -->
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Order Number</th>
                    <th>Items Count</th>
                    <th>Status</th>
                    <th>Date Needed</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requisitions as $requisition)
                <tr>
                    <td>{{ $requisition->created_at->format('d M Y, h:i A') }}</td>
                    <td>{{ $requisition->order_number }}</td>
                    <td>{{ $requisition->orderItems->count() }} item(s)</td>
                    <td>{{ $requisition->status->name }}</td>
                    <td>{{ $requisition->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer section -->
        <div class="footer">
            <p>Generated on: {{ now()->format('d M Y, h:i A') }}</p>
        </div>
    </div>

</body>
</html>
