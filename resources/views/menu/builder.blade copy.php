<!DOCTYPE html>
<html>
	<head>
		<title>Laravel menu Bulder</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
		<link rel="stylesheet" href="{{ asset('menu_editor/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}">
		<style>
			.caret {
					display: inline;
					display: inline-block;
					width: 0;
					height: 0;
					margin-left: 2px;
					vertical-align: middle;
					border-top: 4px dashed;
					border-right: 4px solid transparent;
					border-left: 4px solid transparent;
			}
		</style>
	</head>
	<body>
		<div class="bg-primary">
				<!--Navbar-->
				<nav class="navbar navbar-expand-lg navbar-dark primary-color container ">
						<!-- Navbar brand -->
						<a class="navbar-brand" href="#">Navbar</a>
						<!-- Collapse button -->
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						<!-- Collapsible content -->
						<div class="collapse navbar-collapse" id="basicExampleNav">
								<!-- Links -->
								<ul class="navbar-nav mr-auto">
										<li class="nav-item active">
												<a class="nav-link" href="#">Home
														<span class="sr-only">(current)</span>
												</a>
										</li>
										<li class="nav-item">
												<a class="nav-link" href="#">Features</a>
										</li>
										<li class="nav-item">
												<a class="nav-link" href="#">Pricing</a>
										</li>
										<!-- Dropdown -->
										<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
												<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
														<a class="dropdown-item" href="#">Action</a>
														<a class="dropdown-item" href="#">Another action</a>
														<a class="dropdown-item" href="#">Something else here</a>
												</div>
										</li>
								</ul>
								<!-- Links -->
								<form class="form-inline">
										<div class="md-form my-0">
												<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
										</div>
								</form>
						</div>
						<!-- Collapsible content -->
				</nav>
				<!--/.Navbar-->
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form method="POST" action="{{ route('menu.update') }}" id="menu_builder">
						<div class="panel panel-default">
								<div class="panel-heading clearfix"><h5 class="pull-left">Menu</h5>
										<div class="pull-right">
												<button id="btnReload" type="button" class="btn btn-default">
												<i class="glyphicon glyphicon-triangle-right"></i> Load Data</button>
												<br>
										</div>
								</div>
								<div class="panel-body" id="cont">
										<ul id="myEditor" class="sortableLists list-group">
										</ul>
								</div>
						</div>
						<div class="form-group">
								<button id="btnOut" type="button" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Update</button>
						</div>
						<div class="form-group">
								@csrf
								<textarea id="out" class="form-control d-none" name="data" cols="50" rows="10"></textarea>
						</div>
					</form>
				</div>
				<div class="col-md-6">
						<div class="panel panel-primary">
								<div class="panel-heading">Edit item</div>
								<div class="panel-body">
										<form id="frmEdit" class="form-horizontal">
												<div class="form-group">
														<label for="text" class="col-sm-2 control-label">Text</label>
														<div class="col-sm-10">
																<div class="input-group">
																		<input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
																		<div class="input-group-btn">
																				<button type="button" id="myEditor_icon" class="btn btn-default text-dark" data-iconset="fontawesome"></button>
																		</div>
																		<input type="hidden" name="icon" class="item-menu">
																</div>
														</div>
												</div>
												<div class="form-group">
														<label for="href" class="col-sm-2 control-label">URL</label>
														<div class="col-sm-10">
																<input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
														</div>
												</div>
												<div class="form-group">
														<label for="target" class="col-sm-2 control-label">Target</label>
														<div class="col-sm-10">
																<select name="target" id="target" class="form-control item-menu">
																		<option value="_self">Self</option>
																		<option value="_blank">Blank</option>
																		<option value="_top">Top</option>
																</select>
														</div>
												</div>
												<div class="form-group">
														<label for="title" class="col-sm-2 control-label">Tooltip</label>
														<div class="col-sm-10">
																<input type="text" name="title" class="form-control item-menu" id="title" placeholder="Tooltip">
														</div>
												</div>
										</form>
								</div>
								<div class="panel-footer">
										<button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fa fa-refresh"></i> Update</button>
										<button type="button" id="btnAdd" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
								</div>
						</div>
				</div>
			</div>
				
		<!-- <div class="row">
				<div class="col-md-6">
					<form method="POST" action="{{ route('menu.update') }}" id="menu_builder">
						<div class="card mb-3">
								<div class="card-header"><h5 class="float-left">Menu</h5>
										<div class="float-right">
												<button id="btnReload" type="button" class="btn btn-outline-secondary">
														<i class="fa fa-play"></i> Load Data</button>
										</div>
								</div>
								<div class="card-body">
									<ul id="myEditor" class="sortableLists list-group">
									</ul>
									<br />
									<div class="form-group">
											<button id="btnOut" type="button" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Update</button>
									</div>										
								</div>
						</div>
					</form>
				</div>
				<div class="col-md-6">
						<div class="card border-primary mb-3">
								<div class="card-header bg-primary text-white">Edit item</div>
								<div class="card-body">
										<form id="frmEdit" class="form-horizontal">
												<div class="form-group">
														<label for="text">Text</label>
														<div class="input-group">
																<input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
																<div class="input-group-append">
																		<button type="button" id="myEditor_icon" class="btn btn-outline-secondary"></button>
																		{{-- <button type="button" id="myEditor_icon" class="btn btn-default text-dark" data-iconset="fontawesome"></button> --}}
																</div>
														</div>
														<input type="hidden" name="icon" class="item-menu">
												</div>
												<div class="form-group">
														<label for="href">URL</label>
														<input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
												</div>
												<div class="form-group">
														<label for="target">Target</label>
														<select name="target" id="target" class="form-control item-menu">
																<option value="_self">Self</option>
																<option value="_blank">Blank</option>
																<option value="_top">Top</option>
														</select>
												</div>
												<div class="form-group">
														<label for="title">Tooltip</label>
														<input type="text" name="title" class="form-control item-menu" id="title" placeholder="Tooltip">
												</div>
										</form>
								</div>
								<div class="card-footer">
										<button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
										<button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
								</div>
						</div>
				</div>
		</div>						 -->
		</div>

		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
		<script src="{{asset('menu_editor/jquery-menu-editor.min.js')}}"></script>
		<script src="{{asset('menu_editor/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js')}}"></script>
		<script src="{{asset('menu_editor/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js')}}"></script>
		<script>
			jQuery(document).ready(function () {
			// menu items
			var strjson = {!!str_replace('\\','',$menus->data)!!};
			//icon picker options
			var iconPickerOptions = {searchText: 'Buscar...', labelHeader: '{0} de {1} Pags.'};
			//sortable list options
			var sortableListOptions = {
			placeholderCss: {'background-color': 'cyan'}
			};
			var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions, labelEdit: 'Edit'});
			editor.setForm($('#frmEdit'));
			editor.setUpdateButton($('#btnUpdate'));
			
			$('#btnReload').on('load click', function () {
			editor.setData(strjson);
			});
			$('#btnOut').on('click', function () {
			var str = editor.getString();
			$("#out").val(str);
			$('#menu_builder').submit();
			});
			$("#btnUpdate").click(function(){
			editor.update();
			});
			$('#btnAdd').click(function(){
			editor.add();
			});

			$('#out').change(function() {
					var str = editor.getString();
					$("#out").val(str);
			});

			editor.setData(strjson);

			});
		</script>
	</body>
</html>