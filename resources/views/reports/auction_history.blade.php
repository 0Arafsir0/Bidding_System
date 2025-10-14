<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Auction History Report</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
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
                <th>Highest Bid</th>
                <th>Winner</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($auctions as $auction)
                <tr>
                    <td>{{ $auction->id }}</td>
                    <td>{{ $auction->title }}</td>
                    <td>{{ $auction->user->name ?? 'N/A' }}</td>
                    <td>{{ $auction->bids->max('amount') ?? '0' }}</td>
                    <td>{{ $auction->winner->name ?? 'N/A' }}</td>
                    <td>{{ $auction->end_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
