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
	Portugal: ["Lisboa", "Guarda"],
	Lisboa: ["Alenquer","Amadora", "Arruda dos Vinhos", "Azambuja", "Cadaval", "Cascais", "Lisboa", "Loures", "Lourinhã", "Mafra", "Odivelas", "Oeiras", "Sintra", "Sobral de Monte Agraço", "Torres Vedras", "Vila Franca de Xira"],
	Guarda: ["Aguiar da Beira","Almeida","Celorico da Beira", "Figueira de Castelo Rodrigo","Fornos de Algodres", "Gouveia","Guarda", "Manteigas", "Mêda","Pinhel","Sabugal","Seia","Trancoso", "Vila Nova de Foz Côa"],
	Seia: ["Cabeça","Seia", "Santiago", "Sazes da Beira", "São Romão e Lapa dos Dinheiros", "Teixeira"]
};

function setDistritos() {
	$('#distrito').empty();
	$('#concelho').empty();
	$('#freguesia').empty();
	
	var pais = document.getElementById("pais").value;
	$("#distrito").append("<option>  </option>");
	for(var i = 0; i < morada[pais].length; i++) {
		$("#distrito").append("<option>" + morada[pais][i] + " </option>");
	}
	
	
}

function setConcelhos() {
	$('#concelho').empty();

	var distrito = document.getElementById("distrito").value;
	$("#concelho").append("<option>  </option>");
	for(var i = 0; i < morada[distrito].length; i++) {
		$("#concelho").append("<option>" + morada[distrito][i] + " </option>");
	}
}

function setFreguesias() {
	$('#freguesia').empty();
	$("#freguesia").append("<option>  </option>");
	var concelho = document.getElementById("concelho").value;
	$("#freguesia").append("<option>" + concelho + " </option>");
}

function mostraMorada() {
	var show = document.getElementById("moradaForm").style.display;
	if(show == "block") 
		document.getElementById("moradaForm").style.display = "none";
	else 
		document.getElementById("moradaForm").style.display = "block";
	
}

function showPass() {
	var x = document.getElementById("passID").style.display;
	if(x == "none") {
		var x = document.getElementById("passID").style.display = "block";
	}
}

function hidePass() {
	var x = document.getElementById("passID").style.display;
	if(x == "block") {
		var x = document.getElementById("passID").style.display = "none";
	}
}

function changeDate() {
	var data = document.getElementById("dataN").value;
	document.getElementById("changeDate").innerHTML= data;
}
