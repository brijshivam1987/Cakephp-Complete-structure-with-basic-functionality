<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header well" data-original-title>
      <h2><i class="icon-edit"></i> Profile Information</h2>
      <div class="box-icon"> <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a> </div>
    </div>
    <div class="box-content">
      <?php echo $this->form->create('Profile', array('class'=>'form','type' => 'file')); ?>
      	<?php
		if($admin["Admin"]["profile_image"])
        	$profile_img = '../../img/admin/profile_img/'.$admin["Admin"]["profile_image"];
		else
			$profile_img = '../../img/admin/profile_img/user-64.png';
		?>
		<?php echo $this->form->input('Admin.id',array('type' => 'hidden')); ?>
        <fieldset style="background-image:url('<?php echo $profile_img; ?>');background-repeat: no-repeat;
background-position: right top;background-size: 150px 100px;">
          <div class="control-group">
            <label class="control-label">Full Name</label>
            <div class="controls">
              <?php 
				echo $this->form->input('Admin.fullname', array(
					'label' => false,
					'div'=> false,
					'class' => 'input-xlarge',
					'data-bvalidator' => "required,minlength[6],alpha"
				)); 
			 ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Username</label>
            <div class="controls">
             <?php 
				echo $this->form->input('Admin.username', array(
					'label' => false,
					'div'=> false,
					'class' => 'input-xlarge',
					'data-bvalidator' => "required,minlength[5]"
				)); 
			 ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
             <?php 
				echo $this->form->input('Admin.email', array(
					'label' => false,
					'div'=> false,
					'class' => 'input-xlarge',
					'data-bvalidator' => "required,email"
				)); 
			 ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Reg. Date</label>
            <div class="controls">
             <?php 
				echo $this->form->input('Admin.reg_date', array(
					'label' => false,
					'div'=> false,
					'class' => 'input-xlarge',
					'disabled' => true
				)); 
			 ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Status</label>
            <div class="controls">
             <?php 
				echo $this->form->input('Admin.status', array(
					'label' => false,
					'div'=> false,
					'class' => 'input-xlarge',
					'disabled' => true
				)); 
			 ?>
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label">Profile Image</label>
            <div class="controls">
             <?php 
				echo $this->form->input('Admin.profile_image', array(
					'label' => false,
					'div'=> false,
					'class' => 'input-file uniform_on',
					'id' => 'fileInput',
					'type'=> 'file',
					'data-bvalidator' => "extension[jpg:png:gif]", 
					'data-bvalidator-msg' =>"Please select file of type .jpg, .png or .txt"
				)); 
			?>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button class="btn">Cancel</button>
          </div>
        </fieldset>
      <?php echo $this->form->end(); ?>
    </div>
  </div>
  <!--/span--> 
</div>
<!--/row-->
<script type="text/javascript">   
	$(document).ready(function () {
        $('#ProfileAdminProfileForm').bValidator(optionsRed);
    });
</script>