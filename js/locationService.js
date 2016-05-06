// set all location variables
var countryField = '#country';
var districtField = '#district';
var cityField = '#city';
var townField = '#town';

// set all event triggers for location fields changes
$("#instituitionName").click(function(){
	alert("");
})

// gets all countries
function getCountries(){

	alert('HEY!');
	// show loading

	// get all countries

	// hide city and town
	hideByIds([townField, cityField, districtField]);

	// hide loading

	// show districts	
	$(districtField).show();
}


// UTILS
// hide by id
function hideByIds(list){
	list.forEach( function(element, index) {
		$(element).hide();
	});
}

function showByIds(list){
	list.forEach( function(element, index) {
		$(element).show();
	});
}