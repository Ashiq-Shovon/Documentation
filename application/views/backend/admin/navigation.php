<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
			<?php
			$admin_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $admin_details['name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>

		<!-- PRODUCTS -->
		<li class="side-nav-item <?php if ($page_name == 'products' || $page_name == 'topics' || $page_name == 'documentation') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/products'); ?>" class="side-nav-link <?php if ($page_name == 'products' || $page_name == 'topics' || $page_name == 'documentation') echo 'active'; ?>">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('products'); ?></span>
			</a>
		</li>

		<!-- COUPON CODE -->
		<li class="side-nav-item <?php if ($page_name == 'coupons') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/coupons'); ?>" class="side-nav-link <?php if ($page_name == 'coupons') echo 'active'; ?>">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('coupon_code'); ?></span>
			</a>
		</li>

		<!-- DOCUMENTATION -->
		<li class="side-nav-item <?php if ($page_name == 'topics' || $page_name == 'documentation') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/documentation'); ?>" class="side-nav-link <?php if ($page_name == 'topics' || $page_name == 'documentation') echo 'active'; ?>">
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
					<a href="<?php echo site_url('admin/blog_categories'); ?>"><?php echo get_phrase('blog_categories'); ?></a>
				</li>
				<li class="<?php if ($page_name == 'blogs' || $page_name == 'blog_form') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/blogs'); ?>"><?php echo get_phrase('blogs'); ?></a>
				</li>
			</ul>
		</li>

		<!-- SALES REPORT -->
		<li class="side-nav-item <?php if ($page_name == 'sales_report') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/sales_report'); ?>" class="side-nav-link <?php if ($page_name == 'sales_report') echo 'active'; ?>">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('sales_report'); ?></span>
			</a>
		</li>

		<li class="side-nav-item <?php if ($page_name == 'campaign_bar') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/campaign_bar'); ?>" class="side-nav-link <?php if ($page_name == 'campaign_bar') echo 'active'; ?>">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('campaign_bar'); ?></span>
			</a>
		</li>
		

		<!-- USERS -->
		<li class="side-nav-item <?php if ($page_name == 'users') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/users'); ?>" class="side-nav-link <?php if ($page_name == 'users') echo 'active'; ?>">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('users'); ?></span>
			</a>
		</li>

		<!-- Ad Network -->
		<li class="side-nav-item <?php if ($page_name == 'ad_network') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/ad_network'); ?>" class="side-nav-link <?php if ($page_name == 'ad_network') echo 'active'; ?>">
				<i class="mdi mdi-cast"></i>
				<span><?php echo get_phrase('ad_network'); ?></span>
			</a>
		</li>

		<!-- PROFILE MANAGER-->
		<li class="side-nav-item <?php if ($page_name == 'manage_profile') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/manage_profile'); ?>" class="side-nav-link <?php if ($page_name == 'manage_profile') echo 'active'; ?>">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('manage_profile'); ?></span>
			</a>
		</li>
	</ul>
</div>