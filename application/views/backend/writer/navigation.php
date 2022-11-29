<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
			<?php
			$user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $user_details['name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>

		<!-- DOCUMENTATION -->
		<li class="side-nav-item <?php if ($page_name == 'topics' || $page_name == 'documentation') echo 'active'; ?>">
			<a href="<?php echo site_url('writer/documentation'); ?>" class="side-nav-link <?php if ($page_name == 'topics' || $page_name == 'documentation') echo 'active'; ?>">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('documentation'); ?></span>
			</a>
		</li>

		<!-- BLOG -->
		<li class="side-nav-item  <?php if ($page_name == 'blogs' || $page_name == 'blog_categories' || $page_name == 'blog_form') : ?> active <?php endif; ?>">
			<a href="javascript: void(0);" class="side-nav-link">
				<i class="dripicons-toggles"></i>
				<span> <?php echo get_phrase('blogs'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class="<?php if ($page_name == 'blog_categories') echo 'active'; ?>">
					<a href="<?php echo site_url('writer/blog_categories'); ?>"><?php echo get_phrase('blog_categories'); ?></a>
				</li>
				<li class="<?php if ($page_name == 'blogs' || $page_name == 'blog_form') echo 'active'; ?>">
					<a href="<?php echo site_url('writer/blogs'); ?>"><?php echo get_phrase('blogs'); ?></a>
				</li>
			</ul>
		</li>

		<!-- SALES REPORT -->
		<li class="side-nav-item <?php if ($page_name == 'manage_profile') echo 'active'; ?>">
			<a href="<?php echo site_url('writer/manage_profile'); ?>" class="side-nav-link <?php if ($page_name == 'manage_profile') echo 'active'; ?>">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('manage_profile'); ?></span>
			</a>
		</li>
	</ul>
</div>