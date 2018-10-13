<div class="widget">
<h2>Registracija</h2>
<!--<div class="inner">
    <form action="register.php" method="post">
        <ul>
            <li>
                Lozinka:<br/>
                <input type="password" name="password" />
            </li>
            <li>
                Ime:<br/>
                <input type="text" name="first_name" />
            </li>
            <li>
                Prezime:<br/>
                <input type="text" name="last_name" />
            </li>
            <li>
                E-mail adresa:<br/>
                <input type="text" name="email" />
            </li>
            <li>
                <input class="btn" type="submit" value="Registruj me" />
            </li>
        </ul>
    </form></br>
    <p>Već ste registrovani?</p><div class="btn" onclick="location.href='index.php';">Ulogujte se ovde.</div>
</div> -->
   <?php echo validation_errors(); ?>
    <?php $attributes = array('id' => 'register_form', 'class' => 'reg_form'); ?>
    <?php echo form_open('Users/register', $attributes) ;?>
    <?php echo form_label('password') ?>
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
        'placeholder' =>'Enter first name'
    );
    ?>
    <?php echo form_input($data); ?>
<br>
    <?php echo form_label('Last name') ?>
    <?php $data = array(
        'name' =>'l_name',
        'placeholder' =>'Enter last name'
    );
    ?>
    <?php echo form_input($data); ?>
<br>
    <?php echo form_label('E-mail') ?>
    <?php $data = array(
        'name' =>'e-mail',
        'placeholder' =>'Enter e-mail',
        'value' => ""
    );
    ?>
    <?php echo form_input($data); ?>
<br>
 <?php $data = array(
        'name' =>'register',
        'value' =>'register'
    ); ?>
    <?php echo form_submit($data); ?>
    <?php echo form_close(); ?>
</div>
        <?php if($this->session->flashdata('user_registered')):?>
        <?php   echo $this->session->flashdata('errors');?>
        <?php  endif; ?>
<a href="<?php echo base_url();?>index.php">Login</a>
<?php echo "<br><br><a href=' " .    base_url()  . "index.php'>back.</a> "; ?>
