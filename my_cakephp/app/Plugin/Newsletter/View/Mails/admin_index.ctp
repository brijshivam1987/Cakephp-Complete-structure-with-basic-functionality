<ul class="actions">
  <li>
  	<?php echo $this->html->link(__('Add mail', true), '/admin/newsletter/mails/add', array('class' => 'button add')); ?>
  </li>
  <li>
  	<?php echo $this->html->link(__('Subscriptions', true), '/admin/newsletter/subscriptions/index', array('class' => 'button add')); ?>
  </li>
  <li>
  	<?php echo $this->html->link(__('Groups', true), '/admin/newsletter/groups/index', array('class' => 'button add')); ?>
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
                    <th><?php echo $this->paginator->sort(__( 'Subject', true), 'name'); ?></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?php echo $this->paginator->sort(__( 'Created on', true), 'created'); ?></th>
                    <th><?php echo $this->paginator->sort(__( 'Modified on', true), 'modified'); ?></th>
                    <th></th>
                  </tr>
              </thead>
              <tbody>
				<?php $i = 0; foreach($mails as $mail) : ?>
                    <tr<?php echo ($i % 2 === 0) ? ' class="even"' : ' class="odd"'; ?>>
                        <td><?php echo $this->html->link($mail['Mail']['subject'], array('action' => 'edit', 'admin' => true, $mail['Mail']['id'])); ?></td>
                        <td><?php echo $this->html->link(__('send', true), array('action' => 'send', 'admin' => true, $mail['Mail']['id'])); ?></td>
                        <td><?php echo $this->html->link(__('reset', true), array('action' => 'reset', 'admin' => true, $mail['Mail']['id'])); ?></td>
                        <td><?php echo $this->html->link(__('statistics', true), array('action' => 'statistics', 'admin' => true, $mail['Mail']['id'])); ?></td>
                        <td><?php echo $this->time->niceShort($mail['Mail']['created']); ?></td>
                        <td><?php echo $this->time->niceShort($mail['Mail']['modified']); ?></td>
                        <td>
							<a class="btn btn-success" href="<?php echo ADMIN_URL; ?>/newsletter/mails/show/<?php echo $mail['Mail']['id']; ?>">
                                <i class="icon-edit icon-white"></i>  
                                View                                            
                            </a>
                            <a class="btn btn-info" href="<?php echo ADMIN_URL; ?>/newsletter/mails/edit/<?php echo $mail['Mail']['id']; ?>">
                                <i class="icon-edit icon-white"></i>  
                                Edit                                            
                            </a>
                            <a class="btn btn-danger" href="<?php echo ADMIN_URL; ?>/newsletter/mails/delete/<?php echo $mail['Mail']['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$mail['Mail']['id'].'?'; ?>')">
                                <i class="icon-trash icon-white"></i> 
                                Delete
                            </a>
                        </td>
                    </tr>
            	<?php $i++; endforeach; ?>
        	</tbody>
    		</table>
		</div>
	</div>
</div>    

