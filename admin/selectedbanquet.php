<?php
session_start();
require('../database/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Page</title>
  <link rel="stylesheet" href="css/adminprofile.css" />
  <!-- Font Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

</style>
</head>
<body>
  <div class="container">
    <nav>
      <div class="side_navbar">
        <span>Main Menu</span>
        <a href="adminprofile.php" class="active">Dashboard</a>
        <a href="newbanquet.php">Banquet Details</a>
         <a href="selectedbanquet.php">User Details</a>
        <a href="logoutadmin.php">Logout</a>
        
      </div>
    </nav><table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query="SELECT * FROM user";
 $result = mysqli_query($conn, $query);
 $data=mysqli_num_rows($result);

  if($data>0){
   while($row=mysqli_fetch_array($result)){
?>

    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['contact'] ?></td>
      <td><button style="color:red" class="blockButton" data-userid="<?php echo $row['id'] ?>">Block</button></td>
    </tr>
  </tbody>
  <?php
 }
}
?>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.blockButton').click(function() {
            var userId = $(this).data('userid');
            blockUser(userId);
        });

        function blockUser(userId) {
            $.ajax({
                type: "POST",
                url: 'blockuser.php', 
                data: {
                    userId: userId
                },
                success: function(response) {
                    alert(response);
                    
                },
                error: function() {
                    alert("Error blocking the user.");
                }
            });
        }
    });
</script>

</body>
</html>
