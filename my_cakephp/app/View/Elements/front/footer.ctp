<p>
	<a href="#">RSS Feed</a> |
    <a href="#">Contact</a> | 
    <a href="#">Accessibility</a> | 
    <a href="#">Products</a> | 
    <a href="#">Disclaimer</a>
    <br />
  	&copy; Copyright 2013 Campany Name, Design: Brijesh Patel - 
    <a href="#" title="What's your solution?">@Shivam</a>
</p>




<!-- Code Begins -->

<div id="vpb_pop_up_background"></div>
<!-- General Pop-up Background --> 

<!-- Sign Up Box Starts Here -->

<!-- default = false sets the submit button not to submit - so we can use AJAX. Still works for users w/o javascript -->
<div id="vpb_signup_pop_up_box">
<?php echo $this->Form->create('Register', array('default' => false)); ?>
  <div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; font-weight:bold;">Sign Up Box</div>
  <br clear="all">
  <div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">To exit this sign-up box, click on the cancel button or outside this box..</div>
  <br clear="all">
  <br clear="all">
  <div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Fullname:</div>
  <div style="width:300px;float:left;" align="left">
    <input type="text" id="fullnames" name="fullname" data-bvalidator="required,minlength[6],alpha" value="" class="vpb_textAreaBoxInputs">
  </div>
  <br clear="all">
  <br clear="all">
  <div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Username:</div>
  <div style="width:300px;float:left;" align="left">
    <input type="text" id="usernames" name="username" data-bvalidator="required,minlength[6]" value="" class="vpb_textAreaBoxInputs">
  </div>
  <br clear="all">
  <br clear="all">
  <div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Email Address:</div>
  <div style="width:300px;float:left;" align="left">
    <input type="email" id="emails" name="email" data-bvalidator="required,email" value="" class="vpb_textAreaBoxInputs">
  </div>
  <br clear="all">
  <br clear="all">
  <div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Password:</div>
  <div style="width:300px;float:left;" align="left">
    <input type="password" id="passs" name="password" value="" class="vpb_textAreaBoxInputs">
  </div>
  <br clear="all">
  <br clear="all">
  <div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">&nbsp;</div>
  <div style="width:300px;float:left;" align="left"> 
  	<input type="submit" class="vpb_general_button" value="Submit" />
    <input type="button" class="vpb_general_button" value="Cancel" onClick="vpb_hide_popup_boxes();" />	
  </div>
  <br clear="all">
  <br clear="all">
<?php echo $this->Form->end(); ?>  
</div>


<?php
// Form ID: #RegisterDisplayForm
// Div to use for AJAX response: #vpb_signup_pop_up_box

$data = $this->Js->get('#RegisterDisplayForm')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#RegisterDisplayForm')->event(
   'submit',
   $this->Js->request(
    array('action' => 'register', 'controller' => 'users'),
    array(
        'update' => '#vpb_signup_pop_up_box',
        'data' => $data,
        'async' => true,    
        'dataExpression'=>true,
        'method' => 'POST'
    )
  )
);
echo $this->Js->writeBuffer(); 
?>
<script type="text/javascript">   
	$(document).ready(function () {
        $('#RegisterDisplayForm').bValidator(optionsRed);
    });
</script>
<!-- Sign Up Box Ends Here --> 

<!-- Login Box Starts Here -->
<div id="vpb_login_pop_up_box">
  <?php echo $this->Form->create('Login', array('controller' => 'logins','action' => 'user_login')); ?>
  <div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; font-weight:bold;">Users Login Box</div>
  <br clear="all">
  <div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">To exit this login box, click on the cancel button or outside this box..</div>
  <br clear="all">
  <br clear="all">
  <div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Username:</div>
  <div style="width:300px;float:left;" align="left">
    <input type="text" name="username" data-bvalidator="required" value="" class="vpb_textAreaBoxInputs">
  </div>
  <br clear="all">
  <br clear="all">
  <div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Password:</div>
  <div style="width:300px;float:left;" align="left">
    <input type="password" name="password" value="" class="vpb_textAreaBoxInputs">
  </div>
  <br clear="all">
  <br clear="all">
  <div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">&nbsp;</div>
  <div style="width:300px;float:left;" align="left">
  	<input type="submit" class="vpb_general_button" value="Submit" />
    <input type="button" class="vpb_general_button" value="Cancel" onClick="vpb_hide_popup_boxes();" />
  </div>
  <br clear="all">
  <br clear="all">
<?php echo $this->Form->end(); ?>    
</div>
<script type="text/javascript">   
	$(document).ready(function () {
        $('#LoginUserLoginForm').bValidator(optionsRed);
    });
</script>
<!-- Login Box Ends Here --> 

<!-- Code Ends -->