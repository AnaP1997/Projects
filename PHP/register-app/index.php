<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="./results.php" method="POST">
        <label for="fullname">Fullname</label>
<input type="text" name="fullname"
placeholder="Mike Wazowski" required>
<label for="age">Age</label>
<input type="number" name="age" id="age" placeholder="20" required>
<input type="email" name="email" id="email" placeholder="exaple@email.com" required>


<br>
<h4>Select your interests</h4>

<input type="checkbox" name="interests[]" id="programming" value="programming">
<label for="programming">Programming</label>
<br>
<input type="checkbox" name="interests[]" id="gaming" value="gaming">
<label for="gaming">Gaming</label>
<br>
<input type="checkbox" name="interests[]" id="sport" value="sport">
<label for="sport">Sport</label>
<br>
<input type="checkbox" name="interests[]" id="cars" value="cars">
<label for="cars">Cars</label>
<br>
<input type="checkbox" name="interests[]" id="cooking" value="cooking">
<label for="coocking">Cooking</label>
<br>

<p>Genul:</p>
<input type="radio" name="gender" id="male" value="male">
<label for="male">Male</label>
<br>
<input type="radio" name="gender" id="female" value="female">
<label for="female">Female</label>

<br>
<p>Statut:</p>
<select name="status" id="status">
    <option value="red">RED</option>
    <option value="blue">BLUE</option>
    <option value="green">GREEN</option>
</select>
<br>
<p>Your Message:</p>
<textarea name="mess" id="mess" cols="20" rows="5"></textarea>
<br>
<button type="submit" name="submit" value="submit">Send</button>

    </form>
    <script>
        if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
        }
    </script>
</body>
</html>