
function showKbkDd(ida){
    var host= config.base;
    $.ajax({
        type: 'GET',
        url: host+"biaya_kuliah/get_kbk_dd/"+ida, 
        success: function(result){
            $("#txtidkbk").html(result);
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



