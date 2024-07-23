<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
</head>
<body>

<font size='5px'>
    <?php
    echo "<div align='center' fontsize='5px'>".'<br>';
        echo ('Student Inforamation') .'<br>'.'<br>';
        echo ('Student Name: '); echo $_POST['name'].'<br>';
        echo ('Student Age: '); echo $_POST['age'].'<br>';
        echo ('Student Gender: '); echo $_POST['gender'].'<br>';
        echo ('Student DOB: '); echo $_POST['dob'].'<br>'.'<br>';
        echo ('Guardian Inforamation: ') .'<br>'.'<br>';
        echo ('Guardian Name: '); echo $_POST['guardianname'].'<br>';
        echo ('Relation: '); echo $_POST['relation'].'<br>';
        echo ('Contact Info: '); echo $_POST['contactinfo'];

     "</div>";

     include 'connection.php';
     mysqli_query($conn, "insert Into students(name,age,gender,guardianname,relationship,contactinfo,dob)
      values(
      '".$_POST['name']."',
         $_POST[age],
      '".$_POST['gender']."',
      '".$_POST['guardianname']."',
      '".$_POST['relation']."',
      '".$_POST['contactinfo']."',
      '".$_POST['dob']."'
      )") ;


      if (mysqli_query($conn, $sql)) {
          echo "Record Added successfully.";
      } else {
          echo "Failed to add record: " . mysqli_error($conn);
      }
          
          ?>

      ?>

</font>

    
</body>
</html>