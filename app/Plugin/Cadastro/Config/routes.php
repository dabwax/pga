<?php

Router::parseExtensions('json'); 

Router::connect('/cadastro/tripulantes/ajax/checar-cargo', array('plugin' => 'Cadastro', 'controller' => 'staffs', 'action' => 'ajax_check_role_type'));
Router::connect('/cadastro/tripulantes/listar', array('plugin' => 'Cadastro', 'controller' => 'staffs', 'action' => 'index'));
Router::connect('/cadastro/tripulantes/cadastrar', array('plugin' => 'Cadastro', 'controller' => 'staffs', 'action' => 'add'));
Router::connect('/cadastro/tripulantes/editar/*', array('plugin' => 'Cadastro', 'controller' => 'staffs', 'action' => 'edit'));

Router::connect('/cadastro/gerenciar/cargos/listar', array('plugin' => 'Cadastro', 'controller' => 'roles', 'action' => 'index'));
Router::connect('/cadastro/gerenciar/cargos/cadastrar', array('plugin' => 'Cadastro', 'controller' => 'roles', 'action' => 'add'));
Router::connect('/cadastro/gerenciar/cargos/editar/*', array('plugin' => 'Cadastro', 'controller' => 'roles', 'action' => 'edit'));

Router::connect('/cadastro/bases/listar', array('plugin' => 'Cadastro', 'controller' => 'bases', 'action' => 'index'));
Router::connect('/cadastro/bases/cadastrar', array('plugin' => 'Cadastro', 'controller' => 'bases', 'action' => 'add'));
Router::connect('/cadastro/bases/editar/*', array('plugin' => 'Cadastro', 'controller' => 'bases', 'action' => 'edit'));

Router::connect('/cadastro/aeronaves/listar', array('plugin' => 'Cadastro', 'controller' => 'aircrafts', 'action' => 'index'));
Router::connect('/cadastro/aeronaves/cadastrar', array('plugin' => 'Cadastro', 'controller' => 'aircrafts', 'action' => 'add'));
Router::connect('/cadastro/aeronaves/editar/*', array('plugin' => 'Cadastro', 'controller' => 'aircrafts', 'action' => 'edit'));
Router::connect('/cadastro/aeronaves/alocar/*', array('plugin' => 'Cadastro', 'controller' => 'aircrafts', 'action' => 'allocate'));

Router::connect('/cadastro/aeronaves/modelos/listar', array('plugin' => 'Cadastro', 'controller' => 'aircraft_models', 'action' => 'index'));
Router::connect('/cadastro/aeronaves/modelos/cadastrar', array('plugin' => 'Cadastro', 'controller' => 'aircraft_models', 'action' => 'add'));
Router::connect('/cadastro/aeronaves/modelos/editar/*', array('plugin' => 'Cadastro', 'controller' => 'aircraft_models', 'action' => 'edit'));