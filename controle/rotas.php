<?php
    include_once('globais.php');

    function montar_include(/*$sistema, */$pasta, $arquivo) {
        return TEMPLATES/*.'/'.$sistema*/.'/'.$pasta.'/'.$arquivo.'.php';
    }

    function include_conteudo(){
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('?', $uri); //Separando URI dos Parametros Get
        $uri = $uri[0]; //Apenas URI (ignorando Parametros Get)
        $uri = rtrim($uri, '/'); //Removendo última barra da URI
        $partes = explode('/', $uri);

        if(count($partes) >= 4) { //Tenha mais de 4 partes
            $arquivo = array_pop($partes); //Último elemento
            $pasta = array_pop($partes); //Penúltimo elemento
        } 
        else {
            $pasta = 'oxe';
            $arquivo = 'home';
            /*if($_SESSION['sistema'] == 'cosplay'){
                $pasta = 'concurso_desfile';
                $arquivo = 'listar';
            }
            else if($_SESSION['sistema'] == 'animeke'){
                $pasta = 'concurso_tradicional';
                $arquivo = 'listar';
            }*/
            
        }
        $caminho = montar_include(/*$_SESSION['sistema'],*/ $pasta, $arquivo);
        include_once($caminho);   
    }
?>