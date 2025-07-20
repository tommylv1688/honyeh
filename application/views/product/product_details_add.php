<div class="page-title">
	<div class="title-env">
		<h1 class="title"><?php echo $type;?><?php echo $lang['main_title'];?></h1>
	</div>
	<div class="breadcrumb-env">

		<ol class="breadcrumb bc-1">
			<li>
				<a href="<?php echo base_url('admin/accountList'); ?>"><i class="fa-home"></i><?php echo $lang['nav_index'];?></a>
			</li>
			<li>
				<a href="<?php echo base_url();?>product/productTypeList/project/<?php echo $getUrlData;?>"><?php echo $project;?></a>
			</li>
			<li class="active">
				<strong><?php echo $type;?><?php echo $lang['main_title'];?></strong>
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form role="form" class="validate" method="post" action="<?php echo base_url('product/productDetailsAddPost'); ?>">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" ><?php echo $lang['title']?></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title" data-validate="required" data-msg-required="<?php echo $lang['title'];?>" placeholder="" />
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label" ><?php echo $lang['s_title']?></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="s_title" data-msg-required="<?php echo $lang['s_title'];?>" />
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label" ><?php echo $lang['images']?></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="imgUrl1" name="img_url[]" placeholder="<?php echo $lang['img_url'];?>" />
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-success btn-sm" onclick="BrowseServer('imgUrl1');"><?php echo $lang['select_img'];?></button>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" ><?php echo $lang['images']?></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="imgUrl2" name="img_url[]" placeholder="<?php echo $lang['img_url'];?>" />
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-success btn-sm" onclick="BrowseServer('imgUrl2');"><?php echo $lang['select_img'];?></button>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" ><?php echo $lang['images']?></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="imgUrl3" name="img_url[]" placeholder="<?php echo $lang['img_url'];?>" />
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-success btn-sm" onclick="BrowseServer('imgUrl3');"><?php echo $lang['select_img'];?></button>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label" ><?php echo $lang['details']?></label>
							<div class="col-sm-10">
								<textarea id="ckeditor02" class="ckeditor" name="content_details" rows="10" cols="80"></textarea>
							</div>
						</div>
						<div class="form-group-separator"></div>
					</div>
					<div class="form-group col-sm-offset-2">
						<button type="submit" class="btn btn-success"><?php echo $lang['add_submit'];?></button>
						<button type="reset" onclick="history.go(-1)"  class="btn btn-white"><?php echo $lang['add_reset'];?></button>
					</div>
					<input type="hidden" name="<?php echo $token;?>" value="<?php echo $hash;?>" />
					<input type="hidden" name="getProject" value="<?php echo $getUrlData;?>" />
					<input type="hidden" name="getType" value="<?php echo $getUrlType;?>" />
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Imported scripts on this page -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>