<div class="actions">
	<h3><?php echo __('Other Reports'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Paypal Direct Payment Responses'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Paypal Express Checkout Payment Customer Details'), array('controller' => 'payments', 'action' => 'PaypalECPCustomerdetail')); ?> </li>
		<li><?php echo $this->Html->link(__('Paypal Express Checkout Payment Responses'), array('controller' => 'payments', 'action' => 'PaypalECPResponse')); ?> </li>
    </ul>
</div>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><span class="icon icon-color icon-compose"></span>Paypal Express Checkout Payment Responses</h2>
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
                    <th>Token</th>
                    <th>Ack</th>
                    <th>TransctionID</th>
                    <th>Order Time</th>
                    <th>Amount</th>
                    <th>Fee Amt.</th>
                    <th>Tax Amt.</th>
                    <th>Currency Code</th>
                    <th>Status</th>
                    <th>Created</th>
                  </tr>
              </thead>
              <tbody>
				<?php
                $i = 0;
				//print_r($PaypalECPResponses);exit;
                foreach ($PaypalECPResponses as $ECPResponse):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = 'class="even"';
                    }else{
						$class = 'class="odd"';
					}
                ?>
                <tr <?php echo $class;?>>
                    <td><?php echo $ECPResponse['PaypalECPResponse']['TOKEN']; ?></td>
                    <td><?php echo $ECPResponse['PaypalECPResponse']['ACK']; ?></td>
                    <td><?php echo $ECPResponse['PaypalECPResponse']['TRANSACTIONID']; ?></td>
                    <td><?php echo $ECPResponse['PaypalECPResponse']['ORDERTIME']; ?></td>
                    <td><?php echo $ECPResponse['PaypalECPResponse']['AMT']; ?></td>
                    <td><?php echo $ECPResponse['PaypalECPResponse']['FEEAMT']; ?></td>
                    <td><?php echo $ECPResponse['PaypalECPResponse']['TAXAMT']; ?></td>
                    <td><?php echo $ECPResponse['PaypalECPResponse']['CURRENCYCODE']; ?></td>
                    <td class="center">
						<span class="label label-success">
							<?php echo $ECPResponse['PaypalECPResponse']['PAYMENTSTATUS']; ?>
                        </span>
                    </td>
                    <td><?php echo $ECPResponse['PaypalECPResponse']['created_date']; ?></td>
                    
                </tr>
                <?php endforeach; ?>
              </tbody>   
          </table>            
        </div>
    </div><!--/span-->
</div>