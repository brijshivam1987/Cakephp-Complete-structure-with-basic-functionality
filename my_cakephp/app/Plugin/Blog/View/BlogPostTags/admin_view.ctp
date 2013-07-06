<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Blog Post Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('controller' => 'blog_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('controller' => 'blog_posts', 'action' => 'add')); ?> </li>
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
        <span style="float:right; margin-right:30px;margin-top:10px;">
          <button type="button" class="btn" onclick="window.history.back();">Cancel</button>
        </span>
        <div class="btn-group" style="float:right; margin-right:10px;margin-top:10px;"> 
            <a href="#" class="btn btn-primary"><i class="icon-edit icon-white"></i> Action</a> <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo ADMIN_URL; ?>/blog/blog_post_tags/edit/<?php echo $blogPostTag['BlogPostTag']['id']; ?>"><i class="icon-pencil"></i> Edit</a></li>
              <li><a href="<?php echo ADMIN_URL; ?>/blog/blog_post_tags/delete/<?php echo $blogPostTag['BlogPostTag']['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$blogPostTag['BlogPostTag']['id'].'?'; ?>')"><i class="icon-trash"></i> Delete</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo ADMIN_URL; ?>/blog/blog_post_tags/add"><i class="icon icon-color icon-plus"></i> Add New</a></li>
            </ul>
        </div>
        <div class="box-content">
        <?php echo $this->Form->create('',array('class' => 'form-horizontal')); ?>	
        	<fieldset>
                    <legend>
                        <?php echo __('View Blog Post'); ?>
                        
                    </legend>
                	<div class="control-group">
                    	<label class="control-label">Id</label>
                        <div class="controls">
                        	<?php echo h($blogPostTag['BlogPostTag']['id']); ?>
                        </div>
                    </div>
        			<div class="control-group">
                    	<label class="control-label">Name</label>
                        <div class="controls">
                        	<?php echo h($blogPostTag['BlogPostTag']['name']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Slug</label>
                        <div class="controls">
                        	<?php echo h($blogPostTag['BlogPostTag']['slug']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Blog Post Count</label>
                        <div class="controls">
                        	<?php echo h($blogPostTag['BlogPostTag']['blog_post_count']); ?>
                        </div>
                    </div>
                    
                    <div class="control-group">
                    	<label class="control-label">Created</label>
                        <div class="controls">
                        	<?php echo h($blogPostTag['BlogPostTag']['created']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Modified</label>
                        <div class="controls">
                        	<?php echo h($blogPostTag['BlogPostTag']['modified']); ?>
                        </div>
                    </div>
					<div class="form-actions">
                      <button type="button" class="btn" onclick="window.history.back();">Cancel</button>
                	</div>
                </fieldset>
            </form> 
		</div>
     </div>
</div>



<div class="related">
	<h3><?php echo __('Related Blog Posts');?></h3>
	<?php if (!empty($blogPostTag['BlogPost'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Summary'); ?></th>
		<th><?php echo __('Sticky'); ?></th>
		<th><?php echo __('In Rss'); ?></th>
		<th><?php echo __('Meta Title'); ?></th>
		<th><?php echo __('Meta Description'); ?></th>
		<th><?php echo __('Meta Keywords'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($blogPostTag['BlogPost'] as $blogPost):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $blogPost['id'];?></td>
			<td><?php echo $blogPost['title'];?></td>
			<td><?php echo $blogPost['slug'];?></td>
			<td><?php echo $blogPost['summary'];?></td>
			<td><?php echo $blogPost['sticky'];?></td>
			<td><?php echo $blogPost['in_rss'];?></td>
			<td><?php echo $blogPost['meta_title'];?></td>
			<td><?php echo $blogPost['meta_description'];?></td>
			<td><?php echo $blogPost['meta_keywords'];?></td>
			<td><?php echo $blogPost['created'];?></td>
			<td><?php echo $blogPost['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'blog_posts', 'action' => 'view', $blogPost['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'blog_posts', 'action' => 'edit', $blogPost['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'blog_posts', 'action' => 'delete', $blogPost['id']), null, __('Are you sure you want to delete # %s?', $blogPost['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Blog Post'), array('controller' => 'blog_posts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
