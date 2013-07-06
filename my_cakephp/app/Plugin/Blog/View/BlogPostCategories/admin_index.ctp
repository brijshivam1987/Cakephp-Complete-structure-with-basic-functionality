<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Blog Post Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('controller' => 'blog_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('controller' => 'blog_posts', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Blog Setting'), array('controller' => 'blog_settings', 'action' => 'index')); ?> </li>
	</ul>
</div>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i><?php echo __('Blog Post Categories'); ?></h2>
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
                    <th>Parent Id</th>
                    <th>lft</th>
                    <th>rght</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Blog Post Count</th>
                    <th>Under Blog Post Count</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
				<?php
                $i = 0;
                foreach ($blogPostCategories as $blogPostCategory):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = 'class="even"';
                    }else{
						$class = 'class="odd"';
					}
                ?>
                <tr <?php echo $class;?>>
                	<td><?php echo $blogPostCategory['BlogPostCategory']['id']; ?></td>
                    <td><?php echo $blogPostCategory['BlogPostCategory']['parent_id']; ?></td>
                    <td><?php echo $blogPostCategory['BlogPostCategory']['lft']; ?></td>
                    <td><?php echo $blogPostCategory['BlogPostCategory']['rght']; ?></td>
                    <td><?php echo $blogPostCategory['BlogPostCategory']['name']; ?></td>
                    <td><?php echo $blogPostCategory['BlogPostCategory']['slug']; ?></td>
                    <td class="center">
                        <span class="label label-success">
							<?php echo $blogPostCategory['BlogPostCategory']['blog_post_count']; ?>
                        </span>
                    </td>
                    <td><?php echo $blogPostCategory['BlogPostCategory']['under_blog_post_count']; ?></td>
                    <td><?php echo $blogPostCategory['BlogPostCategory']['created']; ?></td>
                    <td><?php echo $blogPostCategory['BlogPostCategory']['modified']; ?></td>
        			<td class="center">
                        <a class="btn btn-success" href="<?php echo ADMIN_URL; ?>/blog/blog_post_categories/view/<?php echo $blogPostCategory['BlogPostCategory']['id']; ?>">
                            <i class="icon-zoom-in icon-white"></i>  
                            View                                            
                        </a>
                        <a class="btn btn-info" href="<?php echo ADMIN_URL; ?>/blog/blog_post_categories/edit/<?php echo $blogPostCategory['BlogPostCategory']['id']; ?>">
                            <i class="icon-edit icon-white"></i>  
                            Edit                                            
                        </a>
                        <a class="btn btn-danger" href="<?php echo ADMIN_URL; ?>/blog/blog_post_categories/delete/<?php echo $blogPostCategory['BlogPostCategory']['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$blogPostCategory['BlogPostCategory']['id'].'?'; ?>')">
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








           

