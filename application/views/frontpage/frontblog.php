<div class="blogsection">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-xs-12">
                <p class="text_header_blog">Artikel</p>
                <p id="captiontext">Karena dengan menulis dan membaca kamu akan lebih banyak tahu</p>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-12">
                    <ol class="breadcrumb" style="background:#f9f9f9;font-size:11px;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>" title="Home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" title="Blog">Blog</li>
                    </ol>
            </div>

        </div>
        <div class="row" style="display:none;">
            <div class="col-lg-12">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#">Featured</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Android Development</a></li>
                    <li><a href="#">Graphic Design</a></li>
                    <li><a href="#">UI/UX</a></li>
                </ul>
            </div>
        </div>
        <br/>
        <div style="text-align:center;">
            <img style="margin-bottom:10px;" class="preload_gallery" src="<?php echo base_url() ?>assets/img/preload_fountain.gif">
        </div>
        <div class="row blog_list_container" style="min-height:600px;">
                <div class="container_loader">
                </div>
        </div>
    </div>  
</div>
<div class="container">
    <div class="row">
        <div  class="col-lg-3 col-md-3 col-xs-12">  
                
        </div>
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
            let cols = i + 1;
            result_url = url_link +'blog/artikel/'+  decode_result[i].slug;
            if(decode_result[i].image_path == ""){
                image_path = "<?php echo base_url() ?>assets/img/work/prowire.png";
            }else{
                image_path = "<?php echo base_url() ?>assets/thumb_img/" + decode_result[i].image_path ;
            }
            let adapter = `<div class="col-lg-4 col-md-4 col-xs-12" style="margin-bottom:10px;"><div class="containers_blog">
                    <a href=`+result_url+`><img class="blog_thumbnail_data" src=`+image_path+` class="img-responsive"></a>
                        <div class="blog_info_style">
                        <a href=`+result_url+`><p class="blog_title_style" title='`+decode_result[i].title+`'>`+decode_result[i].title+`</p></a>
                        <p style="font-size:15px; color:#a4a4a4">&nbsp;<span>M. Ridwan Zalbina</span>&nbsp;&nbsp;<span style="float:right;">`+decode_result[i].date_created+`</span></p>
                        </div>
                    </div></div>`;
            setTimeout(function(){
                $(adapter).insertAfter(".container_loader");    
                $('.blog_list_container').fadeIn(400);
            }, 1)
          }
    }});
</script>