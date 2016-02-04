
function detailFormatter(index, row) {
    var host= config.base;
    var html;
    html=$.ajax({
        url     : host+"penggajian/detail/"+row['0'], 
        global: false,
        async:false,
        error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR+' + '+textStatus+' + '+ errorThrown)
                    }
    }).responseText;
    html+=$.ajax({
        url     : host+"penggajian/komponen_penggajian/"+row['0'], 
        global: false,
        async:false,
        error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR+' 1 + '+textStatus+' + '+ errorThrown)
                    }
    }).responseText;
    html+=$.ajax({
        url     : host+"penggajian/komponen_cicilan_kasbon/"+row['0'], 
        global: false,
        async:false,
        error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR+' 2 + '+textStatus+' + '+ errorThrown)
                    }
    }).responseText;
    return html;
}
function detailPegawaiPenggajian(index, row) {
        var host= config.base;
    var html;
    html=$.ajax({
        url     : host+"penggajian/detail_gaji_pegawai/"+row['1']+"/"+row['2'], 
        global: false,
        async:false,
        error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR+' + '+textStatus+' + '+ errorThrown)
                    }
    }).responseText;
    return html;
}
function detailCKPegawaiPenggajian(index, row) {
        var host= config.base;
    var html;
    html=$.ajax({
        url     : host+"penggajian/detail_cicilan_kasbon_pegawai/"+row['1']+"/"+row['2'], 
        global: false,
        async:false,
        error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR+' + '+textStatus+' + '+ errorThrown)
                    }
    }).responseText;
    return html;
}



