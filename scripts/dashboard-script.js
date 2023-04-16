window.onload = function() {
    var canvas = document.getElementById("popular-piechart");
    var context = canvas.getContext("2d");

    // Data for the pie chart
    var data = [40, 25, 15, 20];
    var names = ["Item 1", "Item 2", "Item 3", "Item 4"];

    // Colors for the pie chart
    var colors = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0"];

    // Calculate the total value of the data
    var total = 0;
    for (var i = 0; i < data.length; i++) {
        total += data[i];
    }

    // Draw the pie chart
    var startAngle = 0;
    for (var i = 0; i < data.length; i++) {
        var sliceAngle = 2 * Math.PI * data[i] / total;
        context.fillStyle = colors[i];
        context.beginPath();
        context.moveTo(canvas.width / 2, canvas.height / 2);
        context.arc(canvas.width / 2, canvas.height / 2, canvas.height / 2, startAngle, startAngle + sliceAngle);
        context.closePath();
        context.fill();

        // Add names to the pie chart
        context.fillStyle = "#ffffff";
        context.font = "10px Arial";
        var midAngle = startAngle + sliceAngle / 2;
        var textX = canvas.width / 2 + Math.cos(midAngle) * canvas.height / 2 / 2;
        var textY = canvas.height / 2 + Math.sin(midAngle) * canvas.height / 2 / 2;
        context.fillText(names[i], textX, textY);

        startAngle += sliceAngle;
    }
}