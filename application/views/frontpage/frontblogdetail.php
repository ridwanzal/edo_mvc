<div class="thirdsection">
	<div class="container">
		<?php
			foreach ($data->result() as $row) :
		?>
		<div class="col-md-8 col-md-offset-2">
			<p class="blog_detail_head"><?php echo $row->title;?></p>
			<p class="blog_detail_suminfo"><span><img alt="" height="36px" id="image_pict" src="<?php echo base_url() ?>assets/img//rwz.svg"></span><span>M. Ridwan Zalbina</span>&nbsp;/&nbsp;<span><?php echo $row->date_created;?></span>&nbsp;<span>/</span>&nbsp;<?php echo $row->tag;?></p>
			<div class="blog_detail_content"><?php echo $row->content;?></div>
			<div class="row blog_detail_about">
				<div class="col-lg-2 col-md-2 col-xs-12">
					<img alt="" height="96px" id="image_pict_aboutme" src="<?php echo base_url() ?>assets/img//rwz.svg">
				</div>
				<div class="col-lg-10 col-md-10 col-xs-12">
					<h3>M. Ridwan Zalbina</h3>
					<div class="blog_about_me">Software Engineer based in Palembang, previously in Jakarta, specializing in developing (and occasionally designing) stunning and quality website and applications. Currently working at Scafol Indonesia as a Co-Founder and Tech Lead Engineer.</div>
					<span>
						<a href="#"><i class="fa fa-instagram " style="font-size:1.0em;color:#888;margin-right:20px;margin-top:10px;"></i></a>
						<a href="#"><i class="fa fa-behance " style="font-size:1.0em;color:#888;margin-right:20px;margin-top:10px;"></i></a>
						<a href="#"><i class="fa fa-linkedin " style="font-size:1.0em;color:#888;margin-right:20px;margin-top:10px;"></i></a>
					</span>
				</div>
			</div>
		</div> 
		<?php endforeach;?>
	</div>
</div>