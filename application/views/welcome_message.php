<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>


<div id="container">
	<h1>Welcome to CodeIgniter!</h1>
    <?php if($this->session->flashdata('success')): ?>
    <?php echo $this->session->flashdata('success'); ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('false')): ?>
        <?php echo $this->session->flashdata('false'); ?>
    <?php endif; ?>

	<div id="body">
        <p><a href="<?php echo base_url();?>index.php/Products/search">search</a></p>
		<p><a href="<?php echo base_url();?>index.php/Products/index">All products</a></p>
        <?php  if($this->session->userdata('logged_in')): ?>
        <p><a href="<?php echo base_url();?>index.php/Products/insert">Insert</a></p>
            <p><a href="<?php echo base_url();?>index.php/Users/user_seals">Your finished seals and the basr offer</a></p>
            <p><a href="<?php echo base_url();?>index.php/Users/users_buys">Your buys</a></p>
        <?php endif; ?>





		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>