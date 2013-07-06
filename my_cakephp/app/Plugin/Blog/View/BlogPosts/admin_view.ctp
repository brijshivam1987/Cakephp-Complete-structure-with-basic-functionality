<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Post Categories'), array('controller' => 'blog_post_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Post Tags'), array('controller' => 'blog_post_tags', 'action' => 'index')); ?> </li>
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
              <li><a href="<?php echo ADMIN_URL; ?>/blog/blog_post/edit/<?php echo $blogPost['BlogPost']['id']; ?>"><i class="icon-pencil"></i> Edit</a></li>
              <li><a href="<?php echo ADMIN_URL; ?>/blog/blog_post/delete/<?php echo $blogPost['BlogPost']['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$blogPost['BlogPost']['id'].'?'; ?>')"><i class="icon-trash"></i> Delete</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo ADMIN_URL; ?>/blog/blog_post/add"><i class="icon icon-color icon-plus"></i> Add New</a></li>
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
                        	<?php echo h($blogPost['BlogPost']['id']); ?>
                        </div>
                    </div>
        			<div class="control-group">
                    	<label class="control-label">Title</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['title']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Slug</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['slug']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Summary</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['summary']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Body</label>
                        <div class="controls">
                        	<?php //echo h($blogPost['BlogPost']['body']); ?>
                            <?php echo $this->Form->input('body',array('label' => false,'value'=>$blogPost['BlogPost']['body'],'class' => 'cleditor','data-bvalidator' => "required")); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Published</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['published']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Sticky</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['sticky']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Published</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['published']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">In Rss</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['in_rss']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Meta Title</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['meta_title']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Meta Description</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['meta_description']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Meta Keywords</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['meta_keywords']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Created</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['created']); ?>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Modified</label>
                        <div class="controls">
                        	<?php echo h($blogPost['BlogPost']['modified']); ?>
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

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><span class="icon icon-color icon-compose"></span>Related Blog Post Categories</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        	<a class="btn btn-success" style="float:right;" href="<?php echo ADMIN_URL; ?>/blog/blog_post_categories/add">
            <i class="icon-zoom-in icon-white"></i>  
                Add                                            
            </a>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                    <th>Id</th>
                    <th>Parent Id</th>
                    <th>Lft</th>
                    <th>Rght</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th width="100">Blog Post Count</th>
                    <th width="100">Under Blog Post Count</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
				<?php
                $i = 0;
                foreach ($blogPost['BlogPostCategory'] as $blogPostCategory):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = 'class="even"';
                    }else{
						$class = 'class="odd"';
					}
                ?>
                <tr <?php echo $class;?>>
                    <td><?php echo $blogPostCategory['id']; ?></td>
                    <td><?php echo $blogPostCategory['parent_id']; ?></td>
                    <td><?php echo $blogPostCategory['lft']; ?></td>
                    <td><?php echo $blogPostCategory['rght']; ?></td>
                    <td><?php echo $blogPostCategory['name']; ?></td>
                    <td class="center">
                        <span class="label label-success"><?php echo $blogPostCategory['slug']; ?></span>
                    </td>
                    <td><?php echo $blogPostCategory['blog_post_count']; ?></td>
                    <td><?php echo $blogPostCategory['under_blog_post_count']; ?></td>
                    <td><?php echo $blogPostCategory['created']; ?></td>
                    <td><?php echo $blogPostCategory['modified']; ?></td>
                    <td class="center">
                        <a class="btn btn-success" href="<?php echo ADMIN_URL; ?>/blog/blog_post_categories/view/<?php echo $blogPostCategory['id']; ?>">
                            <i class="icon-zoom-in icon-white"></i>  
                            View                                            
                        </a>
                        <a class="btn btn-info" href="<?php echo ADMIN_URL; ?>/blog/blog_post_categories/edit/<?php echo $blogPostCategory['id']; ?>">
                            <i class="icon-edit icon-white"></i>  
                            Edit                                            
                        </a>
                        <a class="btn btn-danger" href="<?php echo ADMIN_URL; ?>/blog/blog_post_categories/delete/<?php echo $blogPostCategory['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$blogPost['BlogPost']['id'].'?'; ?>')">
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


<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><span class="icon icon-color icon-compose"></span>Related Blog Post Tags</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        	<a class="btn btn-success" style="float:right;" href="<?php echo ADMIN_URL; ?>/blog/blog_post_tags/add">
            <i class="icon-zoom-in icon-white"></i>  
                Add                                            
            </a>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Blog Post Count</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
				<?php
                $i = 0;
                foreach ($blogPost['BlogPostTag'] as $blogPostTag):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = 'class="even"';
                    }else{
						$class = 'class="odd"';
					}
                ?>
                <tr <?php echo $class;?>>
                    <td><?php echo $blogPostTag['id']; ?></td>
                    <td><?php echo $blogPostTag['name']; ?></td>
                    <td class="center">
                        <span class="label label-success"><?php echo $blogPostTag['slug']; ?></span>
                    </td>
                    <td><?php echo $blogPostTag['blog_post_count']; ?></td>
                    <td><?php echo $blogPostCategory['created']; ?></td>
                    <td><?php echo $blogPostCategory['modified']; ?></td>
                    <td class="center">
                        <a class="btn btn-success" href="<?php echo ADMIN_URL; ?>/blog/blog_post_tags/view/<?php echo $blogPostTag['id']; ?>">
                            <i class="icon-zoom-in icon-white"></i>  
                            View                                            
                        </a>
                        <a class="btn btn-info" href="<?php echo ADMIN_URL; ?>/blog/blog_post_tags/edit/<?php echo $blogPostTag['id']; ?>">
                            <i class="icon-edit icon-white"></i>  
                            Edit                                            
                        </a>
                        <a class="btn btn-danger" href="<?php echo ADMIN_URL; ?>/blog/blog_post_tags/delete/<?php echo $blogPostTag['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$blogPost['BlogPost']['id'].'?'; ?>')">
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

