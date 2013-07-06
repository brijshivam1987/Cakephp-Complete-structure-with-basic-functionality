<ul class="actions">
  <li>
  	<?php echo $this->html->link(__('Groups', true), '/admin/newsletter/groups/index', array('class' => 'button add')); ?>
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
            <h2><span class="icon icon-color icon-compose"></span><?php echo __( 'View subscriptions in group: ').$group['Group']['name']; ?></h2>
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
                    <th>Email</th>
                    <th>Name</th>
                    <th>Created on</th>
                    <th>Modified on</th>
                  </tr>
              </thead>
              <tbody>
				 <?php $i = 0; foreach($subscriptions as $subcription) : ?>
                    <tr<?php echo ($i % 2 === 0) ? ' class="even"' : ' class="odd"'; ?>>
                        <td><?php echo $this->html->link($subcription['Subscription']['email'], array('controller' => 'subscriptions', 'action' => 'edit', 'admin' => true, $subcription['Subscription']['id'])); ?></td>
                        <td><?php echo $subcription['Subscription']['name']; ?></td>
                        <td><?php echo $this->time->niceShort($subcription['Subscription']['created']); ?></td>
						<td><?php echo $this->time->niceShort($subcription['Subscription']['modified']); ?></td>
                    </tr>
            	<?php $i++; endforeach; ?>
        	</tbody>
    		</table>
		</div>
	</div>
</div>    
