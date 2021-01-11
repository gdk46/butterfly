<?php

require "../env.php";

$fl = new File\File('C:/xampp/htdocs/php/');

echo "<pre>";
print_r(
    $fl->createFile([
        'test/app/Controller/AlunoController.php',
        'test/app/Controller/AvaliacaoController.php',
        'test/app/Controller/CursoController.php',
        'test/app/Controller/IntrutorController.php',
        'test/app/Controller/TurmaController.php',
        'test/app/Dao/AlunoDao.php',
        'test/app/Dao/AvaliacaoDao.php',
        'test/app/Dao/CursoDao.php',
        'test/app/Dao/IntrutorDao.php',
        'test/app/Dao/TurmaDao.php',
        'test/app/Model/AlunoModel.php',
        'test/app/Model/AvaliacaoModel.php',
        'test/app/Model/CursoModel.php',
        'test/app/Model/IntrutorModel.php',
        'test/app/Model/TurmaModel.php'
    ])
);

/* print_r(
    $fl->writeInFile([
        'test/app/Controller/AlunoController.php' => "sou controller",
        'test/app/Controller/AvaliacaoController.php'  => "sou controller",
        'test/app/Controller/CursoController.php'  => "sou controller",
        'test/app/Controller/IntrutorController.php'  => "sou controller",
        'test/app/Controller/TurmaController.php'  => "sou controller",
        'test/app/Dao/AlunoDao.php'  => "sou Dao",
        'test/app/Dao/AvaliacaoDao.php'  => "sou Dao",
        'test/app/Dao/CursoDao.php'  => "sou Dao",
        'test/app/Dao/IntrutorDao.php'  => "sou Dao",
        'test/app/Dao/TurmaDao.php'  => "sou Dao",
        'test/app/Model/AlunoModel.php' => "sou Model",
        'test/app/Model/AvaliacaoModel.php' => "sou Model",
        'test/app/Model/CursoModel.php' => "sou Model",
        'test/app/Model/IntrutorModel.php' => "sou Model",
        'test/app/Model/TurmaModel.php' => "sou Model",
    ])
); */