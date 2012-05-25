<div id = "nav" class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
	
		<a class="brand" href="http://curatr.co.uk"> <img height ="20px" <?php echo('src="'.img_url('logo.png').'"'); ?> alt="Curatr"/> </a>
		
		<ul class="nav">
			<li class="divider-vertical"></li>
			<li <?php if($current == 'home') echo ('class = "active"'); ?>> <!-- class active -->
				<a href= <?php echo (site_url('home')); ?> ><span class ="menulink">Overview</span></a>
			</li>
			<li <?php if($current == 'test') echo ('class = "active"'); ?>>
				<a href= <?php echo (site_url('test')); ?> ><span class ="menulink">Tests</span></a>
			</li>
			<li <?php if($current == 'mark') echo ('class = "active"'); ?>>
				<a href= <?php echo (site_url('mark')); ?>><span class ="menulink">Marking</span></a>
			</li>
			<?php
			if ($admin == 1) {
				echo ('<li'); 
				if($current == 'admin') echo (' class = "active"');
				echo ('>
					<a href='.site_url('admin').'><span class ="menulink"> Administration </span></a>
				</li>');
			}
			if ($username != '')
			echo (
			'<li class="divider-vertical"></li>
			<li>
				<a href = '.site_url('login/disconnect').'> <span class ="menulink"> Logout ('.$username.')</span></a>
			</li>'
			)
			?>
		</ul>
		
		
    </div>
  </div>
</div> 

<div id ="content" class='cf'>
<br/> <br/> <br/>