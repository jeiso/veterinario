<?php 
include 'Graficos.php';
class BD extends Graficos

	{

		public $conexion; //variable publica



		/**
		*esta funcion ses el constructor.			
		*/


		function BD ()
		{
			$this->conexion=$this->crear_conexion();
			//echo "nacio la clase BD";


		}

		/**
		*esta funcion se encarga de crear la conexion con el servidor.			
		*@return 		caracteres 		retorna mysqli_connect.
		*/


		 function crear_conexion ()
		 {
		 	include('config.php');
		 	return mysqli_connect($servidor,$usuario,$clave,$bd);


		 }

		 /**
		*esta funcion se encarga realizar la consulta en la tabla.
		*
		*@param 		texto 			Es el nombre de la tabla.
		*@param 		texto 			campo clave.
		*@param 		texto 			campo a buscar.	
		*@return 		caracteres 		retorna la consulta.
		*/

		 function consultar_tabla($campo_a_mostrar)

		 {
		 	/**$sql = "SELECT $campo_a_mostrar from tb_enfermedades ,tb_sintomas , tb_estadistica where tb_informe.id_enfermedad=tb_enfermedades.id_enfermedad and tb_estadistica.id_sintomas=tb_sintomas.id_sintoma";
		 	echo $sql;
		 	$resultado = $this->conexion->query( $sql );	
		 	return $resultado;
		 }**/
		  /**
		*esta funcion se encarga de traer los datos de la tabla.
		*
		*@param 		texto 			resultado de la busqueda.
		*@return 		caracteres 		retorna la tabla.
		*/

		 function leer_campo ()

		 {
				 	$salida = 
				 "<table border='1px'>"
				<thead>
		      <tr>
		       
		      </tr>
		    </thead>";
		    $salida .= "<tr>";
		 	while( $fila = mysqli_fetch_array( $this->$resultado ) )
			{

				for( $i = 0; $i < mysqli_num_fields($this->$resultado ); $i ++ )
				$salida .="<td>".$fila[ $i ]."</td>";
				$salida .= "</tr>";

			}
			$salida .= "</table>";

		return $salida;	
		 }

		 /**
		 *
		 *
		 */
		 function traer_informacion( $nombre_lista, $tabla, $campo_llave_primaria, $campo_a_mostrar )
	{
		

		$salida = "";

		//------------SQL Se traen datos----------------------------------------------------
		$sql = "SELECT * FROM  $tabla ";	
		$resultado = $this->conexion->query( $sql );			
		$salida = "<form>";

		while( $fila = mysqli_fetch_assoc( $resultado ) )
		{
			$salida .= "
				<div class='form-group'>
					<input type='checkbox' name='$nombre_lista' value='".$fila[ $campo_llave_primaria ]."'>".$fila[ $campo_a_mostrar ].
				"</div>";
		}
		$salida .= "<input type='submit' class='btn btn-success' value='Ver '>";
		$salida .= "</form>";

		return $salida;	
	}

	}





 ?>
