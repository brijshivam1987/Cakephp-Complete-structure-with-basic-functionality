<?php echo $this->Html->css('front/homeSlider/jquery.galleryview-3.0-dev','stylesheet', array("media"=>"all" )); ?>
<?php echo $this->Html->script('front/homeSlider/jquery-ui.min'); ?>
<?php echo $this->Html->script('front/homeSlider/jquery.timers-1.2'); ?>
<?php echo $this->Html->script('front/homeSlider/jquery.easing.1.3'); ?>
<?php echo $this->Html->script('front/homeSlider/jquery.galleryview-3.0-dev'); ?>

<ul id="myGallery">
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp1.jpg" alt="Lone Tree Yellowstone" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp2.jpg" alt="Is He Still There?!" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp4.jpg" alt="Noni Nectar For Green Gecko" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp7.jpg" alt="Flight of an Eagle Owl" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp14.jpg" alt="Winter Lollipops" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp26.jpg" alt="Day of Youth" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp27.jpg" alt="Sunbathing Underwater" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp28.jpg" alt="Untitled" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp41.jpg" alt="New Orleans Streetcar" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp49.jpg" alt="By The Wind of Chance" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp52.jpg" alt="Fishing on the Cloud" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp53.jpg" alt="Blue Lagoon" />
    <li><img src="<?php echo BASE_URL; ?>/img/front/homeSlider/bp54.jpg" alt="Time" />
</ul>
<script type="text/javascript">
	$(function(){
		$('#myGallery').galleryView();
	});
</script>
