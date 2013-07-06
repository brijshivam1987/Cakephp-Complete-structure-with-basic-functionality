<form class="form-horizontal" id="AdminLoginForm" action="login" method="post">
    <fieldset>
        <div class="input-prepend" title="Username" data-rel="tooltip">
            <span class="add-on"><i class="icon-user"></i></span>
			<input autofocus class="input-large span10" name="username" data-bvalidator="required" id="username" type="text" value="" />
        </div>
        <div class="clearfix"></div>

        <div class="input-prepend" title="Password" data-rel="tooltip">
            <span class="add-on"><i class="icon-lock"></i></span>
			<input class="input-large span10" name="password" id="password" data-bvalidator="required" type="password" value="" />
        </div>
        <div class="clearfix"></div>

        <div class="input-prepend">
        	<label class="remember" for="remember">
			<input type="checkbox" id="remember" />Remember me</label>
        </div>
        <div class="clearfix"></div>

        <p class="center span5">
        <button type="submit" class="btn btn-primary">Login</button>
        </p>
    </fieldset>
</form>
<script type="text/javascript">   
	$(document).ready(function () {
        $('#AdminLoginForm').bValidator(optionsRed);
    });
</script>