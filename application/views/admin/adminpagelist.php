<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                        <table id="tables" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Author Id</th>
                                <th>Date Created</th>
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Like</th>
                                <th>Type</th>

                            </tr>
                                </thead>        
                                <tbody>
                                </tbody>
                        </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </main> 
<script>
  $( document ).ready(function() {
    $.ajax({
        url: "<?php echo base_url(); ?>blog/blog_content_list_ex", 
        success: function(result){
            console.log(JSON.parse(result));
            $('#tables').DataTable( { 
            data : JSON.parse(result),
            paging : true,
                columns: [
                    { data: 'blog_id' },
                    { data: 'title' },
                    { data: 'subtitle' },
                    { data: 'author_id' },
                    { data: 'date_created' },
                    { data: 'max_length' },
                    { data: 'image_path' },
                    { data: 'category' },
                    { data: 'tag' },
                ],
                "fixedHeader": {
                    header: true,
                    footer: true
                },
            });
        }
    });
  });
</script>