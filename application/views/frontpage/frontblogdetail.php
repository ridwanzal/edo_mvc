<div class="thirdsection">
	<div class="container">
		<?php
			foreach ($data->result() as $row) :
		?>
		<div class="blog_details_maincontainer" >
		    <div class="row">
				<div class="col-lg-8 col-md-8 col-xs-12" style="position:relative;">
					<ol class="breadcrumb" style="font-size:11px;">
						<li class="breadcrumb-item"><a href="<?php echo base_url() ?>" title="Home">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url() ?>/blog"  title="Blog">Blog</a></li>
						<li class="breadcrumb-item active detail_slug" aria-current="page"  title="<?php echo $row->title;?>"><?php echo $row->title;?></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-md-8 col-xs-12">
						<p class="blog_detail_head"><?php echo $row->title;?></p>
						<p class="blog_detail_subhead"><span data-feather="book" class="feather-8" ></span>&nbsp;<?php echo $row->subtitle;?></p>
						<p class="blog_detail_suminfo"><span><img alt="" height="28px" id="image_pict" src="<?php echo base_url() ?>assets/img//rwz.svg"></span><span>M. Ridwan Zalbina</span>&nbsp;|&nbsp;
						<span style=""><span data-feather="calendar" class="feather-8" ></span>&nbsp;&nbsp;<?php echo $row->date_created;?>&nbsp;</p>
						<img style="border:1px solid #eee; width:100%;margin-bottom:5px;border-radius:5px;" src="<?php echo base_url() ."/assets/thumb_img/". $row->image_path;?>" class="img-responsive">
						<div class="blog_detail_content"><?php echo $row->content;?>
						<div class="row blog_tag">
							<div class="col-lg-12 col-md-12 col-xs-12">
								<?php $tag = $row->tag;
									$taglist = explode (",", $tag);
									for($i =0; $i < sizeof($taglist); $i++){
										?>  
												<button class="button_circle_outline_small" type="button"><span></span><? echo $taglist[$i] ?></button>
												<?
									}
								?>
							</div>
						</div>
						<div class="blog_share">
							<ul class="blog_sharelist" style="display:flex;margin-top:15px;margin-bottom:15px;border:1px solid #ddd;background:#eee;border-radius:5px;padding-top:5px;padding-bottom:0px; padding-left:20px;">
								<li class="" class="item_titles" style="list-style:none;font-size:16px;margin-right:20px;top:3px;position:relative;">Bagikan  </li>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url() ."blog/artikel/" ?><?= $row->slug; ?>" title="Facebook"><li class="fa fa-facebook items"></li></a>
								<a href="https://twitter.com/intent/tweet?text=<?= $row->title;  ?>&nbsp;<?= base_url() ."blog/artikel/" ?><?= $row->slug; ?>" title="Twitter"><li class="fa fa-twitter items"></li></a>
								<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= base_url() ."blog/artikel/" ?><?= $row->slug; ?>" title="Linkedin"><li class="fa fa-linkedin items"></li></a>
							</ul>
						</div>
						</div>
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
						<hr/>
						<div class="row blog_list_container" style="min-height:200px;">
							<div class="container_loader">
							<center>
								<img style="text-align:center;" class="preload_gallery" src="<?php echo base_url() ?>assets/img/preload_fountain.gif">
							</center>
							</div>
						</div>
				</div>
			</div>
		</div> 
		<?php endforeach;?>
	</div>
</div>
<script>
 $('.blog_list_container').hide();
    $('.preload_gallery').fadeIn(1000);
     $.ajax({
          url: "<?php echo base_url() ?>blog/artikel/list", 
          success: function(result){
          let decode_result = JSON.parse(result);
          let result_url;
          let url_link = "<? echo base_url() ?>";
          let slug = decode_result
          console.log(decode_result);
          let image_path = "";
          let i = 0;
          for(i; i < decode_result.length; i++){
			if(i < 3){
				result_url = url_link +'blog/artikel/'+  decode_result[i].slug;
				if(decode_result[i].image_path == ""){
					image_path = "<?php echo base_url() ?>assets/img/work/prowire.png";
				}else{
					image_path = "<?php echo base_url() ?>assets/thumb_img/" + decode_result[i].image_path ;
				}
				let adapter = `<div class="col-lg-4 col-md-4 col-xs-12 containers_blog" style="margin-bottom:10px;">
						<a href=`+result_url+`><img class="blog_thumbnail_data" src=`+image_path+` style="height:150px; width: 240px; object-fit:cover;border-radius:4px;border:1px solid #eee;" class="img-responsive"></a>
						<a href=`+result_url+`><p style="margin-top:15px; color:#4d4d4d; font-size:16px;font-weight:400;font-family: 'Montserrat', serif;">`+decode_result[i].title+`</p></a>
						<div style="height: auto; max-height:100px; ;white-space: nowrap;overflow: hidden; ont-family: 'Montserrat', serif; text-overflow: ellipsis; margin-bottom:10px;">`+decode_result[i].subtitle+`</div>
						<p style="font-size:12px; color:#a4a4a4"><span>M. Ridwan Zalbina</span>&nbsp;&nbsp;<span style="float:right;">`+decode_result[i].date_created+`</span></p>
				</div>`;
				setTimeout(function(){
					$(adapter).insertAfter(".container_loader");    
					$('.blog_list_container').fadeIn(500);
				}, 500)
			}
          }
    }});
</script>