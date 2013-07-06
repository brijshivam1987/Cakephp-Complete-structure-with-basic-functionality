<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Blog Settings'), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>Edit</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
			<?php echo $this->Form->create('BlogSetting',array('class' => 'form-horizontal'));?>
                <fieldset>
                    <legend>
						<?php echo __('Admin Edit Blog Setting'); ?>
                        <span style="float:right;">
                            <button type="button" class="btn" onclick="window.history.back();">Cancel</button>
                    	</span>
                    </legend>
                    <div class="control-group">
                    	<label class="control-label"><?php echo $blogSetting['BlogSetting']['setting_text']; ?></label>
                        <div class="controls">
                			<?php
                    			echo $this->Form->input('id');
								$options = array(
									'type' => 'textarea',
									'label' => false,
									'class' => 'autogrow'
								);
								if (!empty($blogSetting['BlogSetting']['tip'])) {
									$options['after'] = '<p class="tip">'.$blogSetting['BlogSetting']['tip'].'</p>';
								}
								echo $this->Form->input('value', $options);
                			?>
                        </div>
                    </div>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn" onclick="window.history.back();">Cancel</button>
                	</div>        
                </fieldset>
            </form> 
		</div>
     </div>
</div>             
