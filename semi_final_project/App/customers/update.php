

<?php

include_once '../../shared/head.php';
 include_once '../../shared/navbar.php';

 include_once '../../config/functions.php';
 require_once '../../config/config.php';






$id="";
if(isset($_GET['customer_id']))
{
    $id = $_GET['customer_id'];
    $select="SELECT * FROM customers WHERE customer_id=$id";
    $result = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($result); 
}


if(isset($_POST['btn']))
{

   $name = $_POST['customer_name'];
   $email = $_POST['customer_email'];
   $phone = $_POST['customer_phone'];
   $gender=$_POST['customer_gender'];

   if(empty($name) || empty($email) || empty($phone) )
   {
    echo "Please fill all the fields";

   }
   else
   {
    $update="UPDATE customers SET customer_name='$name', customer_email='$email', customer_phone='$phone' WHERE customer_id=$id";
    $result = mysqli_query($conn, $update);
    if($result)
    {
        Redirect('customers/index.php');
    }
    else
    {
        echo "Error updating record: " . mysqli_error($conn);
        }


   
  



}
}
 

 
?>


<div class="container col-8 mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="my-3"> UBDATE CUSTOMER 
            <a  class="float-end btn btn-info"  href="./index.php">BACK</a>
            </h5>
           <form action="" method="post" class="container mt-5">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="customer_name" class="form-control" id="name"  value="<?=$data['customer_name'] ?>">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Email</label>
        <input type="text" name="customer_email" class="form-control" id="email" value="<?=$data['customer_email'] ?>">
    </div>
    <div class="mb-3">
        <label for="salary" class="form-label">Phone</label>
        <input type="text" name="customer_phone" class="form-control" id="phone" value="<?=$data['customer_phone'] ?>" >
    </div>
    <div class="mb-3">
        <label for="salary" class="form-label">Gender</label>
        <select name="customer_gender" class="form-select" id="gender"  value="<?=$data['customer_gender'] ?>">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>



    <button type="submit" name="btn" class="btn btn-primary">UBDATE</button>

  </form>

  
 
            



<?php

include_once '../../shared/script.php';

?>




