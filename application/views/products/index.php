<p><a href="<?php echo base_url();?>index.php">backs</a></p>
<?php foreach ($products as $product): ?>
<?php echo "<br><br><p><b>Product name:" . $product->product_name . "</p>"; ?>
    <?php echo "<p><b>Product description:" . $product->product_description . "</p>"; ?>
    <?php echo "<p><b>Start price:" . $product->start_price . "</p>"; ?>
    <?php echo "<p><b>payment choice:" . $product->payment_choice . "</p>"; ?>
    <?php echo "<p><b>Product delivery:" . $product->product_delivery . "</p>"; ?>
    <?php echo "<p><b>exspire date:" . $product->exspire . "</p>"; ?>
    <?php   if($product->product_image): ?>
    <?php   echo "<img src ='data:image/jpg;base64," . $product->product_image . "'>"; ?>
    <?php endif; ?>
    <?php  if($this->session->userdata('logged_in')): ?>
    <?php echo "<a href= " . base_url() . "index.php/Offers/index/" .$product->id . ">Give the offer for this</a>"; ?>
    <?php else: ?>
    <?php echo "<a href=' " .    base_url()  . "index.php'>log in to give a offer for this.</a> "; ?>
    <?php endif; ?>
    <?php if($this->session->userdata('user_id') == $product->user_id): ?>
    <?php echo "<a href= " . base_url() . "index.php/Products/delete/" .$product->id . ">Delete</a>"; ?>
    <?php endif; ?>

<?php endforeach; ?>
