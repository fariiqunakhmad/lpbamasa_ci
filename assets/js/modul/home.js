/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var dDonut;
var kDonut;
function setKas(tahun){
    if(typeof tahun == "undefined"){
        durl = config.base+'home/get_donut_material/1';
        kurl = config.base+'home/get_donut_material/2';
        rurl = config.base+'home/get_resume';
    } else{
        durl = config.base+'home/get_donut_material/1/'+tahun;
        kurl = config.base+'home/get_donut_material/2/'+tahun;
        rurl = config.base+'home/get_resume/'+tahun;
    }
    $.ajax({
        url: durl, // getchart values
        dataType: 'JSON',
        type: 'POST',
        data: {get_values: true},
        success: function(response) {
            dDonut.setData(response);
        }
    });
    $.ajax({
        url: kurl, // getchart values
        dataType: 'JSON',
        type: 'POST',
        data: {get_values: true},
        success: function(response) {
            kDonut.setData(response);
        }
    });
    $.getJSON(rurl, function(data) {
        $('#saldo').html('Saldo : Rp '+number_format( data[0].SALDO, 2, ',', '.'));
        $('#debet').html('Jumlah : Rp '+number_format( data[0].DEBET, 2, ',', '.'));
        $('#kredit').html('Jumlah : Rp '+number_format( data[0].KREDIT, 2, ',', '.'));
    });
    
}
function initKas(){

    $.ajax({
        url: config.base+'home/get_donut_material/1', // getchart values
        dataType: 'JSON',
        type: 'POST',
        data: {get_values: true},
        success: function(response) {
            dDonut = new Morris.Donut({
                element: 'd-donut-chart',
                resize: true,
                data: response
            });
        }
    });
    $.ajax({
        url: config.base+'home/get_donut_material/2', // getchart values
        dataType: 'JSON',
        type: 'POST',
        data: {get_values: true},
        success: function(response) {
            kDonut = new Morris.Donut({
                element: 'k-donut-chart',
                resize: true,
                data: response,
                hideHover: 'auto'
            });
        }
    });
}


