<ul class="actions">
  <li>
  	<?php echo $this->html->link(__('Add group', true), '/admin/newsletter/groups/add', array('class' => 'button add')); ?>
  </li>
  <li>
  	<?php echo $this->html->link(__('Subscriptions', true), '/admin/newsletter/subscriptions/index', array('class' => 'button add')); ?>
  </li>
  <li>
  	<?php echo $this->html->link(__('Mails', true), '/admin/newsletter/mails/index', array('class' => 'button add')); ?>
  </li> 
</ul>

<div class="row-fluid sortable">		
	<div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><span class="icon icon-color icon-compose"></span>View subscriptions</h2>
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
                    <th>Name</th>
                    <th></th>
                    <th>Created on</th>
                    <th>Modified on</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
				<?php $i = 0; foreach($groups as $group) : ?>
                    <tr<?php echo ($i % 2 === 0) ? ' class="even"' : ' class="odd"'; ?>>
                        <td><?php echo $this->html->link($group['Group']['name'], array('action' => 'edit', 'admin' => true, $group['Group']['id'])); ?></td>
                        <td><?php echo $this->html->link(__('list subscriptions',true), array('action' => 'list_subscriptions', 'admin' => true, $group['Group']['id'])); ?></td>
                        <td><?php echo $this->time->niceShort($group['Group']['created']); ?></td>
                        <td><?php echo $this->time->niceShort($group['Group']['modified']); ?></td>
                        <td>
							<a class="btn btn-info" href="<?php echo ADMIN_URL; ?>/newsletter/groups/edit/<?php echo $group['Group']['id']; ?>">
                                <i class="icon-edit icon-white"></i>  
                                Edit                                            
                            </a>
                            <?php if( $group['Group']['name'] !== "default" ){ ?>
                            <a class="btn btn-danger" href="<?php echo ADMIN_URL; ?>/newsletter/groups/delete/<?php echo $group['Group']['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$group['Group']['id'].'?'; ?>')">
                                <i class="icon-trash icon-white"></i> 
                                Delete
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
            	<?php $i++; endforeach; ?>
        	</tbody>
    		</table>
		</div>
	</div>
</div>    
