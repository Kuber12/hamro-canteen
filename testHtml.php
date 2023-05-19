<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button>click me</button>
    <script src="./scripts/jquery.js"> </script>
    <script>

            $(document).ready(function() {
            $.ajax({
                url: 'test.php',
                type: 'GET',
                success: function(response) {
                var value1 =response.echo1;
                console.log(value1);
                },
               
            });
            });
    </script>
    
</body>
</html>