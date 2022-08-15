<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Boi na Brasa</title>
</head>

<body class="fundofixo">
    <!--Abre painel rodape -->
    <div class="row panel-footer" style="background-color: rgba(255,255,255,0.8);">
        <!-- Abre área de localização -->
        <div class="col-sm-6 col-md-4">
            <div class="panel-footer" style="background: none;">
                <img src="images/logochurrascopequeno.png" alt="">
                <br>
                <i>Aqui tem carne na brasa</i>
                <address>
                    <i>Avenida Itaquera, 8266 Itaquera - São Paulo - SP - CEP 08295-000</i>
                    <br>
                    <span class="glyphicon glyphicon-phone-alt"></span>&nbsp; (11) 2585-9200
                    <br>
                    <span class="glyphicon glyphicon-envelope"></span>&nbsp; <a href="mailto:contato@boizinho.com.br?subject=contato via site&cc=marconysbatera@gmail.com">
                        contato@boizinho.com.br
                    </a>
                </address>
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.7942870047204!2d-46.458731884693755!3d-23.5399001846936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce66bf22458913%3A0xecdac462b58a9475!2sSenac%20Itaquera!5e0!3m2!1spt-BR!2sbr!4v1660051724396!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div> <!-- Fecha área de navegação -->
        <!-- Abre área de navegação -->
        <div class="col-sm-6 col-md-4">
            <div class="panel-footer" style="background:none;">
                <h4>Links</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="index.php#home" class="text-danger">
                            <span class="glyphicon glyphicon-home" arial-hiden="true">&nbsp; Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="index.php#destaques" class="text-danger">
                            <span class="glyphicon glyphicon-ok-sign" arial-hiden="true">&nbsp; Destaque</span>
                        </a>
                    </li>

                    <li>
                        <a href="index.php#produtos" class="text-danger">
                            <span class="glyphicon glyphicon-cutlery" arial-hiden="true">&nbsp; Produtos</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php#contato" class="text-danger">
                            <span class="glyphicon glyphicon-envelope" arial-hiden="true">&nbsp; Contato</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin/index.php" class="text-danger">
                            <span class="glyphicon glyphicon-user" arial-hiden="true">&nbsp; Administração</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-sd-6 col-md-4">
            <div class="panel-footer" style="background: none">
                <h4>Contato</h4>
                <form action="rodape_contato-envia.php" method="post" name="form-contato" id="form-contato">
                    <p>
                        <span class="input-group">
                            <span class="input-group-addon" id="basic-addon2">
                                <span class="glyphicon glyphicon-user" arial-hiden="true"></span>
                            </span>
                            <input type="text" name="nome_contato" id="nome_contato" placeholder="digite o seu nome" aria-describedby="basic-addon1" required class="form-control">
                        </span>
                    </p>
                    <p>
                        <span class="input-group">
                            <span class="input-group-addon" id="basic-addon2">
                                <span class="glyphicon glyphicon-envelope" arial-hiden="true"></span>
                            </span>
                            <input type="email" name="email_contato" id="nome_contato" placeholder="digite o seu e-mail" aria-describedby="basic-addon2" required class="form-control">
                        </span>
                    </p>
                    <p>
                        <span class="input-group">
                            <span class="input-group-addon" id="basic-addon2">
                                <span class="glyphicon glyphicon-pencil" arial-hiden="true"></span>
                            </span>
                            <textarea name="comentarios_contato" id="nome_contato" placeholder="digite o seus comentarios" aria-describedby="basic-addon3" required class="form-control" cols="30" rows="5">
                        </textarea>
                        </span>
                    </p>
                    <p>
                        <button class="btn btn-danger btn-block" aria-label="Enviar" role="Enviar">Enviar
                            <span class="glyphicon glyphicon-send"></span>
                        </button>
                    </p>
                </form>
            </div>
        </div> <!-- Abre área de contato -->
        <!-- Abre área de contato -->
        <div class="col-sm-12">
            <div class="panel-footer">
                <h6 class="text-danger text-center">
                    &copy; Copyright Desenvolvido por Marconys Pinheiro - AlunoTI91.
                    <br>
                    <a href="https://github.com/marconys">https://marconys.github.io/Portifolio/</a>
                </h6>
            </div>
        </div>
    </div>
</body>

</html>