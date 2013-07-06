<ul class="actions">
  <li>
  	<?php echo $this->html->link(__('Add subscription', true), '/admin/newsletter/subscriptions/add', array('class' => 'button add')); ?>
  </li>
  <li>
  	<?php echo $this->html->link(__('Groups', true), '/admin/newsletter/groups/index', array('class' => 'button add')); ?>
  </li>
  <li>
  	<?php echo $this->html->link(__('Mails', true), '/admin/newsletter/mails/index', array('class' => 'button add')); ?>
  </li> 
</ul>

<? if(!empty($errors)) { ?>
      <p><?php echo __('The following errors ocourred during import:', true) ?></p>
      <ul>
        <? foreach($errors as $error) { ?>
          <li><?php echo $error ?></li>
        <? } ?>
      </ul>
<? } ?>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><span class="icon icon-color icon-compose"></span>Import a CSV file </h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <?php echo $this->form->create('Subscription', array('class' => 'form-horizontal','url' => '/admin/newsletter/subscriptions/import_csv', 'type' => 'file')) ?>
            <fieldset>
                    <legend><?php echo __("Import a CSV file (must be in the format: 'user@email.com, User Name', without quotes)"); ?></legend>
				<p><?php echo __("This can take a while if there are many registries, so please be patient.", true) ?></p>
                <div class="control-group">
                    <label class="control-label">Select CSV File</label>
                    <div class="controls">
                        <?php echo $this->form->file('csv', array('label'=>false,'size' => '40'))?>
                    </div>    
                </div>
                <div class="control-group">
                    <label class="control-label">Group</label>
                    <div class="controls">    
              			<?php echo $this->form->input('Group', array('label'=>false,'selected' => $siteGroup)) ?>
                    </div>
                </div>
                <div class="form-actions">
                	<button type="submit" class="btn btn-primary">Import</button>
                </div>
                </fieldset>
            </form> 
		</div>
	</div>
    
    <div class="box-content">
		<?php echo $this->form->create('Filter', array('class' => 'form-horizontal','url' => '/admin/newsletter/subscriptions/index' ) ); ?>
            <legend><?php echo __("Filter"); ?></legend>
            <div class="control-group">
                <label class="control-label">Filter</label>
                <div class="controls">
                    <?php echo $this->form->input('Filter.value', array('label' => false)); ?>
                </div>    
            </div>  
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Filter</button>
            </div>  
        </form>        
	</div>
    
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
                    <th>Email</th>
                    <th>Name</th>
                    <th>Opt-Out</th>
                    <th>Created on</th>
                    <th>Modified on</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
				<?php $i = 0; foreach($subscriptions as $subscription) : ?>
                <tr<?php echo ($i % 2 === 0) ? ' class="even"' : ' class="odd"'; ?>>
                    <td><?php echo $this->html->link($subscription['Subscription']['email'], array('action' => 'edit', 'admin' => true, $subscription['Subscription']['id'])); ?></td>
                    <td><?php echo $subscription['Subscription']['name']; ?></td>
                    <td id="td_opt_out_<?php echo $subscription['Subscription']['id'] ?>">
                      <?php if(!$subscription['Subscription']['opt_out_date']) { ?>
                        <?php echo __('Yes') ?>
                      <?php } else { ?>
                        <?php echo __('No, at ') . $subscription['Subscription']['opt_out_date'] ?>
                      <?php } ?>
                      <a href="#" onclick="changeOptOut(<?php echo $subscription['Subscription']['id'] ?>);"><?php echo ($subscription['Subscription']['opt_out_date'] ? __( '(unset)', true) : __( '(set)', true)) ?></a> 
                    </td>
                    <td><?php echo $this->time->niceShort($subscription['Subscription']['created']); ?></td>
                    <td><?php echo $this->time->niceShort($subscription['Subscription']['modified']); ?></td>
                    <td>
                    	<a class="btn btn-info" href="<?php echo ADMIN_URL; ?>/newsletter/subscriptions/edit/<?php echo $subscription['Subscription']['id']; ?>">
                            <i class="icon-edit icon-white"></i>  
                            Edit                                            
                        </a>
                        <a class="btn btn-danger" href="<?php echo ADMIN_URL; ?>/newsletter/subscriptions/delete/<?php echo $subscription['Subscription']['id']; ?>" onclick="return confirm('<?php echo 'Are you sure you want to delete # '.$subscription['Subscription']['id'].'?'; ?>')">
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

<script>
  function changeOptOut(id) {
    var td = $('#td_opt_out_'+id);
    var url = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/admin/newsletter/subscriptions/invert_opt_out/'?>"+id;
    td.load(url);
  }
</script>
