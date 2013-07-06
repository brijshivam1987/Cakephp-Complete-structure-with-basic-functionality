<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Blog Post Categories'), array('controller' => 'blog_post_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post Category'), array('controller' => 'blog_post_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Post Tags'), array('controller' => 'blog_post_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post Tag'), array('controller' => 'blog_post_tags', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Blog Setting'), array('controller' => 'blog_settings', 'action' => 'index')); ?> </li>
	</ul>
</div>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><span class="icon icon-color icon-compose"></span>Blog Post</h2>
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
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Published</th>
                    <th>Sticky</th>
                    <th>In_Rss</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
				<?php
                $i = 0;
                foreach ($blogPosts as $blogPost):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = 'class="even"';
                    }else{
						$class = 'class="odd"';
					}
                ?>
                <tr <?php echo $class;?>>
                    <td><?php echo $blogPost['BlogPost']['id']; ?></td>
                    <td><?php echo $blogPost['BlogPost']['title']; ?></td>
                    <td><?php echo $blogPost['BlogPost']['slug']; ?></td>
                    <td><?php echo $blogPost['BlogPost']['published']; ?></td>
                    <td><?php echo $blogPost['BlogPost']['sticky']; ?></td>
                    <td class="center">
                        <span class="label label-success"><?php echo $blogPost['BlogPost']['in_rss']; ?></span>
                    </td>
                    <td><?php echo $blogPost['BlogPost']['created']; ?></td>
                    <td><?php echo $blogPost['BlogPost']['modified']; ?></td>
                    <td>
                        <a class="btn btn-success" href="<?php echo ADMIN_URL; ?>/blog/blogposts/view/<?php echo $blogPost['BlogPost']['id']; ?>">
                            <i class="icon-zoom-in icon-white"></i>  
                            View                                            
                        </a>
                        <a class="btn btn-info" href="<?php echo ADMIN_URL; ?>/blog/blogposts/edit/<?php echo $blogPost['BlogPost']['id']; ?>">
                            <i class="icon-edit icon-white"></i>  
                            Edit                                            
                        </a>
                        <form name="delete<?php echo $blogPost['BlogPost']['id']; ?>" id="delete<?php echo $blogPost['BlogPost']['id']; ?>" method="post" action="<?php echo ADMIN_URL; ?>/blog/blogposts/delete/<?php echo $blogPost['BlogPost']['id']; ?>">
                        <input type="hidden" name="deleteid" value="" id="deleteid" />
                        <a id="<?php echo $blogPost['BlogPost']['id']; ?>" title="<?php echo $blogPost['BlogPost']['title']; ?>" class="btn btn-danger btn-setting" href="#" onclick="return deleteme(this.id,this.title)" >
                            <i class="icon-trash icon-white"></i> 
                            Delete
                        </a>
                        </form>
                    </td>
                    <?php /*?><a class="btn btn-danger btn-setting" href="<?php echo ADMIN_URL; ?>/blog/blogposts/delete/<?php echo $blogPost['BlogPost']['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$blogPost['BlogPost']['id'].'?'; ?>')">
                            <i class="icon-trash icon-white"></i> 
                            Delete
                        </a><?php */?>
                </tr>
                <?php endforeach; ?>
              </tbody>   
          </table>            
        </div>
    </div><!--/span-->
</div>            

<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Delete Blog Post</h3>
    </div>
    <div class="modal-body">
        <p><?php echo 'Are you sure you want to delete # '; ?><span id="idd"></span></p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary" onclick="formsubmit();">Delete</a>
    </div>
</div>
<script type="text/javascript">
function deleteme(id,title){
	$('#deleteid').val(id);
	$('#idd').html(title);
}
function formsubmit(){
	var delID = $('#deleteid').val();
	$('#delete'+delID).submit();
}
</script>
