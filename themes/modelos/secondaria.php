   <?php if (isset($mostrarSecondaria)) : ?>
      <div class="col-md-12 mt-4" id="questao<?= $id; ?>">
   <?php else : ?>
      <div class="col-md-12 mt-4 d-none" id="questao<?= $id; ?>">
   <?php endif; ?>

      <div class="card">
         <div class="card-body">
            <p class="card-text mr-3">
               <?= $pergunta; ?>
               <br>

               <?php if (isset($grande)) : ?>

                  <label class="ml-3"><input onchange="mudouRadioSecondaria('q<?= $id; ?>')" type="radio" class="radio2" name="q<?= $id; ?>" value="Outro" checked> <?= $classe ?>: </label>
                  <textarea class="form-control ml-3" name="q<?= $id; ?>_Outro" id="q<?= $id; ?>_Outro" rows="5" required><?= $respostas["q" . $id . "_Outro"]['resposta']; ?></textarea>

               <?php else : ?>

                  <label class="ml-3"><input onchange="mudouRadioSecondaria('q<?= $id; ?>')" type="radio" class="radio2" name="q<?= $id; ?>" value="Outro" checked> <?= $classe ?>:
                  
                  <?php if(isset($tipo)): ?>

                     <?php if($tipo == "float"): ?>
                        <input type="number" step="any" class="form-control-sm" name="q<?= $id; ?>_Outro" id="q<?= $id; ?>_Outro" value="<?= $respostas["q" . $id . "_Outro"]['resposta']; ?>" required></label>
                     <?php elseif($tipo == "inteiro"): ?>
                        <input type="number" class="form-control-sm" name="q<?= $id; ?>_Outro" id="q<?= $id; ?>_Outro" value="<?= $respostas["q" . $id . "_Outro"]['resposta']; ?>" required></label>
                     <?php endif; ?>   
                     
                  <?php else : ?>
                     <input type="text" class="form-control-sm" name="q<?= $id; ?>_Outro" id="q<?= $id; ?>_Outro" value="<?= $respostas["q" . $id . "_Outro"]['resposta']; ?>" required></label>
                  <?php endif; ?>

               <?php endif; ?>
               <br>
               <label class="mt-2 ml-3"><input onchange="mudouRadioSecondaria('q<?= $id; ?>')" type="radio" class="radio2" name="q<?= $id; ?>" value="Não sei/Não lembro"> Não sei/Não lembro</label>
               <br>
               <label class="ml-3"><input onchange="mudouRadioSecondaria('q<?= $id; ?>')" type="radio" class="radio2" name="q<?= $id; ?>" value="Prefiro não responder"> Prefiro não responder</label>
            </p>
         </div>
      </div>
   </div>