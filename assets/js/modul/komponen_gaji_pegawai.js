
function showDetail(str) {
    if (str === "") {
        document.getElementById("detail").innerHTML = "";
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
                document.getElementById("detail").innerHTML = xmlhttp.responseText;
                var arr = document.getElementsByTagName('script');
                for (var n = 0; n < arr.length; n++)
                    eval(arr[n].innerHTML);//run script inside div
            };
        };
        var host= config.base;
        xmlhttp.open("GET",host+"komponen_gaji_pegawai/detail_per_pegawai/"+str,true);
        xmlhttp.send();
    }
}
