<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Auction History Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #444;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Auction History Report</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created By</th>
                <th>End Time</th>
                <th>Winner</th>
            </tr>
        </thead>
        <tbody>
            @foreach($auctions as $auction)
                <tr>
                    <td>{{ $auction->id }}</td>
                    <td>{{ $auction->title }}</td>
                    <td>{{ $auction->user->name ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($auction->end_time)->format('d M, Y H:i') }}</td>
                    <td>{{ $auction->winner->name ?? 'Not Yet Declared' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
