<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Api Veículos</title>

	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" id="bootstrap-css">
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" id="custom-css">

	<script>
		BASE_URL = '<?php echo base_url()?>';
	</script>

	<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
</head>
<body>

	<div id="navbar">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-4">
	                <h2><span class="menu">Api Veículos</span></h2>
	            </div>
	            <div class="navbar-search col-sm-8 col-xs-11">
	                <div class="row">
	                    <input id="find-input" class="navbar-input col-xs-11" type="" placeholder="Buscar Veículo" name="">
	                    <button class="navbar-button col-xs-1" onclick="find();">
	                        <svg width="15px" height="15px">
	                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
	                        </svg>
	                    </button>
	                </div>
	            </div>

	        </div>
	    </div>
	</div>


	<div id="content">
	    <div class="container">
	    	<div class="row">
	    		<div class="col-xs-12">
	    			<button id="add-button" type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">Novo Veículo</button>
	    		</div>
	    	</div>

	        <div class="row">
	            <div class="col-sm-6">
	            	<h4>Lista de Veículos</h4>

	            	<ul id="all-vehicles" class="list-group">

	            		<!--recebe lista através da função get() -> custom,js -->

		            </ul>

	            </div>

	            <div id="detail-col" class="col-sm-6">
	            	<h4>Detalhes</h4>

	            	<form id="send-data" method="POST" enctype="">
	            	<ul id="detail-vehicle" class="list-group">
		                <li class="list-group-item row row-m-0">
		                	<div class="col-xs-12">
			                	<div id="delete-vehicle" class="edit-label col-xs-12">
			                		<div  onclick="exclude();" class="round round-lg red pull-right">
			                			<span class="glyphicon glyphicon-trash"></span>
			                		</div>
			                	</div>

		                		<h5 class="edit-label" >--</h5>
		                		<div class="edit-input col-xs-12">
		                			<label>Veiculo</label>
		                			<input id="veiculo" name="veiculo" />
		                		</div>
		                		
		                		<div class="edit-label vehicle col-xs-6">
		                			<h6>Marca</h6>
		                			<span>--</span>
		                		</div>
		                		<div class="edit-input col-xs-6">
		                			<label>Marca</label>
		                			<input id="marca" name="marca" />
		                		</div>

		                		<div class="edit-label year col-xs-6">
		                			<h6>Ano</h6>
		                			<span>--</span>
		                		</div>
		                		<div class="edit-input col-xs-6">
		                			<label>Ano</label>
		                			<input id="ano" name="ano" />
		                		</div>

								<div class="edit-label desc col-xs-12">
									<p>--</p>
								</div>
								<div class="edit-input col-xs-6">
		                			<label>Descrição</label>
		                			<textarea id="descricao" name="descricao"></textarea>
		                		</div>

		                	</div>
		                	<div class="bottom col-xs-12">
		                		<div class="col-xs-6">
		                			<input type="button" onclick="edit();" id="btn-edit" class="btn btn-primary" value="Editar" />
		                			<input type="button" onclick="save();" id="btn-save" class="btn btn-primary" value="Salvar" />
			                	</div>
			                	<div class="edit-label col-xs-6 round-content">
			                		<div class="round round-lg blue">
			                			<span class="glyphicon glyphicon-tags"></span>
			                		</div>
			                	</div>
			                	<div class="edit-input col-xs-6">
		                			Vendido?
		                			<input id="vendido" name="vendido" value="1" type="checkbox" />
		                		</div>
			                </div>
		                </li>
		            </ul>

		            <input type="hidden" id="vehicle" value="0"/>

		        	</form>
	            </div>
	        </div>
	    </div>
	</div>
	<footer></footer>


	<!-- line modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Fechar</span></button>
				<h3 class="modal-title" id="lineModalLabel">Novo Veículo</h3>
			</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			<form id="add-data" method="POST" enctype="">
              <div class="form-group">
                <label for="veiculo">Veículo</label>
                <input type="text" class="form-control" id="veiculo" name="veiculo">
              </div>
              <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca">
              </div>
              <div class="form-group">
                <label for="ano">Ano</label>
                <input type="number" class="form-control" id="ano" name="ano">
              </div>
              <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="1"> Vendido?
                </label>
              </div>
              <input type="button" onclick="add();" id="btn-new" class="btn btn-primary" value="Adicionar" />
            </form>

		</div>

	</div>
  </div>
</div>

</body>
</html>