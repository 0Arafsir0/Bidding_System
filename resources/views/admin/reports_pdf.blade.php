<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Auction Report PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Admin Auction Report</h1>

    <h3>Auctions</h3>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Created By</th>
                <th>Winner</th>
            </tr>
        </thead>
        <tbody>
            @foreach($auctions as $auction)
                <tr>
                    <td>{{ $auction->title }}</td>
                    <td>{{ $auction->user->name ?? 'N/A' }}</td>
                    <td>{{ $auction->winner->name ?? 'Pending' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Bids</h3>
    <table>
        <thead>
            <tr>
                <th>Auction</th>
                <th>User</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bids as $bid)
                <tr>
                    <td>{{ $bid->auction->title }}</td>
                    <td>{{ $bid->user->name }}</td>
                    <td>৳{{ number_format($bid->amount) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Users</h3>
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} ({{ $user->email }})</li>
        @endforeach
    </ul>

</body>
</html>
