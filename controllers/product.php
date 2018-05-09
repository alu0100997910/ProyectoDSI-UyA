<?php
    //include database and object file
    include_once '../config/database.php';
    include_once '../models/product.php';
    
    $method=$_SERVER['REQUEST_METHOD'];
    
    switch($method){
        case 'GET':
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            if (!isset($_GET['id']) && !isset($_GET['page'])){
                header('HTTP/1.1 400 Bad Request');
                echo json_encode(array("message" => "No se puede mostrar el producto"));
            }
            else {
                $database=new Database();
                $product=new Product($database->getConnection());
                
                if(isset($_GET['id'])){
                    //query user
                    $product->id =$_GET['id'];
                    $stmt = $product->getProduct();
                    $num = $stmt->num_rows;
                    
                    if ($num > 0){
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
                        echo json_encode($product_item);
                    } else {
                        header('HTTP/1.1 404 Not Found');
                        echo json_encode(
                            array("message" => "Producto no encontrado ")
                        );
                    }
                }
                else { //PAGINATOR
                    if(isset($_GET['cat'])){
                        $product->categoria=$_GET['cat'];
                    }
                    if(isset($_GET['price'])){
                        $product->price=$_GET['price'];
                    }
                    $page = ($_GET['page']==null)?1:$_GET['page'];
                    
                    $stmt = $product->getItemCount();
                    $row=mysqli_fetch_assoc($stmt);
                    $products=array(
                        "icount"=> $row['items'],
                        "items" => array()
                    );
                    
                    
                    $stmt = $product->getPage($page);
                    $num = $stmt->num_rows;
                    if($num>0){
                        
                        while($row=mysqli_fetch_assoc($stmt)){
                            extract($row);
                            $item=array(
                                "id" => $id,
                                "name" => $name,
                                "price" => $price,
                                "img" => $img,
                                "alt" => $alt,
                                "desc" => $desc
                            );
                            array_push($products["items"],$item);
                        };
                        echo json_encode($products);
                    }else{
                        header('HTTP/1.1 404 Not Found');
                        echo json_encode(
                            array("message" => "No hay productos que cumplan los filtros aplicados")
                        );
                    }
                    
                }
            }
            
            break;
        default:
            header('HTTP/1.1 405 Method not allowed');
            header('Allow: GET');
        break;
}
    
?>