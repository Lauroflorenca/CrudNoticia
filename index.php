<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>CRUD NOTICIA</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <h1> CRUD DE NOTÍCIAS </h1>

  <h2> Criar/Editar Notícia </h2>
  <h3 id="aviso">  </h3>

    <div class="container">
      <div class="form-group">
        <label for="tituloNt">Titulo</label>
        <input type="text" class="form-control" id="tituloNt"  placeholder="Titulo">
      </div>
      <div class="form-group">
        <label for="slugNt">Slug</label>
        <input type="text" class="form-control" id="slugNt"  placeholder="Slug">
      </div>
      <div class="form-group">
        <label for="descNt">Descrição</label>
        <input type="text" class="form-control" id="descNt"  placeholder="Descrição">
      </div>
      <div class="form-group">
        <label for="conteNt">Conteúdo</label>
        <textarea id="ConteNt" class="form-control" name="w3review" rows="4" cols="50"></textarea>
      </div>
      <div class="form-group">
        <label for="plcvNt">Palavras chaves</label>
        <input type="text" class="form-control" id="plcvNt"  placeholder="Palavras chaves">
        <small  class="form-text text-muted">separadas por virgula!</small>
      </div>
      <input type="hidden" id="idNt" >
      <div class="container d-flex">
        <button class="btn btn-primary" id="btnSalvar" onclick="enviaSolicitacao(1)">Salvar</button>
        <button class="btn btn-Danger" style="display:none" id="btnRemove" onclick="enviaSolicitacao(2)">Remover</button>
      </div>
    </div>


  <br><br>
  <div id="ultimasNt"></div>

</div>
</body>
<script  type="text/javascript" src="js/funcoes.js"></script>
</html>
