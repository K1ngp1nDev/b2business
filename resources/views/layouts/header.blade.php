<header class="header fixed-top">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar input-group align-items-center">
                    <a href="/" class="handle_margin_nav">
                        <img src="{{ asset('img/New-business-logo-UA.svg') }}" alt="logo" class='logo'>
                    </a>

                    <form class="form-inline" action="{{ route('offers') }}" method="get">

                    <div class="search-input-field--wrapper">
                        <input type="text"class="form-control input-search d-none d-lg-flex search-input-field"
                               name="search" placeholder="Пошук" id="search-input-field"><span id="clear-search-btn">×</span>
                    </div>

                        <div class="d-none d-lg-flex">
                            <select class="custom-select " id="e1">
                                <option></option>
                                <option value="Kyiv" class="dropdown-item">АР Крим</option>
                                <option value="Kyiv" class="dropdown-item">Вінницька область</option>
                                <option value="Kyiv" class="dropdown-item">Волинська область</option>
                                <option value="Kyiv" class="dropdown-item">Дніпропетровська область</option>
                                <option value="Kyiv" class="dropdown-item">Донецька область</option>
                                <option value="Kyiv" class="dropdown-item">Житомирська область</option>
                                <option value="Kyiv" class="dropdown-item">Закарпатська область</option>
                                <option value="Kyiv" class="dropdown-item">Запорізька область</option>
                                <option value="Kyiv" class="dropdown-item">Івано-Франківська область</option>
                                <option value="Kyiv" class="dropdown-item">Київська область</option>
                                <option value="Kyiv" class="dropdown-item">Кіровоградська область</option>
                                <option value="Kyiv" class="dropdown-item">Луганська область</option>
                                <option value="Lviv" class="dropdown-item">Львівська область</option>
                                <option value="Lviv" class="dropdown-item">Миколаївська область</option>
                                <option value="Lviv" class="dropdown-item">Одеська область</option>
                                <option value="Lviv" class="dropdown-item">Полтавська область</option>
                                <option value="Lviv" class="dropdown-item">Рівненська область</option>
                                <option value="Lviv" class="dropdown-item">Сумська область</option>
                                <option value="Lviv" class="dropdown-item">Тернопільська область</option>
                                <option value="Lviv" class="dropdown-item">Харківська область</option>
                                <option value="Kherson" class="dropdown-item">Херсонська область</option>
                                <option value="Kherson" class="dropdown-item">Хмельницька область</option>
                                <option value="Kherson" class="dropdown-item">Черкаська область</option>
                                <option value="Kherson" class="dropdown-item">Чернівецька область</option>
                                <option value="Kherson" class="dropdown-item">Чернігівська область</option>
                                <option value="Kherson" class="dropdown-item">м. Київ</option>
                                <option value="Kherson" class="dropdown-item">м. Севастополь</option>
                            </select>
                        </div>
                        <div class="input-group-append handle_margin_nav  d-none d-lg-flex">
                            <button type="submit" class="btn btn-search">
                                <img src="{{ asset('img/loopa.svg') }}">
                            </button>
                        </div>

                    </form>

                    <div class="header-right-panel">
                        <!-- Authentication Links -->
                        @guest

                            <a type="button" class="btn btn-login handle_margin_nav handle_padding_btn"
                               href="{{ route('login') }}">{{ __('Вхід') }}
                            </a>

                            @if (Route::has('register'))

                            @endif
                        @else
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <button class="navbar-dark navbar-toggler navbar-light burger">
                                        <i class="fas fa-user-circle profile-logo"></i>

                                    </button>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/company/profile">Моя компанія</a>
                                    <a class="dropdown-item"href="#">Профіль</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="btn btn-link dropdown-item">Вийти</button>
                                    </form>
                                </div>
                            </div>

                            <div class="nav-item">
                                <a href="/offer/add"
                                   data-tooltip="Додати оголошення"
                                   id="publish_new_offer"
                                   class="nav-link publish_new_offer">
                                    <button class="navbar-dark navbar-toggler navbar-light burger">
                                        <span></span>
                                        <span></span>
                                    </button>
                                </a>
                            </div>
                        @endguest
                        <div class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle"  href="#" id="navbardrop" data-toggle="dropdown">
                                {{--                                      <button class="navbar-dark navbar-toggler burger">--}}
                                {{--                                          <span class="navbar-toggler-icon"></span>--}}
                                {{--                                          <i class="fas fa-bars fa-2x"></i>--}}
                                {{--                                      </button>--}}
                                <div id="header-nav-burger-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>

                            <div class="dropdown-menu">
                                <p><a href="#"class="dropdown-item">Покупцям</a></p>
                                <p><a href="#"class="dropdown-item">Продавцам</a></p>
                                <p><a href="#"class="dropdown-item">Про нас</a></p>
                                <a href="#"class="dropdown-item">Контакти</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
