function showPertimbangan(nip){
    var host= config.base;
    $.ajax({
        url: host+"kasbon/pertimbangan/"+nip, 
        success: function(result){
            $("#txtDetail").html(result);
        }
    });
}
function showCicilan(idkb){
    var host= config.base;
    $.ajax({
        url: host+"kasbon/detail/"+idkb, 
        success: function(result){
            $("#txtDetail").html(result);
        }
    });
}
function detailFormatter(index, row) {
    var host= config.base;
    var html;
    html=$.ajax({
        url     : host+"kasbon/detail/"+row['0'], 
        global: false,
        async:false,
        error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR+' + '+textStatus+' + '+ errorThrown)
                    }
    }).responseText;
    return html;
}



