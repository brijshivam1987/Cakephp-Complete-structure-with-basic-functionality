<?php if (!$isAjax):?>
<div id="newsfeed">
    <h1><?php echo __('Users: Ajax scroll effect');?></h1>
<?php endif;?>
<?php if (!$isAjax):?>
    <?php foreach ($allUsers as $user):?>
    <h3>Full Name: <?php echo h($user['User']['fullname']); ?></h3>
    <h4>Email: <?php echo h($user['User']['email']); ?></h4>
    <p>Register Date: <?php echo nl2br(h($user['User']['reg_date'])); ?></p>
    <hr/>
    <?php endforeach; ?>
<?php endif; ?>
<?php if ($isAjax):?>
    <?php foreach ($allUsers as $user):?>
    <h3>Full Name: <?php echo h($user['User']['fullname']); ?></h3>
    <h4>Email: <?php echo h($user['User']['email']); ?></h4>
    <p>Register Date: <?php echo nl2br(h($user['User']['reg_date'])); ?></p>
    <hr/>
    <?php endforeach; ?>
<?php endif; ?>
<?php if (!$isAjax):?>
</div>
<?php endif;?>


<?php
$maxPage = $this->Paginator->counter('%pages%');
?>

<?php if (!$isAjax):?>
<script type="text/javascript">
	var page = 1;
</script>
<?php endif; ?>


<script type="text/javascript">
var lastX = 0;
var currentX = 0;
$(window).scroll(function () {
	
	if (page < <?php echo $maxPage;?>) {
		
		
		currentX = $(window).scrollTop();
		if (currentX - lastX > 100 * page) {
		
		lastX = currentX;
		page++;
		
		$.get('users/index/page:' + page, function(data) {
			$('#newsfeed').append(data);
		});
	}
}
});
</script>
