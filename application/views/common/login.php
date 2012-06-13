				<div id="login">
                                    <form class = "form-inline login" method="post" <?php echo ('action="'.site_url("login/connect").'"'); ?>>
					<label for="username"><strong> Username: </strong></label>
                                        <input type="text" name="username" value="" />
                                        <label for="mdp"><strong> Password: </strong></label>
                                        <input type="password" name="password" value="" />
					<input class = "btn btn-primary" type="submit" value="Submit" />
                                    </form>
				</div>