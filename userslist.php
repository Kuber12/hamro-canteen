<!DOCTYPE html>
<html>
<head>
    <title>Countdown</title>
    <script>
        // Function to start the countdown
        function startCountdown() {
            var count = 59; // Set the initial countdown value
            
            // Display the countdown every second
            var countdownInterval = setInterval(function() {
                // Display the countdown value
                document.getElementById("countdown").innerHTML = count + " seconds remaining";
                
                // Decrease the countdown value by 1
                count--;
                
                // Check if the countdown has reached 0
                if (count < 0) {
                    clearInterval(countdownInterval); // Stop the countdown
                    document.getElementById("countdown").textContent = "Countdown complete!";
                }
            }, 1000); // Update the countdown every 1 second
        }
    </script>
</head>
<body>
    <h1>Countdown</h1>
    <div id="countdown"></div>
    
    <button onclick="startCountdown()">Start Countdown</button>
</body>
</html>
