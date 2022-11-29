<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('writer/blog_form') ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_blog'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('blog_list'); ?></h4>
                <form class="row justify-content-center" action="<?php echo site_url('writer/blogs'); ?>" method="get">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <select class="form-control select2" data-toggle="select2" name="selected_category_id" id="selected_category_id">
                                <option value="all" <?php if ($selected_category == "all") echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                                <?php foreach ($blog_categories as $blog_category) : ?>
                                    <option value="<?php echo $blog_category['blog_category_id']; ?>" <?php if ($selected_category == $blog_category['blog_category_id']) echo 'selected'; ?>><?php echo $blog_category['blog_category_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('filter'); ?></button>
                    </div>
                </form>

                <div class="table-responsive-sm mt-4">
                    <?php if (count($blogs) > 0) : ?>
                        <table id="course-datatable" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo get_phrase('title'); ?></th>
                                    <th><?php echo get_phrase('category'); ?></th>
                                    <th><?php echo get_phrase('total_likes'); ?></th>
                                    <th><?php echo get_phrase('actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($blogs as $key => $blog) : ?>
                                    <tr class="<?php echo $blog['blog_visibility'] ? 'published-blog' : 'unpublished-blog'; ?>">
                                        <td><?php echo ++$key; ?></td>
                                        <td><strong><a class="text-color" href="<?php echo site_url('writer/blog_form/' . $blog['blog_id']); ?>"><?php echo ellipsis($blog['blog_title'], 60); ?></a></strong></td>
                                        <td><?php echo $blog['blog_category_name']; ?></td>
                                        <td><?php echo $blog['blog_likes']; ?></td>
                                        <td>
                                            <div class="dropright dropright">
                                                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href=<?php echo site_url('blog/' . $blog['blog_slug']); ?> target="_blank"><?php echo get_phrase('view_on_frontend'); ?></a></li>
                                                    <li><a class="dropdown-item" href=<?php echo site_url('writer/blog_form/' . $blog['blog_id']); ?>><?php echo get_phrase('edit'); ?></a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('writer/blog/delete/' . $blog['blog_id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php if (count($blogs) == 0) : ?>
                        <div class="img-fluid w-100 text-center">
                            <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                            <?php echo get_phrase('no_data_found'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>