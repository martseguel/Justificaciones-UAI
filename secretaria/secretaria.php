<?php
session_start();
if ($_SESSION["loggedin"] === false or $_SESSION["tipoUser"] != "Secretaria") {
	header("location: ../index.html");
}
require_once "../utils/config.php";
?>
<!DOCTYPE html>
<html>

<head>
	<title>UAI - Justificaciones</title>
	<link rel="stylesheet" type="text/css" href="../utils/styleSecre.css">
	<link rel="stylesheet" type="text/css" href="../utils/styleProfe.css">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
	<script>
		$(function () {
			// Activar la carga perezosa de imágenes
			$(".lazy").lazyload({
				effect: "fadeIn",
				threshold: 200,
				failure_limit: 10
			});

			// Agregar un evento de clic para el botón "ver"
			$(".ver").click(function () {
				var nombreImagen = $(this).data("imagen");

				var modal = $("<div class='modal'></div>");
				var modalContent = $("<div class='modal-content'></div>");
				var close = $("<span class='close'>&times;</span>");

				modalContent.append(close);
				modalContent.append("<img src='" + nombreImagen + "' class='lazy' style='width: 95%; height: 95%'>");
				modal.append(modalContent);
				$("body").append(modal);

				// Mostrar la ventana modal
				modal.show();

				// Agregar un evento de clic para cerrar la ventana modal cuando se hace clic en el botón "cerrar"
				close.click(function () {
					modal.hide();
				});
			});
		});
	</script>
</head>

<body class="backgroundGradient">
	<div class="dvMainPage">
		<div class="dvHeaderTop">
			<div class="dvTopHeaderContainer">
				<div class="dvBackgroundImage">
				</div>
				<div class="dvLogoUaiIntranetHeader">
					<img src="../imgs/logo2.png" height="50px">
				</div>
				<div class="headerUserTransContainer">
					<div class="headerUserTrans">
						<div class="headerUserTransBottom">
						</div>
					</div>
					<div class="headerUserOpac">
						<div class="dvUsuarioIntranet">
							<b>Usuario</b>
							<span id="ctl00_txtUserLog">
								<?php echo $_SESSION['nombre'] ?>
							</span>
						</div>
						<div class="botonSalirIntranet" id="linksToInsert">
							<a href="./buscador.php" class="salir" title="Buscador Justificaciones">•Buscador Justificaciones•</a>
							<a href="../utils/logout.php" class="salir" title="Salir">•Salir•</a>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="tabDiv">
			<table>
				<caption>Justificaciones Pendientes</caption>
				<thead>
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">Desde</th>
						<th scope="col">Hasta</th>
						<th scope="col">Motivo</th>
						<th scope="col">Archivo</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT j.*, u.nombre FROM Justificaciones as j INNER JOIN Usuarios as u ON j.alumno_id = u.id and j.resultado = 'Pendiente'";
					$stmt = mysqli_prepare($link, $sql);
					mysqli_stmt_execute($stmt);
					$result = $stmt->get_result();

					foreach ($result as $r) {
						echo '<tr><td data-label="Nombre">' . $r["nombre"] . '</td>';
						echo '<td data-label="Desde">' . $r["fecha_desde"] . '</td>';
						echo '<td data-label="Hasta">' . $r["fecha_hasta"] . '</td>';
						echo '<td data-label="Motivo">' . $r["motivo"] . '</td>';
						echo "<td><button class='ver' data-imagen='" . $r["image"] . "'>Ver</button></td>";
						echo "<td>
								<form action='./actualizarJusti.php' method='POST'>
								<input type='hidden' name='idToUpdate' id='idToUpdate' value=" . $r['id'] . ">
									<select name='selectStatus' id='selectStatus' onchange='' >
										<option value='Pendiente' selected >Pendiente</option>
										<option value='Aprobar'            >Aprobar</option>
										<option value='Rechazar'           >Rechazar</option>
									</select>
									<button class='ver' onclick='this.form.submit()'>Confirmar</button>
								</form>
							</td></tr>";
						echo "<div id='imagen'></div>";
					}
					?>
				</tbody>
			</table>
		</div>

</body>

</html>