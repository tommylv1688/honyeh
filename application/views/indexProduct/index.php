	<div id="products" class="page-wrap">
		<div class="page-header">
			<div class="page-nav">
				<nav id="nav" class="nav">
					<div class="logo">
						<a href="index.php"><img src="<?php echo base_url();?>assets/images/web/logo.png" alt=""></a>
					</div>
					<div id="btn-nav"></div>
		            <ul class="nav-menu">
		            	<li>
							<a href="<?php echo base_url();?>">首頁</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>about">關於我們</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>indexProduct" class="is-active">營業項目</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>faq">產品問與答</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>link">相關聯結</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>contact">聯絡我們</a>
						</li>
		            </ul>
				</nav>
				<!-- /.page-nav -->
			</div>
		</div>
		<!-- /.page-header -->
		<div class="page-body">
			<section class="page-content pro-content">
				<nav class="pro-nav">
					<ul>
						<li>
							<button class="filter active" data-filter="all">全系列</button>
						</li>
						<?php foreach ($typeData as $type) : ?>
							<li>
								<button class="filter" data-filter=".<?php echo $type['project'];?>_<?php echo $type['id'];?>"><?php echo $type['title'];?></button>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
				<article id="Container" class="pro-main">
					<?php foreach ($detailsData as $details) : ?>
					    <div class="mix <?php echo $details['project'];?>_<?php echo $details['type'];?>">
					    	<a href="<?php echo base_url();?>indexProduct/productDetails/type/<?php echo $details['type'];?>/id/<?php echo $details['id'];?>">
					    		<div class="pro-title"><?php echo $details['title'];?></div>
			    				<?php $imgs = json_decode($details['img_url']); ?>
			    				<?php $issetImg = FALSE; ?>
								<?php foreach ($imgs as $img) { ?>
									<?php if (!empty($img) && !$issetImg) { ?>
										<img class="" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$img;?>">
										<?php $issetImg = TRUE; ?>
									<?php } ?>
								<?php } ?>
								<?php if (!$issetImg) { ?>
									<img class="" src="<?php echo base_url();?>assets/images/web/noimage.jpg">
								<?php } ?>
					    	</a>
					    </div>
				    <?php endforeach; ?>
				</article>
			</section>
		</div>
	</div>