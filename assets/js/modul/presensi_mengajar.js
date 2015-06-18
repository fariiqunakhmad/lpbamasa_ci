
function showDetailDaftarPresensiMengajar(idkmk) {
    if (idkmk === "") {
        $("#detail").empty();
    } else {
        var host= config.base;
        $("#detail").load(host+"presensi_mengajar/get_daftar_presensi_mengajar/"+idkmk);
    }
}
function getKMK(idkmk){
    if(idkmk === ''){
        setPertemuan();
        setNIP();
    } else{
        var host= config.base;
        $.getJSON(host+"presensi_mengajar/get_kmk/"+idkmk, function(data) {
            setPertemuan(parseInt(data.PERTEMUAN)+1);
            setNIP(data.NIP);
        });
    } 
}
function setPertemuan(pertemuan){
    if(pertemuan===undefined){
        pertemuan='';
    }
    document.form1.pertemuan.value=pertemuan;
}
function setNIP(nip){
    document.form1.nip.value=nip;
}
