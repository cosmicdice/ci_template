				<div id="login">
					<div class = "full section">
						<form class = "form-inline login" method="post" <?php echo ('action="'.site_url("login/connect").'"'); ?>>
							<label for="username"><strong>Username:</strong></label>
							<input type="text" name="username" value="" />
							<label for="mdp"><strong> Password: </strong></label>
							<input type="password" name="password" value="" />
							<input class = "btn btn-primary" type="submit" value="Submit" />
							<?php
							if ($alert != '')
							echo 
							('<br/><br/>
							<div id = "alert">
								<i class="icon-exclamation-sign"></i>'
								.' '.$alert. 
							'</div>')
							?>
						</form>
					</div>
				</div>