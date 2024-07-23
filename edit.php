<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body align='center' bgcolor="lightgrey">

<?php
include "connection.php";

// Check if student_id is set, otherwise default to 1
$student_id = $_GET['student_id'];

// Sanitize the student_id to prevent SQL injection
$student_id = $conn->real_escape_string($student_id);

// Example query
$sql = "SELECT * FROM students WHERE id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    // Output data of each row
    $row = $result->fetch_assoc();
    echo "<div align='center'>";
    echo   "<font size='5'>";
    echo ('ID: ');echo $row['id'] . "<br>";
    echo ('Student Name: ');echo $row['name'] . "<br>";
    echo ('Student Age: '); echo $row ['age'] . "<br>";
    echo ('Date OF Birth: ');echo $row['dob'] . "<br>";
    echo ('Gender: '); echo $row ['gender'] . "<br>";
    echo ('Guardian Name: ');echo $row['guardianname'] . "<br>";
    echo ('Relation: '); echo $row ['relationship'] . "<br>";
    echo ('Contact Info: ');echo $row['contactinfo'] . "<br>";
"</font>";
"</div>";

?>
<div class='box' style="margin-top: 20px;">
<form method="get" action="" align="center"> 
<h3>Student Information</h3> 
<input type="Hidden" name="id" value="<?php echo htmlspecialchars($row['id'])?>"> <br> 
Name: <input type="text"  name="name" value="<?php echo htmlspecialchars($row['name'])?>"> <br> 
Age: <input type="number" name="age"value="<?php echo htmlspecialchars($row['age'])?>"> <br> 
Gender: <?php echo htmlspecialchars($row['gender'])?>
 <input type="radio"  name="gender"<?php if($row['gender'] == "Male") { echo "checked"; }?> value="Male">Male
 <input type="radio"  name="gender"<?php if($row['gender'] == "Female") { echo "checked"; }?> value="Female">Female 
 <input type="radio"  name="gender"<?php if($row['gender'] == "Other") { echo "checked"; }?> value="Other">Other <br>
  Date of Birth: <input type="date"name="dob"value="<?php echo htmlspecialchars($row['dob'])?>"> <br><br>
  <h3>Guardian Information</h3>
 Guardian Name: <input type="text"  name="guardianname"value="<?php echo htmlspecialchars($row['guardianname'])?>"> <br>
 Relatation: <input type="text"  name="relation"value="<?php echo htmlspecialchars($row['relationship'])?>"> <br> 
 contact Info: <input type="number"  name="contactinfo"value="<?php echo htmlspecialchars($row['contactinfo'])?>"><br><br>
  <input type="submit" name="submit" value="Update"> 
</form>
</div>
<?php
} else {  
    echo "Error or no results";
}

if (isset($_GET['submit']) && isset($_GET['name']) 
&& isset($_GET['age'])
&& isset($_GET['dob'])
&& isset($_GET['gender'])
&& isset($_GET['guardianname'])
&& isset($_GET['relation'])
&& isset($_GET['contactinfo'])
&& isset($_GET['id'])
) {
    echo "<hr><br><br>";
    echo "<div align='center'>";
    echo   "<font size='5'>";
    echo "ID: ". htmlspecialchars($_GET['id'])."<br>";
    echo "Name: " . htmlspecialchars($_GET['name'])."<br>";
    echo "Age: " . htmlspecialchars($_GET['age'])."<br>";
    echo "Date OF Birth: " . htmlspecialchars($_GET['dob'])."<br>";
    echo "Gender: " . htmlspecialchars($_GET['gender'])."<br>";
    echo "Guardian Name: " . htmlspecialchars($_GET['guardianname'])."<br>";
    echo "Relation: ". htmlspecialchars($_GET['relation'])."<br>";
    echo "Contact Info: ". htmlspecialchars($_GET['contactinfo'])."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<hr>";
    echo "DATA HAS BEEN UPDATED SUCCESSFULLY"."<br>";    
    "</font>";
    "</div>";

    mysqli_query($conn, "update students set 
    name = '" . $_GET['name']. "',
    age = '" . $_GET['age']. "',
    dob = '" . $_GET['dob']. "',
    gender = '" . $_GET['gender']. "',
    guardianname = '" . $_GET['guardianname']. "',
    relationship = '" . $_GET['relation']. "',
    contactinfo = '" . $_GET['contactinfo']. "',
    id = '" . $_GET['id']. "'
                         where students.id = '".$_GET['id']."'");
}
?>

</body>
</html>