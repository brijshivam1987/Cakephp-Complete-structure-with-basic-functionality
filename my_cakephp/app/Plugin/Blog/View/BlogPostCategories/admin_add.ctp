<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Blog Post Categories'), array('action' => 'index'));?></li>
		<li>
		<?php echo $this->Html->link(__('List Blog Posts'), array('controller' => 'blog_posts', 'action' => 'index')); ?>
        </li>
		<li>
		<?php echo $this->Html->link(__('New Blog Post'), array('controller' => 'blog_posts', 'action' => 'add')); ?> 
        </li>
	</ul>
</div>

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
            <?php echo $this->Form->create('BlogPostCategory',array('class' => 'form-horizontal'));?>
              <fieldset>
                <legend>Add Blog Post Category</legend>
                <div class="control-group">
                    <label class="control-label">Parent</label>
                    <div class="controls">
                      	<?php 
							echo $this->Form->input('parent_id',
					  		array(
					  				'type' => 'select',
									'label' => false,
									'empty' => true
								)
							); 
						?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="focusedInput">Name</label>
                    <div class="controls">
					  <?php 
                        echo $this->Form->input('name',array('label' => false,'data-bvalidator' => "required")); 
                      ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="focusedInput">Slug</label>
                    <div class="controls"><?php echo $this->Form->input('slug',array('label' => false,'data-bvalidator' => "required")); ?></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="focusedInput">Meta Title</label>
                    <div class="controls">
					  <?php 
                        echo $this->Form->input('meta_title',array('label' => false,'data-bvalidator' => "required")); 
                      ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="focusedInput">meta_description</label>
                    <div class="controls">
					  <?php 
                        echo $this->Form->input('meta_description',array('label' => false)); 
                      ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="focusedInput">Meta Keywords</label>
                    <div class="controls">
					  <?php 
                        echo $this->Form->input('meta_keywords',array('label' => false,'data-bvalidator' => "required")); 
                      ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="focusedInput">Rss Channel Title</label>
                    <div class="controls">
					  <?php 
                        echo $this->Form->input('rss_channel_title',array('label' => false,'data-bvalidator' => "required")); 
                      ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="focusedInput">Rss Channel Description</label>
                    <div class="controls">
					  <?php 
                        echo $this->Form->input('rss_channel_description',array('label' => false)); 
                      ?>
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
    </div><!--/span-->
</div>
<script type="text/javascript">   
	$(document).ready(function () {
        $('#BlogPostCategoryAdminAddForm').bValidator(optionsRed);
    });
</script>