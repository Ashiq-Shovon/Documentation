<?php $user_data = $this->user_model->get_all_user($param2)->row_array(); ?>
<form class="" action="<?php echo site_url('admin/users/edit/' . $param2); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name"><?php echo get_phrase('name'); ?></label>
        <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo get_phrase('name'); ?>" value="<?php echo $user_data['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="email"><?php echo get_phrase('email'); ?></label>
        <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo get_phrase('email'); ?>" value="<?php echo $user_data['email']; ?>" required>
    </div>
    <div class="form-group">
        <label for="designation"><?php echo get_phrase('designation'); ?></label>
        <input type="text" class="form-control" name="designation" id="designation" placeholder="<?php echo get_phrase('designation'); ?>" value="<?php echo $user_data['designation']; ?>" required>
    </div>
    <div class="form-group">
        <label for="about"><?php echo get_phrase('about'); ?></label>
        <textarea name="about" class="form-control" id="about" rows="4"><?php echo $user_data['about']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="role_id"><?php echo get_phrase('role'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="role_id" id="role_id">
            <option value="2" <?php if ($user_data['role_id'] == 2) echo "selected"; ?>><?php echo get_phrase('customer'); ?></option>
            <option value="3" <?php if ($user_data['role_id'] == 3) echo "selected"; ?>><?php echo get_phrase('Writer'); ?></option>
        </select>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        initSelect2(['#role_id']);
    });
</script>