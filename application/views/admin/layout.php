<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="admin" />
	<meta name="author" content="" />
	
	<title><?php echo $layout['admin_title'];?></title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/core.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/forms.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body">
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			
			<div class="sidebar-menu-inner">	
				
				<header class="logo-env">
					
					<!-- logo -->
					<div class="logo">
						<a href="" class="logo-expanded">
							<img src="<?php echo base_url(); ?>assets/images/admin/logo.png" width="" alt="" />
						</a>
					</div>
					
					<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
					<div class="mobile-menu-toggle visible-xs">		
						<a href="#" data-toggle="mobile-menu">
							<i class="fa-bars"></i>
						</a>
					</div>
								
				</header>
						
				<ul id="main-menu" class="main-menu">
					<!--<li class="active opened">
						<a href="#">
							<i class="linecons-cloud"></i>
							<span class="title">Menu Levels</span>
							<span class="label label-success pull-right">5</span>
						</a>
						<ul>
							<li>
								<a href="#">
									<i class="entypo-flow-line"></i>
									<span class="title">Menu Level 1.1</span>
								</a>
								<ul>
									<li>
										<a href="#">
											<i class="entypo-flow-parallel"></i>
											<span class="title">Menu Level 2.1</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="entypo-flow-parallel"></i>
											<span class="title">Menu Level 2.2</span>
										</a>
										<ul>
											<li>
												<a href="#">
													<i class="entypo-flow-cascade"></i>
													<span class="title">Menu Level 3.1</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="entypo-flow-cascade"></i>
													<span class="title">Menu Level 3.2</span>
												</a>
												<ul>
													<li>
														<a href="#">
															<i class="entypo-flow-branch"></i>
															<span class="title">Menu Level 4.1</span>
														</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li>
										<a href="#">
											<i class="entypo-flow-parallel"></i>
											<span class="title">Menu Level 2.3</span>
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="entypo-flow-line"></i>
									<span class="title">Menu Level 1.2</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="entypo-flow-line"></i>
									<span class="title">Menu Level 1.3</span>
								</a>
							</li>
						</ul>
					</li>-->
					<li class="<?php if ($left_active == 'account') { echo 'active';}?>">
						<a href="<?php echo base_url(); ?>admin/accountList"><i class="fa fa-user"></i><span class="title"><?php echo $layout['left_account_setting']; ?></span></a>
					</li>
					<?php if ($this->session->systemLevel) { ?>
						<li class="<?php if ($left_active == 'product') { echo 'active';}?>">
							<a href="<?php echo base_url(); ?>product/productProjectList"><i class="fa fa-spinner fa-spin"></i><span class="title"><?php echo $layout['left_product_project_setting']; ?></span></a>
						</li>
					<?php }?>
					<?php foreach ($project as $projects) { ?>
						<li data-id="<?php echo $projects['id'];?>" class="<?php if ($left_active ==  $projects['id']) { echo 'active';}?>">
							<a href="<?php echo base_url(); ?>product/productTypeList/project/<?php echo $projects['id'];?>"><i class="fa fa-list-ul"></i><span class="title"><?php echo $projects['title']; ?></span></a>
						</li>
					<?php } ?>
					<li>
						<a href="#" onclick="fileMessageUrl();">
							<i class="fa fa-cloud"></i>
							<span class="label label-purple pull-right hidden-collapsed">File Upload</span>
							<span class="title"><?php echo $layout['left_file_explorer']; ?></span>
						</a>
					</li>
				</ul>
						
			</div>
			
		</div>
		
		<div class="main-content">

					
			<!-- User Info, Notifications and Menu Bar -->
			<nav class="navbar user-info-navbar" role="navigation">
				
				<!-- Left links for user info navbar -->
				<ul class="user-info-menu left-links list-inline list-unstyled">
					
					<li class="hidden-sm hidden-xs">
						<a href="#" data-toggle="sidebar">
							<i class="fa-bars"></i>
						</a>
					</li>
					
				</ul>
				
				
				<!-- Right links for user info navbar -->
				<ul class="user-info-menu right-links list-inline list-unstyled">
					
					<li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->

					<!-- <select id="changeLanguage" class="form-control language">
						<option value="chinese" <　?php if (!isset($this->session->adminLanguage) || $this->session->adminLanguage == 'chinese') { echo 'selected';}?>>繁體中文</option>
						<option value="english" <　?php if (isset($this->session->adminLanguage) || $this->session->adminLanguage == 'english') { echo 'selected';}?>>English</option>
					</select> -->
					<input type="hidden" id="layoutToken" name="<?php echo $layoutToken;?>" value="<?php echo $layoutHash;?>" />
					</li>
					
					<li class="dropdown user-profile">
						<a href="#" data-toggle="dropdown">
							<span>
								<?php echo $this->session->username; ?>
								<i class="fa-angle-down"></i>
							</span>
						</a>
						
						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<li>
								<a href="<?php echo base_url(); ?>admin/accountEdit/id/<?php echo $this->session->adminSystemId; ?>">
									<i class="fa-wrench"></i>
									Settings
								</a>
							</li>
							<li class="last">
								<a href="<?php echo base_url(); ?>login/logout">
									<i class="fa-lock"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
				
			</nav>
			<!--內容-->
			<div class="content-in">
				<?php echo $content; ?>
			</div>

			<footer class="main-footer sticky footer-type-1">
				
				<div class="footer-inner">
				
					<!-- Add your copyright text here -->
					<div class="footer-text">
						<?php echo $layout['admin_title']?> by <a href="http://qcwork.byethost12.com"><strong>QCwork</strong></a>
					</div>
					
					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
					<div class="go-up">
					
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
						
					</div>
					
				</div>
				
			</footer>
		</div>
		
	</div>
	
	
	




	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">

	<!-- Bottom Scripts -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/TweenMax.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/resizeable.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/joinable.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/xenon-api.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/xenon-toggles.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>


	<!-- Imported scripts on this page -->
	<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.yadcf.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.min.js"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url(); ?>assets/js/xenon-custom.js"></script>

	<!--ckeditor-->
	<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
	<script type="text/javascript">

		$('#changeLanguage').change(function() {
			var lang = $(this).val();
			var token = $('#layoutToken').val();
			$.ajax({
				data: {'lang' : lang, 'csrf_token_name' : token},
				type: "POST",
				url: "<?php echo base_url('admin/changeLanguage'); ?>",
				success: function(msg) {
					location.reload();
				},
		        error: function(msg){
		            alert(msg);
		        }
			});
		});
		var urlobj;
		$('.ckeditor').each(function(){
		    CKEDITOR.replace($(this).attr('id') ,{
				filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>',
				height: '300px',
			});
		});

		function fileMessageUrl() {
			window.open('<?php echo base_url('assets/filemanager/index.html');?>', '<?php echo $layout['left_account_setting']; ?>', config='height=750,width=1000,toolbar=no,resizable=no,location=no');
		}

		function BrowseServer(obj)
		{
			urlobj = obj;
			OpenServerBrowser(
			"<?php echo base_url('assets/filemanager/index.html');?>",
			screen.width * 0.7,
			screen.height * 0.7 ) ;
		}

		function OpenServerBrowser( url, width, height )
		{
			var iLeft = (screen.width - width) / 2 ;
			var iTop = (screen.height - height) / 2 ;
			var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes" ;
			sOptions += ",width=" + width ;
			sOptions += ",height=" + height ;
			sOptions += ",left=" + iLeft ;
			sOptions += ",top=" + iTop ;
			var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
		}

		function SetUrl( url, width, height, alt )
		{
			document.getElementById(urlobj).value = url ;
			oWindow = null;
		}
	</script>
</body>
</html>