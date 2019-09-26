/*****************************************************************************/
/**************************  VALIDATION SECTION  *****************************/
/*****************************************************************************/
function check(e){
	let frm = document.getElementById('search_forex_text_from').value;
	let too = document.getElementById('search_forex_text_to').value;

	if(too <= 0 && frm <= 0){
		alert("empty in both fields");
		return false;
	}
	//Empty Space
	else if(frm <= 0){
		alert("empty in from");
		return false;
	}
	else if(too <= 0){
		alert("empty in to");
		return false;
	}
	//Diferent Both
	else if(frm == too){
		alert("they can not be the same crypto currencies");
		return false;
	}

	return true;
}
/*********************************************************************************/
/**************************  END VALIDATION SECTION  *****************************/
/*********************************************************************************/


/*
* @name: from, to 
*/
function ajaxForexList(name) {
	let con = $("#search_forex_text_"+name).val();
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type: "POST",
		url: "forex",
		data: {from: con},
		dataType: "html",
		error: function(){
			alert("error in ajax");
		},
		success: function(data){
			let array = JSON.parse(data);
			$("#result_"+name).empty();                                                 
			if(document.getElementById("search_forex_text_"+name).value == ""){
				$("#result_"+name).empty();
			}else{
				let i= 0;
				array.slice(0,5).map((item)=>{
					i++;
					$("#result_"+name).append("<li  style='cursor: default; list-style:none' onclick=give('result_"+name+"_"+i+"','"+name+"')><span id='result_"+name+"_"+i+"'>"+item.currency+"</span>&nbsp;&nbsp;&nbsp;&nbsp;"
						+item.currency_name+"</li>");
				})
			}
		}
	});
}

/***********************  SEARCHING IN FIELD FROM  ***********************/
$('#search_forex_text_from').keyup(function(e){
	ajaxForexList('from');
});

/**************************  SEARCHING IN FIELD TO  **********************/
$('#search_forex_text_to').keyup(function(e){
	ajaxForexList('to');
});

/**************************  SELECT CRYPTO FROM  *************************/
function give(id,name){
	let giv = document.getElementById(id).innerHTML;
	document.getElementById("search_forex_text_"+name).value = giv;
	$("#result_"+name).empty();

}