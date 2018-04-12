<?php

	require("../conectar.bbdd.php");
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		$sql = "SELECT * FROM USUARIOS WHERE EMAIL = '$email'";
		$result = $conexion->query($sql);
		
		if ($result->num_rows > 0) {    
			$row = $result->fetch_array(MYSQLI_ASSOC);
		
			if ($password == $row['PASSWORD']){ 
		
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['id'] = $row['ID'];
				$_SESSION['nombre'] = $row['NOMBRE'];
				$_SESSION['apellidos'] = $row['APELLIDOS'];
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $row['PASSWORD'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (5 * 6000);
				header("Location: ../logged.php");
		
			} else { 
				echo "Correo o contraseña incorrectos.";
				echo "<br><a href='../../index.html'>Volver a Intentarlo</a>";
			}
		} else {
			echo "No estás registrado..";
			echo "<br><a href='../../index.html'>Registrarse</a>";
		}
	} else {
		echo "No se ha proporcionado una dirección de correo";
		echo "<br><a href='../../index.html'>Volver a inicio</a>";
	}
	
	 mysqli_close($conexion);	 
?>