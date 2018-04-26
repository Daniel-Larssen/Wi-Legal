<!-- Component Profile page for other lawyers, is placed inside
	of profile if the user that have been clicked on is a lawyer -->

	<!-- MAIN -->
	<main class="marg-container">
		<div class="profile center-marg med-marg-top">

			<div class="banner-container full-w card med-marg-bot">
				<div class="banner full-w">
					<div class="banner-background"><img src="img/placeholders/placeholder_large_slim.jpg" class="img-fix" alt="#"></div>
					<div class="banner-profile"><img src="<?php echo $profile_pic; ?>" class="img-fix" alt="#"></div>
					<h1 class="banner-name white-txt tablet-show fade-right-2s"><?php echo $first_name . " " . $last_name  ?></h1>
					<?php if ($reviews > 0) { ?>
					<div class="banner-rating card">
						<div class="center-flex">
							<span class="bread-txt black-txt"><?php echo number_format($scoresum[0]/$reviews, 1); ?></span><i class="fas fa-star fa-2x"></i>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="banner-bar full-w">
					<a href="#" class="banner-bar-item">
						<i class="fas fa-envelope fa-2x"></i>
					</a>
				</div>
			</div>

			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w card">
					<h2 class="white-txt">About</h2>
				</div>
				<div class="profile-item-info full-w card">
					<p class="bread-txt full-w black-txt"><?php echo $bio; ?></p>
					<div class="info-row margin-bottom">
						<span>
							<?php 	if ($firm != NULL) { echo '<i class="far fa-building"></i>' . " " . $firm;} 
							else { echo '<i class="fas fa-street-view"></i>' . " " . "Freelance"; } ?>
						</span> 
						<span><i class="fas fa-map-marker"></i> <?php echo $city ?></span> 
					</div>

					<?php 
					$sqlMf = "SELECT * FROM mainfields WHERE lsp_id='$lsp_id'";
					$queryMf = mysqli_query($con, $sqlMf);
					$row = mysqli_fetch_row($queryMf);
					?>

					<div class="field-row small-margin-bottom">
						<?php
						echo '<span class="tag inactive-tag">' . $mainfield . '</span>';
						for ($var = 1 ; $var <= 9; $var++) { 
							if (in_array($var, $row)) {
								$sqlMf = "SELECT field_name FROM fieldnames WHERE field_number='$var'";
								$queryMf = mysqli_query($con, $sqlMf);
								$name = mysqli_fetch_assoc($queryMf);
								$fieldName = $name["field_name"];
								if ($fieldName != $mainfield) {
									echo '<span class="tag inactive-tag">' . $fieldName . '</span>'; 
								}
							}
						}?>	 
					</div>
				</div>
			</div>

			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w card">
					<h2 class="white-txt">Schedule</h2>
				</div>
				<div class="profile-item-info full-w card">

					<div class="full-w">
						<div class="schedule">
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Monday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Tuesday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Wednesday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Thursday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Friday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Saturday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Sunday</span>
								<p>17:00 - 18:00</p>
							</div>
						</div>
					</div>

				</div>
			</div>

			<!--Message BOX, Only visible for users

				David, Fix this, should come visible when button is pressed, Yes?.

			-->

			<?php if (isset($user) && $user['usertype'] == 0) { ?> 
			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w card">
					<h2 class="white-txt">Message this lawyer</h2>
				</div>
				<div class="profile-item-info full-w card">

					<!--The form for registering a new user-->
					<form action="<?php echo $username; ?>" method="POST">
						<!--Title input-box-->
						<input type="text" name="m_title" placeholder="Title" required>
						<br>

						<!--Message input-box-->
						<input type="text" name="m_message" placeholder="Message" required>
						<br>

						<!--Message-button, starts register_handler.php-->
						<input type="submit" name="message_button" value="Send Message">
					</form>
					
				</div>
			</div>
			<?php } ?>


			<!-- Review box that only shows for users that have not reviewed this lsp before. -->
			<?php if (isset($user) && $user['usertype'] == 0 && $userreview == 0) {?>
			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w small-marg-bot card">
					<h2 class="white-txt">Reviews</h2>
				</div>
				<div class="list-item profile-item-review full-w small-marg-bot card">
					<a href="#" class="list-item-avatar center-flex pc-show">
						<div class=".img-cutter">
							<img src="img/profile/default/1.png" alt="#">
						</div>
					</a>

					<div class="list-item-main full-w">
						<form action="<?php echo $username; ?>" method="POST">
							<div class="title-row margin-bottom">
								<a href="<?php echo $username; ?>" class="lsp-name"><?php echo $first_name . " " . $last_name  ?></a>
								
								<div>						
									<div class="tag-item">
										<input type="radio" name="rating" value="1" required><span>1 star</span>
										<input type="radio" name="rating" value="2" required><span>2 star</span>
										<input type="radio" name="rating" value="3" required><span>3 star</span>
										<input type="radio" name="rating" value="4" required><span>4 star</span>
										<input type="radio" name="rating" value="5" required><span>5 star</span>
									</div>
								</div>

							</div>
							<div class="info-row margin-bottom">

								<textarea class="bread-txt black-txt full-w" name="review" rows="6" placeholder="Write a review please"></textarea>
								<button type="submit" name="rate_button" value="Rate this lawyer">Here</button>

							</div>
						</form>
					</div>
				</div>
			</div>
			<?php } ?>

			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w small-marg-bot card">
					<h2 class="white-txt">Reviews</h2>
				</div>
			</div>
			<!-- This is the function that lists all reviews that the lsp have. -->
			<?php
			if (mysqli_num_rows($lspallreviews) > 0) {
				while($row = mysqli_fetch_assoc($lspallreviews)) {

					/* Collects all the reviews and information about the ones who reviewed the lsp */
					include '../src/model/form_handlers/reviewlist_handler.php';	
					?>

					<!-- This is where the reivew-box that will be shown is made. -->
					<div class="list-item card margin-bottom full-w">
						<div class="list-item profile-item-review full-w small-marg-bot card">
							<a href="#" class="list-item-avatar center-flex pc-show">

								<!-- This is the image of the user that the review belongs to. -->
								<div class=".img-cutter">
									<img src="<?php echo $reviewpic; ?>" alt="#">
								</div>
							</a>
							<a class="lsp-name"><?php echo $reviewfname . " " . $reviewlname  ?></a>
							<p class="bread-txt full-w black-txt"><?php echo '<br>' . $reviewtext; ?></p>
							
							<!--This is the number of stars that the reviewee gave this lawyer. -->
							<?php 
							for ($i=1; $i <= $reviewscore; $i++) { 
								echo '<i class="fas fa-star" style="font-size:4em"></i>';
							} 
							for ($i=$reviewscore; $i<=4; $i++) { 
								echo '<i class="far fa-star" style="font-size:4em"></i>';
							}
							?>

						</div>
					</div>
					<?php }} ?>

				</div>
			</main>

