<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify User</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #verify_user {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .title {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #error {
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div id="verify_user">
        <form id='verify' >
            <h2 class='title'>First, Verify It's You</h2>
            <label for='password'>Enter Your Password</label><br>
            <input type='password' id='password' name='password' maxlength="12" required>
            <input type="submit" id='submit' value='Submit'>
        </form> 
        <div id='error'></div>
    </div>
        
    <script src="./javaScript/validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
$(document).ready(function() {
    $('#verify').on('submit', function(event) {
        // Prevent the form from submitting normally
        event.preventDefault();

        // Get the form data
        var formData = $(this).serialize();

        // Send the data via AJAX
        $.ajax({
            type: 'POST',
            url: './php/authentication.php',
            data: formData,
            dataType: 'json',

            success: function(response) {
                // Check if response.success is true
                if (response=="success") {
               
                    $.ajax({
                        type: 'POST',
                        url: './php/deposite.php',
                        dataType: 'json',

                        success: function(response) {
                            if (response == "success") {
                                Swal.fire(
                                    'Done!',
                                    'Item added successfully!',
                                    'success'
                                ).then(() => {
                                    window.location = "depositeForm.php";
                                });
                            } else {
                                alert(response);
                            }
                        }
                    });
                } else {
                    alert(response);
                }
            }
        });
    });
});


    </script>

</body>
</html>
