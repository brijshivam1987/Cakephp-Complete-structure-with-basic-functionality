<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Blog Setting'), array('action' => 'edit', $blogSetting['BlogSetting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Settings'), array('action' => 'index')); ?> </li>
	</ul>
</div>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>View</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <span style="float:right; margin-right:30px;margin-top:10px;">
          <button type="button" class="btn" onclick="window.history.back();">Cancel</button>
        </span>
        <div class="btn-group" style="float:right; margin-right:10px;margin-top:10px;"> 
            <a href="#" class="btn btn-primary"><i class="icon-edit icon-white"></i> Action</a> <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo ADMIN_URL; ?>/blog/blog_settings/edit/<?php echo $blogSetting['BlogSetting']['id']; ?>"><i class="icon-pencil"></i> Edit</a></li>
            </ul>
        </div>
        <div class="box-content">
        <?php echo $this->Form->create('',array('class' => 'form-horizontal')); ?>	
        	<fieldset>
                    <legend>
                        <?php echo __('View Blog Setting'); ?>
                        
                    </legend>
                	<div class="control-group">
                    	<label class="control-label">Id</label>
                        <div class="controls">
                        	<?php echo h($blogSetting['BlogSetting']['id']); ?>
                        </div>
                    </div>
        			<div class="control-group">
                    	<label class="control-label">Setting</label>
                        <div class="controls">
                        	<?php echo h($blogSetting['BlogSetting']['setting']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Value</label>
                        <div class="controls">
                        	<?php echo h($blogSetting['BlogSetting']['value']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Modified</label>
                        <div class="controls">
                        	<?php echo h($blogSetting['BlogSetting']['modified']); ?>
                        </div>
                    </div>
                    <div class="form-actions">
                      <button type="button" class="btn btn-primary" onclick="window.history.back();">Cancel</button>
                	</div>
                </fieldset>
            </form> 
		</div>

     </div>
</div>