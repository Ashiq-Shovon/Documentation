<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('manage_profile'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('basic_info'); ?></h4>

                <form action="<?php echo site_url('admin/manage_profile/update_profile_info/' . $edit_data['id']) ?>" method="POST" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><?php echo get_phrase('name'); ?></label>
                        <input type="text" class="form-control" name="name" value="<?php echo $edit_data['name']; ?>" required />
                    </div>

                    <div class="form-group">
                        <label><?php echo get_phrase('email'); ?></label>
                        <input type="email" class="form-control" name="email" value="<?php echo $edit_data['email']; ?>" required />
                    </div>

                    <div class="form-group">
                        <label><?php echo get_phrase('a_short_introduction_about_yourself'); ?></label>
                        <textarea rows="5" id="about" class="form-control" name="about" placeholder="<?php echo get_phrase('a_short_introduction_about_yourself'); ?>" required><?php echo $edit_data['about']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label><?php echo get_phrase('designation'); ?></label>
                        <input type="text" class="form-control" name="designation" value="<?php echo $edit_data['designation']; ?>" required />
                    </div>

                    <div class="form-group">
                        <label> <?php echo get_phrase('photo'); ?> <small>(<?php echo get_phrase('the_image_size_should_be_any_square_image'); ?>)</small> </label>
                        <div class="d-flex mt-2">
                            <div class="">
                                <img class="rounded-circle img-thumbnail" src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="" style="height: 50px; width: 50px;">
                            </div>
                            <div class="flex-grow-1 pl-2">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="user_image" id="user_image" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                        <label class="custom-file-label ellipsis" for=""><?php echo get_phrase('choose_file'); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary"><?php echo get_phrase('update_profile'); ?></button>
                    </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        initSummerNote(['#biography']);
    });
</script>