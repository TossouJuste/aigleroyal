<div class="left-side-bar">					
		<div class="brand-logo">
			<a href="/admin"> 
				<h4 class="light-logo" style="color:white;text-align:center;"> AIGLE ROYAL <br> BOXING CLUB</h4> 
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
                    <li>
						<a href="/admin" class="dropdown-toggle no-arrow">
							<span class="micon  dw dw-home"></span><span class="mtext">TABLEAU DE BORD</span>
						</a>
					</li>  
					<li>
						<a href="/admin/contact" class="dropdown-toggle no-arrow">
							<span class="micon  dw dw-home"></span><span class="mtext">CONTACT</span>
						</a>
					</li>
					<li>
						<a href="/admin" class="dropdown-toggle no-arrow">
							<span class="micon  dw dw-home"></span><span class="mtext">RENDEZ-VOUS</span>
						</a>
					</li> 
					<li>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-analytics-3"></span><span class="mtext">GALLERIE</span>
						</a>
						<ul class="submenu">
							<li><a href="/admin/galleries/">NOTRE GALLERIE</a></li>
							<li><a href="/admin/galleries/create">AJOUTER AU GALLERIE</a></li> 
						</ul>
					</li> 
					<li>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-browser1"></span><span class="mtext">CALENDRIER</span>
						
						</a>
						<ul class="submenu"> 
							<li><a href="/admin/events/">LES EVENEMENTS</a></li>
							<li><a href="/admin/events/create">NOUVEL EVENEMENT</a></li> 
						</ul>
					</li> 

					<li>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-analytics-3"></span><span class="mtext">PARTENAIRES</span>
						</a>
						<ul class="submenu">
							<li><a href="2realisation.php">NOS PARTENAIRES</a></li>
							<li><a href="2ajoutrealisation.php">NOUVEAU PARTENAIRE</a></li> 
						</ul>
					</li> 

					<li>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-analytics-3"></span><span class="mtext">FAQ</span>
						</a>
						<ul class="submenu">
							<li><a href="2realisation.php">LES FAQ</a></li>
							<li><a href="2ajoutrealisation.php">NOUVEAU FAQ</a></li> 
						</ul>
					</li> 
					
					<li>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-browser1"></span><span class="mtext">ACTUALITÉS</span>
						
						</a>
						<ul class="submenu">
							<li><a href="3blog.php">CATÉGORIE</a></li>
							<li><a href="3blog.php">LES ACTUALITÉS</a></li>
							<li><a href="3ajoutblog.php">NOUVELLE ACTUALITÉS</a></li> 
						</ul>
					</li> 

					
                    <li>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> 
    					<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        					<i class="dw dw-logout"></i> Se déconnecter
    					</a>
						</div> 
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">					
    						@csrf
						</form>

					</li> 
				</ul>
			</div>
		</div>
	</div>