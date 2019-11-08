<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <?php echo form_open_multipart('blog/submit_blog'); ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                        <div class="col-lg-1 col-md-1 col-xs-6">
                          <img style="object-fit:cover;border-radius:10px;" width="110" height="110" id="img_thumb" src="<?php echo base_url() ?>assets/img/image_default.png">
                        </div>
                        <div class="col-lg-11 col-md-11 col-xs-6">
                          <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Thumbnails</label>
                            <input type="file" class="form-control-file" id="upload_thumb" name="upload_thumb" id="exampleFormControlFile1" required>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <br/>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                        <?php
                            if($this->session->flashdata('message')){ ?>
                                <div class="alert alert-success alert-dismissible"><?php echo $this->session->flashdata('message') ?>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </div>
                                <?    }else if($this->session->flashdata('error')){ ?>
                                  <div class="alert alert-danger alert-dismissible"><?php echo $this->session->flashdata('error') ?>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </div>
                                  <?
                                }
                        ?>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-xs-12">
                              <div class="form-group">
                                  <label>Judul</label>
                                  <input type="text" name="blog_title" class="form-control" id="judul" required>
                              </div>    
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                              <div class="form-group">
                                  <label>Kategori</label>
                                  <select class="form-control" name="blog_category" required>
                                      <option value="" ><span style="color:#cccccc;!important">Silahkan pilih category<span></option>
                                      <option value="1">Web Development</option>
                                      <option value="2">Android Development</option>
                                      <option value="3">Graphic Design</option>
                                      <option value="4">UI/UX</option>
                                      <option value="5">Others</option>
                                  </select>
                              </div>    
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-8 col-md-8 col-xs-12">
                            <div class="form-group">
                                <label>Sub Judul</label>
                                <input type="text" name="blog_subtitle" class="form-control" id="usr" required>
                            </div> 
                          </div>
                          <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label>Tag&nbsp;<span style="color:#ccc">(Pisahkan dalam koma)</span></label>
                                <input type="text" name="blog_tag" class="form-control" id="usr" required>
                            </div>  
                          </div>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea type="text" name="blog_content" class="form-control" rows="10" id="editor" name="editor" required></textarea>
                        </div>   
                        <input type="submit" value="Save as Draft" class="btn btn-sm btn-primary" name="submit_draft_blog" id="submit blog"/> 
                        <input type="submit" value="Post" class="btn btn-sm btn-success" name="submit_blog" id="submit blog"/> 
                  <?php echo form_close();?>
              </div>
            </div>
          </div>
        <br/>

      <!-- Tab panes -->

    </main> 
    <script>
      CKEDITOR.replace( 'editor' ); 
      $(document).ready(function(){
        $.ajax({
          url: "<?php echo base_url() ?>blog/blog_content_list", 
          success: function(result){
          console.log('berhasil');
          console.log(result);
        }});

        $('#upload_thumb').on('change', function(){
          var input = this;
          var url = $(this).val();
          var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
          if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
          {
              var reader = new FileReader();

              reader.onload = function (e) {
                $('#img_thumb').attr('src', e.target.result);
              }
            reader.readAsDataURL(input.files[0]);
          }
          else
          {
            $('#img').attr('src', '/assets/no_preview.png');
          }
        })
      });
    </script>