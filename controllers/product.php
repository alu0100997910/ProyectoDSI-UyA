<?php
    //include database and object file
    include_once '../config/database.php';
    include_once '../models/product.php';
    
    $method=$_SERVER['REQUEST_METHOD'];
    
    switch($method){
        case 'POST':
        case 'PUT':
        case 'DELETE':
        case 'GET':
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            if (!isset($_GET['id'])){
                header('HTTP/1.1 400 Bad Request');
                echo json_encode(array("message" => "No se ha especificado usuario"));
            }
            else {
                $database=new Database();
                $product=new User($database->getConnection());
                
                //query user
                $product->id =$_GET['id'];
                $stmt = $product->getUser();
                $num = $stmt->num_rows;
                
                if ($num > 0){
                    while ($row=mysqli_fetch_assoc($stmt)){
                        extract($row);
                        $product_item=array(
                            "id" => $id,
                            "name" => $name,
                            "desc" => $desc,
                            "price" => $price,
                            "url" => $url,
                            "stock" => $stock,

                        );
                    }
                    echo json_encode($product_item);
                } else {
                    echo json_encode(
                        array("message" => "User not Found. ")
                    );
                }
            }
            
            
            break;
        default:
            header('HTTP/1.1 405 Method not allowed');
            header('Allow: GET, POST, PUT, DELETE');
        break;
}
    
?>