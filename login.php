<?php 
include 'database.php';
?>

<?php
$json = file_get_contents('php://input');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login = $_POST['login'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {  
            $i = 0;
            $array = [];
            while($row = $result->fetch_assoc()) 
            {
               array_push($array, (object)[
                'id' => $row["id"],
                'login' => $row["login"],
                'user_role' => $row["user_role"],

                ]);

                $i++;
            }
            echo json_encode($array);
        } 
        else 
        {
            echo json_encode("0 results");
        }
        $conn->close();
}
else
{
    echo 'Error';
}

?>