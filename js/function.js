function validateForm() {
	var isValid = true;

	var pass1 = document.forms["registaVoluntario"]["pass"].value;
	var pass2 = document.forms["registaVoluntario"]["pass2"].value;
	
	if(pass1 != pass2) {
		document.getElementById("inputPassword1").style.border = "1px solid red";
		document.getElementById("inputPassword2").style.border = "1px solid red";
		isValid = false;
		
		var error = document.getElementById('erro');
		if(error == null) {
			
			error = document.createElement("div");
			error.className = "error";
			error.id= "erro";
			error.appendChild(document.createTextNode("As passwords são diferentes. Por favor insira de novo a password"));
			document.getElementById('passID').appendChild(error);
		}
   }
   
   return isValid;
}

/*
$(document).ready(function(){
	$("#addForm").click(function(){
		if(number < 3) {
			var x = $("#toAdd").clone();
			x.id = "toAdd2";
			console.log(x.id);
			$("#hablitID").append(x);
			number++;
			$("#addForm").style.visibility='hidden';
			
		}
	});
});
*/

var number = 1;
$(document).ready(function(){
	$("#addForm").click(function(){
		if(number < 3) {
			document.getElementById("toAdd" + number).style.display = "block";
			number++;
			
		}
	});
});


function setFoto() {
	
	var x = document.getElementById("file").files[0].name;
	document.getElementById("myFoto").src = x;	
}

var morada = {
	Portugal: ["Lisboa", "Guarda"] ,
	Lisboa: ["Lisboa","Sintra"],
	Guarda: ["Aguiar da Beira","Almeida","Celorico da Beira", "Figueira de Castelo Rodrigo","Fornos de Algodres", "Gouveia","Guarda", "Manteigas", "Mêda","Pinhel","Sabugal","Seia","Trancoso", "Vila Nova de Foz Côa"],
	Seia: ["Cabeça","Seia", "Santiago", "Sazes da Beira", "São Romão e Lapa dos Dinheiros", "Teixeira"]
};

function setDistritos() {
	$('#distrito').empty();
	
	var pais = document.getElementById("pais").value;
	for(var i = 0; i < morada[pais].length; i++) {
		$("#distrito").append("<option>" + morada[pais][i] + " </option>");
	}
	
	
}

function setConcelhos() {
	$('#concelho').empty();

	var distrito = document.getElementById("distrito").value;
	for(var i = 0; i < morada[distrito].length; i++) {
		$("#concelho").append("<option>" + morada[distrito][i] + " </option>");
	}
}

function setFreguesias() {
	$('#freguesia').empty();
	var concelho = document.getElementById("concelho").value;
	$("#freguesia").append("<option>" + concelho + " </option>");
}
