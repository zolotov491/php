<!DOCTYPE html>
<html>
	<?php include "includes/header.php";?>
	<body>
		<header id="header">
			<?php
				$autors = mysqli_query($connection, "SELECT * FROM `autors` WHERE `id` = " . (int)$_GET['id']);
				$random = mysqli_query($connection, "SELECT * FROM `autors` WHERE `id` = " . rand(1, 23));
				$link = mysqli_query($connection, "SELECT * FROM `links` WHERE `autor_id` = " . (int)$_GET['id']);
				mysqli_query($connection, "UPDATE `autors` SET `views` = `views` + 1 WHERE `id` = " . (int)$_GET['id']);
				mysqli_query($connection, "UPDATE `links` SET `views` = `views` + 1 WHERE `autor_id` = " . (int)$_GET['id']);
				while( $t = mysqli_fetch_assoc($autors) )
				{
				?>
					<h1 id="title">
						<font face="segoe script">
							<?php echo $t['autor']; ?>
						</font>
					</h1>
				<a id="navigation" href="index.php"><img id="image" src="images/HOME.png" alt="home" height="40px"></a>
			<input id="search" type="search" name="q" placeholder="Search" size="24%">
		</header>

		<div id="text">
		<?php
			if(((int)$_GET['id'])!=999999)
			{?>
			<iframe id="left_video" width="560" height="315" src="<?php echo $t['link_youtube']; ?>" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="<?php echo $t['link_youtube1'];?>" frameborder="0" allowfullscreen></iframe> <br>
				<font face="palatino linotype">
					<h3>Download tabs (PDF):</h3>
				</font>
			<?php
				while( $l = mysqli_fetch_assoc($link) )
				{
			?>
				<a href="<?php echo $l['link']; ?>" target="_blank"><?php echo $l['title'];?></a><br>
			<?php
			}
			?>
		
		<?php
			}else{
					while( $r = mysqli_fetch_assoc($random) ){
					?>
			<iframe id="left_video" width="560" height="315" src="<?php echo $r['link_youtube']; ?>" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="<?php echo $r['link_youtube1'];?>" frameborder="0" allowfullscreen></iframe> <br>
			<font face="palatino linotype">
				<h3>Download popular tabs in (PDF):</h3>
			</font>
			<?php
				$link_rand = mysqli_query($connection, "SELECT * FROM `links` ORDER BY `views` DESC LIMIT 9");
				while( $lr = mysqli_fetch_assoc($link_rand) )
				{	
			?>
			<a href="<?php echo $l['link']; ?>" target="_blank"><?php echo $lr['title'];?></a><br>
			<?php
			}
			?>

				<?php		
					}
				}?>

			
		</div>
		<?php
		}
		?>

		<?php include "includes/footer.php";?>
	</body>
</html>