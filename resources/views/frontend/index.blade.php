<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .submit-btn {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
        .info-field {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Transaction Form</h2>
    <div class="info-field">
        <p><strong>Current Balance:</strong> <span id="current_balance">{{ $balance }}</span></p>
        <p><strong>Last Transaction:</strong> <span id="last_transaction">{{ $lastTx }}</span></p>
        <p><strong>Fees:</strong> <span id="fees">{{ $fee }}</span></p>
    </div>

    <form action="{{ route('transaction.withdraw') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" id="user_id" name="user_id" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" step="1" required>
        </div>
        <button type="submit" class="submit-btn">Submit</button>
    </form>
</div>

<script>
    // Remove mock data and use variables passed from controller
    document.getElementById('current_balance').innerText = '$' + {{ $balance }};
    document.getElementById('last_transaction').innerText = '$' + {{ $lastTx }};
    document.getElementById('current_balance').innerText = '$' + {{ $balance }};
    
</script>

</body>
</html>
