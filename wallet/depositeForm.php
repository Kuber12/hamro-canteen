<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet Deposit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        h2{
            text-align:center;
        }
    </style>
</head>
<body>

    <h2>Deposit Money into Your Wallet</h2>

    <form id="depositForm" action="./php/validation.php" method="post" onsubmit="return validateForm()">

     

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" placeholder="Enter the amount to deposit" required>
      

        <button type="submit" >Deposit</button>
    </form>
    
    <script src="./javaScript/validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
      
        
    </script>
    
</body>
</html>
