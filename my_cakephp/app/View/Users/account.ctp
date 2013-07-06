<div class="users form">  
	<?php echo $this->form->create('User', array('class'=>'form','type' => 'file')); ?>
	<?php echo $this->form->input('User.id'); ?>
		<p class="formtitle">Account Information</p>
        <?php
		//print_r($user);exit;
		if($user["User"]["profile_image"])
        	$profile_img = '../img/front/profile_img/'.$user["User"]["profile_image"];
		else
			$profile_img = '../img/front/profile_img/user-64.png';
		?>
        <fieldset style="background-image:url('<?php echo $profile_img; ?>');">
            <legend class="formtitle">update your information</legend>
			<?php 
				echo $this->form->input('User.fullname', array(
					'label' => __( 'Full Name', true),
					'div'=>'formfield',
					'data-bvalidator' => "required,minlength[6],alpha"
				)); 
			?>
            <?php 
				echo $this->form->input('User.username', array(
					'label' => __( 'User Name', true),
					'div'=>'formfield',
					'disabled' => true,
					'data-bvalidator' => "required,minlength[5]"
				)); 
			?>
            
			<?php 
				echo $this->form->input('User.email', array(
					'label' => __( 'Email', true),
					'div'=>'formfield',
					'data-bvalidator' => "required,email"
				)); 
			?>
            <?php 
				echo $this->form->input('User.reg_date', array(
					'label' => __( 'Reg. Date', true),
					'div'=>'formfield',
					'disabled' => true
				)); 
			?>
            <?php 
				echo $this->form->input('User.status', array(
					'label' => __( 'Status', true),
					'div'=>'formfield',
					'disabled' => true
				)); 
			?>
            <?php 
				echo $this->form->input('User.profile_image', array(
					'label' => __( 'Profile Image', true),
					//'label' => false,
					'div'=>'formfield upload',
					'class'=>'upload',
					'type'=> 'file',
					'data-bvalidator' => "extension[jpg:png:gif]", 
					'data-bvalidator-msg' =>"Please select file of type .jpg, .png or .txt"
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
        $('#UserAccountForm').bValidator(optionsRed);
    });
</script>