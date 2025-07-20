	<div id="contact" class="page-wrap">
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
							<a href="<?php echo base_url();?>indexProduct">營業項目</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>faq">產品問與答</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>link">相關聯結</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>contact" class="is-active">聯絡我們</a>
						</li>
		            </ul>
				</nav>
				<!-- /.page-nav -->
			</div>
			<div class="contact-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.728396009969!2d121.26370351500577!3d25.0093433839839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34681f7f05f740a1%3A0x27e80360f95d8eb6!2zMzM45qGD5ZyS5biC6JiG56u55Y2A5paw6IiI6KGXMzAw5be3!5e0!3m2!1szh-TW!2stw!4v1469113729946" width="100%" height="330" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
		<!-- /.page-header -->
		<div class="page-body">
			<section class="page-content">
				<div class="contact-group">
					<div class="contact-box contact-first">
						<div class="contact-title">聯絡方式</div>
						<ul class="contact-list">
							<li class="map">桃園市蘆竹區新興里新興街300巷72號</li>
							<li class="tel">
								TEL  03-3414846 <br>
								FAX  03-3414782
							</li>
							<li class="mail"><a href="mailto:ok16800a@gmail.com">Mail  Honyeh@Honyeh.com.tw</a></li>
						</ul>
					</div>
					<div class="contact-box contact-second">
						<div class="contact-title">線上留言</div>
						<form id="contactForm" role="form" class="validate" method="post" action="<?php echo base_url('contact/mailPost'); ?>">
							<div class="contact-form">
								<div class="left">
									<input type="text" class="form-input" name="username" placeholder="聯絡人" required="required">
									<input type="text" class="form-input" name="phone" placeholder="聯絡電話" required="required">
									<input type="email" class="form-input" name="email" placeholder="聯絡信箱" required="required">
								</div>
								<div class="right">
									<textarea name="content" class="form-input"></textarea>
									<div class="bottom">
										<div class="code-img"><?php echo $captcha; ?></div>
										<div class="code-input"><input type="text" class="form-input" name="captcha" placeholder="請輸入驗證碼"></div>
										<button class="btn-submit contact-btn">發送</button>
									</div>
								</div>
							</div>
							<input type="hidden" name="<?php echo $token;?>" value="<?php echo $hash;?>" />
						</form>
					</div>
					<div class="contact-box contact-third">
						<a href="http://line.naver.jp/ti/p/zr0QqynccN" target="_blank">
							<img src="<?php echo base_url();?>assets/images/web/contact_line.png" class="desktop" alt="">
							<img src="<?php echo base_url();?>assets/images/web/line_join.png" class="mobile" alt="">
						</a>
					</div>
				</div>
			</section>
		</div>
	</div>