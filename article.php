<!DOCTYPE html>
<html>
	<?php include "includes/header.php";?>
	<body>
		<div id="header">
			<?php
				$article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int)$_GET['id']);
				$text = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = " . (int)$_GET['id']);
				$autor = mysqli_query($connection, "SELECT * FROM `autors` WHERE `categorie_id` = " . (int)$_GET['id']);
				while( $t = mysqli_fetch_assoc($text) )
				{
				?>
					<h1 id="title">
						<font face="segoe script">
							<?php echo $t['title']; ?>
						</font>
					</h1>
				<a id="navigation" href="index.php"><img id="image" src="images/HOME.png" alt="home" height="40px"></a>
			<input id="search" type="search" name="q" placeholder="Search" size="24%">
		</div>

			
		<div id="text">
			<iframe id="left_video" width="560" height="315" src="<?php echo $t['video_link']; ?>" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="<?php echo $t['video_link1']; ?>" frameborder="0" allowfullscreen></iframe><br><br>
			<font face="palatino linotype">
				<?php echo $t['text']; ?>
			</font>
		</div>

		<div id="text1">
			<font face="palatino linotype">
				<?php
					while( $a = mysqli_fetch_assoc($autor) )
					{
					?>
						<a href="/autors.php?id=<?php echo $a['id']; ?>"><?php echo $a['autor']; ?></a><br>
				<?php
					}
					?>
			</font>
		</div>

		<?php
			}
		?>

		<?php include "includes/footer.php";?>
	</body>
</html>