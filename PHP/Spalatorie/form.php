<?php
$host='localhost';
$user='root';
$password='';
$db='spalatorie';
$conection=mysqli_connect($host,$user,$password,$db);
if(!$conection){
    die('Connection failed');
}
//insert data
if(isset($_POST['submit'])){
    $nume_masina=FILTER_INPUT(INPUT_POST,'nume_masina',FILTER_SANITIZE_SPECIAL_CHARS);
    $nr_imatriculare=FILTER_INPUT(INPUT_POST,'nr_imatriculare',FILTER_SANITIZE_SPECIAL_CHARS);
    $telefon=FILTER_INPUT(INPUT_POST,'telefon',FILTER_SANITIZE_NUMBER_INT);
    $tip_spalatorie=FILTER_INPUT(INPUT_POST,'tip_spalatorie',FILTER_SANITIZE_SPECIAL_CHARS);
    $data_programare=FILTER_INPUT(INPUT_POST,'data_programare',FILTER_SANITIZE_NUMBER_INT);
    $ora_programare=FILTER_INPUT(INPUT_POST,'ora_programare',FILTER_SANITIZE_SPECIAL_CHARS);

    if(strlen($nume_masina)>=3 && strlen($nr_imatriculare)>=3 && strlen($telefon)>=3 && strlen($tip_spalatorie)>=3 && strlen($data_programare)>=3 && strlen($ora_programare)>=3){
        $sql="INSERT INTO programare(nume_masina,nr_imatriculare,telefon,tip_spalatorie,data_programare,ora_programare) VALUES ('{$nume_masina}','{$nr_imatriculare}','{$telefon}','{$tip_spalatorie}','{$data_programare}','{$ora_programare}')";
        if(mysqli_query($conection,$sql)){
            echo "<p>Programare reusita!</p>";
        }
        else{
            echo "<p> Something went wrong!</p>"; 
        }
    }
    else{
        echo "<p> Something went wrong!</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROGRAMARE</title>
</head>
<body>
 <h1>PROGRAMEAZATE</h1>
 <br>
<form action="./form.php" method="POST">
    <label for="nume_masina">NUME MASINA</label>
    <br>
    <input type="text" name="nume_masina" id="nume_masina" placeholder="Audi" required>
    <br>
    <label for="nr_imatriculare">NUMAR IMATRICULARE</label><br>
    <input type="text" name="nr_imatriculare" id="nr_imatriculare" placeholder="AAA 000" required>
    <br>
    <label for="telefon">TELEFON</label><br>
    <input type="number" name="telefon"
    id="telefon" placeholder="37368452354" required>
    <br>
    <label for="tip_spalatorie">TIP SPALATORIE</label><br>
    
    <select name="tip_spalatorie" id="tip_spalatorie" required>
        <option value="STANDART">STANDART</option>
        <option value="CEARA">CEARA</option>
        <option value="INTERIOR">INTERIOR</option>
    </select>
    <br>
    <label for="data_programare">DATA PROGRAMARII</label><br>
    <input type="date" name="data_programare"
    id="data_programare" placeholder="20-02-2022" required>
    <br>
    <label for="ora_programare">ORA PROGRAMARII</label><br>
    
    <select name="ora_programare" id="ora_programare" required>
        <option value="8:00">8:00</option>
        <option value="9:00">9:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="12:00">12:00</option>
        <option value="13:00">13:00</option>
        <option value="14:00">14:00</option>
        <option value="15:00">15:00</option>
        <option value="16:00">16:00</option>
    </select>
    <br>
    <br><br>
    <button type="submit" name="submit" value="submit">PROGRAMEAZA</button>
 </form>
</body>
</html>
