<?php
$pdo = new PDO("mysql:host=localhost;dbname=class-7", "root", "");
$id = $_GET['id'];
//Show Data (Read)
$getSql = "SELECT * FROM mobiles WHERE id=$id";
$getStatement = $pdo->prepare($getSql);
$getStatement->execute();
$results = $getStatement->fetchAll();
//End show data
//Update
if (isset($_POST['submit'])){
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $ram = $_POST['ram'];
    $camera = $_POST['camera'];
    $upSql = "UPDATE mobiles SET brand='$brand', price='$price', ram='$ram', camera='$camera' WHERE id='$id'";
    $delStatement = $pdo->prepare($upSql);
    $delStatement->execute();
    header("location:index.php");
}
//End update
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>


<?php foreach ($results as $result) {?>
<form action="" method="POST">
    <input type="text" name="brand" value="<?php echo $result['brand']?>">
    <input type="text" name="price" value="<?php echo $result['price']?>">
    <input type="text" name="ram" value="<?php echo $result['ram']?>">
    <input type="text" name="camera" value="<?php echo $result['camera']?>">
    <input type="submit" name="submit" value="Update">
</form>
<?php  }?>
</body>
</html>