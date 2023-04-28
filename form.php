<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form{
        border:1px solid black;
        padding:20px;
        width:300px;
    }

    .flex{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom:10px;
    }
</style>

<body>
  <div class="form">
    <form action="trash.php" method="POST">
        <div class="flex"> <label for="Id">Id</label>
            <input type="number" name="id"  max="3"  />
        </div>

        <div class="flex">
            <label for="name">Name:</label>
            <input type="text" name="name" />
        </div>
        <div class="flex">
            <label for="age">Age:</label>
            <input type="number" name="age"  max="2"/>
        </div>
        <div class="flex">
            <label for="email">Email:</label>
            <input type="email" name="email" />
        </div>
        <div class="flex">
            <label for="phone">Phone:</label>
            <input type="numebr" name="phone"  maxlength="2" />
        </div>

    </form>
</div>

   

</body>

</html>