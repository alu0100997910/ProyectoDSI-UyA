<?php
    include_once '../config/database.php';
    include_once '../models/user.php';
    include_once '../models/carrito.php';
    
    $method=$_SERVER['REQUEST_METHOD'];
    
    switch($method){
        case 'POST':
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            $data = json_decode(file_get_contents("php://input"));
            if($data){
                $database=new Database();
                $user=new User($database->getConnection());
                $user->email=$data->email;
                $stmt=$user->loginUser();
                $num=$stmt->num_rows;
                if($num==1){
                    $row=mysqli_fetch_assoc($stmt);
                    extract($row);
                    if($password == hash('sha256',$data->password)){
                        session_start();
                        $_SESSION["userid"]=$id;
                        $cart=new Carrito();
                        $_SESSION["cart"]=serialize($cart);
                        echo json_encode(array("message"=>"Usuario identificado correctamente!"));
                    }
                    else{
                        header('HTTP/1.1 400 Bad Request');
                        echo json_encode(array("message"=>"La contraseña no es correcta!"));
                    }
                }
                else {
                    header('HTTP/1.1 404 Not Found');
                    echo json_encode(array("message"=>"El email no está registrado!"));
                }
                
            }
            else {
                header('HTTP/1.1 400 Bad Request');
                echo json_encode(array("message" => "No se han proporcionado datos"));
            }
            break;
        default:
            header('HTTP/1.1 405 Method not allowed');
            header('Allow: POST');
            break;
    }
?>