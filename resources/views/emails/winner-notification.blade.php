<!DOCTYPE html>
<html>
<body>
    <h2>🎉 Congratulations {{ $bid->user->name }}!</h2>
    <p>You have won the auction: <strong>{{ $bid->auction->title }}</strong></p>
    <p>Winning Amount: ${{ number_format($bid->amount, 2) }}</p>
    <p>Please complete your payment to confirm your purchase.</p>
    <hr>
    <small>Thank you for using our Auction System!</small>
</body>
</html>
