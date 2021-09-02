
<?php $this->layout('modelos/layoutPergunta', ['title' => $title]);

$this->insert('modelos/base', [
   'conteudo' => '
   <p class="card-text">
      1. Nome do(a) coordenador(a) da pesquisa*: <input class="form-control-sm" type="text" name="q1">
   </p>
   '
]);

$this->insert('modelos/base', [
   'conteudo' => '
   <p class="card-text">
   2. Principal Grande Área de Atuação*:
   <br>
   <label class="mt-2 ml-3"><input type="radio" name="q2" value="Ciências Exatas e da Terra"> Ciências Exatas e da Terra</label>
   <br>
   <label class="ml-3"><input type="radio" name="q2" value="Engenharias"> Engenharias</label>
   <br>
   <label class="ml-3"><input type="radio" name="q2" value="Ciências Agrárias"> Ciências Agrárias</label>
   <br>
   <label class="ml-3"><input type="radio" name="q2" value="Ciências Humanas"> Ciências Humanas</label>
   <br>
   <label class="ml-3"><input type="radio" name="q2" value="Ciência Biológicas"> Ciência Biológicas</label>
   <br>
   <label class="ml-3"><input type="radio" name="q2" value="Ciências da Saúde"> Ciências Sociais Aplicadas</label>
   <br>
   <label class="ml-3"><input type="radio" name="q2" value="Linguística, Letras e Artes"> Linguística, Letras e Artes</label>
   <br>
   <label class="ml-3">Outras: <input class="form-control-sm" type="text" name="q2Outras"></label>
</p>
   '
]);

$this->insert('modelos/base', [
   'conteudo' => '
   <p class="card-text">
      3. Principal Subárea de Atuação: <input class="form-control-sm" type="text" name="q3">
   </p>
   '
]);

$this->insert('modelos/base', [
   'conteudo' => '
   <p class="card-text">
      4. Telefones para contato com DDD (preferencialmente celular)*: <input class="form-control-sm" type="text" name="q4">
   </p>
   '
]);
