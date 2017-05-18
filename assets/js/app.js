/**
 * Created by NicolasLEROY on 18/05/2017.
 */



function showResult(str) {
    if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        return;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            if (str.length > 1) {
                document.getElementById("livesearch").innerHTML = this.responseText;
                document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
                document.getElementById("livesearch").style.backgroundColor = "white";
                document.getElementById("livesearch").style.display = "block";
            }
            if (str.length <= 1) {
                document.getElementById("livesearch").style.display = "none";
            }
        }
    };
    xmlhttp.open("GET","/architecture_de_votre_region2/public/ajax.php?&q="+str,true);
    xmlhttp.send();
}

