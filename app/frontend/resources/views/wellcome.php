    <!-- section header close -->
    <section class="hero-area bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="block">
                        <h1 class="wow fadeInDown" data-wow-delay="0.3s" data-wow-duration=".2s">WELLCOME TO CALCULATOR APP</h1>
                        <p class="wow fadeInDown" data-wow-delay="0.5s" data-wow-duration=".5s">Realice cálculos matemáticos en línea mientras gestiona, liquida y administra la nómina de sus empleados. By David'Soft.</p>
                        <div class="wow fadeInDown" data-wow-delay="0.7s" data-wow-duration=".7s">
                            <a class="btn btn-home" role="button" href="#calculator">Iniciar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 wow zoomIn">
                    <div class="block">
                        <div class="counter text-center">
                            <ul id="countdown_dashboard">
                                <li>
                                    <div class="dash days_dash">
                                        <!-- <div class="digit">0</div> -->
                                        <div class="digit">0</div>
                                        <div class="digit">6</div>
                                        <span class="dash_title">Days</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dash hours_dash">
                                        <div class="digit">1</div>
                                        <div class="digit">3</div>
                                        <span class="dash_title">Hours</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dash minutes_dash">
                                        <div class="digit">2</div>
                                        <div class="digit">3</div>
                                        <span class="dash_title">Minutes</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dash seconds_dash">
                                        <div class="digit">4</div>
                                        <div class="digit">8</div>
                                        <span class="dash_title">Seconds</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section>
    <!-- section header close -->

    <!-- About start==================== -->
    <section class="section about bg-gray" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 wow fadeInLeft">
                    <div class="content">
                        <div class="sub-heading">
                            <h3>Descarga tus tareas en diferentes formatos</h3>
                        </div>
                        <p>Te permitira generar reportes de tus actividades diarias almacenarlas en tu movil o Latop</p>
                        <p>
                            Svg or Pdf
                        </p>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="about-slider">
                        <img src="<?= PUBLIC_RESOURCES ?>images/about/1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #about close -->

    <!-- Calculator start ==================== -->
    <section id="calculator" class="section contact">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="block">
                        <div class="heading wow fadeInUp">
                            <h2>Calculadora</h2>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="calculator-container">
                        <div class="calculator">
                            <input type="text" id="display" readonly>
                            <br> <!-- Añadir un salto de línea para separar el campo de entrada de los botones -->
                            <button onclick="addToDisplay('7')" id="siete">7</button>
                            <button onclick="addToDisplay('8')" id="ocho">8</button>
                            <button onclick="addToDisplay('9')" id="nueve">9</button>
                            <button disabled="disabled" onclick="addToDisplay('+')" id="suma">+</button>
                            <br>
                            <button onclick="addToDisplay('4')" id="cuatro">4</button>
                            <button onclick="addToDisplay('5')" id="cinco">5</button>
                            <button onclick="addToDisplay('6')" id="seis">6</button>
                            <button disabled="disabled" onclick="addToDisplay('-')" id="menos">-</button>
                            <br>
                            <button onclick="addToDisplay('1')" id="uno">1</button>
                            <button onclick="addToDisplay('2')" id="dos">2</button>
                            <button onclick="addToDisplay('3')" id="tres">3</button>
                            <button disabled="disabled" onclick="addToDisplay('*')" id="multiplicacion">*</button>
                            <br>
                            <button onclick="addToDisplay('0')" id="cero">0</button>
                            <button onclick="addToDisplay('.')" id="punto">.</button>

                            <button onclick="clearDisplay()" id="clear">C</button>
                            <button disabled="disabled" onclick="addToDisplay('/')" id="division">/</button>
                            <br>
                            <button disabled="disabled" class="equal-button" onclick="calculate()" id="calculate">=</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #Calculator close -->

    <!-- Service start ==================== -->
    <section id="service" class="service section">
        <div class="container">
            <div class="row">
                <div class="heading wow fadeInUp">
                    <h2>Soluciones Informaticas</h2>
                    <p>Ciclo de vida del Software, Desarrollo Agil Scrum, Seguridad Informatica y Redes, Testing</p>
                </div>
                <div class="col-sm-6 col-md-3 wow fadeInLeft">
                    <div class="block">
                        <img class="tf-strategy" style="width: 100px;" src="<?= PUBLIC_RESOURCES ?>/images/services/responsive_desing.svg" alt="Responsive Desing">
                        <h3>Responsive Desing</h3>
                        <p>Desarrollo de aplicaciones web Responsivas y adaptables de diferentes dispositivos</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="block">
                        <img class="tf-circle-compass" style="width: 100px;" src="<?= PUBLIC_RESOURCES ?>/images/services/mantenaince.svg" alt="Optimizacion y Mantenimiento">
                        <h3>Optimizacion y mantenimiento</h3>
                        <p>mantenimiento de aplicaciones Webs y Moviles, Refactorizacion de codigo</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                    <div class="block">
                        <img class="tf-circle-compass" style="width: 100px;" src="<?= PUBLIC_RESOURCES ?>/images/services/framework_backend.svg" alt="Framework Backend">
                        <h3>Frameworks Backend</h3>
                        <p>Uso de diferetes frameworks Laravel, Symphony, Zend, Express js, .Net </br> Postgress SQL, Oracle, SQL Server, MongoDB, MySql </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.9s">
                    <div class="block">
                        <img class="tf-circle-compass" style="width: 100px;" src="<?= PUBLIC_RESOURCES ?>/images/services/framework_frontend.svg" alt="Framework Frontend">
                        <h3>Framewors Frontend</h3>
                        <p>Vue js, React, Next js, Angular, Bootstrap, Tailwind</p>
                    </div>
                </div>

            </div>
        </div><!-- .container close -->
    </section>
    <!-- #service close -->

    <!-- Subscribe start ==================== -->
    <section class="call-to-action section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow text-center">
                    <div class="block">
                        <h2>Suscribete</h2>
                        <p>Recibe actualizaciones, noticias y mas</p>
                        <div class="col-lg-6 offset-lg-3">
                            <div class="input-group" style="justify-content: center;">
                                <input type="text" class="form-control" placeholder="Email" id="input_suscription">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-subscription" type="button" id="suscription">Subscribir</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #Subscribe close -->

    <!-- Contact start ==================== -->
    <section id="contact" class="section contact">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="block">
                        <div class="heading wow fadeInUp">
                            <h2>Contactanos</h2>
                            <p>Servicio de asesorias, contamos con una amplia variedad y manejo de diferentes tecnologias para Innovar tu negocio <br> Siempre a la banguardia y a tu servicio</p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="form-group">
                        <form action="#" method="post" id="contact-form">
                            <div class="input-field">
                                <input type="text" class="form-control" placeholder="Nombre" name="name">
                            </div>
                            <div class="input-field">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="input-field">
                                <textarea class="form-control" placeholder="Contacto" rows="3" name="message"></textarea>
                            </div>
                            <button class="btn btn-send" type="submit">Enviar</button>
                        </form>

                        <div id="success">
                            <p>Your Message was sent successfully</p>
                        </div>
                        <div id="error">
                            <p>Your Message was not sent successfully</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #Contact close -->

    <section clas="wow fadeInUp">
        <div class="map-wrapper">
        </div>
    </section>