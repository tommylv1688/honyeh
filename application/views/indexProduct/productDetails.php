	<div id="gotop">
		<a href="#"></a>
	</div>
	<div id="products-dtl" class="page-wrap">
		<div class="page-header">
			<div class="page-nav">
				<nav id="nav" class="nav">
					<div class="logo">
						<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/web/logo.png" alt=""></a>
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
			<div class="pro-header-title">
				<h1 class="h1"><?php echo $detailsData[0]['title'];?></h1>
				<h2 class="h2"><?php echo $detailsData[0]['s_title'];?></h2>
			</div>
		</div>
		<!-- /.page-header -->
		<div class="page-body">
			<section class="page-content pro-content">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url();?>indexProduct">營業項目</a></li>
					<li class="active"><?php echo $detailsData[0]['title'];?></li>
				</ol>
				<article class="pro-dtl-main">
					<div class="pro-title"><?php echo $detailsData[0]['title'];?></div>
					<div class="dtl-con">
						<div class="dtl-left-img">
							<div class="dtl-left">
								<div class="dtl-img">
				    				<?php $imgs = json_decode($detailsData[0]['img_url']); ?>
									<?php foreach ($imgs as $img) { ?>
										<?php if (!empty($img)) { ?>
											<img class="" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$img;?>">
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="dtl-right">
							<?php echo $detailsData[0]['content_details'];?>
						</div>
					</div>
					<div class="dtl-share">
						<button class="btn-share" onclick="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent(location.href)) ));">分享</button>
					</div>
				</article>
			</section>
		</div>
	</div>