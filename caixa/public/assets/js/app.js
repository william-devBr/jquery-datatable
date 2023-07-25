/** **/

document.addEventListener("DOMContentLoaded", function(){

    let app = {};
    let novo_lancamento = document.getElementById("novo-lancamento");
    let fecha_modal = document.getElementById("cancel");
    let salvar_lancamento =document.getElementById("salvar");
    let valor_lancamento = document.getElementById("valor-lancamento");

    valor_lancamento.addEventListener("change", (ev)=> {
      formatarValor(ev.target)
       
    });

    app.showModal = () => {
        let modal = document.querySelector(".modal-lancamento");
        modal.style.display = "block";
    }

    app.hideModal = () => {
        let modal = document.querySelector(".modal-lancamento");
        modal.style.display = "none";
    }



    novo_lancamento.addEventListener("click",()=> {
        app.showModal()
    });
    fecha_modal.addEventListener("click",()=> {
        app.hideModal()
    });
    salvar_lancamento.addEventListener("click", (evt)=> {
        
        evt.preventDefault();
         salvarLancamento()
          
    });


    function salvarLancamento(){

         let tipo = document.querySelector("input[name='tipo']:checked");
         let text_area = document.querySelector("textarea[name='descricao']").value;
        
        if(!tipo) {
            alert('escolha um tipo de lançcamento');
            return false;
         }
         
         if(valor_lancamento.value == undefined) {
            alert('digite um valor a ser lançado');
            return false;
         }

         salvar_lancamento.setAttribute("disabled", true);
         let xhr = new XMLHttpRequest();

              xhr.open("POST","?utm=lancamento");
              let data = {
                  tipo : tipo.value,
                  valor : valor_lancamento.value.split("R$")[1],
                  descricao : text_area
              };
              data.valor = data.valor.replace(/\./g,'').replace(',','.');
              data.valor = parseFloat(data.valor);

              xhr.onreadystatechange = ()=> {
              
                if(xhr.readyState == 4) {
                    console.log('carregando...')
                    if(xhr.status == 200) {
                        console.log(xhr.responseText);
                       let response = JSON.parse(xhr.responseText);
                        console.log(response);
                        if(response.status == 200) {
                            app.hideModal();
                            alert("lancamento criado com sucesso");
                             window.location = "?utm=index";
                        }
                       console.log('carregou...')
                    } 
                }
               
              }
               xhr.send(JSON.stringify(data));
    }

    function formatarValor(input) {
        // Remove caracteres que não sejam números ou vírgula
        let valor = input.value.replace(/[^\d,]/g, '');
      
        // Substitui a vírgula por ponto (caso seja digitada por engano)
        valor = valor.replace(/,/, '.');
      
        // Formata o valor para o formato de moeda brasileira
        valor = parseFloat(valor).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
      
        // Atualiza o valor do input formatado
        input.value = valor;
      }

     
});