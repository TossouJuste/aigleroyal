<header class="header-section header-section-two header-section-three">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-xl p-0">
                    <a class="site-logo site-title" href="/acceuil">
                            <div class="log">
                                <span class="montserrat">AIGLE</span> 
                                <span class="montserrat" style="color:red;">ROYAL</span> 
                                <br>
                                <span class="bebas-neue" style="color:red;">BOXING</span> 
                                CLUB
                            </div>
                    </a>

                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu">
                                    <li class="menu_has_children">
                                        <a href="{{ route('acceuil') }}">ACCEUIL</a> 
                                    </li>  

                                 <li class="menu_has_children">
                                            <a href="{{ route('training') }}">LA BOXE</a>
                                            <ul class="sub-menu"> 
                                                <li><a href="{{ route('boxe-ama') }}">BOXE AMATEUR</a></li>
                                                <li><a href="{{ route('boxe-pro') }}">BOXE PROFESSIONNELLE</a></li>
                                                <li><a href="{{ route('boxe-edu') }}">BOXE EDUCATIVE</a></li>
                                            </ul>
                                        </li>
                                
                                <li class="menu_has_children">
                                            <a href="#0">LE CLUB</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('about') }}">QUI SOMMES-NOUS ?</a></li>
                                                <li><a href="{{ route('historique') }}">HISTORIQUE</a></li>
                                                <li><a href="{{ route('activite') }}">NOS ACTIVITES</a></li>
                                                <li><a href="{{ route('bureau') }}">BUREAU EXECUTIF</a></li>
                                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                                <li><a href="{{ route('apply') }}">REJOINDRE LE CLUB</a></li>    
                                                <li><a href="{{ route('gallerie') }}">GALLERIE</a></li>
                                                <li><a href="{{ route('temoignage') }}">TEMOIGNAGES</a></li>
                                                <li><a href="{{ route('contact') }}">CONTACT US</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu_has_children">
                                            <a href="#0">SE FORMER</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('apply') }}">REJOINDRE LE CLUB</a></li>
                                                <li><a href="{{ route('formateur') }}">LES FORMATEURS</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu_has_children">
                                            <a href="#0">ACTUALITÉS</a>
                                            <ul class="sub-menu"> 
                                                <li><a href="{{ route('blog') }}">ARTICLES</a></li>
                                                <li><a href="{{ route('event') }}">CALENDRIER D'ÉVÉNEMENTS</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('partenaire') }}">PARTENARIATS & DONS</a></li>
                            </ul>
                            <div class="header-right">
                                <div class="header-action-area">
                                    <div class="header-action">
                                        <a href="{{ route('contact') }}" class="btn--base">CONTACT <i class="fas fa-arrow-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
