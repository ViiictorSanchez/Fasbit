/*************************************************************************/
/*************************  ADMIN SECTION  *******************************/
/*************************************************************************/

$('#list_search_stock').hide();
$('#errorStock').hide();
$('.lds-roller').hide();


let API = 'S672N57EU2CP2L0I';
$("#search_stock_form").submit((e)=>{
    $('#list_search_stock').hide("slow");
    $('.lds-roller').show();
    e.preventDefault();
    let val = $("#search_stock_text").val();
    $url = 'https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords='+val+'&apikey='+API;

    $.ajax({
        type: "GET",
        url: $url,
        success: function(data) {
            $('.lds-roller').hide();
            let html = '';
            data.bestMatches.map((item)=>{     
                //console.log(item);
                let array = "'"+item['1. symbol']+ ','+item['2. name']+','+item['4. region']+"'";
                let aux = '<li onclick="add_stock('+array+');">'+
                                '<strong>'+item['1. symbol']+' </strong>'+
                                '<span> - '+item['2. name']+' </span>'+
                                '<span> | '+item['4. region']+' </span>'+
                            '</li>';
                html += aux;
            });
            let ul = document.getElementById("list_search_stock");
            ul.innerHTML = html;
            $('#list_search_stock').show("slow");
        },
       
        error: function(){
            document.getElementById('error-t').innerHTML  = 'Error, it cannot access to the API in this moment, please try again.'; 
            $('.lds-roller').hide();
            $('#errorStock').click();
            
        }
    
    });
    
});


function add_stock(array){
    //var URL = "https://market.fasbit.com/cron/test.php";
    let _data = array.split(",");
    let paramns = {
        symbol: _data[0],
        name: _data[1],
        region: _data[2]
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/admin/stocks",
        data: paramns,
        success: function(data) {
            console.log(data);
            if(data == "error") $('#errorStock').click();
            else location.reload();
        },
        error: function(){
            document.getElementById('error-t').innerHTML  = "Error, it could not save the API's data, please try to add it again";
            $('#errorStock').click();
        }
    });
}


setInterval((e)=>{
    if($("#search_stock_text").val() == '') $('#list_search_stock').hide("slow");
}, 500);

/*************************************************************************/
/************************ END  ADMIN SECTION *****************************/
/*************************************************************************/


/*************************************************************************/
/**************************  GLOBAL SECTION  *****************************/
/*************************************************************************/
$(document).ready(()=>{
    //let data = [];
    $(".table").find("td[data-id]").each(function(){
        //data.push($(this).attr("data-id"));
        $url = 'https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol='+$(this).attr("data-id")+'&apikey='+API;
        //data.push($url);
        $.ajax({
            type: "GET",
            url: $url,
            success: function(data) {
                $("#"+data["Global Quote"]['01. symbol']+"Open").text(data["Global Quote"]['02. open']);
                $("#"+data["Global Quote"]['01. symbol']+"High").text(data["Global Quote"]['03. high']);
                $("#"+data["Global Quote"]['01. symbol']+"Low").text(data["Global Quote"]['04. low']);
                $("#"+data["Global Quote"]['01. symbol']+"Price").text(data["Global Quote"]['05. price']);
                $("#"+data["Global Quote"]['01. symbol']+"Volume").text(data["Global Quote"]['06. volume']);
                //console.log($("#"+data["Global Quote"]['01. symbol']+"Open"));
                //console.log(data)
            }
        });
    });
    $('#loading').hide();
    $(".itemsStock").show("slow");
    //console.log(data);
})
/*************************************************************************/
/************************ END  GLOBAL SECTION ****************************/
/*************************************************************************/
