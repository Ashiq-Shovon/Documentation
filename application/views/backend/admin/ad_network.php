
<div class="row">
	<div class="col-6">
		<h4>Ads</h4>
	</div>
	<div class="col-6">
		<button class="btn btn-primary float-right" onclick="showAjaxModal('<?php echo site_url('admin/ad_create'); ?>', '<?php echo get_phrase('ad_create'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('create_ad'); ?></button>
	</div>
</div>


<div class="card mt-4">
    <div class="card-body">
    	<form action="<?php echo site_url('admin/ad_network'); ?>" method="get">
	    	<div class="row my-4">
	    		<div class="col-lg-4">
	    			<select class="form-control" name="product_id">
						<option value="all">All Products</option>
						<?php $products = $this->product_model->get_products(); ?>
						<?php foreach($products->result_array() as $product): ?>
							<option value="<?php echo $product['id']; ?>" <?php if(isset($product_id) && $product_id == $product['id'])echo 'selected'; ?>><?php echo $product['name']; ?> </option>
						<?php endforeach; ?>
					</select>
	    		</div>
	    		<div class="col-lg-4">
	    			<select class="form-control" name="dimension_id">
						<option value="all">All Dimensions</option>
						<?php $dimensions = $this->ad_model->get_ad_dimensions(); ?>
						<?php foreach($dimensions->result_array() as $dimension): ?>
							<option value="<?php echo $dimension['dimension_id']; ?>" <?php if(isset($dimension_id) && $dimension_id == $dimension['dimension_id'])echo 'selected'; ?>><?php echo $dimension['dimension']; ?></option>
						<?php endforeach; ?>
					</select>
	    		</div>
	    		<div class="col-lg-4 text-center">
	    			<button type="submit" class="btn btn-primary"> Filter </button>
	    		</div>
	    	</div>
	    </form>


        
        <div class="table-responsive-sm mt-4">
            <!-- <table id="basic-datatable" class="table table-striped table-centered mb-0"> -->
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo get_phrase('product'); ?></th>
                        <th><?php echo get_phrase('title'); ?></th>
                        <th><?php echo get_phrase('preview'); ?></th>
                        <th><?php echo get_phrase('option'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ads->result_array() as $key => $ad) : ?>
                    	<?php $product_details = $this->product_model->get_product_by_id($ad['product_id'])->row_array(); ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $product_details['name']; ?></td>
                            <td>
                            	<?php echo $ad['title']; ?>
                            	<br>
                            	<?php if($ad['status']){ ?>
                            		<span class="badge badge-success">Published</span>
                            	<?php }else{ ?>
                            		<span class="badge badge-secondary">Disabled</span>
                            	<?php } ?>
                            </td>
                            <td>
                            	<img src="<?php echo base_url('uploads/ad/thumbnails/'.$ad['ad_image']); ?>" height="100px" width="100px" style="object-fit: contain;">
                            </td>
                            <td>
                                <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                    	<?php if($ad['status']): ?>
                                        	<li><a class="dropdown-item" href="javascript:;" onclick="confirm_modal('<?php echo site_url('admin/ad_network/status/'.$ad['ad_id']); ?>')"><?php echo get_phrase('disable'); ?></a></li>
                                        <?php else: ?>
                                        	<li><a class="dropdown-item" href="javascript:;" onclick="confirm_modal('<?php echo site_url('admin/ad_network/status/'.$ad['ad_id']); ?>')"><?php echo get_phrase('publish'); ?></a></li>
                                        <?php endif; ?>
                                        <li><a class="dropdown-item" href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/ad_edit/'.$ad['ad_id']); ?>', '<?php echo get_phrase('ad_edit'); ?>')"><?php echo get_phrase('edit'); ?></a></li>

                                        <li><a class="dropdown-item" href="javascript:;" onclick="confirm_modal('<?php echo site_url('admin/ad_network/delete/' . $ad['ad_id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <code>
            	<iframe src="http://localhost/creativeitem/site/ads/300/250" width="300" height="250" title="AD BY CREATIVEITEM" style="box-shadow: 0px 0px 10px 1px #f1f1f1;"></iframe>
            </code>
        </div>
    </div> <!-- end card body-->
</div> <!-- end card -->