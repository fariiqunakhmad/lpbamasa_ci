
function showDaftarPresensiHarian(idjph, bulan) {
    if (bulan === "") {
        $("#detail").empty();
    } else {
        var host= config.base;
        $("#detail").load(host+"presensi_harian/get_daftar_presensi_harian/"+idjph+"/"+bulan);
    }
}

function checkAll(){
    var c = document.form1.h;
    if(c.length !== undefined){
        for (i=0;i<c.length;i++) {
            c[i].checked=true;
        }
    } else{
        c.checked=true;
    }
}
function setAllH() {
    if(document.form1.hall.checked){
        checkAll();
    }
}
