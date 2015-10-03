function showDetail(nip) {
    showFormI('');
    if (nip === "") {
        $("#detail").empty();
    } else {
        var host= config.base;
        $("#detail").load(host+"komponen_gaji_pegawai/detail_per_pegawai/"+nip);
    }
}
function showFormI(nip) {
    if (nip === "") {
        $("#form").empty();
    } else {
        var host= config.base;
        $("#form").load(host+"komponen_gaji_pegawai/load_form/"+nip);
    }
}
function showFormU(nip, idkgp) {
            var host= config.base;
            $("#form").load(host+"komponen_gaji_pegawai/load_form/"+nip+"/"+idkgp);
}

function getGajiSatuan(nip, idkg){
    if(idkg === ''){
        $("#gajisatuan").val('');
    } else{
        var host= config.base;
        $.get(host+"komponen_gaji_pegawai/get_gajisatuan/"+nip+"/"+idkg,function (data){
            $("#gajisatuan").val( data );
        });
        $("#idkgp").val(nip+idkg);
    } 
}
function insert(event){
    
    dataString = $("#form1").serialize();
    var host= config.base;
    var action="komponen_gaji_pegawai/insert";
    $.ajax({
        type: "POST",
        url: host+action,
        data: dataString,

        success: function (data) {
            showDetail($("#nip").val());
        },
        error: function (data){
            alert('gagal');
        }

    });
    event.preventDefault();
}
function del(nip,id){
    var host= config.base;
    var action="komponen_gaji_pegawai/delete/"+id;
    $.ajax({
        type: "GET",
        url: host+action,

        success: function (data) {
            showDetail(nip);
        },
        error: function (data){
            alert('gagal');
        }

    });
}
function act(nip,id){
    var host= config.base;
    var action="komponen_gaji_pegawai/act/"+id;
    $.ajax({
        type: "GET",
        url: host+action,

        success: function (data) {
            showDetail(nip);
        },
        error: function (data){
            alert('gagal');
        }

    });
}
