
    function attUltimasNt(){

        //VOLTA MENU
        document.getElementById("btnRemove").style.display = "none";
        document.getElementById("idNt").value = 0;
        document.getElementById("btnSalvar").setAttribute('onclick', 'enviaSolicitacao(1)'); 

        document.getElementById("tituloNt").value = "";
        document.getElementById("slugNt").value = "";
        document.getElementById("descNt").value = "";
        document.getElementById("ConteNt").value = "";
        document.getElementById("plcvNt").value = "";


        var formData = new FormData(); 
        formData.append("ultimasAtt", true);
        
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
            {
                console.log(xmlHttp.responseText);
                document.getElementById("ultimasNt").innerHTML = xmlHttp.responseText;
            }
        }
        xmlHttp.open("post", "php/crud.php"); 
        xmlHttp.send(formData); 
    }
    attUltimasNt()

    function editaNT(idNT){

        document.getElementById("btnRemove").style.display = "block";
        document.getElementById("btnSalvar").setAttribute('onclick', 'enviaSolicitacao(3)'); 

        document.getElementById("tituloNt").value = document.getElementById("tituloUlt"+idNT).innerText;
        document.getElementById("slugNt").value = document.getElementById("slugUlt"+idNT).innerText;
        document.getElementById("descNt").value = document.getElementById("descUlt"+idNT).innerText;
        document.getElementById("ConteNt").value = document.getElementById("conteUlt"+idNT).innerText;
        document.getElementById("plcvNt").value = document.getElementById("plcvUlt"+idNT).innerText;
        document.getElementById("idNt").value = idNT;
    }
   
    function enviaSolicitacao(acao){

        if(acao == 1){//NOVO
            
            var titulo = document.getElementById("tituloNt").value;
            var slugNt = document.getElementById("slugNt").value;
            var descNt = document.getElementById("descNt").value;
            var conteNt = document.getElementById("ConteNt").value;
            var plcvNt = document.getElementById("plcvNt").value;

            var formData = new FormData(); 

            formData.append("titulo", titulo);
            formData.append("slug", slugNt);
            formData.append("desc", descNt);
            formData.append("conte", conteNt);
            formData.append("plcv", plcvNt);
            formData.append("nova", true);//INFORMA NOVA NT
        }else if(acao == 2){//REMOVE

            var idNt = document.getElementById("idNt").value;

            var formData = new FormData(); 
            formData.append("idNt", idNt);
            formData.append("remove", true);//INFORMA RM NT
        }else if(acao == 3){//ATUALIZAR
            var formData = new FormData(); 

            var titulo = document.getElementById("tituloNt").value;
            var slugNt = document.getElementById("slugNt").value;
            var descNt = document.getElementById("descNt").value;
            var conteNt = document.getElementById("ConteNt").value;
            var plcvNt = document.getElementById("plcvNt").value;
            var idNt = document.getElementById("idNt").value;

            formData.append("titulo", titulo);
            formData.append("slug", slugNt);
            formData.append("desc", descNt);
            formData.append("conte", conteNt);
            formData.append("plcv", plcvNt);

            formData.append("idNt", idNt);
            formData.append("att", true);//INFORMA ATT NT
        }    
        


        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
            {
                console.log(xmlHttp.responseText);
                document.getElementById("aviso").innerText = xmlHttp.responseText;
                attUltimasNt();
            }
        }
        xmlHttp.open("post", "php/crud.php"); 
        xmlHttp.send(formData); 
   }

