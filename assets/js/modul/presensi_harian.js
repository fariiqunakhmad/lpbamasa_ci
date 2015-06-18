
function showDetailDaftarPresensiHarian(idjph, bulan) {
    if (bulan === "") {
        $("#detail").empty();
    } else {
        var host= config.base;
        $("#detail").load(host+"presensi_harian/get_daftar_presensi_harian/"+idjph+"/"+bulan);
    }
}

function sumCheckedRow() {
    var check=document.form1.check;
    document.form1.total.value = '';
    var sum = 0;  
    if(check.length!== undefined){
        for (i=0;i<check.length;i++) {
            //document.writeln(check[i].getAttribute('data-biaya'));
            if (check[i].checked) {
                //document.writeln('checked= '+check[i].getAttribute('data-biaya'));
                sum += parseInt(check[i].getAttribute('data-biaya'));
            }
        }
    } else{
        //document.writeln('bukan array');
        //document.writeln(check.getAttribute('data-biaya'));
        if (check.checked) {
            //document.writeln('checked= '+check.getAttribute('data-biaya'));
            sum = parseInt(check.getAttribute('data-biaya'));
        }
    }
    document.form1.total.value = sum;
}
function checkAll(){
    var c = document.form1.check;
    if(c.length !== undefined){
        for (i=0;i<c.length;i++) {
            c[i].checked=true;
        }
    } else{
        c.checked=true;
    }
}
function uncheckAll(){
    var c = document.form1.check;
    if(c.length !== undefined){
        for (i=0;i<c.length;i++) {
            c[i].checked=false;
        }
    } else{
        c.checked=false;
    }
}
function setAllCheckbox() {
    if(document.form1.checkall.checked){
        checkAll();
    }
    if(!document.form1.checkall.checked){
        uncheckAll();
    }
    sumCheckedRow();
}
