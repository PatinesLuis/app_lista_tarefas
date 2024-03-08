<?php

    require "app_lista_tarefas_backend/tarefa.model.php";
    require "app_lista_tarefas_backend/tarefa.service.php";
    require "app_lista_tarefas_backend/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['nova_tarefa']);
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao,$tarefa);
    $tarefaService->inserir();

    header('location:nova_tarefa.php?inclusao=1'); 
    }else if($acao == 'recuperar'){
        
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();

    }else if($acao == 'atualizar'){
        $tarefa = new Tarefa();

        $tarefa-> __set('id', $_POST['idInput']);
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->atualizar();
        header('location:todas_tarefas.php?atualizar=1'); 
        
    }else if ($acao == 'remover'){
        echo 'estamos aqui';
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();
        header('location: todas_tarefas.php');

    }else if ($acao == 'marcarRealizada'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcarRealizada();
        header('location: todas_tarefas.php');

    }else if ($acao == 'recuperarPendentes'){
        $tarefa = new Tarefa();
        $tarefa->__set('id_status', 1);
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperarPendente();
        
    }
    
    
?>