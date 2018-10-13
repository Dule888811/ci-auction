
<?php echo validation_errors(); ?>
<?php $attributes = array('id' => 'register_form', 'class' => 'reg_form'); ?>
<?php echo form_open('Users/edit/' , $attributes) ;?>
<?php echo form_label('Passwond') ?>
<?php $data = array(
    'name' =>'password',
    'placeholder' =>'Enter password'
);
?>
<?php echo form_password($data); ?>
    <br>
<?php echo form_label('First name') ?>
<?php $data = array(
    'name' =>'f_name',
    'placeholder' =>'Enter first name',
    'value' => $users_data->f_name
);
?>
<?php echo form_input($data); ?>
    <br>
<?php echo form_label('Last name') ?>
<?php $data = array(
    'name' =>'l_name',
    'placeholder' =>'Enter last name',
    'value' => $users_data->l_name
);
?>
<?php echo form_input($data); ?>
    <br>
<?php echo form_label('E-mail') ?>
<?php $data = array(
    'name' =>'e-mail',
    'value' => $users_data->email



);
?>
<?php echo form_input($data); ?>
    <br>
<?php $data = array(
    'name' =>'update',
    'value' =>'update'
); ?>
<?php echo form_submit($data); ?>
<?php echo form_close(); ?>
    </div>
<?php if($this->session->flashdata('profil_updated')):?>
    <?php   echo $this->session->flashdata('errors');?>
<?php  endif; ?><?php
 ?>
<?php echo "<br><br><a href=' " .    base_url()  . "index.php'>back.</a> "; ?>
/**
 * Created by PhpStorm.
 * User: Dule
 * Date: 10/10/2018
 * Time: 2:50 AM
 */