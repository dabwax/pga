<?php

Router::connect('/estudante', array('controller' => 'student', 'action' => 'index', 'plugin' => 'student'));
Router::connect('/estudante/exercicio/todos', array('controller' => 'student', 'action' => 'all', 'plugin' => 'student'));
Router::connect('/estudante/exercicio/*', array('controller' => 'student', 'action' => 'reply', 'plugin' => 'student'));
Router::connect('/estudante/input/criar', array('controller' => 'student', 'action' => 'input', 'plugin' => 'student'));