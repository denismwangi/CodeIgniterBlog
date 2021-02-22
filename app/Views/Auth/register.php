<div class="container">
	<div class="row" style="margin-top: 45px">
		<div class="col-md-4 col-md-offset-4">
			<h4>sign in</h4>
			<form action="<?= base_url('auth/register_user') ?>" method="post" autocomplete="off">
				<?= csrf_field(); ?>

				<?php if (!empty(session()->getFlashdata('fail'))): ?> 
				<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
			<?php endif ?>

			<?php if (!empty(session()->getFlashdata('success'))): ?> 
				<div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
			<?php endif ?>

				<div class="form-group">
					<label for="">Name</label><br/>
					<input type="text" class="from-control btn-block" name="name" placeholder="enter name" value="<?= set_value('name'); ?>">
					<span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
				</div>
				<div class="form-group">
					<label for="">Email</label><br/>
					<input type="text" class="from-control btn-block" name="email" placeholder="email" value="<?= set_value('email'); ?>">
					<span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
				</div>
				<div class="form-group">
					<label for="">Password</label><br/>
					<input type="password" class="from-control btn-block" name="password" placeholder="Password" value="<?= set_value('password'); ?>" >
					<span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
				</div>
				<div class="form-group">
					<label for="">Confirm Password</label><br/>
					<input type="password" class="from-control btn-block" name="cpassword" placeholder="confirm Password"  value="<?= set_value('cpassword'); ?>">
					<span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
					
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit">Sign In</button>
					
				</div>
				<br/>
				<a href="<?= site_url('auth/login'); ?>">Already have an account, login</a>
				
			</form>
			
		</div>
		
	</div>
	
</div>