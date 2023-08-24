<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
This is user test page
<button id="btn" onclick ="show()">Click me</button>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function show(){
    Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
  }
// window.addEventListner('load', function(){
//   alert("Hello");
//   swal("login");
// })

</script>
  
</body>
</html>