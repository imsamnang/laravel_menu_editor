<!DOCTYPE html>
<html lang="en">
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>jQuery Menu Editor - Demo Bootstrap 4</title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
			<link rel="stylesheet" href="<?php echo e(asset('menu_editor/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css')); ?>">
	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form method="POST" action="<?php echo e(route('menu.update')); ?>" id="menu_builder">
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
									<br/>
									<div class="float-right">
										<button id="btnOut" type="button" class="btn btn-success"><i class="fas fa-check-square"></i> Update</button>
									</div>
									<div class="form-group">
											<?php echo csrf_field(); ?>
											<textarea id="out" class="form-control d-none" name="data" cols="50" rows="10"></textarea>
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
			</div>
		</div>

		<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="<?php echo e(asset('menu_editor/jquery-menu-editor.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('menu_editor/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('menu_editor/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js')); ?>"></script>
		<script>
			jQuery(document).ready(function () {
			// menu items
			var strjson = <?php echo str_replace('\\','',$menus->data); ?>;
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