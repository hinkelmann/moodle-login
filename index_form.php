<?php
if (!empty($CFG->loginpasswordautocomplete)) {
    $autocomplete = 'autocomplete="off"';
} else {
    $autocomplete = '';
}
if (empty($CFG->authloginviaemail)) {
    $strusername = get_string('username');
} else {
    $strusername = get_string('usernameemail');
}
?>
<section class="morta hidden-xs hidden-sm"></section>
<section class="container">
    <div class="col-md-6">
        <div class="morta2 "><?php include 'img/logo.svg'; ?></div>
    </div>
    <div class="col-md-6 divider">
        <form class="form-horizontal col-md-offset-1" action="<?php echo $CFG->httpswwwroot; ?>/login/index.php"
              method="post"
              id="login" <?php echo $autocomplete; ?> >
            <div class="form-group texto-colorido hidden-xs">

                Selecionar ambiente:

            </div>
            <div class="form-group texto-colorido visible-xs"></div>
            <div class="form-group">
                <ul id='moodle-nav-choice' class="nav nav-pills hidden-xs nav-justified">
                    <li aria-label="Acesso ao Ambiente Moodle UAB/EAD" role="presentation">
                        <a href="https://ead08.proj.ufsm.br/moodle2_UAB/login">UAB/EAD</a>
                    </li>
                    <li aria-label="Acesso ao Ambiente Moodle Presencial" role="presentation">
                        <a href="https://ead06.proj.ufsm.br/moodle/login">PRESENCIAL</a>
                    </li>
                    <li aria-label="Acesso ao Ambiente Moodle Capacitação" tabindex="-1" role="presentation">
                        <a href="https://ead05.proj.ufsm.br/moodle_capacitacao/login">CAPACITAÇÃO</a>
                    </li>
                    <li class='hidden' aria-label="Acesso ao Ambiente Moodle Chocolate" tabindex="-1"
                        role="presentation">
                        <a href="https://ead10.proj.ufsm.br/">CHOCOLATE</a>
                    </li>
                    <li class='hidden' aria-label="Acesso ao Ambiente Moodle de Teste Capacitação" tabindex="-1"
                        role="presentation">
                        <a href="https://eadvm46.proj.ufsm.br/">TESTE CAPACITAÇÃO</a>
                    </li>
                    <li class='hidden' aria-label="Acesso ao Ambiente Moodle de Teste UAB/EAD" tabindex="-1"
                        role="presentation">
                        <a href="https://eadvm47.proj.ufsm.br/">TESTE PRESENCIAL</a>
                    </li>
                    <li class='hidden' aria-label="Acesso ao Ambiente Moodle de Teste UAB/EAD" tabindex="-1"
                        role="presentation">
                        <a href="https://eadvm48.proj.ufsm.br/">TESTE UAB/EAD</a>
                    </li>
                    <li class='hidden' aria-label="Acesso ao Ambiente Moodle de Teste UAB/EAD" tabindex="-1"
                        role="presentation">
                        <a href="https://eadvm58.proj.ufsm.br/">TESTE API PRESENCIAL</a>
                    </li>
                    <li class='hidden' aria-label="Acesso ao Ambiente Moodle de Teste UAB/EAD" tabindex="-1"
                        role="presentation">
                        <a href="https://eadvm59.proj.ufsm.br/">TESTE API UAB/EAD</a>
                    </li>
                    <li class='hidden' aria-label="Acesso ao Ambiente Moodle UAB/EAD Histórico" tabindex="-1"
                        role="presentation">
                        <a href="https://ead08.proj.ufsm.br/moodle1_UAB/login">UAB/EAD Histórico</a>
                    </li>
                </ul>
            </div>
            <div class="form-group">
                <div class="input-group input-group2">
                    <span class="input-group-addon" id="basic-addon1">
                          <i class="fa fa-user fa-15"></i>
                        <?php echo($strusername) ?>:
                    </span>
                    <input type="text" class="form-control"
                           placeholder="Usuário"
                           name="username" id="username"
                           tabindex="1" aria-label="por favor, informe o nome do seu usuário"
                           value="<?php p($frm->username) ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group2">
                    <span class="input-group-addon" id="basic-addon1">
                          <i class="fa fa-unlock-alt fa-15"></i>
                        <?php print_string("password") ?>:&nbsp;&nbsp;&nbsp;&nbsp;
                    </span>
                    <input type="password" class="form-control"
                           placeholder="<?php print_string("password") ?>" name="password"
                           id="password" tabindex="2" aria-label="por favor, informe a sua senha"
                           value="" <?php echo $autocomplete; ?> />
                </div>


                <label class="col-sm-3 control-label texto-colorido" for="password"></label>
                <div class="col-sm-9">

                </div>
            </div>
            <?php if (!empty($errormsg)) {
                echo html_writer::start_tag('div', array('class' => 'alert alert-danger'));
                //echo html_writer::link('#', $errormsg, array('id' => 'loginerrormessage', 'class' => 'accesshide'));
                echo $OUTPUT->error_text(' ' . $errormsg);
                echo html_writer::end_tag('div');
            }
            ?>
            <div class="form-group">
                <input type="submit" class='btn btn-block btn-custom btn-colorido'
                       id="loginbtn" role="button"
                       tabindex="3" aria-label="clique aqui para autenticar"
                       value="<?php print_string("login") ?>"/>
            </div>
            <div class="form-group">
                <div class="pull-left">
                    <?php if (isset($CFG->rememberusername) and $CFG->rememberusername == 2) { ?>
                        <div class="rememberpass">
                            <input type="checkbox"
                                   tabindex="4" aria-label="Lembrar  o usuário"
                                   name="rememberusername" id="rememberusername"
                                   value="1" <?php if ($frm->username) {
                                echo 'checked="checked"';
                            } ?> />
                            <label for="rememberusername"><?php print_string('rememberusername', 'admin') ?></label>
                        </div>
                    <?php } ?>
                </div>
                <div class="pull-right"><a alt="<?php print_string("forgotten") ?>"
                                           title="<?php print_string("forgotten") ?>" tabindex="5"
                                           href="http://nte.ufsm.br/ajuda/perguntas-frequentes#suporte"><i><?php print_string("forgotten") ?>
                    </a></i></div>
            </div>
            <div class="form-group">
                <a alt="Dúvidas frequentes sobre o moodle" href="http://nte.ufsm.br/ajuda/perguntas-frequentes"
                   class="btn btn-colorido-inverso">Dúvidas Frequentes</a>
            </div>
            <div class="form-group "><i>*
                    <?php
                    echo get_string("cookiesenabled");
                    echo " " . $OUTPUT->help_icon('cookiesenabled');
                    ?>
                </i>
            </div>
        </form>
    </div>
</section>
<script>
    var a = document.getElementById('moodle-nav-choice').getElementsByTagName('a')
    for (var i = 0; i < a.length; i++) {
        if (a[i].hostname == window.location.hostname) {
            if (a[i].pathname == '/moodle1_UAB/login') {
                a[i].parentElement.className = '';
            }else{
                a[i].parentElement.className = 'active';
            }
        }
    }
</script>


