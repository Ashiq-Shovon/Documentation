<form class="" action="<?php echo site_url('admin/users/add'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name"><?php echo get_phrase('name'); ?></label>
        <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo get_phrase('name'); ?>" required>
    </div>
    <div class="form-group">
        <label for="email"><?php echo get_phrase('email'); ?></label>
        <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo get_phrase('email'); ?>" required>
    </div>
    <div class="form-group">
        <label for="password"><?php echo get_phrase('password'); ?></label>
        <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo get_phrase('password'); ?>" required>
    </div>
    <div class="form-group">
        <label for="designation"><?php echo get_phrase('designation'); ?></label>
        <input type="text" class="form-control" name="designation" id="designation" placeholder="<?php echo get_phrase('designation'); ?>" required>
    </div>
    <div class="form-group">
        <label for="about"><?php echo get_phrase('about'); ?></label>
        <textarea name="about" class="form-control" id="about" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label for="role_id"><?php echo get_phrase('role'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="role_id" id="role_id">
            <option value="2"><?php echo get_phrase('customer'); ?></option>
            <option value="3"><?php echo get_phrase('Writer'); ?></option>
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