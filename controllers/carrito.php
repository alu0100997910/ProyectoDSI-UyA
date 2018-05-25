<?php
    include_once '../models/carrito.php';
    include_once '../config/database.php';
    include_once '../models/product.php';
    
    session_start();
    if(isset($_SESSION['userid']) && isset($_SESSION['cart'])){
        $method=$_SERVER['REQUEST_METHOD'];
        $cart=unserialize($_SESSION['cart']);
        switch($method){
            case 'GET':
                header("Access-Control-Allow-Origin: *");
                header("Content-Type: application/json; charset=UTF-8");
                echo json_encode(array("cart" => $cart->get()));
                break;
            case 'POST':
                header("Access-Control-Allow-Origin: *");
                header("Content-Type: application/json; charset=UTF-8");
                $data = json_decode(file_get_contents("php://input"));
                $db=new Database();
                $product=new Product($db->getConnection());
                $product->id=$data->id;
                $stmt=$product->getProduct();
                if($stmt->num_rows>0){
                    $row=mysqli_fetch_assoc($stmt);
                    extract($row);
                    $product_item=array(
                        "id" => $id,
                        "name" => $name,
                        "desc" => $desc,
                        "alt" => $alt,
                        "price" => $price,
                        "img" => $img,
                        "stock" => $stock,
                        "categoria"=>$categoria
                    );
                    $cart->push($product_item);
                    echo json_encode(array("cart" => $cart->get()));
                    $_SESSION['cart']=serialize($cart);
                } else {
                    header('HTTP/1.1 404 Not Found');
                    echo json_encode(
                        array("message" => "Producto no encontrado ")
                    );
                }
                break;
            case 'DELETE':
                header("Access-Control-Allow-Origin: *");
                header("Content-Type: application/json; charset=UTF-8");
                $data = json_decode(file_get_contents("php://input"));
                if($cart->pop($data->pos)){
                    echo json_encode(array("cart" => $cart->get()));
                    $_SESSION['cart']=serialize($cart);
                } else{
                    header('HTTP/1.1 404 Not Found');
                    echo json_encode(
                        array("message" => "Posicion en el carrito erronea")
                    );
                }
                break;
            default:
                header('HTTP/1.1 405 Method not allowed');
                header('Allow: POST');
                break;
                
        }
    }
    else {
        header('HTTP/1.1 401 Unauthorized');
        echo json_encode(array("message"=>"User not logged"));
    }
    
?>