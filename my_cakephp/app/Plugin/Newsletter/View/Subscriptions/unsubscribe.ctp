<div class="users form">  
	<?php echo $this->form->create('Subscription', array('url' => '/newsletter/subscriptions/unsubscribe','class'=>'form')); ?>
        <p class="formtitle">Newsletter Unsubscribe</p>
        <fieldset style="background-image: url('../../img/front/css_img/Newspaper-Feed-icon.png');">
            <legend class="formtitle">Please complete the form below.</legend>
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
        $('#SubscriptionUnsubscribeForm').bValidator(optionsRed);
    });
</script>