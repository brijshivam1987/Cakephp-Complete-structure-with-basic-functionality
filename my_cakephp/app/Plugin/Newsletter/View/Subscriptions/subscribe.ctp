<div class="users form">  
	<?php echo $this->form->create('Subscription', array('url' => '/newsletter/subscriptions/subscribe','class'=>'form')); ?>
		<p class="formtitle">Newsletter Subscription</p>
        <fieldset style="background-image: url('../../img/front/css_img/Newspaper-Feed-icon.png');">
            <legend class="formtitle">Please complete the form below.</legend>
			<?php 
				echo $this->form->input('Subscription.name', array(
					'label' => __( 'Name', true),
					'div'=>'formfield',
					'data-bvalidator' => "required,minlength[6],alpha"
				)); 
			?>
			<?php 
				echo $this->form->input('Subscription.email', array(
					'label' => __( 'Email', true),
					'div'=>'formfield',
					'data-bvalidator' => "required,email"
				)); 
			?>
		</fieldset>
        <div class="submit" style="float:right;">
        	<input type="reset" value="Reset" />
        </div>

<?php echo $this->form->end(__( 'Save', true)); ?>
</div>
<script type="text/javascript">   
	$(document).ready(function () {
        $('#SubscriptionSubscribeForm').bValidator(optionsRed);
    });
</script>