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
        	<?php echo $this->form->create('Group', array('class' => 'form-horizontal','url' => array( 'admin' => true ) ) ); ?>
                <fieldset>
                    <legend><?php __('Add Group'); ?></legend>
                    <div class="control-group">
                    	<label class="control-label">Name</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('Group.name',array('label' => false,'data-bvalidator' => "required")); ?>
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
        $('#GroupAdminAddForm').bValidator(optionsRed);
    });
</script>
