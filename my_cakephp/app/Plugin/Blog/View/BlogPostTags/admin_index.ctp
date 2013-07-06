<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Blog Post Tag'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('controller' => 'blog_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('controller' => 'blog_posts', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Blog Setting'), array('controller' => 'blog_settings', 'action' => 'index')); ?> </li>
	</ul>
</div>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><span class="icon icon-color icon-compose"></span>Blog Post Tags</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>blog_post_count</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
				<?php
                $i = 0;
                foreach ($blogPostTags as $blogPostTag):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = 'class="even"';
                    }else{
						$class = 'class="odd"';
					}
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo h($blogPostTag['BlogPostTag']['id']); ?>&nbsp;</td>
                    <td><?php echo h($blogPostTag['BlogPostTag']['name']); ?>&nbsp;</td>
                    <td><?php echo h($blogPostTag['BlogPostTag']['slug']); ?>&nbsp;</td>
                    <td><?php echo h($blogPostTag['BlogPostTag']['blog_post_count']); ?>&nbsp;</td>
                    <td><?php echo h($blogPostTag['BlogPostTag']['created']); ?>&nbsp;</td>
                    <td><?php echo h($blogPostTag['BlogPostTag']['modified']); ?>&nbsp;</td>
                    <td class="center">
                    	<a class="btn btn-success" href="<?php echo ADMIN_URL; ?>/blog/blog_post_tags/view/<?php echo $blogPostTag['BlogPostTag']['id']; ?>">
                            <i class="icon-zoom-in icon-white"></i>  
                            View                                            
                        </a>
                        <a class="btn btn-info" href="<?php echo ADMIN_URL; ?>/blog/blog_post_tags/edit/<?php echo $blogPostTag['BlogPostTag']['id']; ?>">
                            <i class="icon-edit icon-white"></i>  
                            Edit                                            
                        </a>
                        <a class="btn btn-danger" href="<?php echo ADMIN_URL; ?>/blog/blog_post_tags/delete/<?php echo $blogPostTag['BlogPostTag']['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$blogPostTag['BlogPostTag']['id'].'?'; ?>')">
                            <i class="icon-trash icon-white"></i> 
                            Delete
                        </a>
                    </td>
                </tr>
            	<?php endforeach; ?>
			</tbody>   
          </table>            
        </div>
    </div><!--/span-->
</div> 
