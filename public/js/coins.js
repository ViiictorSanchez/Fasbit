/*************************************************************************/
/*************************  ADMIN SECTION  *******************************/
/*************************************************************************/

$('#list_search_coin').hide();
$('#errorStock').hide();
$('.lds-roller').hide();


$("#search_coin_form").submit((e)=>{
    $('#list_search_coin').hide("slow");
    $('.lds-roller').show();
    e.preventDefault();
    

    let val = $("#search_coin_text").val();
    $url = 'https://min-api.cryptocompare.com/data/coin/generalinfo?fsyms='+val.toUpperCase().trim()+'&tsym=USD';
    
    $.ajax({
        type: "GET",
        url: $url,
        success: function(data) {
            
            $('.lds-roller').hide();
            if(data.Message=="Success" && data.Data.length!=0){
                
                let html = '';
            
                let array = "'"+data.Data[0].CoinInfo.Id+','+data.Data[0].CoinInfo.Name+ ','+data.Data[0].CoinInfo.FullName+"'";
                let aux = '<li onclick="add_coin('+array+');">'+
                                '<strong>'+data.Data[0].CoinInfo.Name+' </strong>'+
                                '<span> - '+data.Data[0].CoinInfo.FullName+' </span>'+
                            '</li>';
                html += aux;
          
                let ul = document.getElementById("list_search_stock");
                ul.innerHTML = html;
                $('#list_search_stock').show("slow");

            }
            else{
                $('#list_search_stock').hide();
                document.getElementById('error-t').innerHTML  = 'This coin does not exists in the API';
                $('#errorStock').click();
            }
            
        },
        error: function(){
            document.getElementById('error-t').innerHTML  = 'Error, it could not access to the API in this moment, please try it again.'; 
            $('.lds-roller').hide();
            $('#errorStock').click();
           
        }

      
    });
    
});


function add_coin(array){
    
    let _data = array.split(",");
    let paramns = {
        id: _data[0],
        symbol: _data[1],
        name: _data[2],
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/admin/ccoins",
        data: paramns,
        success: function(data) {
            
            if(data == "error") {
                document.getElementById('error-t').innerHTML  = 'This is coin already added';
                $('#errorStock').click();
            }
            else{
                rank();
            } 
        },
        error: function() {
            document.getElementById('error-t').innerHTML  = "Error, it could not save the API's data, please try to add it again";
            $('#errorStock').click();
        }
    });

    
}

function rank(){
    

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: "/admin/ccoins/rank",
        success: function(data) {
            location.reload();
         
        },
        error: function() {
            document.getElementById('error-t').innerHTML  = "Error, it could not update top data";
            $('#errorStock').click();
            location.reload();
        }
    });

    
}


setInterval((e)=>{
    if($("#search_coin_text").val() == '') $('#list_search_coin').hide("slow");
}, 500); 