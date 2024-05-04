<?php

	namespace app\controllers;
	use app\models\mainModel;

	class loginController extends mainModel{

		/*----------  Controlador iniciar sesion  ----------*/
		public function iniciarSesionControlador(){

			$usuario=$this->limpiarCadena($_POST['usuario']);
		    $clave=$this->limpiarCadena($_POST['password']);

		    # Verificando campos obligatorios #
		    if($usuario=="" || $clave==""){
		        echo "<script>
			        Swal.fire({
					  icon: 'error',
					  title: 'Ocurrió un error inesperado',
					  text: 'No has llenado todos los campos que son obligatorios'
					});
				</script>";
		    }else{

			    # Verificando integridad de los datos #
			    if($this->verificarDatos("[a-zA-Z0-9.-]{4,20}",$usuario)){
			        echo "<script>
				        Swal.fire({
						  icon: 'error',
						  title: 'Ocurrió un error inesperado',
						  text: 'El USUARIO no coincide con el formato solicitado'
						});
					</script>";
			    }else{

			    	# Verificando integridad de los datos #
				    if($this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}",$clave)){
				        echo "<script>
					        Swal.fire({
							  icon: 'error',
							  title: 'Ocurrió un error inesperado',
							  text: 'La CLAVE no coincide con el formato solicitado'
							});
						</script>";
				    }else{

					    # Verificando usuario #
					    $check_usuario=$this->ejecutarConsulta("SELECT * FROM usuarios WHERE usuario='$usuario'");

					    if($check_usuario->rowCount()==1){

					    	$check_usuario=$check_usuario->fetch();

					    	if($check_usuario['usuario']==$usuario && password_verify($clave,$check_usuario['password'])){

					    		$_SESSION['id']=$check_usuario['id_usuario'];
								$_SESSION['nombre'] = $check_usuario['nombre'];
								$_SESSION['apellido'] = $check_usuario['apellido'];
								$_SESSION['usuario'] = $check_usuario['usuario'];
								$_SESSION['foto'] = $check_usuario['foto']; 
								$_SESSION['edad'] = $check_usuario['edad'];
								$_SESSION['estatura'] = $check_usuario['estatura'];
								$_SESSION['direccion'] = $check_usuario['direccion'];
								$_SESSION['correo_electronico'] = $check_usuario['correo_electronico'];
								$_SESSION['telefono'] = $check_usuario['telefono'];
								$_SESSION['fecha_inicio_inscripcion'] = $check_usuario['fecha_inicio_inscripcion'];
								$_SESSION['fecha_final_inscripcion'] = $check_usuario['fecha_final_inscripcion'];
								$_SESSION['estado'] = $check_usuario['estado'];


					            if(headers_sent()){
					                echo "<script> window.location.href='".APP_URL."dashboard/'; </script>";
					            }else{
					                header("Location: ".APP_URL."dashboard/");
					            }

					    	}else{
					    		echo "<script>
							        Swal.fire({
									  icon: 'error',
									  title: 'Ocurrió un error inesperado',
									  text: 'Usuario o clave incorrectos'
									});
								</script>";
					    	}

					    }else{
					        echo "<script>
						        Swal.fire({
								  icon: 'error',
								  title: 'Ocurrió un error inesperado',
								  text: 'Usuario o clave incorrectos'
								});
							</script>";
					    }
				    }
			    }
		    }
		}


		/*----------  Controlador cerrar sesion  ----------*/
		public function cerrarSesionControlador(){

			session_destroy();

		    if(headers_sent()){
                echo "<script> window.location.href='".APP_URL."login/'; </script>";
            }else{
                header("Location: ".APP_URL."login/");
            }
		}

	}