<?php 
include 'database.php';
?>

<?php
$json = file_get_contents('php://input');

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {  
        $i = 0;
        $array = [];
        while($row = $result->fetch_assoc()) 
        {
            array_push($array, (object)[
            'id' => $row["id"],
            'name' => $row["name"],
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