<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add User Data</title>
</head>
<body bgcolor="lightgrey">
    <br><br>
    <div align = "center"  class="box">
    <form action="result.php", method="post" align="center" >
        <h2>Student Information</h2>
        Name: <input type="text" id="name" name="name" required><br>
        Age: <input type="number" id="age" name="age" required><br>
        Gender: <input type="radio" id="gender" name="gender" value="Male">Male
                <input type="radio" id="gender" name="gender" value="Female">Female
                <input type="radio" id="gender" name="gender" value="Other">Other 
                <br>
        Date of Birth: <input type="date" id="dob" name="dob"><br><br>
        
        <h2>Guardian Information</h2><br>
        Guardian Name: <input type="text" id="guardianname" name="guardianname"><br>
        Relatation: <input type="text" id="relation" name="relation"><br>
        contact Info: <input type="number" id="contactinfo" name="contactinfo"><br>

        <input type="submit" id="add" value="Add" class="add">

    </form>
    </div>

  
    
</body>
</html>