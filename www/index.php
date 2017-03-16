
<html lang="ES">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<head>

	<title></title>
	<meta charset="utf-8">

	
	<?php 
		include 'class/BD.php';
		$nuevo_obj=new BD();
			echo $nuevo_obj->estilos("bootstrap");
	?>
</head>
<body>
	<div class="container">
		<div class="form-group">
			<?php  echo $nuevo_obj->encabezado(""); ?>
			<IMG SRC="img/1clinicas-veterinarias.png">
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-3 col-lg-3 ">
				<div class="panel panel-warning">
				  <div class="panel-footer">
				  
				 
				
				<?php 	
					echo $nuevo_obj->traer_informacion("sintoma","tb_sintomas","id_sintomas","sintoma","get","ver.php");
				?>
				  </div>
				 </div>
			</div>	
			<div class="col-xs-12 col-md-3 col-lg-5 ">
			<?php
				echo $nuevo_obj->leer_campo( $nuevo_obj->consultar_tablas("tb_enfermedades.enfermedad","distinct"),"<th>Enfermedades</th>");
				

			 ?>
			</div>
		</div>
	</div>
</body>
</html>

