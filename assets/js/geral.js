	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
  $( function() {
     $( ".my-team-list" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.my-team-list>li').each(function() {
                selectedData.push($(this).attr("data"));
            });
            updateOrder(selectedData);
        }
    });
  } );
  function mudarOrdemTime(position, id)
  {
  	$.ajax({
	  	url: "/update-team-mob",
	  	type: 'POST',
	  	data: {position:position, id:id}
  	}).done(function(response){
  		$(".carregaAquiDentroOMOBNew").load('/my-team-after-att');
  	}); 
  }
  	function updateOrder(data) {
        $.ajax({
            url:"/update-team",
            type:'POST',
            data:{position:data},
            success:function(){
                $(".sucesso-alter-order").fadeIn()
                setTimeout(function() {  $(".sucesso-alter-order").fadeOut() }, 2000);
            }
        })
    }
	function showInfoItem(idItem)
	{	
		$("#exampleModal").modal('show');
		$(".conteudoModalItem").load('/bag/itemInfo/'+idItem);
	}
	function regChangeReg(reg)
	{
		//Removendo e adicionando a classe active nos inputs
		$(".btn").removeClass('active');
		$(".btn"+reg).addClass('active');
		
		//Exibindo os inciais
		$(".iniciais").hide();
		$(".iniciais"+reg+"").show();
	}

	function regChangePerso(action)
	{
		//array com os personagens existentes
		var personagens = [
		"0", "Ash", "Blue", "Brock", "Bruno", "Brycen", "Dawn", "Lenora", "Lucas", "Lyra", "Marlon", "Maylene", "Morty", "N", "Pryce", "Red", "Roark"
		];

		//Valor atual do input
		var val = $("#imgPersoReg").val();

		//Caso seja para mudar <
		if(action == 0)
		{
			//Caso o valor já seja o menor
			if(val == 1){
				return false;
			//Caso contrario
			}else{
				//Removendo o disabled da seta direita
				if(val == 16){
					$(".setaDir").removeClass('text-muted');
				}
				//Novo valor
				var newval = parseInt(val)-1;

				//Removendo o disabled da seta esquerda
				if(newval == 1){
					$(".setaEsq").addClass('text-muted');
				}
				//Alterando o nome e imagem exibida
				$(".nomePerso").html(personagens[newval]);
				$("#imgPersoSelect").attr('src','assets/imgs/treinadores/'+ newval +'.png');
				$("#imgPersoReg").val(newval);
			}
		//Caso seja para mudar >
		}else{
			//Novo valor
			var newval = parseInt(val)+1;

			//Se o valor ja for o ultimo
			if(newval > 16){
				return false;
			//Caso contrario
			}else{
				//Tirando o disabled da seta esquerda para o usuario poder voltar
				if(newval == 2){
					$(".setaEsq").removeClass('text-muted');
				}
				//Caso seja o ultimo personagem adiciona um disabled na seta direita
				if(newval == 16){
					$(".setaDir").addClass('text-muted');
				}
				//Alterando imagem e nome
				$(".nomePerso").html(personagens[newval]);
				$("#imgPersoSelect").attr('src','assets/imgs/treinadores/'+ newval +'.png');
				$("#imgPersoReg").val(newval);
			}
		}
	}