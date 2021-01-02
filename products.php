<?php 
include 'database.php';
?>

<?php
$json = file_get_contents('php://input');

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $startAt = $_POST['startAt'];
    $perPage = $_POST['perPage'];
        if(isset($_POST['category'])) {
            $category = $_POST['category'];
        }


    $count = 0;
    $count_sql = "SELECT * FROM products";
    $res_count = $conn->query($count_sql);
    if ($res_count->num_rows > 0) {  
        $count = $res_count->num_rows;
    }

    if(isset($_POST['category'])) {
        $sql = "SELECT * FROM products WHERE category_id='$category' LIMIT $startAt, $perPage";
    } else {
        $sql = "SELECT * FROM products LIMIT $startAt, $perPage";
    }
    

        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {  
            $i = 0;
            $array = [];
            while($row = $result->fetch_assoc()) 
            {
               array_push($array, (object)[
                'id' => $row["id"],
                'name' => $row["name"],
                'price' => $row["price"],
                'image' => $row["image"],
                'description' => $row["description"],
                'category_id' => $row["category_id"],
                ]);

                $i++;
            }
            $obj = (object) ["products" => $array, "count" => $count];

            echo json_encode($obj);
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