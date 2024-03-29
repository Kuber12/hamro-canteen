<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Canteen</title>
    <!-- fav icon -->
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <!-- font awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- nomalize css -->
    <link rel="stylesheet" href="./styles/normalize.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/style.css">
    <!-- jquery link -->
    <script src="./scripts/jquery.js"></script>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
    <!-- progressive web app -->
    <!-- <link rel="manifest" href="manifest.json"> -->
</head>
<!-- <script>
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker.register('/tt/hamro-canteen/service-worker.js')
        .then(registration => {
          console.log('Service Worker registered!', registration);
        })
        .catch(error => {
          console.error('Error registering Service Worker:', error);
        });
    });
  }
</script> -->

<body>
    <div class="blocker" id="blocker" onclick="closePopup();" ></div>
    <div class="container">