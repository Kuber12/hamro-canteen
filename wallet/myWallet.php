<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        #walletInfo {
            margin-top: 20px;
        }

        #toggleButton {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Transaction History</h2>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#toggleButton").click(function(){
                var totalAmountSpan = $("#totalAmount");
                if (totalAmountSpan.is(":visible")) {
                    totalAmountSpan.hide();
                    totalAmountSpan.text("XXXX");
                } else {
                    totalAmountSpan.show();
                    totalAmountSpan.text("<?php echo $totalAmount; ?>");
                }
            });
        });
    </script>

</body>
</html>
