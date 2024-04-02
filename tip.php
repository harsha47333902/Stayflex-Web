<?php
include "includes/header.php";
?>



    <title>Tip Calculator</title>
    <style>
        /* Your existing CSS styles here */
        
    
        h1 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        button.clear {
            background-color: #dc3545;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            background-color: #f3f3f3;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        /* Style for the image */
        .image-container {
            text-align: left;
        }
        .image-container img {
            max-width: 5%;
            height: auto;
        }
    </style>
</head>
<body>


    <div class="container">
    <h1> Tip Calculator</h1>
        <form>
            <div class="form-group">
                <label for="billAmount">Bill Amount</label>
                <input type="number" id="billAmount" step="0.01" placeholder="Enter the bill amount">
            </div>
            <div class="form-group">
                <label for="tipPercentage">Tip Percentage</label>
                <select id="tipPercentage">
                    <option value="0.10">10%</option>
                    <option value="0.15">15%</option>
                    <option value="0.20">20%</option>
                    <option value="0.25">25%</option>
                    <option value="0.30">30%</option>
                </select>
            </div>
            <div class="form-group">
                <label for="split">Split Among</label>
                <input type="number" id="split" step="1" placeholder="Number of persons">
            </div>
            <button type="button" id="calculateButton">Calculate Tip</button>
            <button type="button" class="clear" id="clearButton">Clear</button>
        </form>
        <div class="result" id="tipResult"></div>
    </div>

    <script>
        document.getElementById("calculateButton").addEventListener("click", function() {
            calculateTip();
        });

        document.getElementById("clearButton").addEventListener("click", function() {
            clearForm();
        });

        function calculateTip() {
            const billAmount = parseFloat(document.getElementById("billAmount").value);
            const tipPercentage = parseFloat(document.getElementById("tipPercentage").value);
            const split = parseFloat(document.getElementById("split").value);

            if (billAmount <= 0 || split <= 0) {
                alert("Bill amount and split value must be greater than 0.");
                return;
            }

            const tipAmount = (billAmount * tipPercentage) / split;
            const totalAmount = (billAmount / split) + tipAmount;
            const totalBill = billAmount + (billAmount * tipPercentage);

            document.getElementById("tipResult").innerHTML = `Tip Amount per person: $${tipAmount.toFixed(2)}<br>Total Bill per person: $${totalAmount.toFixed(2)}<br>Total Bill (including tip): $${totalBill.toFixed(2)}`;
        }

        function clearForm() {
            document.getElementById("billAmount").value = "";
            document.getElementById("tipPercentage").value = "0.10";
            document.getElementById("split").value = "";
            document.getElementById("tipResult").innerHTML = "";
        }
    </script>
</body>
</html>
