<?php
    //include database and object file
    include_once '../config/database.php';
    include_once '../models/user.php';
    
    $method=$_SERVER['REQUEST_METHOD'];
    
    switch($method){
        case 'POST':        //Properties
        case 'PUT':
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            header("Access-Control-Allow-Methods: POST, PUT");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
            $data = json_decode(file_get_contents("php://input"));
            if($data){
                $database=new Database();
                $user=new User($database->getConnection());
                
                if($method == 'PUT') {
                    session_start();
                    $user->id=$_SESSION['userid'];
                    $user->name=$data->name;
                    $user->lastname=$data->lastname;
                    if($data->password != null){
                        $user->password=hash('sha256',$data->password);
                    }
                    $user->fechanacimiento=$data->fechanacimiento;
                    if($user->updateUser()){
                        header('HTTP/1.1 201 Created');
                        echo json_encode(array("message" => "El Usuario se ha actualizado correctamente!"));
                    } else {
                        header('HTTP/1.1 500 Internal Server Error');
                        echo json_encode(array("message" => "El Usuario no se ha actualizado!"));
                    }
                }
                else {
                    $user->name=$data->name;
                    $user->lastname=$data->lastname;
                    $user->email=$data->email;
                    $user->password=hash('sha256',$data->password);
                    switch ($user->createUser()){
                        case 1:
                            header('HTTP/1.1 201 Created');
                            echo json_encode(array("message" => "El Usuario se ha registrado correctamente!"));
                            break;
                        case 0:
                            header('HTTP/1.1 500 Internal Server Error');
                            echo json_encode(array("message" => "El usuario no se ha creado!"));
                            break;
                        case 2:
                            header('HTTP/1.1 400 Bad Request');
                            echo json_encode(array("message" => "El email ya está registrado!"));
                            break;
                        case 4:
                            header('HTTP/1.1 400 Bad Request');
                            echo json_encode(array("message" => "Falta algún campo de registro"));
                            break;
                    }
                }
            }
            
            else {
                header('HTTP/1.1 400 Bad Request');
                echo json_encode(array("message" => "No se han proporcionado datos"));
            }
            
            break;
        case 'GET':
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            if (!isset($_GET['id'])){
                header('HTTP/1.1 400 Bad Request');
                echo json_encode(array("message" => "No se ha especificado usuario"));
            }
            else {
                $database=new Database();
                $user=new User($database->getConnection());
                
                //query user
                $user->id =$_GET['id'];
                $stmt = $user->getUser();
                $num = $stmt->num_rows;
                
                if ($num > 0){
                    $row=mysqli_fetch_assoc($stmt);
                    extract($row);
                    $user_item=array(
                        "id" => $id,
                        "name" => $name,
                        "lastname" => $lastname,
                        "email" => $email,
                        "password" => $password,
                        "avatar" => $avatar,
                        "fechanacimiento" => $fechanacimiento,
                        "fechaalta" => $fecharegistro
                    );
                    echo json_encode($user_item);
                } else {
                    header('HTTP/1.1 404 Not Found');
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