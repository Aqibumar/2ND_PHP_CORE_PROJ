<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<form method="get" action="" align="center" >
<div style="color: red;"><h6>Are you sure you want to delete this Data</h6></div>
<input type="submit" name="submit" value="Delete Anyways">
<input type="Hidden" name="id" value="<?php echo htmlspecialchars($row['id'])?>"> <br> 
  </form>
<?php
} else {  
    echo "Error or no results";
}

if (isset($_GET['submit'])
&& isset($_GET['id'])
) {
    echo "<hr><br><br>";
    echo "<div align='center'>";
    echo   "<font size='5'>";
    echo "ID: ". htmlspecialchars($_GET['id'])."<br>";
    echo "DATA HAS BEEN DELETED SUCCESSFULLY"."<br>";    
    "</font>";
    "</div>";

    mysqli_query($conn, "DELETE FROM students
                         where students.id = '".$_GET['id']."'");
}
?>

</body>
</html>