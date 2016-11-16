		<footer>
			<div class="panel panel-primary">
  				<div class="panel-body text-center">&copy; Myself - Share on
				
				<?php
				// Use of social meadia links
				//charge tous les packages composer
					require'vendor/autoload.php';
					use SocialLinks\Page;

					//Create a Page instance with the url information
					$page = new Page([
					    'url' => 'http://localhost',
					    'title' => 'Home projet-toto',
					    'text' => 'Extended page description',
					    'image' => 'http://mypage.com/image.png',
					    'twitterUser' => '@twitterUser'
					]);

					//-----------debug----------
					echo '  <a href="'.$page->facebook->shareUrl.'">Facebook</a>';
					echo '  <a href="'.$page->linkedin->shareUrl.'">Linkedin</a>';
					echo '  <a href="'.$page->twitter->shareUrl.'">Twitter</a>';


					exit;
					?>

  				</div>

  			</div>
  		</footer>
	</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- jQuery est inclus ! -->

</body>
</html>