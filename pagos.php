<!DOCTYPE html>
<html>
<head>
    <title>Pagos Parking</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .calculator {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 20px;
        }
        .calculator .input-group {
            width: 100%;
            margin: 5px 0;
        }
        .calculator .input-group input[type="text"] {
            width: calc(100% - 70px);
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            text-align: right;
            margin-right: 10px;
            background-color: #fff;
            color: #000;
        }
        .calculator .keyboard {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .calculator .keyboard button {
            width: 70px;
            height: 40px;
            margin: 5px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .calculator .keyboard button:hover {
            background-color: #45a049;
        }
        .payment-methods {
            text-align: center;
            margin-bottom: 20px;
        }
        .payment-methods input[type="radio"] {
            display: none;
        }
        .payment-methods label {
            display: inline-block;
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 10px 20px;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        .payment-methods label:hover {
            background-color: #f2f2f2;
        }
        .payment-methods input[type="radio"]:checked + label {
            background-color: #4CAF50;
            color: #fff;
            border-color: #4CAF50;
        }
        .btn-pay {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn-pay:hover {
            background-color: #45a049;
        }
        .payment-success {
            text-align: center;
            color: #4CAF50;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pagos Parking</h2>

        <div class="calculator">
            <div class="input-group">
                <span>$</span>
                <input type="text" id="amount" name="amount" value="0.00" readonly>
            </div>
            <div class="keyboard">
                <button onclick="appendNumber('1')">1</button>
                <button onclick="appendNumber('2')">2</button>
                <button onclick="appendNumber('3')">3</button>
                <button onclick="appendNumber('4')">4</button>
                <button onclick="appendNumber('5')">5</button>
                <button onclick="appendNumber('6')">6</button>
                <button onclick="appendNumber('7')">7</button>
                <button onclick="appendNumber('8')">8</button>
                <button onclick="appendNumber('9')">9</button>
                <button onclick="appendNumber('0')">0</button>
                <button onclick="appendDecimal()">.</button>
                <button onclick="clearInput()">C</button>
            </div>
        </div>

        <div class="payment-methods">
            <input type="radio" id="cash" name="payment_method">
            <label for="cash">Efectivo</label>

            <input type="radio" id="card" name="payment_method">
            <label for="card">Tarjeta</label>
        </div>

        <button class="btn-pay" onclick="showSuccessMessage()">Pagar</button>

        <div class="payment-success" id="payment-success" style="display: none;">Pago exitoso</div>
    </div>

    <script>
        function appendNumber(number) {
            var amount = document.getElementById('amount').value;
            if (amount === '0.00') {
                document.getElementById('amount').value = number;
            } else {
                document.getElementById('amount').value += number;
            }
        }

        function appendDecimal() {
            var amount = document.getElementById('amount').value;
            if (!amount.includes('.')) {
                document.getElementById('amount').value += '.';
            }
        }

        function clearInput() {
            document.getElementById('amount').value = '0.00';
        }

        function showSuccessMessage() {
            document.getElementById('payment-success').style.display = 'block';
        }
    </script>
</body>
</html>
