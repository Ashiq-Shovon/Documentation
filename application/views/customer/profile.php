<?php $user_details = $this->user_model->get_user_by_id($this->session->userdata('user_id')); ?>
<div class="row">
    <div class="col-md-7">
        <form action="<?php echo site_url('customer/profile/update_profile'); ?>" method="POST" class="" enctype="multipart/form-data">
            <label class="margin-15px-bottom"><?php echo site_phrase('name'); ?> <span class="required-error text-radical-red">*</span></label>
            <input class="small-input bg-white margin-20px-bottom required" type="text" name="name" placeholder="<?php echo site_phrase('enter_your_name'); ?>" value="<?php echo $user_details['name']; ?>">
            <label class="margin-15px-bottom"><?php echo site_phrase('email_address'); ?> <span class="required-error text-radical-red">*</span></label>
            <input class="small-input bg-white margin-20px-bottom required" type="email" name="email" placeholder="<?php echo site_phrase('enter_your_email_address'); ?>" value="<?php echo $user_details['email']; ?>">
            <label class="margin-15px-bottom"><?php echo site_phrase('user_image'); ?> <span class="required-error text-radical-red">*</span></label>
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' class="imageUploadPreview" id="user_image" name="user_image" accept=".png, .jpg, .jpeg" />
                    <label for="user_image"></label>
                </div>
                <div class="avatar-preview">
                    <div id="user_image_preview" style="background-image: url(<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>);"></div>
                </div>
            </div>
            <button class="btn btn-medium btn-fancy btn-dark-gray w-100 mt-5" type="submit"><?php echo site_phrase('update_profile'); ?></button>
        </form>
    </div>
    <div class="col-md-5">
        <form action="<?php echo site_url('customer/profile/update_password'); ?>" method="POST">
            <label class="margin-15px-bottom"><?php echo site_phrase('current_password'); ?> <span class="required-error text-radical-red">*</span></label>
            <input class="small-input bg-white margin-20px-bottom required" type="password" name="current_password" placeholder="<?php echo site_phrase('enter_your_current_password'); ?>">
            <label class="margin-15px-bottom"><?php echo site_phrase('new_password'); ?> <span class="required-error text-radical-red">*</span></label>
            <input class="small-input bg-white margin-20px-bottom required" type="password" name="new_password" placeholder="<?php echo site_phrase('enter_your_new_password'); ?>">
            <label class="margin-15px-bottom"><?php echo site_phrase('confirm_password'); ?> <span class="required-error text-radical-red">*</span></label>
            <input class="small-input bg-white margin-20px-bottom required" type="password" name="confirm_password" placeholder="<?php echo site_phrase('confirm_your_password'); ?>">
            <button class="btn btn-medium btn-fancy btn-dark-gray w-100 mt-5" type="submit"><?php echo site_phrase('update_password'); ?></button>
        </form>
    </div>
</div>