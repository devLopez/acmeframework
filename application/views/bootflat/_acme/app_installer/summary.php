<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo APP_NAME ?></title>

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo URL_JS ?>/jquery-1.10.2.js"></script>
    <script src="<?php echo URL_JS ?>/bootstrap.js"></script>
    <script src="<?php echo URL_JS ?>/plugins/bootbox/bootbox.min.js"></script>

    <!-- App Scripts - Include with every page -->
    <script src="<?php echo URL_JS ?>/app-functions.js"></script>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo URL_CSS ?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL_CSS ?>/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <!-- App CSS - Include with every page -->
    <link href="<?php echo URL_CSS ?>/bootflat.css" rel="stylesheet">
    <link href="<?php echo URL_CSS ?>/app-styles.css" rel="stylesheet">

</head>

<body>

<?php echo app_settings_inputs(); ?>
    
    <div class="wrapper">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            
            <div class="navbar-header">
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- brand/logo -->
                <div class="navbar-brand"><img src="<?php echo URL_IMG ?>/logo-acme.png" /></div>

            </div>
            
            <div class="navbar-collapse collapse">
                
                <ul class="nav navbar-nav">
                    
                    <li><a href="http://www.acmeframework.org/docs" target="_blank"><i class="fa fa-fw fa-question-circle"></i> <?php echo lang('Help') ?></a></li>

                    <li class="dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-fw fa-globe"></i>
							
							<?php 
							
							// get language
							$lang = $this->session->userdata('language');

							// Write language name
							switch ($lang) {
								
								case 'en_US':
								default:
									echo lang('English');
								break;
								
								case 'pt_BR':
									echo lang('Brazilian Portuguese');
								break;
							}

							?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
					        	<a href="javascript:void(0)" class="change-language" id="en_US">
					        		<input type="radio" name="language" <?php echo $lang == 'en_US' ? 'checked="checked"' : ''; ?> />
					        		<?php echo lang('English') ?>
					        	</a>
					        </li>
					        <li>
					            <a href="javascript:void(0)" class="change-language" id="pt_BR">
					            	<input type="radio" name="language" <?php echo $lang == 'pt_BR' ? 'checked="checked"' : ''; ?> />
					            	<?php echo lang('Brazilian Portuguese') ?>
					            </a>
					        </li>
						</ul>
					</li>

                </ul>                
        
            </div>

        </div>

        <div id="page-wrapper">

			<div class="module-header">

				<div class="row">

					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
						<h1>
							<?php echo lang('Installation') ?>
							<span><i class="fa fa-fw fa-magic"></i></span>
							<small>// <?php echo lang('Create a new application') ?></small>
						</h1>
					</div>

				</div>

			</div>

			<div class="module-body">

				<div class="row">

					<div class="col-xs-12 col-sm-12">
						
						<div class="line-steps"></div>

					</div>

				</div>
				
				<div class="row">

					<div class="col-xs-4 col-sm-4 step-one">

						<center>

							<div class="step">
								1
								<h3 class="text-success" style="margin: -25px 0 0 30px"><i class="fa fa-fw fa-check-circle"></i></h3>
							</div>

							<div class="step-text"><?php echo lang('System requirements') ?></div>

						</center>

					</div>

					<div class="col-xs-4 col-sm-4 step-two">

						<center>

							<div class="step">
								2
								<h3 class="text-success" style="margin: -25px 0 0 30px"><i class="fa fa-fw fa-check-circle"></i></h3>
							</div>

							<div class="step-text"><?php echo lang('New application info') ?></div>

						</center>

					</div>

					<div class="col-xs-4 col-sm-4 step-three">

						<center>

							<div class="step done">3</div>

							<div class="step-text done"><?php echo lang('Summary') ?></div>

						</center>

					</div>

				</div>

				<div class="row" style="margin-top: 50px">

					<div class="col-sm-12 text-center">
						
						<h3 class="text-success">
							<span><?php echo lang('ACME Framework successfully installed') ?></span>
							<i class="fa fa-fw fa-check-circle"></i>
						</h3>
			
						<h3 style="margin-top: 30px"><?php echo lang('Application') ?> <strong><?php echo APP_NAME ?></strong> <?php echo lang('created with no errors.') ?></h3>

						<a href="<?php echo URL_ROOT ?>" class="btn btn-lg btn-success" style="margin-top: 30px">
							<?php echo lang('Go to login page') ?>
							<i class="fa fa-fw fa-arrow-circle-right"></i>
						</a>

						<div style="margin: 20px 0 15px" class="text-muted"><?php echo lang('or') ?></div>

						<a href="http://www.acmeengine.org/docs" target="_blank">
							<?php echo lang('Read ACME Framework docs') ?>
							<i class="fa fa-fw fa-external-link"></i>
						</a>

					</div>

				</div>

			</div>
        
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <div class="loading-layer"></div>
	<div class="loading-box"><h4><i class="fa fa-fw fa-circle-o-notch fa-spin"></i> <?php echo lang('Loading')?></h4></div>

    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS ?>/plugins/validationEngine/validationEngine.jquery.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS ?>/plugins/icheck/flat/red.css" />
	<script src="<?php echo URL_JS ?>/plugins/icheck/icheck.min.js"></script>
	<script src="<?php echo URL_JS ?>/plugins/validationEngine/jquery.validationEngine.js"></script>
	<script src="<?php echo URL_JS ?>/plugins/validationEngine/jquery.validationEngine-<?php echo $this->session->userdata('language') ?>.js"></script>

	<script>
		
		// ==================================
		// Put all content inside a container
		// ==================================
    	$.container_html();

    	// ========
    	// tooltips
    	// ========
    	$('i[data-toggle="tooltip"]').tooltip({
    		container : 'body'
    	});

    	// =======
    	// ichecks
    	// =======
	    $('input[type="radio"]').iCheck({
	        checkboxClass: 'icheckbox_flat-red',
	        radioClass: 'iradio_flat-red'
	    });

	    // ==================================
    	// change action and return to step 1
    	// ==================================
	    $('.back-step').on('click', function () {

	    	$("form").validationEngine('detach');
	    	
	    	$(this).closest('form').attr('action', $('#URL_ROOT').val() + '/app_installer/system_requirements').submit();

	    });

	    // ============================
	    // Set validations to all forms
	    // ============================
	    $('form').validationEngine('attach', {
	        
	        promptPosition : "bottomRight",
	        onValidationComplete: function (form, status) {
	        	if( ! status ) 
	        		return false;

	        	$.enable_loading();
	        	return true;
	        }
	    });

	    // ===============================
    	// Reposition the alerts from form
    	// ===============================
    	$( window ).resize( function () {
        	$("form").validationEngine('updatePromptsPosition');
    	});

    	// =================
	    // language callback
	    // =================
	    $('a.change-language').on('click', function () {
	    	
	    	$.change_language_custom($(this).attr('id'));
	    });

	    // ======================
	    // custom change language
	    // ======================
		$.change_language_custom = function (language) {

		    $.enable_loading();

		    $.ajax({
		        url: $('#URL_ROOT').val() + '/app_installer/change_language/' + language,
		        context: document.body,
		        dataType : 'json',
		        cache: false,
		        type: 'POST',
		        complete : function (data) {
		            
		            window.location.reload();

		        }
		    });
		};

	</script>

	<style>

		.form-group {
			margin-bottom: 20px
		}

		h3.text-success {
			color: #8CC152;
		}

		.list-group-item-heading {
			font-size: 16px;
			margin: 2px 0 4px 0px;
		}

		.list-group-item h3 {
			font-size: 22px;
			margin: -3px 3px 0 0;
		}

		.list-group-item h3 i {
			margin: 0 0 0 -9px;
		}

		.list-group-item-text {
			margin-left: 22px;
		}

		.line-steps {
			height: 7px;
			background-color: #e8e8e8;
			width: 100%;
			margin: 30px 0 0 0;
		}

		.step {
			line-height: 60px;
			vertical-align: middle;
			text-align: center;
			height: 60px;
			width: 60px;
			background-color: #e8e8e8;
			border-radius: 100%;
			color: #999;
			font-size: 20px;
			font-weight: bold;
			margin-top: -34px;
		}

		.step.done {
			color: #fff;
			background-color: #A0D468
		}

		.step-text {
			margin: 10px 0 0 0;
			color: #999;
			font-size: 20px
		}

		.step-text.done {
			color: inherit;
			font-weight: bold;
		}

		/* Large desktops */
		@media(min-width: 1170px) {
		    .step-one {
		    	padding-right: 130px;
		    }

		    .step-three {
		    	padding-left: 130px;
		    }
		}

	</style>

</body>

</html>
