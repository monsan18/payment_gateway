<!DOCTYPE html>
<html>
<head>
    <title>Midtrans Payment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Mid-client-ZJRrwO--xxf40P5B"></script>
</head>
<body>
    <h1>Checkout Page</h1>
    <button id="pay-button">Pay Now</button>

    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            fetch('/midtrans/checkout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    amount: 10000,
                    name: 'John Doe',
                    email: 'john@example.com',
                    phone: '08123456789'
                })
            })
            .then(res => res.json())
            .then(data => {
                window.snap.pay(data.token);
            });
        });
    </script>
</body>
</html>