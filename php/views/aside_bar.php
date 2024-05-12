<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" id="aside-bar" style="width: 280px;">
    <a href="/es/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <use xlink:href="#bootstrap"></use>
        </svg> <span class="fs-4 text-center">Hola  <?php if($_SESSION['user_log']->getNombre() != ''){ echo $_SESSION['user_log']->getNombre(); }else{ echo("**Pendiente**");} ?></span> 
    </a>
    <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item"> 
                <a href="home.php?type=_personal_corner" class="nav-link link-dark" aria-current="page">
                    <i class="fa-solid fa-user-pen" style="color: #831959; width: 18px; height: 18px;"></i>
                    <use xlink:href="#home"></use>
                    </svg>Datos Personales</a> 
            </li>
            <li class="nav-item"> 
                <a href="home.php?type=_mis_tratamientos" class="nav-link link-dark">
                <i class="fa-solid fa-wand-magic-sparkles" style="color: #831959; width: 18px; height: 18px;"></i>
                <use xlink:href="#speedometer2"></use>
                </svg>Mis Tratamientos</a> 
            </li>
            <li> 
                <a href="home.php?type=_mis_puntos" class="nav-link link-dark">
                <i class="fa-solid fa-ranking-star" style="color: #831959; width: 18px; height: 18px;"></i>
                <use xlink:href="#table"></use>
                </svg>Programa de puntos</a> 
            </li>
            <li> 
                <a href="#" id='recommend_stetia' class="nav-link link-dark">
                <i class="fa-solid fa-comment" style="color: #831959; width: 18px; height: 18px;"></i>
                <use xlink:href="#grid"></use>
                </svg>Recomendar Stetia</a> 
            </li>
            <li> 
                <a href="#" id='recommend_stetia' class="nav-link link-dark">
                <i class="fa-solid fa-envelope" style="color: #831959;"></i>
                <use xlink:href="#grid"></use>
                </svg>Notificaciones</a> 
            </li>
            <li> 
                <a href="home.php?type=_goods_maiteinance" id='recommend_stetia' class="nav-link link-dark">
                <i class="fa-solid fa-person-digging" style="color: #831959; width: 18px; height: 18px;"></i>
                <use xlink:href="#grid"></use>
                </svg>Mtto. de articulos</a> 
            </li>

            <li> 
                <a href="home.php?type=_users_maiteinance" id='recommend_stetia' class="nav-link link-dark">
                <i class="fa-solid fa-users" style="color: #831959; width: 18px; height: 18px;"></i>
                <use xlink:href="#grid"></use>
                </svg>Mtto. de usuarios</a> 
            </li>

            <li> 
                <a href="home.php?type=_status_global" id='recommend_stetia' class="nav-link link-dark">
                <i class="fa-solid fa-scale-balanced"style="color: #831959; width: 18px; height: 18px;"></i>
                <use xlink:href="#grid"></use>
                </svg>Status global</a> 
            </li>
        </ul>
    <hr>
    <div class="dropdown">
    <a href="/es/docs/5.2/examples/sidebars/#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> <img src="<?php if($_SESSION['user_log']->getImg() !== null){echo $_SESSION['user_log']->getImg();} else{ echo "img/background/home_user.png";}?> " alt="" class="rounded-circle me-2" width="32" height="32"> <strong>Mas opciones</strong> </a>
    <ul class="dropdown-menu text-small shadow">
    <li><a class="dropdown-item" href="/es/docs/5.2/examples/sidebars/#">Ajustes</a></li>
    <li><a class="dropdown-item" href="/es/docs/5.2/examples/sidebars/#">Perfil</a></li>
    <li>
    <hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="exit.php">desconectar</a></li>
    </ul>
    </div>
    </div>
