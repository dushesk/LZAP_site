<?php 
  //include '../src/mail.php';
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>Лысьвенский завод эмалированной посуды</title>
    <meta property="og:title" content="Лысьвенский завод эмалированной посуды" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
    />
    <link rel="stylesheet" href="./css/style.css" />
    <link href="./css/index.css" rel="stylesheet" />
    <script src="js/scroll.js"></script>
    <script src="js/index_form.js"></script>
  </head>
  <body>
    <div>
      <div class="home-container">
        <div class="home-navbar" id="home-navbar">
          <header data-role="Header" class="home-header max-width-container">
            <div class="home-navbar1">
              <span class="home-logo-center navbar-logo-title">
                <span class="home-text">Лысьвенский завод<br><br>эмалированной посуды</span>
              </span>
              <div class="home-middle">
                <div class="home-right">
                  <a class="navbar-link" href="#about">О нас</a>
                  <a class="navbar-link" href="#products">Продукция</a>
                  <a class="navbar-link" href="#contacts">Сотрудничество</a>
                  <a class="navbar-link" href="#contacts">Контакты</a>
                </div>
              </div>
              <div class="home-icons">
                <a href="pages/login_page.php">
                    <img
                    alt="AccountCircle3271301"
                    src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0nMjQnIGhlaWdodD0nMjQnIHZpZXdCb3g9JzAgMCAyNCAyNCcgZmlsbD0nbm9uZScgeG1sbnM9J2h0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnJz4KPHBhdGggZD0nTTEyIDJDNi40OCAyIDIgNi40OCAyIDEyQzIgMTcuNTIgNi40OCAyMiAxMiAyMkMxNy41MiAyMiAyMiAxNy41MiAyMiAxMkMyMiA2LjQ4IDE3LjUyIDIgMTIgMlpNMTIgNUMxMy42NiA1IDE1IDYuMzQgMTUgOEMxNSA5LjY2IDEzLjY2IDExIDEyIDExQzEwLjM0IDExIDkgOS42NiA5IDhDOSA2LjM0IDEwLjM0IDUgMTIgNVpNMTIgMTkuMkM5LjUgMTkuMiA3LjI5IDE3LjkyIDYgMTUuOThDNi4wMyAxMy45OSAxMCAxMi45IDEyIDEyLjlDMTMuOTkgMTIuOSAxNy45NyAxMy45OSAxOCAxNS45OEMxNi43MSAxNy45MiAxNC41IDE5LjIgMTIgMTkuMlonIGZpbGw9JyMxNjE2MTYnLz4KPC9zdmc+Cg=="
                    class="home-image"
                    />
                </a>
              </div>
            </div>
            <div data-role="BurgerMenu" class="home-burger-menu">
              <svg viewBox="0 0 1024 1024" class="home-icon">
                <path
                  d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"
                ></path>
              </svg>
            </div>
            <div data-role="MobileMenu" class="home-mobile-menu">
              <div class="home-nav">
                <div class="home-middle1">
                  <span class="home-text08">О нас</span>
                  <span class="home-text09">Продукция</span>
                  <span class="home-text10">Сотрудничество</span>
                  <span class="home-text11">Магазины</span>
                  <span class="home-text12">Вакансии</span>
                  <span class="home-text13">Контакты</span>
                </div>
              </div>
              <div>
                <svg viewBox="0 0 950.8571428571428 1024" class="home-icon04">
                  <path
                    d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"
                  ></path></svg>
                <svg viewBox="0 0 877.7142857142857 1024" class="home-icon06">
                  <path
                    d="M585.143 512c0-80.571-65.714-146.286-146.286-146.286s-146.286 65.714-146.286 146.286 65.714 146.286 146.286 146.286 146.286-65.714 146.286-146.286zM664 512c0 124.571-100.571 225.143-225.143 225.143s-225.143-100.571-225.143-225.143 100.571-225.143 225.143-225.143 225.143 100.571 225.143 225.143zM725.714 277.714c0 29.143-23.429 52.571-52.571 52.571s-52.571-23.429-52.571-52.571 23.429-52.571 52.571-52.571 52.571 23.429 52.571 52.571zM438.857 152c-64 0-201.143-5.143-258.857 17.714-20 8-34.857 17.714-50.286 33.143s-25.143 30.286-33.143 50.286c-22.857 57.714-17.714 194.857-17.714 258.857s-5.143 201.143 17.714 258.857c8 20 17.714 34.857 33.143 50.286s30.286 25.143 50.286 33.143c57.714 22.857 194.857 17.714 258.857 17.714s201.143 5.143 258.857-17.714c20-8 34.857-17.714 50.286-33.143s25.143-30.286 33.143-50.286c22.857-57.714 17.714-194.857 17.714-258.857s5.143-201.143-17.714-258.857c-8-20-17.714-34.857-33.143-50.286s-30.286-25.143-50.286-33.143c-57.714-22.857-194.857-17.714-258.857-17.714zM877.714 512c0 60.571 0.571 120.571-2.857 181.143-3.429 70.286-19.429 132.571-70.857 184s-113.714 67.429-184 70.857c-60.571 3.429-120.571 2.857-181.143 2.857s-120.571 0.571-181.143-2.857c-70.286-3.429-132.571-19.429-184-70.857s-67.429-113.714-70.857-184c-3.429-60.571-2.857-120.571-2.857-181.143s-0.571-120.571 2.857-181.143c3.429-70.286 19.429-132.571 70.857-184s113.714-67.429 184-70.857c60.571-3.429 120.571-2.857 181.143-2.857s120.571-0.571 181.143 2.857c70.286 3.429 132.571 19.429 184 70.857s67.429 113.714 70.857 184c3.429 60.571 2.857 120.571 2.857 181.143z"
                  ></path></svg>
                <svg viewBox="0 0 602.2582857142856 1024" class="home-icon08">
                  <path
                    d="M548 6.857v150.857h-89.714c-70.286 0-83.429 33.714-83.429 82.286v108h167.429l-22.286 169.143h-145.143v433.714h-174.857v-433.714h-145.714v-169.143h145.714v-124.571c0-144.571 88.571-223.429 217.714-223.429 61.714 0 114.857 4.571 130.286 6.857z"
                  ></path>
                </svg>
              </div>
            </div>
          </header>
        </div>
        <div class="dark_background" id="sub_form_wrap" style="display: none" onclick="close_form()">
          <div class="container wrap_form" onclick="stopPropagation(event)">
            <form action="../src/mail.php" method="post">
              <h2>Подписка на новости</h2>
              <div class="input-group">
                <label for="mail">Почта</label>
                <input type="mail" id="mail" name="mail" required>
              </div>
              <div class="wrap_checkbox">
                <input type="checkbox" id="checkbox" name="checkbox" required>
                <label for="checkbox">С правилами ознакомлен</label>
              </div>
              <button class="button" type="submit">Подписаться</button>
            </form>
          </div>
        </div>
        <div class="home-main">
          <div class="home-hero section-container">
            <div class="home-max-width max-width-container">
              <div class="home-hero1">
                <div class="home-container03">
                  <div class="home-info">
                    <img
                      alt="Rectangle43271305"
                      src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0nMicgaGVpZ2h0PSc1Micgdmlld0JveD0nMCAwIDIgNTInIGZpbGw9J25vbmUnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc+CjxyZWN0IHdpZHRoPScyJyBoZWlnaHQ9JzUyJyBmaWxsPSdibGFjaycgZmlsbC1vcGFjaXR5PScwLjUnLz4KPC9zdmc+Cg=="
                      class="home-image1"
                    />
                    <span class="home-text14">
                      легендарный российский производитель стальной
                      эмалированной посуды
                    </span>
                  </div>
                  <h1 class="home-text15">
                    ЛЫСЬВЕНСКИЙ ЗАВОД ЭМАЛИРОВАННОЙ ПОСУДЫ
                  </h1>
                  <div class="home-container04"></div>
                  <div class="home-btn-group">
                    <button name="subscribe" class="button" onclick="show_sub_form()">Подписаться</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section-container column" id="products">
            <div class="max-width-container">
              <div class="section-heading-section-heading">
                <h1 class="section-heading-text Heading-2">
                    НАША ПРОДУКЦИЯ
                </h1>
                <span class="section-heading-text1">
                  <span>Украсит вашу кухню и не только</span>
                </span>
              </div>
              <div class="home-cards-container">
                <div class="category-card-category-card category-card-root-class-name">
                  <img alt="image"
                    src="https://optim.tildacdn.com/tild3236-3337-4433-a236-646331636530/-/cover/432x432/center/center/-/format/webp/IMG_8324.jpg"
                    class="category-card-image"/>
                  <span class="category-card-text">
                    <span>ТМ Лысьвенские Эмали</span>
                  </span>
                </div>
                <div class="category-card-category-card">
                  <img
                    alt="image"
                    src="https://optim.tildacdn.com/tild3466-6535-4233-a633-636439666333/-/cover/432x432/center/center/-/format/webp/_v4.png"
                    class="category-card-image"
                  />
                  <span class="category-card-text"><span>ТМ Elros</span></span>
                </div>
                <div class="category-card-category-card">
                  <img
                    alt="image"
                    src="https://optim.tildacdn.com/tild6537-3336-4839-a431-383464666134/-/cover/432x432/center/center/-/format/webp/IMG_4219_.jpg"
                    class="category-card-image"
                  />
                  <span class="category-card-text">
                    <span>ТМ Olkusz-Lysva</span>
                  </span>
                </div>
              </div>
            </div>
            <div class="home-banner" id="about">
              <div class="home-container05">
                <h3 class="home-text16 Heading-3">ЛЗЭП</h3>
              </div>
            </div>
            <div class="home-container06 max-width-container">
              <div class="home-container07">
                <span class="home-text17">
                  <span>
                    АО Лысьвенский завод эмалированной посуды — современное
                    производственное предприятие, входящее в состав ООО
                    «Промышленная группа «ЛИНРОГ». За всю историю существования
                    завод накопил богатый опыт и компетенции в области
                    изготовления посуды и товаров народного потребления.
                  </span>
                  <br />
                  <span>
                    На сегодняшний день ассортиментный ряд АО «ЛЗЭП» состоит из
                    широкого спектра продукции: посуда стальная эмалированная,
                    фурнитура пластмассовая, мойка стальная эмалированная.
                  </span>
                </span>
                <img
                  alt="M3271427"
                  src="https://optim.tildacdn.com/tild3031-3166-4331-a437-666135303363/-/resize/156x/-/format/webp/____.png"
                  loading="eager"
                  class="home-svg"
                />
                <button class="button">Подробнее о нас</button>
              </div>
            </div>
          </div>
          <div class="home-full-width-banner section-container">
            <div class="home-left1">
              <div class="home-content">
                <span class="home-text21">ИСТОРИЯ КОМПАНИИ</span>
                <span class="home-text22">
                  На сегодняшний день промышленная группа "Линрог" - это 9
                  производственных и торговых предприятий под управлением
                  головного предприятия ООО ПГ "Линрог"&nbsp;
                </span>
              </div>
            </div>
            <img alt="Rectangle13271410"
              src="https://optim.tildacdn.com/tild3061-3665-4731-a362-333636643639/-/format/webp/__v15.png"
              class="home-image2"/>
          </div>
          <div class="section-container" id="news">
            <div class="max-width-container">
              <div class="section-heading-section-heading section-heading-root-class-name">
                <h1 class="section-heading-text Heading-2">
                    НОВОСТИ КОМПАНИИ
                </h1>
                <span class="section-heading-text1">
                    Подробнее о нашей деятельности
                </span>
              </div>
              <div class="home-container08">
                <div class="blog-post-card-blog-post-card blog-post-card-root-class-name">
                  <img alt="image"
                    src="https://optim.tildacdn.com/tild3863-3631-4166-b639-643838663464/-/resize/480x360/-/format/webp/_2024_spring_crop.png"
                    class="blog-post-card-image"/>
                  <div class="blog-post-card-container">
                    <span class="blog-post-card-text">
                        УЧАСТИЕ В NON-FOOD ASIA EXPO 2024
                    </span>
                    <span class="blog-post-card-text1">
                      13.05.2024
                    </span>
                    <a
                      href=""
                      target="_blank"
                      rel="noreferrer noopener"
                      class="blog-post-card-link button"
                    >
                      Перейти
                    </a>
                  </div>
                </div>
                <div class="blog-post-card-blog-post-card">
                  <img
                    alt="image"
                    src="https://optim.tildacdn.com/tild3363-3839-4466-b232-363639306664/-/resize/480x360/-/format/webp/__.png"
                    class="blog-post-card-image"
                  />
                  <div class="blog-post-card-container">
                    <span class="blog-post-card-text">
                        Новая коллекция "Земляника лесная" ТМ⠀"Лысьвенские
                        эмали"
                    </span>
                    <span class="blog-post-card-text1">
                        12.04.2024
                    </span>
                    <a
                      href=""
                      target="_blank"
                      rel="noreferrer noopener"
                      class="blog-post-card-link button"
                    >
                        Перейти
                    </a>
                  </div>
                </div>
                <div class="blog-post-card-blog-post-card">
                  <img
                    alt="image"
                    src="https://optim.tildacdn.com/tild6331-3331-4965-b935-326536323039/-/resize/480x360/-/format/webp/1.png"
                    class="blog-post-card-image"
                  />
                  <div class="blog-post-card-container">
                    <span class="blog-post-card-text">
                        Изделия из коллекций "White dots" и "Harvest" наградили
                        номинацией "100 лучших товаров России"
                    </span>
                    <span class="blog-post-card-text1">
                      28.12.2023
                    </span>
                    <a
                      href=""
                      target="_blank"
                      rel="noreferrer noopener"
                      class="blog-post-card-link button"
                    >
                        Перейти
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="home-footer" id="contacts">
          <div class="home-wrap-footer max-width-container">
            <div class="home-container09">
              <h3 class="home-text23">
                <span>Лысьвенский завод<br>эмалированной посуды</span>
              </h3>
              <div class="home-links-container">
                <div class="home-container10">
                  <span class="navbar-link home-text27"><a href="#about">О нас</a></span>
                </div>
                <div class="home-container11">
                  <span class="navbar-link home-text27"><a href="#products">Продукция</a></span>
                </div>
                <div class="home-container12">
                  <span class="navbar-link home-text27"><a href="#news">Новости</a></span>
                </div>
              </div>
            </div>
            <div class="home-footer1">
                <img alt="logo"
                    src="https://optim.tildacdn.com/tild3031-3166-4331-a437-666135303363/-/resize/156x/-/format/webp/____.png"
                    loading="eager"/>
                <div class="home-container13">
                    <span class="home-text30">
                    Россия, Пермский край, г. Лысьва, ул. Металлистов 1/20
                    строение 5
                    </span>
                    <span class="home-text31">+7 34249 30624</span>
                    <span class="home-text32">info@lpec.ru</span>
                </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>
