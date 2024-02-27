<section class="fnavbar">
		<div class="navbar-fixed">
		<nav>
		    <div class="nav-wrapper">
		      <a href="/maxiburger" class="brand-logo">MAXI BURGER</a>
		      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">Меню</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="/maxiburger" class="hvr-grow">Главная</a></li>
		        <li><a href="/maxiburger/about-mxbrgr.php" class="hvr-grow">О нас</a></li>
		        <li><a href="food-categories.php" class="hvr-grow">Меню</a></li>
		        <li><a href="foods.php" class="hvr-grow">Блюда</a></li>
		        <li><a href="#" class="hvr-grow" onclick="toggleModal('Контактые данные', 'Вы можете напрямую связаться с нами позвонив на номер 
				+7 775 445 7123.
				 Переходите на низ сайта чтобы узнать больше.');">Контакты</a></li>
		        <?php
					if (isset($_SESSION['user'])) {
		        		echo '<li><a href="#" class="hvr-grow">Привет, '.$_SESSION['user'].'</a></li>
		        		<li><a href="logout.php" class="hvr-grow">Выйти</a></li>';
		        	} else {
		        		echo '<li><a href="#" class="hvr-grow modal-trigger" data-target="modal1">Войти</a></li>
		        		<li><a href="#" class="hvr-grow modal-trigger" data-target="modal2">Регистрация</a></li>';
		        	}
		        ?>
		      </ul>
		    </div>
		  </nav>
		</div>
		<!-- Navigation bar tools and Contact us information -->
		  <ul class="sidenav" id="mobile-demo">
		    <li><a href="/maxiburger">Главная</a></li>
	        <li><a href="/maxiburger/about-mxbrgr.php">О нас</a></li>
	        <li><a href="food-categories.php">Меню</a></li>
	        <li><a href="foods.php">Блюда</a></li>
	        <li><a href="#" onclick="toggleModal('Контактные данные', 'Вы можете напрямую связаться с нами позвонив на номер +7 775 445 7123.
			 Переходите на низ сайта чтобы узнать больше.');">Контакты</a></li>

	        <?php
		        	if (isset($_SESSION['user'])) {
						/* Displaying the name of user if logges in */
		        		echo '<li><a href="#">Привет, '.$_SESSION['user'].'</a></li>
		        		<li><a href="logout.php">Выйти</a></li>';
		        	} else {
		        		echo '<li><a href="#" class="modal-trigger" data-target="modal1">Войти</a></li>
		        		<li><a href="#" class="modal-trigger" data-target="modal2">Регистрация</a></li>';
					}
		        ?>
		  </ul>
	</section>