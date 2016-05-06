$(document).ready(function() {

		var hasStart = false;
		var hasEnd = false;
		var startDate;
		var endDate;
		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#external-events .fc-event').each(function() {

			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true // maintain when user navigates (see docs on the renderEvent method)
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});


		/* initialize the calendar
		-----------------------------------------------------------------*/

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month'
			},
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar
			drop: function() {
					$(this).remove();
			
			},
			selectable: true,
			select: function (start, end, jsEvent, view) {
				$("#calendar").fullCalendar('addEventSource', [{
					start: start,
					end: end,
					rendering: 'background',
					block: true,
				}, ]);
				$("#data_inicio").val(split(start.toString())) ;
				$("#data_fim").val(split(end.toString())) ;
				$("#calendar").fullCalendar("unselect");
			},
			selectOverlap: function(event) {
				return ! event.block;
			}
		});
		
});

function split(date) {
	var res = date.split(" ");
	return res[3] + "-" + "0" + stringToNumber(res[1]) + "-" + res[2] ;
}

function stringToNumber(month) {
	switch(month) {
		case "Jan":
			return 1;
		case "Feb":
			return 2;
		case "Mar":
			return 3;
		case "Apr":
			return 4;
		case "May":
			return 5;
		case "Jun":
			return 6;
		case "Jul":
			return 7;
		case "Aug":
			return 8;
		case "Sep":
			return 9;
		case "Oct":
			return 10;
		case "Nov":
			return 11;
		case "DeC":
			return 12;	
	}
	
}

function validateHorario() {
	var inicio = document.forms["escolheHorario"]["hora_i"].value;
	var fim = document.forms["escolheHorario"]["hora_f"].value;
	if (inicio >= fim ) {
		var error = document.getElementById('erro');
		if(error == null) {
			error = document.createElement("div");
			error.className = "error";
			error.id= "erro";
			error.appendChild(document.createTextNode("Hora de início tem de ser menor que hora de fim" ));
			document.getElementById('horaFormId').appendChild(error);
		}
		return false
	}
	else
		return true
		
	
}

