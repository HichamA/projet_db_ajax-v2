<div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-0"></div>
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="page-header">
            <h1>Sign up</h1>
            <p><span class="error">* required field.</span></p>
        </div>
  
        <form method="post" action="">
          <fieldset>
            <input type="email" class="form-control" name="emailToto" value="" placeholder="Email address" />*<br />
            <span class="error"><?php echo $emailErr;?></span>
            <span class="error"><?php echo $emailValErr;?></span>
            <br>
            <input type="password" class="form-control" name="passwordToto1" value="" placeholder="Your password" />*<br />
            <span class="error"><?php echo $pswd1Err;?></span>
            <span class="error"><?php echo $pswdLenErr;?></span>
            <br>
            <input type="password" class="form-control" name="passwordToto2" value="" placeholder="Confirm your password" />*<br />
            <span class="error"><?php echo $pswd1Err;?></span>
            <span class="error"><?php echo $pswdLenErr;?></span>
            <br>
            <input type="submit" class="btn btn-success btn-block" value="Sign up" />
          </fieldset>
        </form>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-0"></div>
    </div>

</div>