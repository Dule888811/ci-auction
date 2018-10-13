<?php echo validation_errors(); ?>
<form action="<?php echo base_url() ?>index.php/Products/insert " name="insert-user" method="POST" enctype="multipart/form-data">
				<label for="product_name">product_name: <br/>
				<input type="text" name="product_name" id="product_name"></label><br/>
				<label for="product_description">Product description: <br/>
				<input type="text" name="product_description" id="product_description"></label><br/>
				<label for="start_price">start_price: <br/>
				<input type="text" name="start_price" id="start_price"></label><br/>
				<label for="product_delivery">product_delivery: <br/>
				<input type="text" name="product_delivery" id="product_delivery"></label><br/>
				<label class = "field">Upload Picture:</label>
				<input type = "file" name = "imgfile"/>
				<input type="submit" name="insert"  value="Create"><br/>
			</form>
<a href="<?php echo base_url();?>index.php/Welcome/index">Back</a>