


<div class="modal-lancamento">
   <div class="modal-body">
     <div class="modal-header">
        <h3>Novo Lançamento</h3>
      </div>
    
      
      <div class="col-app">
        <div class="col-group">
           <form action="" method="POST">
            <div>
                <span>Tipo: </span>
                <div class="tipo-lancamento">
                    <label for="">Saída</label>
                     <input type="radio" name="tipo" id="" value="saida">
                </div>
                <div class="tipo-lancamento">
                    <label for="">Entrada</label>
                    <input type="radio" name="tipo" id="" value="entrada">
                </div>
            </div>
               <div class="m-3">
                 <label for="valor">Valor R$</label>
                 <input type="text" name="valor" id="valor-lancamento" placeholder="R$0,00">
               </div>
               <div class="m-3">
                    <label for="descricao">Descricao</label>
                    <textarea name="descricao" id="" cols="30" rows="10"></textarea>
                    <div><span>máx. 255 caracteres</span> </div>
               </div>
                <div class="m-3">
                 <button class="btn btn-fluxo" id="cancel">Cancelar</button>
                 <button class="btn btn-fluxo" id="salvar" type="submit">SALVAR</button>
               </div>
            </form>
        </div>
      </div>
   </div>
</div>




<header>
    <div class="container-app">
        <h2>Controle de fluxo de caixa</h2>
    </div>
</header>

<div class="container-app">
 <div class="row-app ">

    <div class="col-app text-center card-fluxo">
       <div class="header-fluxo entrada">
           <h4>Total Entradas</h4>
        </div>
        <div class="bottom-fluxo">
            <span id="vl-entrada">R$ <?= number_format($entradas,2,",","."); ?></span>
        </div>
    </div>
    <div class="col-app text-center card-fluxo">
        <div class="header-fluxo saidas">
             <h4>Total Saídas</h4>
        </div>
        <div  class="bottom-fluxo">
        <span id="vl-saida">R$ <?= number_format($saidas,2,",",".") ?></span>
        </div>
    </div>
    <div class="col-app text-center card-fluxo">
       <div class="header-fluxo caixa">
           <h4>Saldo</h4>
        </div>
        <div  class="bottom-fluxo">
         R$
        <span id="vl-caixa"><?= number_format($caixa,2,",","."); ?></span>
        </div>
    </div>

 </div>

 <div class="row-app">
    <div class="col-app">
        
        <div class="text-center">
            <h3>Últimos Lançamentos</h3>
        </div>
        <div class="pos-right">
            <button class="btn btn-fluxo" id="novo-lancamento">Novo lançamento</button>
        </div>
    </div>

    <div class="row-app mt-2">
        <?php if($lancamentos != null) : ?>
    <table class="table" id="tabela_fluxo">
        <thead class="mt-1">
            <tr>
                <th>Data / hora</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($lancamentos as $data) : ?>
                    <tr>
                     <td><?= date( "d/m/Y h:m:s",  strtotime($data->created_at));?></td>
                     <td><?= $data->tipo;?></td>
                     <td>R$ <?= number_format($data->valor,2 ,",",".");?></td>
                     <td><?= $data->descricao;?></td>
                     </tr>
                   <?php endforeach;?>
            </tbody>
        </table>
        <?php else : ?>
              <h3 class="text-center">
                  Ainda não há lançamentos a serem mostrados
              </h3>
            <?php endif;?>
    </div>
    
 </div>
</div>
<script>
    $(document).ready( function () {
    $('#tabela_fluxo').DataTable({
        language: {
        processing:     "Processando dados...",
        search:         "Pesquisa &nbsp;:",
        lengthMenu:    "Listar _MENU_ por página",
        info:           "Mostrando _START_ de _END_ ", /*de um total de ( _TOTAL_ )*/
        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Carregando...",
        zeroRecords:    "No momento não ná há para mostrar",
        emptyTable:     "No momento não ná há para mostrar",
        paginate: {
            first:      "Primeiro",
            previous:   "Anterior",
            next:       "Próximo",
            last:       "Último"
        },
        aria: {
            sortAscending:  ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
        }
    }

    });
} );
</script>