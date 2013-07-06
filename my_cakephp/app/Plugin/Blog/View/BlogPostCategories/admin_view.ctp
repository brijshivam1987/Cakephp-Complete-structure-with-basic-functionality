<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('List Blog Post Categories'), array('action' => 'index')); ?> </li>
		
		<li><?php echo $this->Html->link(__('List Blog Post Categories'), array('controller' => 'blog_post_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('controller' => 'blog_posts', 'action' => 'index')); ?> </li>
		
	</ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> View</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <span style="float:right; margin-right:30px;margin-top:10px;">
              <button type="button" class="btn" onclick="window.history.back();">Cancel</button>
            </span>
            <div class="btn-group pull-right" style="float:right; margin-right:10px;margin-top:10px;"> 
                <a href="#" class="btn btn-primary" data-toggle="dropdown"><i class="icon-edit icon-white"></i> Action</a>
                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo ADMIN_URL; ?>/blog/blog_post_categories/edit/<?php echo $blogPostCategory['BlogPostCategory']['id']; ?>"><i class="icon-pencil"></i> Edit</a></li>
                  <li><a href="<?php echo ADMIN_URL; ?>/blog/blog_post_categories/delete/<?php echo $blogPostCategory['BlogPostCategory']['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$blogPostCategory['BlogPostCategory']['id'].'?'; ?>')"><i class="icon-trash"></i> Delete</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo ADMIN_URL; ?>/blog/blog_post_categories/add"><i class="icon icon-color icon-plus"></i> Add New</a></li>
                </ul>
            </div>
        <div class="box-content">
            <?php echo $this->Form->create('',array('class' => 'form-horizontal'));?>
			<fieldset>
                <legend>Blog Post Category</legend>
				<div class="control-group">
                	<label class="control-label"><?php echo __('Id'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo h($blogPostCategory['BlogPostCategory']['id']); ?></label>
                    </div>
        		</div>
                <div class="control-group">
                	<label class="control-label"><?php echo __('Parent Blog Post Category'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo $this->Html->link($blogPostCategory['BlogPostCategory']['name'], array('controller' => 'blog_post_categories', 'action' => 'view', $blogPostCategory['BlogPostCategory']['id'])); ?></label>
                    </div>
        		</div>
                <div class="control-group">
                	<label class="control-label"><?php echo __('Lft'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo h($blogPostCategory['BlogPostCategory']['lft']); ?></label>
                    </div>
        		</div>
                <div class="control-group">
                	<label class="control-label"><?php echo __('Rght'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo h($blogPostCategory['BlogPostCategory']['rght']); ?></label>
                    </div>
        		</div>
                <div class="control-group">
                	<label class="control-label"><?php echo __('Name'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo h($blogPostCategory['BlogPostCategory']['name']); ?></label>
                    </div>
        		</div>
                <div class="control-group">
                	<label class="control-label"><?php echo __('Slug'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo h($blogPostCategory['BlogPostCategory']['slug']); ?></label>
                    </div>
        		</div>
                <div class="control-group">
                	<label class="control-label"><?php echo __('Blog Post Count'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo h($blogPostCategory['BlogPostCategory']['blog_post_count']); ?></label>
                    </div>
        		</div>
                <div class="control-group">
                	<label class="control-label"><?php echo __('Blog Post Count'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo h($blogPostCategory['BlogPostCategory']['blog_post_count']); ?></label>
                    </div>
        		</div>
                
                <div class="control-group">
                	<label class="control-label"><?php echo __('Under Blog Post Count'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo h($blogPostCategory['BlogPostCategory']['under_blog_post_count']); ?></label>
                    </div>
        		</div>
                <div class="control-group">
                	<label class="control-label"><?php echo __('Created'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo h($blogPostCategory['BlogPostCategory']['created']); ?></label>
                    </div>
        		</div>
                <div class="control-group">
                	<label class="control-label"><?php echo __('Modified'); ?></label>
                	<div class="controls">
                    <label class="control-label"><?php echo h($blogPostCategory['BlogPostCategory']['modified']); ?></label>
                    </div>
        		</div>
                
			</fieldset>
         	</form>   
        </div>
    </div>
</div>            

<div class="related">
	<h3><?php echo __('Related Blog Post Categories');?></h3>
	<?php if (!empty($blogPostCategory['ChildBlogPostCategory'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Blog Post Count'); ?></th>
		<th><?php echo __('Under Blog Post Count'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($blogPostCategory['ChildBlogPostCategory'] as $childBlogPostCategory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childBlogPostCategory['id'];?></td>
			<td><?php echo $childBlogPostCategory['parent_id'];?></td>
			<td><?php echo $childBlogPostCategory['lft'];?></td>
			<td><?php echo $childBlogPostCategory['rght'];?></td>
			<td><?php echo $childBlogPostCategory['name'];?></td>
			<td><?php echo $childBlogPostCategory['slug'];?></td>
			<td><?php echo $childBlogPostCategory['blog_post_count'];?></td>
			<td><?php echo $childBlogPostCategory['under_blog_post_count'];?></td>
			<td><?php echo $childBlogPostCategory['created'];?></td>
			<td><?php echo $childBlogPostCategory['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'blog_post_categories', 'action' => 'view', $childBlogPostCategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'blog_post_categories', 'action' => 'edit', $childBlogPostCategory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'blog_post_categories', 'action' => 'delete', $childBlogPostCategory['id']), null, __('Are you sure you want to delete # %s?', $childBlogPostCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Blog Post Category'), array('controller' => 'blog_post_categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Blog Posts');?></h3>
	<?php if (!empty($blogPostCategory['BlogPost'])):?>
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
		foreach ($blogPostCategory['BlogPost'] as $blogPost):
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
