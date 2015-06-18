
function getBMH(idbmh){
    if(idbmh === ''){
        setBayarDaftarBMH(0);
    } else{
        var host= config.base;
        $.getJSON(host+"pendaftaran_bmh/get_bmh/"+idbmh, function(data) {
            setBayarDaftarBMH(data.BIAYABMH);
            setPelaksanaan(data.TGLMULAIBMH, data.TGLAKHIRBMH);
        });
    } 
}
function setBayarDaftarBMH(biaya){
    document.form1.bayardaftarbmh.value=biaya;
}
function setPelaksanaan(mulai, akhir){
    document.form1.pelaksanaan.value=mulai+' s/d '+akhir;
}
function loadFormPesertaBMH(value){
    if(value==='baru'){
        var host= config.base;
        $("#formPesertaBMH").load(host+"pendaftaran_bmh/load_form_peserta_bmh");
    } else{
        $("#formPesertaBMH").empty();
    }
}


