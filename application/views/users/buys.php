<?php if($results): ?>
<?php foreach ($results as $r): ?>
    <?php echo "<br><br><p><b>Money:" . $r->money . "</p>"; ?>
    <?php echo "<p><b>name:" . $r->product_name . "</p>"; ?>
<?php endforeach; ?>
<?php endif; ?>
<?php echo "<br><br><a href=' " .    base_url()  . "index.php'>back.</a> "; ?>