<!DOCTYPE html>
<html>
<head>
    <title>Midtrans Payment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-xxxxxxxxxx"></script>
</head>
<body>
    <h1>Checkout Page</h1>

    <label>Nominal Pembayaran:</label><br>
    <input type="number" id="amount" placeholder="Masukkan jumlah (Rp)" /><br><br>

    <label>Nama:</label><br>
    <input type="text" id="name" value="John Doe" /><br><br>

    <label>Email:</label><br>
    <input type="email" id="email" value="john@example.com" /><br><br>

    <label>No. HP:</label><br>
    <input type="text" id="phone" value="08123456789" /><br><br>

    <button id="pay-button">Bayar Sekarang</button>

    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            const amount = document.getElementById('amount').value;
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;

            if (!amount || amount < 1000) {
                alert('Nominal harus diisi dan minimal Rp 1.000');
                return;
            }

            fetch('/midtrans/checkout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    amount: amount,
                    name: name,
                    email: email,
                    phone: phone
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
