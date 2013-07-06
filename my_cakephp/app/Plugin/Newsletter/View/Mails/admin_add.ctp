<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>Add</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        	<?php echo $this->form->create('Mail', array('class' => 'form-horizontal','url' => array( 'admin' => true ) ) ); ?>
                <fieldset>
                    <legend><?php __('Add Group'); ?></legend>
                    <div class="control-group">
                    	<label class="control-label">Form</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('Mail.from',array('label' => false,'data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Form Email</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('Mail.from_email',array('label' => false,'data-bvalidator' => "required,email")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Subject</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('Mail.subject',array('label' => false,'data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Group</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('Group',array('label' => false,'data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Content</label>
                        <div class="controls">
                        	<?php echo $this->form->input('Mail.content', array('label' => false, 'class' => 'cleditor','data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      <button type="reset" class="btn">Reset</button>
                      <button type="button" class="btn" onclick="window.history.back();">Cancel</button>
                    </div>
                </fieldset>
            </form> 
			</div>
     </div>
</div>
<script type="text/javascript">   
	$(document).ready(function () {
        $('#MailAdminAddForm').bValidator(optionsRed);
    });
</script>

