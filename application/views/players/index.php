<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sports Player Lookup</title>
</head>
<body>
    <div id="container">
        <form action="players/show" method="post">
            <h3>Search Users</h3>
            <input type="text" name="name" placeholder="Player's Name">
<?php       foreach($genders as $gender){
?>
            <label>
                <input type="checkbox" name="gender<?= $gender["id"] ?>" value="<?= $gender["name"] ?>"><?= ucfirst($gender["name"]) ?>
            </label>   
<?php       }
?>
            <h3>Sports</h3>
<?php       foreach($sports as $sport){
?>
            <label>
                <input type="checkbox" name="sport<?= $sport["id"] ?>" value="<?= $sport["name"] ?>"><?= ucfirst($sport["name"]) ?>
            </label>
<?php       }
?>
            <input type="submit">
        </form>
        <div id="results">
<?php       foreach($players as $player){
?>
            <span>
                <img src="<?= $player["image"] ?>" alt="A player named <?= $player["name"] ?>">
                <p><?= $player["name"] ?></p>
            </span>
<?php       }
?>
        </div>
    </div>
</body>
</html>