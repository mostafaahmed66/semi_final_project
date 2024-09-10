

<?php

include_once '../../shared/head.php';
 include_once '../../shared/navbar.php';
 require_once '../../config/config.php';

 if(isset($_POST['btn']))
 {

    $name = $_POST['customer_name'];
    $email = $_POST['customer_email'];
    $phone = $_POST['customer_phone'];
    $gender=$_POST['customer_gender'];
    
    $insert="INSERT INTO customers VALUES (null,'$name','$email','$phone','$gender')";
    $result = mysqli_query($conn, $insert);



 }

 
?>


<div class="container col-8 mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="my-3">CREATE NEW CUSTOMER 
            <a  class="float-end btn btn-info"  href="./index.php">BACK</a>
            </h5>
           <form action="" method="post" class="container mt-5">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="customer_name" class="form-control" id="name" >
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Email</label>
        <input type="text" name="customer_email" class="form-control" id="email" >
    </div>
    <div class="mb-3">
        <label for="salary" class="form-label">Phone</label>
        <input type="text" name="customer_phone" class="form-control" id="phone" >
    </div>
    <div class="mb-3">
        <label for="salary" class="form-label">Gender</label>
        <select name="customer_gender" class="form-select" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>



    <button type="submit" name="btn" class="btn btn-primary">ADD</button>

  </form>

  
 
            



<?php

include_once '../../shared/script.php';

?>




