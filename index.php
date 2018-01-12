<!DOCTYPE html>
<html>
<?php include "includes/header.php";?>
<body>
	<div id="wrapper">

		<header id="header">
			<h1 id="title"><font face="segoe script">TabsON</font></h1>
			<a id="navigation" href="/"><img id="image" src="images/HOME.png" alt="home" height="40px"></a>
			<input id="search" type="search" name="q" placeholder="Search" size="24%">
		</header>

		<div id="content">
			<div class="container">
				<div class="row">
					<section class="content__left col-md-8">
						<div class="block">
							<a href="/article.php?id=1"><img id="image" src="images/background.jpg" alt="guitar" height="270px"></a>
							<a href="/article.php?id=2"><img id="image" src="images/background7.jpg" alt="guitar" height="270px"></a>
							<a href="/article.php?id=3"><img id="image" src="images/background6.jpg" alt="guitar" height="270px"></a>
							<a href="/article.php?id=4"><img id="image" src="images/background10.jpg" alt="guitar" height="270px"></a>
						</div>
					</section>

					<div id="info">
						<div id="title_of_info">
							<font face="palatino linotype" size="5px">Some intresting for you</font><hr>
						</div>
						<div>
							<a href="/autors.php?id=AllTabs"><font face="palatino linotype" size="5px">All tabs</font></a><br>
							<a href="/autors.php?id=999999"><font face="palatino linotype" size="5px">Popular songs:</font></a>
						</div>
						<div id="autor">
								<?php
									$autor = mysqli_query($connection, "SELECT * FROM `autors` ORDER BY `views` DESC LIMIT 17");
									while( $a = mysqli_fetch_assoc($autor) )
									{	
									?>									
											<a href="/autors.php?id=<?php echo $a['id']; ?>"><font face="palatino linotype"><?php echo $a['autor']; ?></font></a><br>
									<?php
									}
								?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include "includes/footer.php";?>

	</div>
</body>
</html>
