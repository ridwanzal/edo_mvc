<div class="blogsection">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <p class="text_header_blog">Artikel</p>
                <p id="captiontext">Karena dengan menulis dan membaca kamu akan lebih banyak tahu</p>
            </div>
        </div>
        <br/>
        <div class="row">
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
        <div class="row blog_content">
            
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
     $.ajax({
          url: "<?php echo base_url() ?>blog/blog_content_list", 
          success: function(result){
          let decode_result = JSON.parse(result);
          console.log(decode_result);
          let i = 0;
          for(i; i < decode_result.length; i++){
            let adapter = `<div class="col-lg-4 col-md-4 col-xs-12 containers_blog">
                    <img src="http://localhost/edo/assets/img//work/prowire.png" width="100%" class="img-responsive">
                    <p style="margin-top:15px; font-size:18px;font-family: 'Bree Serif', serif;">`+decode_result[i].title+`</p>
                    <div style="height: auto; max-height:100px; ;white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">`+decode_result[i].subtitle+`</div>
                    <p style="font-size:15px; color:#a4a4a4"><span>M. Ridwan Zalbina</span>&nbsp;&nbsp;<span style="float:right;">`+decode_result[i].date_created+`</span></p>
            </div>`;
            $('.blog_content').append(adapter);
          }
    }});
</script>