<?php 
include 'database.php';
?>

<?php
$json = file_get_contents('php://input');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // $order = $_POST['order'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];


    $user_id = $_POST['user_id'];
    $date = date('Y-m-d H:i:s');

    $sql= "INSERT INTO `orders` (`id`, `order_date`, `shipping_date`, `user_id`) VALUES (NULL, '$date', '', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $add_products= "INSERT INTO `orders__products` (`id`, `order_id`, `product_id`, `quantity`) VALUES (NULL, '$last_id', '$product_id', '$quantity')";
        if ($conn->query($add_products) === TRUE) {
            echo json_encode('true');
        } else {
            echo json_encode('false');
        }
        // $hmmm = [];
        // for ($i = 0; $i < 1; $i++) {
        //     // $hmmm = $order[$i];
        //     $sel= "INSERT INTO `orders_products` (`order_id`, `product_id`, `quantity`) VALUES ('1', '2', '2')";
        //     if ($conn->query($sel) === TRUE) {
        //         echo json_encode('true');
        //     }
        //     else {
        //         echo json_encode('false');
        //     }
        // }
        
        // $order_products= "INSERT INTO `orders` (`order_id`, `product_id`, `quantity`) VALUES ('$last_id', '$date', '')";
        
        // echo json_encode($order);
    } else {
        echo json_encode("Error: " . $sql . "<br>" . $conn->error);
    }

    $conn->close();
}
else
{
    echo 'Error';
}
?>