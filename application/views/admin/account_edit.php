<div class="page-title">
	<div class="title-env">
		<h1 class="title"><?php echo $account['main_title'];?></h1>
	</div>
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li>
				<a href="<?php echo base_url('admin/accountList'); ?>"><i class="fa-home"></i><?php echo $account['nav_index'];?></a>
			</li>
			<li class="active">
				<strong><?php echo $account['main_title'];?></strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form role="form" class="validate" method="post" action="<?php echo base_url('admin/accountEditPost'); ?>">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" ><?php echo $account['account_title']?></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" data-validate="required" data-msg-required="<?php echo $account['account_username_error'];?>" placeholder="<?php echo $userData['0']['username'];?>" disabled/>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label"><?php echo $account['password_title']?></label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password" data-validate="required" data-msg-required="<?php echo $account['account_password_error'];?>" placeholder="">
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label"><?php echo $account['password_again_title']?></label>
							
							<div class="col-sm-10">
								<input type="password" class="form-control" name="password_confirm" id="password_confirm" data-rule-equalto="#password" data-msg-equalto = "<?php echo $account['account_enter_same_password']?>"  data-validate="required" data-msg-required="<?php echo $account['account_password_agent_error'];?>" placeholder="">
							</div>
						</div>
						<div class="form-group-separator"></div>
					</div>
					<div class="form-group col-sm-offset-2">
						<button type="submit" class="btn btn-success"><?php echo $account['account_add_submit'];?></button>
						<button type="reset" onclick="history.go(-1)" class="btn btn-white"><?php echo $account['account_add_reset'];?></button>
					</div>
					<input type="hidden" name="<?php echo $token;?>" value="<?php echo $hash;?>" />
					<input type="hidden" name="id" value="<?php echo $userData['0']['id'];?>" />
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Imported scripts on this page -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>