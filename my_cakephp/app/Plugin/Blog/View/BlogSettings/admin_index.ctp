<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Blog Post'), array('controller' => 'blog_posts','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Blog Post Categories'), array('controller' => 'blog_post_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Post Tags'), array('controller' => 'blog_post_tags', 'action' => 'index')); ?> </li>
		
        
	</ul>
</div>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><span class="icon icon-color icon-compose"></span>Blog Settings</h2>
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
                    <th>Setting Text</th>
                    <th width="30%">Value</th>
                    <th>Modified</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
				<?php
                $i = 0;
                foreach ($blogSettings as $blogSetting):
                     $class = null;
                    if ($i++ % 2 == 0) {
                        $class = 'class="even"';
                    }else{
						$class = 'class="odd"';
					}
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo h($blogSetting['BlogSetting']['id']); ?>&nbsp;</td>
                    <td><?php echo h($this->Text->truncate($blogSetting['BlogSetting']['setting_text'], 100)); ?>&nbsp;</td>
                    <td><?php echo h($this->Text->truncate($blogSetting['BlogSetting']['value'], 100)); ?>&nbsp;</td>
                    <td><?php echo $this->Time->nice($blogSetting['BlogSetting']['modified']); ?>&nbsp;</td>
                    <td>
                    	<a class="btn btn-success" href="<?php echo ADMIN_URL; ?>/blog/blog_settings/view/<?php echo $blogSetting['BlogSetting']['id']; ?>">
                            <i class="icon-zoom-in icon-white"></i>  
                            View                                            
                        </a>
                        <a class="btn btn-info" href="<?php echo ADMIN_URL; ?>/blog/blog_settings/edit/<?php echo $blogSetting['BlogSetting']['id']; ?>">
                            <i class="icon-edit icon-white"></i>  
                            Edit                                            
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>   
          </table>            
        </div>
    </div><!--/span-->
</div>  
