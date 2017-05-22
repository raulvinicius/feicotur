        <section class="contato container-fluid ani-02">

            <div class="container">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <button id="fecha"></button>
                    </div>
                </div>
                <div class="row">
                    
                    <form class="js col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" action="<?php bloginfo('url')?>/envia-email" method="POST" role="form">

                        <div class="title">
                            <legend class="color-b">Deixe sua mensagem</legend>
                        </div>
                    

                        <p>Ficaremos contentes em responder qualquer dúvida, assim como receber sugestões ou aplausos para saber onde podemos melhorar e em que pontos estamos indo bem.</p>
                        <p>Fique a vontade e deixe sua mensagem.</p>

                        <div class="form-group" id="dados">
                            <div id="campo-nome" class="linha">
                                <label class="" for="input-nm">Nome</label>
                                <div id="w-input" class="required">
                                    <input type="text" class=" required color-b" id="input-nm" name="nm">
                                </div>
                            </div>
                            <div id="campo-email" class="linha">
                                <label class="" for="input-ml">E-mail</label>
                                <div id="w-input" class="required">
                                    <input type="text" class="required color-b" id="input-ml" name="ml">
                                </div>
                            </div>
                            <div id="campo-telefone" class="linha">
                                <label class="" for="input-tlfn">Telefone</label>
                                <div id="w-input">
                                    <input type="text" class="celular color-b" id="input-tlfn" name="tlfn"/>
                                </div>
                            </div>
                            <div id="campo-mensagem" class="linha">
                                <label class="" for="input-mnsg">Mensagem</label>
                                <div id="w-input" class="required">
                                    <textarea name="mnsg" id="input-mnsg" class="auto-resize required color-b"></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>    
                        </div>
                    
                        <input type="submit" class="ani-04 black" value="Enviar">

                        <div id="notificacoes">
                            
                            <div id="processando" class="ani-04">

                                <span>Enviando seu e-mail...</span>
                                <div>
                                    <img src="<?php bloginfo('template_url') ?>/img/feicotur-loading.gif" width="50">
                                </div>
                                
                            </div>

                            <div id="sucesso" class="ani-04">

                                <span><span id="green">Obrigado pelo contato.</span> Seu e-mail foi enviado, responderemos em breve.</span>
                                <button type="button" id="fecha-notificacao" class="merito-bt bg-cor-1 bg-cor-1-hover">OK</button>
                                
                            </div>

                            <div id="erro" class="ani-04">

                                <span>Houve um erro ao enviar seu e-mail, por favor, tente novamente.</span>
                                <button type="button" id="fecha-notificacao" class="merito-bt bg-cor-1 bg-cor-1-hover">OK</button>
                                
                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </section>

        <footer>

            <!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In  -->
            <svg class="recorte" version="1.1"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                 x="0px" y="0px" width="100%" height="31px" viewBox="0 0 1920 31" style="enable-background:new 0 0 505 31;"
                 xml:space="preserve" preserveAspectRatio="xMaxYMax slice">
                <defs>
                    <pattern id='image-recorte-footer' width="1" height="1" preserveAspectRatio="none">
                      <image xlink:href='<?php bloginfo('template_url') ?>/img/feicotur-bg-footer-top.jpg' x="0" y="0" width="100%" height="31" preserveAspectRatio="xMaxYMax slice"></image>
                    </pattern>
                </defs>
                <g>
                    <path fill="url(#image-recorte-footer)" d="M1920,0v41H0V31h1415l31-31H1920z"/>
                </g>
            </svg>

            <div class="col-sm-offset-1 col-sm-8">
                <ul class="parceiros">
                    <h2>Parceiros:</h2>

                    <li><a href="http://revistainfluencia.com" target="_blank">
                        <p class="parceiro-01" title="Revista Influência">Revista Influência</p>
                    </a></li>
                    <li><p class="parceiro-02" title="FACIDF">FACIDF</p></li>
                    <li><p class="parceiro-03" title="ACIS">ACIS</p></li>
                    <li><a href="http://humanostud.io" target="_blank">
                        <p class="parceiro-04" title="Humano Studio">Humano Studio</p>
                    </a></li>
                </ul>
            </div>
            
            <div class="col-sm-2">

                <div class="realizacao">
                    <h2>Realização:</h2>

                    <p title="Mérito Comunicação">Mérito Comunicação</p>
                </div>

<!--
                 <div class="coordenacao">
                    <h2>Coordenação:</h2>
                    
                    <p>FEICOTUR</p>
                </div>
 -->                    
            </div>

        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src= "<?php bloginfo("template_url") ?>/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src= "<?php bloginfo('template_url') ?>/js/bootstrap.min.js"></script>
        <script src= "<?php bloginfo('template_url') ?>/js/vendor/modernizr-2.8.3.min.js"></script>

        <script src= "<?php bloginfo('template_url') ?>/js/main.js"></script>
        <script src="<?php bloginfo('template_url') ?>/js/jquery.mask.min.js"></script>
        <script src="<?php bloginfo('template_url') ?>/js/jquery.form.js"></script>
        <script src="<?php bloginfo('template_url') ?>/js/jquery.validate.min.js"></script>
        <!-- <script src="<?php bloginfo('template_url') ?>/js/jquery.cookie.js"></script> -->

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!-- 
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
         -->

    </body>

</html>
