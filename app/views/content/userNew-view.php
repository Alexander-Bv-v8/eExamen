<div class="container is-fluid mb-6">
	<h1 class="title">Usuarios</h1>
	<h2 class="subtitle">Nuevo usuario</h2>
</div>

<div class="container pb-6 pt-6">

	<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off" enctype="multipart/form-data" >

		<input type="hidden" name="modulo_usuario" value="registrar">

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre</label>
				  	<input class="input" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Apellido</label>
				  	<input class="input" type="text" name="apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
            <div class="column">
		    	<div class="control">
					<label>Edad</label>
				  	<input class="input" type="number" name="edad" pattern="[0-9]{1,2}" maxlength="2" min="0" required >
			    </div>
		  	</div>
            <div class="column">
                <div class="control">
                    <label>Estatura (cm)</label>
                    <input class="input" type="number" name="estatura" pattern="[0-9]{1,3}" maxlength="3" min="0" required>
                </div>
		  	</div>
		</div>
		<div class="columns">
            <div class="column">
		    	<div class="control">
					<label>Dirección</label>
				  	<input class="input" type="text" name="direccion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,\-()\/ ]{3,100}" maxlength="100" require>
				</div>
		  	</div>
              <div class="column">
		    	<div class="control">
					<label>Email</label>
				  	<input class="input" type="email" name="correo" maxlength="70">
				</div>
		  	</div>
              <div class="column">
		    	<div class="control">
					<label>Teléfono</label>
				  	<input class="input" type="text" name="telefono" pattern="[0-9]{3,100}" maxlength="70" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="usuario" pattern="[a-zA-Z0-9.-]{4,20}" maxlength="20" required >
				</div>
		  	</div>
		  	
		</div>
		<div class="columns">
            <div class="column">
                <div class="control">
                    <label>Fecha final de inscripción</label>
                    <input class="input" type="date" name="final_inscripcion" required>
                </div>
            </div>
		  	<div class="column">
		    	<div class="control">
					<label>Clave</label>
				  	<input class="input" type="password" name="clave1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Repetir clave</label>
				  	<input class="input" type="password" name="clave2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" >
				</div>
		  	</div>
		</div>
			
		<div class="columns">
		  	<div class="column">
				<div class="file has-name is-boxed">
					<label class="file-label">
						<input class="file-input" type="file" name="foto" accept=".jpg, .png, .jpeg" >
						<span class="file-cta">
							<span class="file-label">
								Seleccione una foto
							</span>
						</span>
						<span class="file-name">JPG, JPEG, PNG. (MAX 5MB)</span>
					</label>
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="reset" class="button is-link is-light is-rounded">Limpiar</button>
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>