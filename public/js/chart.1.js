Highcharts.SparkLine = function (a, b) {
     options = b,
     defaultOptions = {
      
         chart: {
             
             renderTo: a,
             backgroundColor: null,
             borderWidth: 0,
             
             margin: [2, 0, 2, 0],
             
             height: 38,
             style: {
                 
                 overflow: 'visible'
             },

             skipClone: true
         }, 
                  
         title: {
             text: ''
         },
         credits: {
             enabled: false
         },
         xAxis: {
             type: 'datetime',
           
             labels: {
                 enabled: false
             },
             title: {
                 text: null
             },
             lineColor: 'transparent',
             startOnTick: false,
             endOnTick: false,
             tickPositions: []
         },
         yAxis: {
             
             endOnTick: false,
             startOnTick: false,
             labels: {
                 enabled: false
             },
             title: {
                 text: null
             },
             tickPositions: [0]
         },
         legend: {
             enabled: false
         },
         tooltip: {
             hideDelay: 0,
             outside: true,
             shared: true,
             backgroundColor: 'rgba(0, 0, 0, 0.65)',
             style: {
                 color: '#F0F0F0'
             },
         },
         plotOptions: {
             area: {
                 fillColor: {
                     linearGradient: {
                         x1: 0,
                         y1: 0,
                         x2: 0,
                         y2: 1
                     },
                     stops: [
                         [0, Highcharts.Color(b.series[0].color).setOpacity(0.5).get('rgba')],
                         [0.9, Highcharts.Color(b.series[0].color).setOpacity(0.09).get('rgba')]
                     ]
                 },
                 marker: {
                     radius: 2
                 },
                 lineWidth: 1,
                 states: {
                     hover: {
                         lineWidth: 1
                     }
                 },
                 threshold: null
             },
             series: {
                
                 animation: false,
                 lineWidth: 1,
                 shadow: false,
                 states: {
                     hover: {
                         lineWidth: 1
                     }
                 },
                 marker: {
                     radius: 3,
                     states: {
                         hover: {
                             radius: 4
                         }
                     }
                 },
                  
                 fillOpacity: 0.25
             },
         
         }
     };

 options = Highcharts.merge(defaultOptions, options);

 return  new Highcharts.Chart(a, options);
    
};

let $tr_coin = $('tr[coin_id]');
let len = $tr_coin.length;
let array_symbols_fail = []; 

function get_url(){
    let arrUrl = [];
    for ( let i = 0; i < len; i += 1) {       
        let $tr_i = $($tr_coin[i]);
        let symbol_coin = $tr_i.attr('coin_href').substring(6);    
        arrUrl.push(symbol_coin);
    }
    return arrUrl;
}

function renderGraph(price,$td, symbol_coin, line_color){
    $td.highcharts('SparkLine', {
        series: [{
            type: 'area',
            data: price,
            color: line_color,//'#FF0000', //#00B600
            marker: {
                enabled: false
            }
        }],
        tooltip: {
            pointFormat: '<b>'+symbol_coin+' {point.y}</b> $'
        }, 
    });
}
// get_url().forEach(function(symbol_coin, i){
//     let $tr_i = $($tr_coin[i]);
//     let $td = $tr_i.find('#highcharts-q6qp1d2-0');
//     setTimeout(() => {
//         $.getJSON('https://min-api.cryptocompare.com/data/histohour?fsym='+symbol_coin+'&tsym=USD&limit=20', function(data) {
//             let price = [];    
//             // let symbol_coin = $tr_i.attr('coin_href').substring(6);
//             // console.log(data);
//             data.Data.forEach(item => {
//                 price.push([(item.time*1000),item.close]);
//             });
//             // console.log($td);
//             sign = $tr_i.find('span.price.up').text();            
//             if(sign){
//                 line_color = '#26da71';
//             }
//             else {
//                 line_color = '#FF0000';
//             }
//             renderGraph(price, $td, symbol_coin,line_color);
//         });
//     }, 550 * (i));
// });
// for ( let i = 0; i < len; i += 1) {        
//      let $tr_i = $($tr_coin[i]);
//      let symbol_coin = $tr_i.attr('coin_href').substring(6);    
//      setInterval(function (){
//         $.getJSON('https://min-api.cryptocompare.com/data/histohour?fsym='+symbol_coin+'&tsym=USD&limit=20', function (data) {
//             //console.log(symbol_coin);
//             $td = $tr_i.find('#highcharts-q6qp1d2-0');
//             sign = $tr_i.find('span.price.up').text();            
//             if(sign){
//                 line_color = '#26da71';
//             }
//             else {
//                 line_color = '#FF0000';
//             }
//             var price = [];           
//             if(data.Data.length !== 0){
//                console.log(symbol_coin);
//                data.Data.forEach(item => {
//                    price.push([(item.time*1000),item.close]);
//                 });
//             }else{
//                 console.log(symbol_coin);
//             }           
//                $td.highcharts('SparkLine', {
//                    series: [{
//                        type: 'area',
//                        data: price,
//                        color: line_color,//'#FF0000', //#00B600
//                        marker: {
//                            enabled: false
//                        }
//                    }],
//                    tooltip: {
//                        //headerFormat: '<span style="font-size: 10px">{point.x}:</span><br/>',
//                        pointFormat: '<b>'+symbol_coin+' {point.y}</b> $'
//                    }, 
//                });
//            });
//      },5000);   
// }

setInterval(function () {
    $tr_coin = $('tr[coin_id]');
    len = $tr_coin.length;
   // console.log($tr_coin + " " + len);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '/dbData',
        success: function(response) {
            for (let index = 0; index < response.length; index++) {
               for ( let i = 0; i < len; i += 1) {
                    let $tr_i = $($tr_coin[i]);
                    if(response[index].name == $tr_i.find('#name').text()){
                        price = $tr_i.find('#price').text(response[index].pricetoString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                        btc_price = $tr_i.find('#btc_price').text(response[index].btc_pricetoString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                        market_cap = $tr_i.find('#market_cap').text(response[index].market_captoString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                        volume = $tr_i.find('span.volume-859').text(response[index].volume_24htoString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                        if(response[index].percent_change_24h < 0){
                            percentage = $tr_i.find('#p_down').text(response[index].percent_change_24h*100 + "%");
                        }else{
                            percentage = $tr_i.find('#p_up').text(response[index].percent_change_24h*100 + "%");
                        }
                        if(response[index].percent_change7d < 0){
                            percentage = $tr_i.find('#p_down_7').text(response[index].percent_change7d*100 + "%");
                        }else{
                            percentage = $tr_i.find('#p_up_7').text(response[index].percent_change7d*100 + "%");
                        }
                        if(response[index].percent_change14d < 0){
                            percentage = $tr_i.find('#p_down_14').text(response[index].percent_change14d*100 + "%");
                        }else{
                            percentage = $tr_i.find('#p_up_14').text(response[index].percent_change14d*100 + "%");
                        }
                        if(response[index].percent_change30d < 0){
                            percentage = $tr_i.find('#p_down_30').text(response[index].percent_change30d*100 + "%");
                        }else{
                            percentage = $tr_i.find('#p_up_30').text(response[index].percent_change30d*100 + "%");
                        }
                        if(response[index].percent_change90d < 0){
                            percentage = $tr_i.find('#p_down_90').text(response[index].percent_change90d*100 + "%");
                        }else{
                            percentage = $tr_i.find('#p_up_90').text(response[index].percent_change90d*100 + "%");
                        }
                    }                  
                }     
            }
        },
        error: function(){
            console.log("ERROR");
        }
    });
},(40000));