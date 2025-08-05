<?php 
include '../core/connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud opcache_get_configuration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <button class="btn btn-primary my-5">
      <a href="student.php" class="text-light">Add new student</a></button>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th> 
            <th scope="col">first_Name</th> 
            <th scope="col">lastt_Name</th> 
             <th scope="col">gender</th>
            <th scope="col">dob</th>
            <th scope="col">email</th> 
            <th scope="col">phone</th>
            <th scope="col">address</th>
            <th scope="col">operations</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $sql="select * from students";
            $result = mysqli_query($conn, $sql);
            if($result){
                
              while ($row =mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $gender = $row['gender'];
                $date_of_birth = $row['date_of_birth'];
                $email = $row['email'];
                $phone = $row['phone'];
                $address = $row['address'];
                
                
                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$first_name.'</td>
                <td>'.$last_name.'</td>
                <td>'.$gender.'</td>
                <td>'.$date_of_birth.'</td>
                <td>'.$email.'</td>
                <td>'.$phone.'</td>
                <td>'.$address.'</td>

                <td>
                <button class="btn btn-primary"><a href="/student/views/student/update.php? updateid='.$id.'" class="text-light">Update</a></button>
                <button class="btn btn-danger"><a href="/student/views/student/delete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
              </td>
              </tr>
                ';
              }
            }

          ?>


        </tbody>
      </table>
  </div>
</body>
</html>