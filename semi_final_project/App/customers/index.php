<?php



include_once '../../shared/head.php';
 include_once '../../shared/navbar.php';

 require_once '../../config/config.php';
 require_once '../../config/functions.php';

 //function show($conn)
//{
 $select="SELECT * FROM customers";
 $data = mysqli_query($conn, $select);
 //return $data;
//}
//$data=show($conn);
//print_r($data);



 if(isset($_POST['btn2']) && isset($_POST['customer_id'])) {
    $id = $_POST['customer_id'];
    $delete = "DELETE FROM customers WHERE customer_id = $id";
    $delete = mysqli_query($conn, $delete);
    Redirect('customers/index.php');
    


  
}
//$data=show($conn);

if (isset($_POST["search"])) {
    // Sanitize and store the search query
    $searchQuery = mysqli_real_escape_string($conn, $_POST["search"]);

    // Execute the search query (you'll need to adapt this to your database schema)
    $sql = "SELECT * FROM customers WHERE customer_name LIKE '%$searchQuery%' OR customer_email LIKE '%$searchQuery%'";
    $results = mysqli_query($conn, $sql);

    // Display search results
    if ($results) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo $row['customer_name'] . " " . $row['customer_email'] . "<
            ";
            }
      
    } else {
        echo "No results found";
    }
}


 $count=1;
?>

<!-- Search Form -->
<div class="container d-flex justify-content-center align-items-center" style="height: 20vh;">
        <form method="post" action="" class="w-50">
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="search" placeholder="Search..." required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    </div>



<div class="container col-8 mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="my-3">List customers  
            <a  class="float-end btn btn-info"  href="./create.php">Create</a>
            </h5>

            <table class="table ">
                <thead class="table table-dark">
            <tr>
            <th>Nunber</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>GENDER</th>
            <th>Action</th>

            </tr>
        </thead>
            <tbody>
                <?php foreach($data as $info):?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $info['customer_id']; ?></td>
                    <td><?php echo $info['customer_name']; ?></td>
                    <td><?php echo $info['customer_email']; ?></td>
                    <td><?php echo $info['customer_phone']; ?></td>
                    <td><?php echo $info['customer_gender']; ?></td>
                    <td>
                    <form action="" method="post">
                            <input type="hidden" name="customer_id" value="<?php echo $info['customer_id']; ?>">
                            <button type="submit" name="btn2" class="btn btn-danger">DELETE</button>
                        </form>
<br>
                        <form action="./update.php?customer_id=<?= $info['customer_id'];?>"  method="post">

                        <button type="submit" class="btn btn-secondary">UPDATE</button>
                        </form>
                  
                </td>
               
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
                
           

            </table>
    </div>

</div>







<?php

include_once '../../shared/script.php';

?>
