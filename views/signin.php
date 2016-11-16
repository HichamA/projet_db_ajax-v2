<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="page-header">
		  			<h1>Sign in</h1>
		  			<span class="error"><?php echo $Ok; ?>  </span>
				</div>
				<form action="" method="post">
					<fieldset>
						<input type="email" class="form-control" name="emailLoginToto" value="" placeholder="Email address" /><br />
						<span class="error"><?php echo $emailErr;?></span>
						<span class="error"><?php echo $emailValErr;?></span>
						<span class="error"><?php echo $emailKnErr;?></span>
  						<br>
						<input type="password" class="form-control" name="passwordLoginToto1" value="" placeholder="Your password" /><br />
						<span class="error"><?php echo $pswdLenErr;?></span>
						<span class="error"><?php echo $emailpswdErr;?></span>
  						<br>
						<input type="submit" class="btn btn-success btn-block" value="Sign in" />
					</fieldset>
				</form>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
		</div>

	</div>