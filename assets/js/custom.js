
$( document ).ready(function() {
	
	get();


	//chamar função find ao clicar na tecla enter
	document.getElementById('find-input').onkeydown = function(event) {
	    if (event.keyCode == 13) {
	        find();
	    }
	}

});
	
function get(){

	$.getJSON( BASE_URL + "get/veiculos/", function( data ) {
	  var items = '';

		$.each(data, function(i, item) {
		    
			items += '<li onclick="detail('+item.id+');" class="list-group-item row row-m-0">';

			//dados do carro
			items += '<div class="col-xs-8"><h5>'+item.marca+'</h5><div class="vehicle">'+item.veiculo+'</div><div class="year">'+item.ano+'</div></div>';

			//icone indicando a flag "vendido"
			var icon = '';
			if(item.vendido == 1){ var icon = 'blue'; }
			
			items += '<div class="col-xs-4 round-content"><div class="round round-lg '+icon+'"><span class="glyphicon glyphicon-tags"></span></div></div>';

			items += '</li>';
		});
	 
	  	$('#all-vehicles').html(items);

	});

}

function detail(id){

	$("html, body").animate({
        scrollTop: 0
    }, 600);

	$('#detail-col').hide();

	var container = $('#detail-vehicle');
		
	container.find('#btn-edit').show();
	container.find('#btn-save').hide();

	container.find('.edit-input').hide();
  	container.find('.edit-label').fadeIn('slow');

	$.getJSON( BASE_URL + "get/veiculos/"+id, function( data ) {

		$.each(data, function(i, item) {
			
			container.find('h5').text(item.veiculo);
			container.find('#veiculo').val(item.veiculo);

			container.find('.vehicle span').text(item.marca);
			container.find('#marca').val(item.marca);

			container.find('.year span').text(item.ano);
			container.find('#ano').val(item.ano);

			container.find('.desc p').text(item.descricao);
			container.find('#descricao').val(item.descricao);

			
			if(item.vendido == '1'){
				container.find('#vendido').prop('checked', 'checked');
			}else{
				container.find('#vendido').attr('checked', false);
			}

			$('#vehicle').val(item.id);

		});
	});

	$('#detail-col').fadeIn('slow');

}

function edit(){

	var container 	= $('#detail-vehicle');

	container.find('#btn-edit').hide();
	container.find('#btn-save').show();
		
	container.find('.edit-label').hide();
	container.find('.edit-input').fadeIn('slow');
}

function save(){

	var container 	= $('#detail-vehicle');
	var dados 		= $('#send-data').serialize();
	var id 			= $('#vehicle').val();
	
	$.post( BASE_URL + "put/veiculos/"+id, dados, function( data ) {
	  if(data == 'success'){
	  	detail(id);
	  	get();

	  	alert('dados alterados com sucesso');
	  }
	});
}

function add(){

	var dados = $('#add-data').serialize();
	
	$.post( BASE_URL + "post/veiculos/", dados, function( data ) {
	  if(data != 'error'){
	  	detail(data);
	  	get();

	  	$( "#myModal .close" ).trigger( "click" );

	  	alert('dados alterados com sucesso');
	  }else{
	  	alert('erro ao inserir dados');
	  }

	});
}

function find(){

	var value = $('#find-input').val();

	//console.log(value);

	$.getJSON( BASE_URL + "get/veiculos/find?q="+value, function( data ) {
	  
		if(data == ''){ 
			alert('nenhum dado encontrado');

			$('#find-input').val('');
			get();
			return false;
		}

	  	var items = '';

		$.each(data, function(i, item) {
		    
			items += '<li onclick="detail('+item.id+');" class="list-group-item row row-m-0">';

			//dados do carro
			items += '<div class="col-xs-8"><h5>'+item.marca+'</h5><div class="vehicle">'+item.veiculo+'</div><div class="year">'+item.ano+'</div></div>';

			//icone indicando a flag "vendido"
			var icon = '';
			if(item.vendido == 1){ var icon = 'blue'; }
			
			items += '<div class="col-xs-4 round-content"><div class="round round-lg '+icon+'"><span class="glyphicon glyphicon-tags"></span></div></div>';

			items += '</li>';
		});
	 
	  	$('#all-vehicles').html(items);

	});

}

function exclude(){

	var id 			= $('#vehicle').val();

	if( confirm('Deseja excluir o veículo?')) {
  
      $.getJSON( BASE_URL + "delete/veiculos/"+id, function( data ) {});

	  alert('veiculo excluido com sucesso');

	  $('#detail-col').hide();

      get();

  };
    

}