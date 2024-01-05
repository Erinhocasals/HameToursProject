<div class="deznav">
    <div class="deznav-scroll">
        <div class="dropdown header-profile">
            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                <img src="{{ Auth::user()->profile_photo_url }}" width="20" alt="{{ Auth::user()->name }}"/>

                <div class="header-info">
                    <span class="mb-0 font-w400"><b>{{ Auth::user()->name }}</b></span>
                    <small class="text-end font-w400">{{ Auth::user()->email }}</small>
                </div>
            </a>
            <div class="dropdown-menu">
                <a href="{{ route('profile.show') }}" class="dropdown-item ai-icon">
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-dark" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span class="ms-2">{{ __('Profile') }} </span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    <button type="submit" class="dropdown-item ai-icon" onclick="event.preventDefault();alert('q'); this.closest('form').submit();">
                        @csrf

                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-dark" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span class="ms-2">{{ __('Log Out') }} </span>
                    </button>
                </form>
            </div>
        </div>
        <ul class="metismenu" id="menu">
            <li><a class="ai-icon" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            @hasanyrole('super-admin|admin|editor')
                <li>
                    <a class="ai-icon" href="{{ route('admin.categories.index', ['type' => 1]) }}" aria-expanded="false">
                        <i class="fa fa-globe not-italic"></i>
                        <span class="nav-text">Regiones</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.categories.index', ['type' => 2]) }}" aria-expanded="false">
                        <i class="fab fa-uikit not-italic"></i>
                        <span class="nav-text">Definiciones</span>
                    </a>
                </li>
            @endhasanyrole
            @hasanyrole('super-admin|admin|editor|agency')
                <li>
                    <a class="ai-icon" href="{{ route('admin.categories.index', ['type' => 3]) }}" aria-expanded="false">
                        <i class="fab fa-teamspeak not-italic"></i>
                        <span class="nav-text">Agencias</span>
                    </a>
                </li>
            @endhasanyrole
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-cube not-italic"></i>
                    <span class="nav-text">Productos</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="{{ route('admin.entity-categories.index') }}">Categorías</a></li>
                    <li><a href="{{ route('admin.entities.index') }}">Productos</a></li>
                    @hasanyrole('super-admin|admin')
                    <li><a href="{{ route('admin.entity-experiences.index') }}">Experiencias</a></li>
                    @endhasanyrole
                </ul>
            </li>
            <li>
                <a class="ai-icon" href="{{ route('admin.package.index') }}" aria-expanded="false">
                    <i class="fa fa-cubes"></i>
                    <span class="nav-text">Paquetes</span>
                </a>
            </li>
            @hasanyrole('super-admin')
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fab fa-buffer not-italic"></i>
                        <span class="nav-text">Elementos</span>
                    </a>
                    <ul aria-expanded="false" class="mm-collapse">
                        <li><a href="{{ route('admin.intros.index') }}">Intros</a></li>
                        <li><a href="{{ route('admin.showcases.index') }}">Showcases</a></li>
                        <li><a href="{{ route('admin.prices.index') }}">Precios</a></li>
                        <li><a href="{{ route('admin.texts.index') }}">Textos Adicionales</a></li>
                        <li><a href="{{ route('admin.images.index') }}">Imágenes</a></li>
                    </ul>
                </li>
            @endhasanyrole
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-filter not-italic"></i>
                    <span class="nav-text">Filtros</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="{{ route('admin.filter-categories.index') }}">Categorías</a></li>
                    <li><a href="{{ route('admin.filters.index') }}">Filtros</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-receipt"></i>
                    <span class="nav-text">Reservaciones</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="{{ route('admin.reservations.index') }}">Reservaciones</a></li>
                    <li><a href="{{ route('admin.status.index') }}">Estados</a></li>
                </ul>
            </li>
            @hasanyrole('super-admin|admin')
                <li>
                    <a class="ai-icon" href="{{ route('admin.kyc.index') }}" aria-expanded="false">
                        <i class="fa fa-address-card"></i>
                        <span class="nav-text">KYC</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.transaction.index') }}" aria-expanded="false">
                        <i class="fa fa-code-branch"></i>
                        <span class="nav-text">Transacciones</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.beneficiary.index') }}" aria-expanded="false">
                        <i class="fa fa-group"></i>
                        <span class="nav-text">Beneficiarios</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.menu.index') }}" aria-expanded="false">
                        <i class="flaticon-043-menu"></i>
                        <span class="nav-text">Menús</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.slide.index') }}" aria-expanded="false">
                        <i class="fa fa-audio-description"></i>
                        <span class="nav-text">Slideshows</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.infos.index') }}" aria-expanded="false">
                        <i class="fa fa-info-circle"></i>
                        <span class="nav-text">Informaciones</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.blog.index') }}" aria-expanded="false">
                        <i class="fa fa-newspaper"></i>
                        <span class="nav-text">Blog</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.socials.index') }}" aria-expanded="false">
                        <i class="fa fa-share-alt"></i>
                        <span class="nav-text">Redes Sociales</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.log.index') }}" aria-expanded="false">
                        <i class="fa fa-eye-slash"></i>
                        <span class="nav-text">Logs</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.contact.index') }}" aria-expanded="false">
                        <i class="fa fa-address-book"></i>
                        <span class="nav-text">Contactos</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.templates.index') }}" aria-expanded="false">
                        <i class="fab fa-alipay not-italic"></i>
                        <span class="nav-text">Plantilla</span>
                    </a>
                </li>
                <li>
                    <a class="ai-icon" href="{{ route('admin.data.index') }}" aria-expanded="false">
                        <i class="fa fa-cogs"></i>
                        <span class="nav-text">Configuración</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-users not-italic"></i>
                        <span class="nav-text">Usuarios</span>
                    </a>
                    <ul aria-expanded="false" class="mm-collapse">
                        <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                        <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                        @hasrole('super-admin')
                        <li><a href="{{ route('admin.permission.index') }}">Permisos</a></li>
                        @endhasrole
                    </ul>
                </li>
            @endhasanyrole
        </ul>
        <div class="copyright">
            <p><strong>HameTours Dashboard</strong> <br> © 2021 Todos los derechos reservados</p>
            <p class="fs-12 mt-1">Hecho con <span class="heart"></span> por <a class="text-primary" href="https://desafiocreativo.com">Desafío Creativo</a></p>
        </div>
    </div>
</div>
