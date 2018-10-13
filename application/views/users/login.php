<?php if($this->session->userdata('logged_in')): ?>
<?php echo form_open('Users/logout') ;?>
<?php $data = array(
        'name' =>'logout',
        'value' =>'logout'
    );
?>
<?php echo form_submit($data); ?>
<?php echo form_close(); ?>
<a href='<?php echo base_url();?>index.php/Users/edit'>Info</a>
<?php else: ?>
<h1>Login</h1>
<div class="login">
        <?php if($this->session->flashdata('errors')):?>
        <?php   echo $this->session->flashdata('errors');?>
        <?php  endif; ?>
    <?php if($this->session->flashdata('no_asccess')):?>
        <?php   echo $this->session->flashdata('no_asccess');?>
    <?php  endif; ?>
    <form action="<?php echo base_url();?>index.php/Users/login" method="POST">
        <label>Email</label></br>
        <input type="text" name="email"></br>
        <label>Password</label></br>
        <input type="text" name="password" /></br>
        <input type="submit" value="Login" />
    </form>
    <a href="<?php echo base_url();?>index.php/Users/register">Nemate nalog? Registrujte se ovde</a>
</div>

<?php endif ?>