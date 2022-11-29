<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/blog_category_add/'); ?>', '<?php echo get_phrase('add_blog_category'); ?>')" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_blog_category'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('blog_categories'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('category'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($blog_categories as $key => $blog_category) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><strong><?php echo htmlspecialchars($blog_category['blog_category_name']); ?></strong></td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href=javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/blog_category_edit/') . $blog_category['blog_category_id']; ?>', '<?php echo get_phrase('edit_blog_category'); ?>')"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('admin/blog_categories/delete/' . $blog_category['blog_category_id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>