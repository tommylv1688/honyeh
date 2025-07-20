		<div class="container">
			<aside class="pro-slider">
				<h2 class="pro-slider-ttl"><img src="<?php echo base_url();?>assets/images/web/pro-ttl.jpg" alt=""></h2>
				<nav class="pro-slider-nav">
					<ul class="list-ul">
						<?php foreach ($typeData as $data) { ?>
							<li><a href="<?php echo base_url();?>indexProduct/productList/project/<?php echo $project;?>/type/<?php echo $data['id'];?>"><?php echo $data['title'];?></a></li>
						<?php } ?>
					</ul>
				</nav>
			</aside>
			<section class="pro-overview">
				<header class="pro-header">
					<div class="pro-ttl">OVERVIEW</div>
					<ol class="breadcrumbs">
						<li><a href="<?php echo base_url();?>">首頁</a></li>
						<li><a href="<?php echo base_url();?>indexProduct/index/project/<?php echo $project;?>"><?php echo $projectName;?></a></li>
						<li class="is-active"><a href="#"><?php echo $typeName;?></a></li>
					</ol>
				</header>
				<div class="pro-list">
					<ul>
						<?php foreach ($detailsData as $details) { ?>
							<li class="pro-item">
								<a href="<?php echo base_url();?>indexProduct/productDetails/project/<?php echo $project;?>/type/<?php echo $type;?>/details/<?php echo $details['id'];?>">
									<div class="pro-img">
										<?php if (!empty($details['img_url'])) { ?>
										<img class="" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$details['img_url'];?>">
										<?php } ?>
									</div>
									<div class="pro-ttl"><?php echo $details['title'];?></div>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div class="btn-back">
					<a onclick="history.go(-1);">回上一頁</a>
				</div>
				<!-- <nav class="pagination">
					<ul>
						<li class="is-acitve"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
					</ul>
				</nav> -->
			</section>
		</div>
		<!-- /.container -->