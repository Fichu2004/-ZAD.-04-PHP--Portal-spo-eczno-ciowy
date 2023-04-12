<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Panel administratora</title>
</head>
<body>
    <div class="baner"><h3>Portal Społecznościowy-panel administratora</h3>
    <div class="lewy">
    <h4>Użytkownicy</h4>
    <?php

$con = new mysqli("127.0.0.1","root","","dane4");
$res1 = ("SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby limit 30");
$cos1 = mysqli_query($con, $res1);
while($wiersz1=mysqli_fetch_array($cos1)){
    $wiek = 2023 - $wiersz1[3];
    echo "$wiersz1[0]. $wiersz1[1] $wiersz1[2], $wiek lat <br>";
}
?>
<a href="setting.html">Inne ustawienia</a>
</div>
<div class="prawy">
<h4> Podaj id użytkownika </h4>
<br>
<form action="users.php" method="post">
    <input type="number" name="id">
    <input type="submit" value="ZOBACZ">
</form>
<br>
<hr>
<?php
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $res2 = "SELECT osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM osoby, hobby WHERE osoby.Hobby_id=hobby.id AND osoby.id = $id";
        $wynik2 = mysqli_query($con, $res2);
        $wiersz2=mysqli_fetch_array($wynik2);
        echo "<h2>$id. $wiersz2[0] $wiersz2[1]</h2>";
        echo "<img src='$wiersz2[4]' alt='$id'>";
        echo "<p>Rok urodzenia: $wiersz2[2]</p>";
        echo "<p>Opis: $wiersz2[3]</p>";
        echo "<p>Hobby: $wiersz2[5]</p>";
    }
    mysqli_close($con);
?>
</div>
<div class="stopka">
Stronę wykonał: Kacper Kamiński
</div>
</body>
</html>
