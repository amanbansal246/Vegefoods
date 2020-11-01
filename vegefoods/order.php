<?php
session_start();
include("dbConnection.php");
include('functions/function.php');
?>
<?php
if(isset($_GET['c_id']))
{
    $customer_id=$_GET['c_id'];
}
//$ip_add=getUserIP();
$email=$_SESSION['customer_email'];
$status="pending";
$invoice_no=mt_rand();
$select_cart="select * from cart where customer_email='$email' ";
$run_cart=mysqli_query($conn,$select_cart);
while($row_cart=mysqli_fetch_array($run_cart)){
    $pro_id=$row_cart['p_id'];
    $pro_qty=$row_cart['qty'];
    $get_product="select * from products where product_id ='$pro_id'";
    $run_pro=mysqli_query($conn,$get_product);
    while($row_pro=mysqli_fetch_array($run_pro))
    {
        $sub_total=$row_pro['product_price']* $pro_qty;
        $insert_customer_order="insert into customer_order(customer_id,product_id,due_amount,invoice_no,qty ,order_date,order_status) values ('$customer_id','$pro_id','$sub_total','$invoice_no','$pro_qty',NOW(),'$status') ";
        $run_cust_order=mysqli_query($conn,$insert_customer_order);
        
        // $insert_padding_order="insert into pending_order(customer_id,invoice_no,product_id,qty,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$status') ";
        // $run_padding_order=mysqli_query($conn,$insert_padding_order);
        $delete_cart="delete  from cart where customer_email='$email' ";
        $run_del=mysqli_query($conn,$delete_cart);
        echo "<script>alert('Your order has been submitted, Thanks')</script>";
        echo "<script>window.open('customer/my_account.php?my_order','_self')</script>";
    }
}

?>