<!DOCTYPE html>
<html>
<head>
    <title>Auction Report</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Auction Report</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Auction Title</th>
                <th>User</th>
                <th>Highest Bid</th>
            </tr>
        </thead>
        <tbody>
            @foreach($auctions as $auction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $auction->title }}</td>
                    <td>{{ $auction->user->name ?? 'N/A' }}</td>
                    <td>{{ $auction->bids->max('amount') ?? 'No Bids' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
