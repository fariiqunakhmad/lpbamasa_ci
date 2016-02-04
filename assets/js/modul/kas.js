
function footerNominal(data) {
    var d=sumNominalD(data);
    var k=sumNominalK(data);
    var j=0;
    if(d<k){
        j=k;
    } else{
        j=d;
    }
    var s=d-k;
    if(s<0){
        s*=(-1);
        $('#saldod').html('<div class="pull-left">Rp </div>'+number_format( s, 2, ',', '.'));
    } else if(s>0){
        $('#saldok').html('<div class="pull-left">Rp </div>'+number_format( s, 2, ',', '.'));
    }
//    $('#jumlahd').html(number_format( d, 2, ',', '.'));
//    $('#jumlahk').html(number_format( k, 2, ',', '.'));

    return '<div class="pull-left">Rp </div>'+number_format( j, 2, ',', '.');
}
function footerNominalD(data) {
    var d=sumNominalD(data);
    var k=sumNominalK(data);
    var s=d-k;
    if(s<0){
        s*=(-1);
        $('#saldod').html('<div class="pull-left">Rp </div><div class="pull-right">'+number_format( s, 2, ',', '.')+'</div>');
        $('#saldok').html('');
        return '<div class="pull-left">Rp </div>'+number_format( d+s, 2, ',', '.');
    } else if(s>0){
        return '<div class="pull-left">Rp </div>'+number_format( d, 2, ',', '.');
    }
}
function footerNominalK(data) {
    var d=sumNominalD(data);
    var k=sumNominalK(data);
    var s=d-k;
    if(s<0){
        return '<div class="pull-left">Rp </div>'+number_format( k, 2, ',', '.');
    } else if(s>0){
        $('#saldod').html('');
        $('#saldok').html('<div class="pull-left">Rp </div><div class="pull-right">'+number_format( s, 2, ',', '.')+'</div>');
        return '<div class="pull-left">Rp </div>'+number_format( k+s, 2, ',', '.');
    }
}

function sumNominalD(data) {    
    var total = 0;
    $.each(data, function (i, row) {
        var nom=row.nominald;
        nom=nom.replace(/[^0-9\,]+/g,'');
        nom= parseInt(nom.replace(',00',''));
        if (isNaN(nom)) {
            nom=0;
        }
        total += nom;
    });
    return total;
}
function sumNominalK(data) {
    var total = 0;
    $.each(data, function (i, row) {
        var nom=row.nominalk;
        nom=nom.replace(/[^0-9\,]+/g,'');
        nom= parseInt(nom.replace(',00',''));
        if (isNaN(nom)) {
            nom=0;
        }
        total += nom;
    });
    return total;
}
function footerTanggal() {
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' +(month<10 ? '0' : '') + month + '-' +(day<10 ? '0' : '') + day;
    return output;
}
function onLoad(){
    var totalPages = $('#kas').bootstrapTable('getTotalPages');
    $('#kas').bootstrapTable('selectPage', totalPages);
}
function detailKas(index, row) {
    
    var idtrans=row['ref'];
    var obj;
    var html;
    switch(idtrans.substr(0,2)) {
        case 'PB':
            obj='pembayaran_biaya_kuliah';
            html=getDetail(obj, idtrans);
            break;
        case 'pw':
            obj='pendaftaran_wisuda';
            html=getDetail(obj, idtrans);
            break;
        case 'pb':
            obj='pendaftaran_bmh';
            html=getDetail(obj, idtrans);
            break;
        case 'GP':
            obj='penggajian';
            html=getDetail(obj, idtrans);
            if(row['dkkas']==='1'){
                html+=getDetail(obj, idtrans, 'komponen_cicilan_kasbon');
            }else{
                html+=getDetail(obj, idtrans, 'komponen_penggajian');
            }
            break;
        case 'gp':
            obj='penggajian';
            html=getDetail(obj, idtrans);
            if(row['dkkas']==='1'){
                html+=getDetail(obj, idtrans, 'komponen_cicilan_kasbon');
            }else{
                html+=getDetail(obj, idtrans, 'komponen_penggajian');
            }
            break;
        case 'kb':
            obj='kasbon';
            html=getDetail(obj, idtrans);
            break;
        case 'KB':
            obj='kasbon';
            html=getDetail(obj, idtrans);
            break;
        case 'ts':
            obj='tsl';
            html=getDetail(obj, idtrans);
            break;
        case '':
            html='';
            break;
    }
    
    
    return html;
}
function detailPegawaiPenggajian(index, row) {
    var obj='penggajian';
    var idtrans=row['1']+"/"+row['2'];
    var f='detail_gaji_pegawai';
    return getDetail(obj, idtrans, f);
}
function detailCKPegawaiPenggajian(index, row) {
    var obj='penggajian';
    var idtrans=row['1']+"/"+row['2'];
    var f='detail_cicilan_kasbon_pegawai';
    return getDetail(obj, idtrans, f);
}
function getDetail(obj, idtrans, f){
    f = typeof f !== 'undefined' ? f : 'detail';
    var host= config.base;
    var url=host+obj+"/"+f+"/"+idtrans;
    var html=$.ajax({
                url     :url , 
                global: false,
                async:false,
                error: function (jqXHR, textStatus, errorThrown) {alert(jqXHR+' + '+textStatus+' + '+ errorThrown)}
            }).responseText;
    return html
}