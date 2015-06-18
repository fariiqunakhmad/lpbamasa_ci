/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getBiayaW(idw){
    if(idw === ''){
        setBayarPW(0);
    } else{
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                setBayarPW(xmlhttp.responseText);
            };
        };
        var host= config.base;
        xmlhttp.open("GET",host+"pendaftaran_wisuda/get_biayaw/"+idw,true);
        xmlhttp.send();
    }
}
function setBayarPW(biaya){
    document.form1.bayarpw.value=biaya;
}


