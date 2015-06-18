function showDetailForm(str) {
    if (str === "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                var arr = document.getElementsByTagName('script');
                for (var n = 0; n < arr.length; n++)
                    eval(arr[n].innerHTML);//run script inside div
            };
        };
        var host= config.base;
        xmlhttp.open("POST",host+"pembayaran_biaya_kuliah/load_detail_form/"+str,true);
        xmlhttp.send();
    }

}
function showDetail(str) {
    if (str === "") {
        document.getElementById("txtDetail").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("txtDetail").innerHTML = xmlhttp.responseText;
                var arr = document.getElementsByTagName('script');
                for (var n = 0; n < arr.length; n++)
                    eval(arr[n].innerHTML);//run script inside div
            };
        };
        var host= config.base;
        xmlhttp.open("GET",host+"pembayaran_biaya_kuliah/detail/"+str,true);
        xmlhttp.send();
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
