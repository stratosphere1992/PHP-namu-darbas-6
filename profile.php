<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<h1>That's me</h1>

<p>&#128512;</p>

<?php

if(isset($_COOKIE['name'])) {
    echo '<a href="index.php"><button>Atsijungti</button></a>';
}

?>

</body>
</html>