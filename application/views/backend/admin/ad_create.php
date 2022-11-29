<div class="card">
	<div class="card-body">
		<form action="<?php echo site_url('admin/ad_network/add'); ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" id="title" class="form-control">
			</div>

			<div class="form-group">
				<label for="product">Products</label>
				<select class="form-control" name="product" id="product" required>
					<option value="">Select a product</option>
					<?php $products = $this->product_model->get_products(); ?>
					<?php foreach($products->result_array() as $product): ?>
						<option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?> </option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="dimension">Ad Dimension</label>
				<select class="form-control" id="dimension" name="dimension" required>
					<option value="">Select dimension</option>
					<?php $dimensions = $this->ad_model->get_ad_dimensions(); ?>
					<?php foreach($dimensions->result_array() as $dimension): ?>
						<option value="<?php echo $dimension['dimension_id']; ?>"><?php echo $dimension['dimension']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="url">Link to click</label>
				<input type="url" name="url" id="url" class="form-control">
			</div>

			<div class="form-group">
				<label for="ad_image">Ad image</label>
				<input type="file" name="ad_image" id="ad_image" class="form-control" accept="image/*">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-secondary float-right"> Create</button>
			</div>
		</form>
	</div>
</div>