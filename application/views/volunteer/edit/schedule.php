<!DOCTYPE html>
<html>
<head>
		<meta charset='utf-8' />
		<link href='fullcalendar.css' rel='stylesheet' />
		<link href='fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='lib/moment.min.js'></script>
		<script src='lib/jquery.min.js'></script>
		<script src='lib/jquery-ui.custom.min.js'></script>
		<script src='fullcalendar.min.js'></script>
		<script src= 'mycalendar.js'></script>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
	}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	#external-events .fc-event {
		margin: 10px 0;
		cursor: pointer;
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}

	#calendar {
		float: left;
		width: 500px;
	}
	
	#erro {
		color:red;
	}

</style>
</head>



<body>
	
	<div class="container">
			<div class="row">
			
				<div class="col-sm-8">
					<div class= "SectionTitle" style="margin-bottom:30px;">
						<h1> Disponibilidade Horária</h1>
					</div>
				
					<div id='wrap' style="width:500px">

						<div id='calendar'></div>

						<div style='clear:both'></div>
					
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class= "escolheHorario" style="margin-top:90px;">
						<form role="form" method="get" onsubmit="return validateHorario()"  action="" id="escolheHorario">
							<div class="dataForm">
								<h3>Selecione a data no calendário:</h3>
								<label>Data de início selecionada:</label>
								<input type="text" class="form-control" id="data_inicio" name="data_i" required>
								<label>Data de fim selecionada:</label>
								<input type="text" class="form-control" id="data_fim" name="data_f" required>
							</div>
							<div class="horaForm" id="horaFormId">
								<h3>Diga-nos a sua disponibilidade horária:</h3>
								<label>Hora de inicio:</label>
								<input type="number" class="form-control" id="hora_i" name="hora_i" min="0" max="24" required>
								<label>Hora de fim:</label>
								<input type="number" class="form-control"  id="hora_f" name="hora_f" min="0" max="24" required>
							</div>
							<div class="submitButton" style="padding-top:15px">
								<button type="submit" class="btn btn-default" form ="escolheHorario" >Submeter</button>
							</div>	
				
						</form>
					</div>
				
				</div>
					
			</div>
				
					
	</div>
</body>
</html>
