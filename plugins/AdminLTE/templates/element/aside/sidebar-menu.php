<ul class="sidebar-menu" data-widget="tree">
    <li class="header">NAVEGAÇÃO PRINCIPAL</li>

    <li>
        <a href="<?php echo $this->Url->build('/usuarios'); ?>">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Usuarios</span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/alunos'); ?>">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Alunos</span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/professores'); ?>">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Professores</span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/disciplinas'); ?>">
            <i class="fa fa-book" aria-hidden="true"></i> <span>Disciplinas</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i> <span>Turmas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo $this->Url->build('/turmas'); ?>">
                    <i class="fa fa-users" aria-hidden="true"></i> <span>Turmas</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Url->build('/turmas/professores'); ?>">
                    <i class="fa fa-graduation-cap " aria-hidden="true"></i> <span>Professores & Turmas</span>
                </a>
            </li>
        </ul>
    </li>