<?php
    include_once '../config/database.php';
    include_once '../models/user.php';
    
    $method=$_SERVER['REQUEST_METHOD'];
    
    switch($method){
        case 'POST':
            session_start();
            if(isset($_SESSION["userid"])){
                header("Access-Control-Allow-Origin: *");
                header("Content-Type: application/json; charset=UTF-8");
                $target_dir = "../assets/userAvatars/";
                $file_name = hash_file('sha256',$_FILES["fileToUpload"]["tmp_name"]);
                $file_extension = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
                $file_dest = $target_dir . $file_name . '.' . $file_extension;
                $uploadOk = 1;
                
                if($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg") {
                    header('HTTP/1.1 400 Bad Request');
                    echo json_encode(array("message"=>"Solo se admiten imagenes tipo JPG, JPEG y PNG."));
                    $uploadOk = 0;
                }
                
                if($uploadOk==1){
                    $db = new Database();
                    $user = new User($db->getConnection());
                    $user->id=$_SESSION["userid"];
                    $user->avatar = $file_name . '.' . $file_extension;
                    if($user->updateUser()){
                        if(file_exists($file_dest))
                            echo json_encode(array("message"=>"El avatar se ha subido correctamente"));
                        else{
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_dest))
                                echo json_encode(array("message"=>"El avatar se ha subido correctamente"));
                            else {
                                header('HTTP/1.1 500 Internal Server Error');
                                echo json_encode(array("message"=>"El avatar no se ha subido"));
                            }
                        }
                    }
                    else {
                        header('HTTP/1.1 500 Internal Server Error');
                        echo json_encode(array("message"=>"El avatar no se ha subido"));
                    }
                }
            } else {
                header('HTTP/1.1 401 Unauthorized');
                echo json_encode(array("message"=>"User not logged"));
            }
            break;
        default:
            header('HTTP/1.1 405 Method not allowed');
            header('Allow: POST');
            break;
    }
?>
