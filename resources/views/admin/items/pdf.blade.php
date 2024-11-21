<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Report</title>
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
            background-color:navy; /* Navy blue */
            padding: 8px 0;
            font-size: 20px;
        }

        .container {
            padding: 15px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .header .user-info {
            font-size: 12px;
            color: #555;
        }

        .header .unique-code {
            font-size: 12px;
            font-weight: bold;
            color: #001f3d; /* Navy blue */
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
            background-color:navy; /* Navy blue */
            color: #fff;
        }

        th, td {
            padding: 10px 12px;
            text-align: left;
            font-size: 12px;
        }

        th {
            font-weight: 500;
            text-transform: uppercase;
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
            margin-top: 25px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table {
                font-size: 10px;
            }

            h1 {
                font-size: 18px;
            }

            .header .user-info,
            .header .unique-code {
                font-size: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header section -->
        <div class="header">
            <div class="user-info">
                <p>Printed by: {{ $user_name }}</p>
            </div>

        </div>

        <h1>Items Report</h1>

        <!-- Items Table -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Unique Code</th>
                    <th>Reorder Level</th>
                    <th>Manufacturer Code</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->unique_code }}</td>
                    <td>{{ $item->reorder_level }}</td>
                    <td>{{ $item->manufacturer_code }}</td>
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
