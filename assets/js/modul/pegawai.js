
function detailFormatter(index, row) {
    //console.info(row);
    var host= config.base;
    var html;
    html=$.ajax({
        url     : host+"pegawai/detail_1/"+row['1'], 
        global: false,
        async:false,
        error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR+' + '+textStatus+' + '+ errorThrown)
                    }
    }).responseText;
    return html;
}
function showAva(nip){
    var host= config.base;
    $.ajax({
        url: host+"pegawai/show_ava/"+nip, 
        success: function(result){
            $("#ava").html(result);
        }
    });
}



