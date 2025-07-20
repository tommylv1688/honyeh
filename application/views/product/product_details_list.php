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
			<li>
				<a href="<?php echo base_url();?>product/productTypeList/project/<?php echo $getUrlData;?>/type/<?php echo $getUrlType;?>"><?php echo $type;?></a>
			</li>
			<li class="active">
				<strong><?php echo $type;?><?php echo $lang['main_title'];?></strong>
			</li>
		</ol>
					
	</div>
		
</div>

<!-- Removing search and results count filter -->
<div class="panel panel-default">
	<div class="panel-body">
		<div style="text-align: right;">
			<a href="<?php echo base_url();?>product/productDetailsAdd/project/<?php echo $getUrlData;?>/type/<?php echo $getUrlType;?>"><button class="btn btn-white"><?php echo $lang['product_add'];?></button></a>
		</div>

		<table class="table table-bordered table-striped" id="dataList">
			<thead>
				<tr>
					<!--<th class="no-sorting">
						<input type="checkbox" class="cbr">
					</th>-->
					<th><?php echo $lang['table_list_name']; ?></th>
					<th><?php echo $lang['table_list_img']; ?></th>
					<th><?php echo $lang['table_list_create_dt']; ?></th>
					<th><?php echo $lang['table_list_actions']; ?></th>
				</tr>
			</thead>
			
			<tbody class="middle-align" id="sortable">
				<?php foreach ($data as $value) {?>
					<tr data-id="<?php echo $value['id'];?>" data-order="<?php echo $value['order']?>">
						<!--<td>
							<input type="checkbox" class="cbr">
						</td>-->
						<td><?php echo $value['title'];?></td>
						<td>
							<?php $imgs = json_decode($value['img_url']); ?>
							<?php foreach ($imgs as $img) { ?>
								<?php if (!empty($img)) { ?>
									<img class="TablelistImg" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$img;?>">
								<?php } ?>
							<?php } ?>
						</td>
						<td><?php echo $value['create_dt'];?></td>
						<td>
							<a href="<?php echo base_url();?>product/productDetailsEdit/id/<?php echo $value['id'];?>/project/<?php echo $getUrlData;?>/type/<?php echo $getUrlType;?>" class="btn btn-secondary btn-sm btn-icon icon-left">
								<?php echo $lang['product_edit'];?>
							</a>
							
							<a href="javascript:;" onclick="deleteModel(event, '<?php echo $value['id'];?>', '<?php echo $value['title'];?>');" class="btn btn-danger btn-sm btn-icon icon-left">
								<?php echo $lang['product_delete'];?>
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<!--寫在table取得順訓-->
		<?php foreach ($data as $value) {?>
			<input type="hidden" name="getOldData" data-id="<?php echo $value['id'];?>" data-order="<?php echo $value['order'];?>">
		<?php } ?>
		<input type="hidden" id="token" name="<?php echo $token;?>" value="<?php echo $hash;?>" />
	</div>
</div>

<!-- delete modal-->
<div class="modal fade" id="delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang['confirm_delete'];?></h4>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $lang['close'];?></button>
				<button type="button" id="sure" class="btn btn-info"><?php echo $lang['save'];?></button>
			</div>
		</div>
	</div>
</div>

<!--sortable-->
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<script>

//delete
function deleteModel(event, id, username)
{
	event.stopPropagation();
	var token = $('#token').val();
	$('#delete .modal-body').html('<?php echo $lang['sure_delete'];?> <span class="red">' + username + '</span> ?');
	$('#delete').appendTo("body").off().modal('show', {backdrop: 'static'}).one('click', '#sure', function() {
		jQuery.ajax({
			data: {'id' : id, 'csrf_token_name' : token},
			type: "POST",
			url: "<?php echo base_url();?>product/productDetailsDelete",
			success: function(newToken) {
				$('#token').val(newToken);
				$('#sortable tr[data-id = ' + id + ']').remove();
			},
	        error: function(msg){
	            alert(msg);
	        }
		});
       $('#delete').modal('hide');
    });
}

$(function() {
	//order
	var fixHelper = function(e, ui) {
	ui.children().each(function() {
		$(this).width($(this).width());  
		});  
		return ui;  
	};

	$("#sortable").sortable({ 
		helper: fixHelper,
	    update: function (event, ui) {
	    	var newId              = [];
	    	var getOrder        = [];
	    	var needUpdataId    = [];
	    	var needUpdataOrder = [];
	    	var token           = $('#token').val();

	    	$(this).find('tr').each(function(){
	    		needUpdataId.push($(this).attr('data-id'));
	    	});

	    	$('input[name=getOldData]').each(function(){
	    		needUpdataOrder.push($(this).attr('data-order'));
	    	});

	    	if (needUpdataId.length != 0 && needUpdataOrder.length != 0) {
		    	$.ajax({
					data: {'id' : needUpdataId, 'order' : needUpdataOrder, 'csrf_token_name' : token},
					type: "POST",
					url: "<?php echo base_url();?>product/productDetailsOrder",
					success: function(newToken) {
						$('#token').val(newToken);
					},
			        error: function(msg){
			            alert(msg);
			        }
				});
	    	}
	    	
	    	//todo update newOrder
	    },
	}).disableSelection();

	//data list 分頁
	/*$("#dataList").dataTable({
		dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
		aoColumns: [
			{bSortable: false},
			null,
			null,
			null,
		],
	});*/
	
	// Replace checkboxes when they appear
	var $state = $("#dataList thead input[type='checkbox']");
	
	$("#dataList").on('draw.dt', function()
	{
		cbr_replace();
		
		$state.trigger('change');
	});
	
	// Script to select all checkboxes
	$state.on('change', function(ev)
	{
		var $chcks = $("#dataList tbody input[type='checkbox']");
		
		if($state.is(':checked'))
		{
			$chcks.prop('checked', true).trigger('change');
		}
		else
		{
			$chcks.prop('checked', false).trigger('change');
		}
	});
});
</script>
