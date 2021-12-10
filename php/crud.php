<?php


/*
titulo, slug, desc, conte, plcv, idNt, remove
*/

function novaNT(){
    $mysqli = new mysqli("localhost","root","root","noticiasCrud");

    if ($mysqli -> connect_errno) {
    echo "Erro ao conectar com o MySQL: " . $mysqli -> connect_error;
    exit();
    }

    $sql = "INSERT INTO lauro_noticias (nm_titulo, nm_slug, nm_desc, nm_conteudo, nm_plcv) VALUES ('$_POST[titulo]', '$_POST[slug]', '$_POST[desc]', '$_POST[conte]', '$_POST[plcv]')";
    $result = $mysqli -> query($sql);

    if($result){
        echo "Notícia adicionada com sucesso! NOVA";
    }else{
        echo "Algo deu errado, tente novamente! NOVA";
    }

    $mysqli -> close();
}

function editaNT(){
    $mysqli = new mysqli("localhost","root","root","noticiasCrud");

    if ($mysqli -> connect_errno) {
    echo "Erro ao conectar com o MySQL: " . $mysqli -> connect_error;
    exit();
    }

    $sql = "UPDATE lauro_noticias SET nm_titulo = '$_POST[titulo]', nm_slug = '$_POST[slug]', nm_desc = '$_POST[desc]', nm_conteudo = '$_POST[conte]', nm_plcv = '$_POST[plcv]' WHERE cd_noticia = '$_POST[idNt]'";
    $result = $mysqli -> query($sql);
    
    if($result){
        echo "Notícia Atualizada com sucesso! EDITA";
    }else{
        echo "Algo deu errado, tente novamente! EDITA";
    }

    $mysqli -> close();
}

function removeNT(){

    $mysqli = new mysqli("localhost","root","root","noticiasCrud");

    if ($mysqli -> connect_errno) {
    echo "Erro ao conectar com o MySQL: " . $mysqli -> connect_error;
    exit();
    }

    $sql = "DELETE FROM lauro_noticias  WHERE cd_noticia = $_POST[idNt]";
    $result = $mysqli -> query($sql);

    if($result){
        echo "Notícia atualizada com sucesso! REMOVE";
    }else{
        echo "Algo deu errado, tente novamente! REMOVE";
    }

    $mysqli -> close();
}

function carregaUltimasNt(){

    $mysqli = new mysqli("localhost","root","root","noticiasCrud");

    if ($mysqli -> connect_errno) {
    echo "Erro ao conectar com o MySQL: " . $mysqli -> connect_error;
    exit();
    }

    $noticias = "<div class='container d-flex'>";
    $sql = "SELECT * FROM lauro_noticias ORDER BY cd_noticia DESC";

    $result = $mysqli->query($sql);


    while($row = $result-> fetch_assoc()){

        $noticias .= "
        <div class='card' style='width: 18rem;'>
            <div class='card-body'>
                <h5 class='card-title' id='tituloUlt$row[cd_noticia]'>$row[nm_titulo]</h5>
                <h6 class='card-subtitle mb-2 text-muted' id='slugUlt$row[cd_noticia]'>$row[nm_slug]</h6>
                <h6 class='card-subtitle mb-2 text-muted' id='descUlt$row[cd_noticia]'>$row[nm_desc]</h6>
                <p class='card-text' id='conteUlt$row[cd_noticia]'>$row[nm_conteudo]</p>
                <span class='card-subtitle mb-2 text-muted' id='plcvUlt$row[cd_noticia]'>$row[nm_plcv]</span><br><br>
                <button class='btn btn-primary' onclick='editaNT($row[cd_noticia])'>Editar</button>
            </div>
        </div>
        ";

    }

    echo $noticias."</div>";

    $mysqli -> close();
}



//NOVA
if(isset($_POST["nova"])){
    novaNT();
}

//ATT
if(isset($_POST["att"])){
    editaNT();
}

//REMOVE
if(isset($_POST["remove"])){
    removeNT();
}

//ULTIMAS
if(isset($_POST["ultimasAtt"])){
    carregaUltimasNt();
}

