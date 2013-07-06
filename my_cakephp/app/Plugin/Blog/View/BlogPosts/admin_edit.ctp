<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Blog Post Categories'), array('controller' => 'blog_post_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post Category'), array('controller' => 'blog_post_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Post Tags'), array('controller' => 'blog_post_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post Tag'), array('controller' => 'blog_post_tags', 'action' => 'add')); ?> </li>
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
		<?php echo $this->Form->create('BlogPost',array('class' => 'form-horizontal'));?>
            <fieldset>
                <legend>
					<?php echo __('Edit Blog Post'); ?>
                    <span style="float:right;">
                    	<a  class="btn btn-danger" href="<?php echo ADMIN_URL; ?>/blog/blog_post/delete/<?php echo $this->Form->value('BlogPost.id'); ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$this->Form->value('BlogPost.id').'?'; ?>')"><i class="icon-trash"></i> Delete</a>
                        <button type="button" class="btn" onclick="window.history.back();">Cancel</button>
                    </span>
                </legend>
        			<div class="control-group">
                    	<label class="control-label">Title</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('title',array('label' => false,'data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Slug</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('slug',array('label' => false,'data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Summary</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('summary',array('label' => false)); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Body</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('body',array('label' => false,'class' => 'cleditor','data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Published</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('published',array('label' => false)); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Sticky</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('sticky',array('label' => false)); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">In Rss</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('in_rss', array('label' => false)); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Meta Title</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('meta_title',array('label' => false,'data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Meta Description</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('meta_description',array('label' => false)); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Meta Keywords</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('meta_keywords',array('label' => false,'data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Blog Post Category</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('BlogPostCategory',array('label' => false,'data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Blog Post Tag</label>
                        <div class="controls">
                        	<?php echo $this->Form->input('BlogPostTag',array('label' => false,'data-bvalidator' => "required")); ?>
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
<script type="text/javascript">   
	$(document).ready(function () {
        $('#BlogPostAdminEditForm').bValidator(optionsRed);
    });
</script>
