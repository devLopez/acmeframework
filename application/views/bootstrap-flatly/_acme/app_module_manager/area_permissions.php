
<button class="btn btn-sm btn-success" style="margin: 20px 0 10px 0" data-toggle="modal" data-target="#modal-new-permission"><?php echo lang('Nova permissão') ?> <i class="fa fa-plus-circle"></i></button>

<div class="table-responsive">
    
    <table class="table">
        
        <thead>
            <tr>
                <th><?php echo lang('Permissão') ?></th>
                <th><?php echo lang('Descrição') ?></th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
           	
           	<?php 
           	foreach($permissions as $permission) { 
           	$id_permission = get_value($permission, 'id_module_permission');
           	?>
          	<tr id="tr-<?php echo $id_permission ?>">
                <td>
                	<a data-toggle="modal" data-target="#modal-<?php echo $id_permission ?>" href="#"><?php echo get_value($permission, 'permission')?></a>
                	<?php if(get_value($permission, 'description') != '') { ?>
                	<i class="fa fa-question-circle fa-fw" data-toggle="tooltip" data-placement="right" data-original-title="<?php echo get_value($permission, 'description') ?>"></i>
                	<?php } ?>
               	</td>
                <td class="lbl"><?php echo get_value($permission, 'label')?></td>
                <td class="text-right" style="width: 01%" title="<?php echo lang('Remover')?>"><a href="javascript:void(0)" id="<?php echo $id_permission ?>"><i class="fa fa-times fa-fw"></i></a></td>
            </tr>
            <?php } ?>

	    </tbody>

	</table>
	
	<!-- now, modal permissions -->
	<?php 
   	foreach($permissions as $permission) { 
	$id_permission = get_value($permission, 'id_module_permission');
	?>
    <form action="<?php echo URL_ROOT ?>/app_module_manager/save_permission/<?php echo $id_permission ?>" id="<?php echo $id_permission ?>" method="post">
    	<div class="modal fade" id="modal-<?php echo $id_permission ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo lang('Editar permissão')?></h4>
                    </div>
                    <div class="modal-body">
                    	<div class="form-group">
                    		<label><?php echo lang('Permissão') ?>*</label>
                    		<input type="text" class="form-control validate[required] permission" value="<?php echo get_value($permission, 'permission') ?>" />
                    	</div>

                    	<div class="form-group">
                    		<label><?php echo lang('Descrição') ?>*</label>
                    		<input type="text" class="form-control validate[required] lbl" value="<?php echo get_value($permission, 'label') ?>" />
                    	</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('Fechar') ?></button>
                        <input type="submit" class="btn btn-primary" value="<?php echo lang('Salvar') ?>" />
            			</form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
	</form>
	<?php } ?>

    <!-- modal to new permission -->
    <form action="<?php echo URL_ROOT ?>/app_module_manager/save_permission" method="post" id="new-permission">
        <div class="modal fade" id="modal-new-permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo lang('Nova permissão')?></h4>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" class="id_module" value="<?php echo $id_module ?>" />

                        <div class="form-group">
                            <label><?php echo lang('Permissão') ?>*</label>
                            <input type="text" class="form-control validate[required] permission" value="" />
                        </div>

                        <div class="form-group">
                            <label><?php echo lang('Descrição') ?>*</label>
                            <input type="text" class="form-control validate[required] lbl" value="" />
                        </div>

                        <div class="form-group">
                            <label><?php echo lang('Observações') ?></label>
                            <input type="text" class="form-control description" value="" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('Fechar') ?></button>
                        <input type="submit" class="btn btn-primary" value="<?php echo lang('Salvar') ?>" />
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
	          
</div>

<link rel="stylesheet" type="text/css" href="<?php echo URL_CSS ?>/plugins/validationEngine/validationEngine.jquery.css" />
<script src="<?php echo URL_JS ?>/plugins/validationEngine/jquery.validationEngine.js"></script>
<script src="<?php echo URL_JS ?>/plugins/validationEngine/jquery.validationEngine-<?php echo $this->session->userdata('language') ?>.js"></script>

<script>
	
	// tooltips
    $('table').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });

    // cancel original submit
    $('form').submit(function () {
        return false;
    });

    // submit callback (update or insert)
    var submit_callback = function (form, status) {
    	
    	// Validation is not right
    	if( ! status)
    		return false;

        // get id
        var id = form.attr('id');

    	// DEfine values
        var permission = form.find('input.permission').val();
        var label = form.find('input.lbl').val();
        
        // define ajax data to update or insert
        if(id == 'new-permission') {
            // insert data
            ajax_data = {
                'permission' : permission,
                'label' : label,
                'id_module' : form.find('input.id_module').val(),
                'description' : form.find('input.description').val()
            }

        } else {
            // update data
            ajax_data = {
                'permission' : permission,
                'label' : label
            }
        }

		// ajax to save this fucking shit
		enable_loading();
    	
    	$.ajax({
            url: form.attr('action'),
            context: document.body,
            data : ajax_data,
            cache: false,
            async: false,
            type: 'POST',

            complete : function (response) {
                
            	// Parse json to check errors
            	json = $.parseJSON(response.responseText);
            	
            	// Check return
            	if( ! json.return) { 
            		// close modal and alert
            		form.find('.modal-footer button').click();
            		bootbox.alert(json.error);
            		return false;
            	}

                // if is an insert, reload page
                if(id == 'new-permission') {
                    window.location.reload();
                    return false;
                }

            	// Procced with no errors!
				$('#tr-' + id + ' a[data-toggle="modal"]').html(permission);
	            $('#tr-' + id + ' .lbl').html(label);

	            // close modal
	            form.find('.modal-footer button').click();
            }
        });

        disable_loading();

        // Prevent submit
    	return false;
    };

    // remove callback
    $('td.text-right a').click( function () {

        // get id
        var id = $(this).attr('id');
        
        // Confirm this shit
        bootbox.confirm("<?php echo lang('Deseja realmente remover a permissão selecionada ?') ?>", function (result) {

            // Cancel
            if( ! result)
                return;

            // ajax to remove this fucking shit
            enable_loading();
            
            $.ajax({
                url: $('#URL_ROOT').val() + '/app_module_manager/save_permission/' + id + '/remove',
                context: document.body,
                cache: false,
                async: false,
                type: 'POST',

                complete : function (response) {
                    
                    // Parse json to check errors
                    json = $.parseJSON(response.responseText);
                    
                    // Check return
                    if( ! json.return) { 
                        // close modal and alert
                        form.find('.modal-footer button').click();
                        bootbox.alert(json.error);
                        return false;
                    }

                    // Procced with no errors!
                    $('#tr-' + id).hide();
                }
            });

            disable_loading();
            
        });

    });

    // Set validations to all forms
    $('form').validationEngine('attach', {
        
        promptPosition : "bottomRight",
        scroll: false,
        onValidationComplete: function (form, status) { submit_callback(form, status); }

    });

</script>