<div class="p-3 bg-light" id="aside-bar">
    <a href="home.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
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
                <a href="home.php?type=_my_messages" id='recommend_stetia' class="nav-link link-dark">
<?php
            $have_no_reads = false;
            if(isset($mensajes_usuario) && (count($mensajes_usuario)) != 0){
                foreach($mensajes_usuario as $mensaje){
                    if($mensaje->getLeido() == 0){
                        $have_no_reads = true;
                    }
                }
                if($have_no_reads){
                   echo '<i class="fa-solid fa-envelope fa-beat" style="color: #831959;"></i>'; 
                }else{
                   echo '<i class="fa-solid fa-envelope" style="color: #831959;"></i>'; 
                } 
            }else{
                echo '<i class="fa-solid fa-envelope" style="color: #831959;"></i>';
            }
?>
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

            <li> 
                <a href="home.php?type=_status_chatbot" id='status_chatbot_main' class="nav-link link-dark">
                <i class="fa-solid fa-robot"style="color: #831959; width: 18px; height: 18px;"></i>
                <use xlink:href="#grid"></use>
                </svg>Status Chatbot</a>
            </li>
        </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?php echo $_SESSION['user_log']->getImg() !== null ? $_SESSION['user_log']->getImg() : 'img/background/home_user.png'; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Mas opciones</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="exit.php">Salir</a></li>
      </ul>
    </div>

</div>
