<?php
	 
	require("../conectar_bbdd.php");
	// Comprobación de la existencia del correo en la base de datos
	$email = $_POST['email']; 
	$email_query = "SELECT EMAIL FROM USUARIOS WHERE EMAIL = '$email'";
	$query = $conexion->query($email_query);
	if (mysqli_num_rows($query) > 0) {
		echo "<br />". "El correo ya existe." . "<br />";
	 
	 	echo "<a href='../index.html'>Por favor introduzca un correo válido</a>";
	
	} else {
	 
		$name = $_POST['nombre']; 
		$lastname = $_POST['apellidos'];
		$email = $_POST['email'];
		$password = $_POST['password'];
        $sql = "INSERT INTO usuarios (NOMBRE,APELLIDOS, EMAIL, PASSWORD) 
					VALUES ('$name', '$lastname', '$email','$password')";
	 
	 	if ($conexion->query($sql) == TRUE) {
	 		echo "<br />" . "<h2>" . "Usuario Creado Correctamente!" . "</h2>";
	 		echo "<h4>" . "Bienvenido: " . $_POST['email'] . "</h4>" . "\n\n";
	 		echo "<h5>" . "Hacer Login: " . "<a href='../../index.html'>Login</a>" . "</h5>"; 
	 	}
	 
	 	else {
			echo "Error al crear el usuario." . $sql . "<br>" . $conexion->error; 
		}
	}
	mysqli_close($conexion);
?>