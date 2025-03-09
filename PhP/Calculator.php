<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Scientific Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator-container {
            position: relative;
            max-width: 400px;
            width: 100%;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            box-sizing: border-box;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #ff4d4d;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 18px;
            cursor: pointer;
        }

        .close-button:hover {
            background: #e60000;
        }

        .calculator .display {
            width: 100%;
            height: 60px;
            background: #222;
            color: #fff;
            font-size: 24px;
            text-align: right;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .calculator .buttons {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .calculator .buttons button {
            height: 50px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .calculator .buttons button:hover {
            background: #0056b3;
        }

        .calculator .buttons .equal {
            grid-column: span 2;
            background: #28a745;
        }

        .calculator .buttons .equal:hover {
            background: #218838;
        }

        .calculator .buttons .clear {
            background: #dc3545;
        }

        .calculator .buttons .clear:hover {
            background: #c82333;
        }

        @media (max-width: 768px) {
            .calculator .buttons button {
                font-size: 12px;
            }
        }
        @media (max-width: 480px) {
            .calculator .display {
                font-size: 18px;
                height: 50px;
            }

            .calculator .buttons button {
                font-size: 10px;
                height: 40px;
                padding: 5px;
            }

            .calculator-container {
                max-width: 320px;
                padding: 15px;
            }
        }

        @media (max-width: 360px) {
            .calculator .display {
                font-size: 16px;
                height: 45px;
            }

            .calculator .buttons button {
                font-size: 9px;
                height: 35px;
                padding: 4px;
            }

            .calculator-container {
                max-width: 300px;
                padding: 10px;
            }
        }

    </style>
</head>
<body>
    <div class="calculator-container">
        <button class="close-button" onclick="closeCalculator()">❌</button>
        <div class="calculator">
            <div class="display" id="display">0</div>
            <div class="buttons">
                <button onclick="clearDisplay()" class="clear">C</button>
                <button onclick="appendOperator('/')">/</button>
                <button onclick="appendOperator('*')">*</button>
                <button onclick="deleteLast()">DEL</button>
                <button onclick="appendFunction('sqrt')">√</button>
                <button onclick="appendNumber('7')">7</button>
                <button onclick="appendNumber('8')">8</button>
                <button onclick="appendNumber('9')">9</button>
                <button onclick="appendOperator('-')">-</button>
                <button onclick="appendFunction('log')">log</button>
                <button onclick="appendNumber('4')">4</button>
                <button onclick="appendNumber('5')">5</button>
                <button onclick="appendNumber('6')">6</button>
                <button onclick="appendOperator('+')">+</button>
                <button onclick="appendFunction('sin')">sin</button>
                <button onclick="appendNumber('1')">1</button>
                <button onclick="appendNumber('2')">2</button>
                <button onclick="appendNumber('3')">3</button>
                <button onclick="appendFunction('cos')">cos</button>
                <button onclick="appendNumber('0')">0</button>
                <button onclick="appendNumber('.')">.</button>
                <button onclick="appendFunction('tan')">tan</button>
                <button onclick="calculate()" class="equal">=</button>
                <button onclick="appendFunction('factorial')">x!</button>
                <button onclick="appendOperator('**')">^</button>
                <button onclick="appendFunction('exp')">exp</button>
                <button onclick="appendFunction('pi')">π</button>
            </div>
        </div>
    </div>

    <script>
        let display = document.getElementById('display');

        function appendNumber(number) {
            if (display.innerText === '0') {
                display.innerText = number;
            } else {
                display.innerText += number;
            }
        }

        function appendOperator(operator) {
            let lastChar = display.innerText.slice(-1);
            if (!['+', '-', '*', '/', '**'].includes(lastChar)) {
                display.innerText += operator;
            }
        }

        function appendFunction(func) {
            if (func === 'sqrt') {
                display.innerText = Math.sqrt(eval(display.innerText));
            } else if (func === 'log') {
                display.innerText = Math.log10(eval(display.innerText));
            } else if (func === 'sin') {
                display.innerText = Math.sin(toRadians(eval(display.innerText)));
            } else if (func === 'cos') {
                display.innerText = Math.cos(toRadians(eval(display.innerText)));
            } else if (func === 'tan') {
                display.innerText = Math.tan(toRadians(eval(display.innerText)));
            } else if (func === 'factorial') {
                display.innerText = factorial(eval(display.innerText));
            } else if (func === 'exp') {
                display.innerText = Math.exp(eval(display.innerText));
            } else if (func === 'pi') {
                display.innerText = Math.PI.toFixed(8);
            }
        }

        function toRadians(degrees) {
            return degrees * (Math.PI / 180);
        }

        function factorial(num) {
            if (num === 0 || num === 1) return 1;
            return num * factorial(num - 1);
        }

        function clearDisplay() {
            display.innerText = '0';
        }

        function deleteLast() {
            if (display.innerText.length > 1) {
                display.innerText = display.innerText.slice(0, -1);
            } else {
                display.innerText = '0';
            }
        }

        function calculate() {
            try {
                display.innerText = eval(display.innerText);
            } catch (e) {
                display.innerText = 'Error';
            }
        }

        function closeCalculator() {
            document.querySelector('.calculator-container').style.display = 'none';
        }
    </script>
</body>
</html>
