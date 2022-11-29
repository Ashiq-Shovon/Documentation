<div class="content">
    <!-- BEGIN PlACE PAGE CONTENT HERE -->
    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Campaign details 
                    </h4>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!-- Articles list Start-->
                    
                    <!-- Articles list ends-->
                    <form action="<?php echo site_url('admin/campaign_update'); ?>"
                        method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="documentation"> Campaign Description </label>

                            <textarea id="campaign" name="campaign"><?php echo get_settings('campaign_bar'); ?></textarea>
                        </div>
                      
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block">Update campaign bar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        initSummerNote(['#campaign']);
    });
    </script> <!-- END PLACE PAGE CONTENT HERE -->
</div>