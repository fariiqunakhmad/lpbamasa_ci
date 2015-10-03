
function showDetailDaftarPresensiHarian(idjph, bulan) {
    if (bulan === "") {
        $("#detail").empty();
    } else {
        var host= config.base;
        $("#detail").load(host+"hari_kerja/get_daftar_hari_kerja/"+idjph+"/"+bulan);
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
