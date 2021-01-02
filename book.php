<?php
include 'database.php';
?>

<?php
if($_POST['fname'])
{
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $datefrom = $_POST['datefrom'];
    $dateto = $_POST['dateto'];
    $room = $_POST['room'];
    $people = $_POST['people'];

    $sql= "INSERT INTO `orders` (`id`, `order_date`, `shipping_date`, `user_id`) VALUES (NULL, '2021-01-06 23:10:46', '2021-01-08 23:10:46', '1')";

    if ($conn->query($sql) === TRUE) 
    {
        echo json_encode("true");
    } else 
    {
        echo json_encode("false");
    }
    $conn->close();
}
else
{
    echo 'Error';
}
?>