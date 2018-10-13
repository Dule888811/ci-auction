<?php
$currentURL = current_url();
$currentURL = explode('/', $currentURL);
$project_id = $currentURL[sizeof($currentURL) - 1];
var_dump($project_id);
?>
<?php echo validation_errors(); ?>
<div class="input">
    <form action="<?php echo base_url();?>index.php/Offers/index/<?php echo $project_id;?>"  method="POST">
        <label for="money">Enter money</label></br>
        <input type="text" name="money"></br>
        <input type="submit" value="offer" />
    </form>
</div>
<?php echo "<br><br><a href=' " .    base_url()  . "index.php'>back.</a> "; ?>
