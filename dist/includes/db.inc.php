<?php

// Originally made by: Pedro Moreira 

function db_connect() {
    global $arrSETTINGS;

    // Estabelecer conexão com a base de dados
    $arrSETTINGS['db_link'] = mysqli_connect(
        $arrSETTINGS['hostname'], 
        $arrSETTINGS['username'], 
        $arrSETTINGS['password'], 
        'dadaraopedal' 
    );

    // Verificar erro na conexão
    if (!$arrSETTINGS['db_link']) {
        throw new Exception(
            "Erro ao conectar ao MySQL: " . mysqli_connect_error(),
            mysqli_connect_errno()
        );
    }

    // Definir o charset como UTF-8
    mysqli_set_charset($arrSETTINGS['db_link'], "UTF8");

    return true; // Conexão bem-sucedida
}

function db_query($sql) {
    global $arrSETTINGS;

    // Executar a consulta
    $result = mysqli_query($arrSETTINGS['db_link'], $sql);

    // Verificar se houve erro na execução da consulta
    if (!$result) {
        throw new Exception(
            "Erro na consulta SQL: " . mysqli_error($arrSETTINGS['db_link']),
            mysqli_errno($arrSETTINGS['db_link'])
        );
    }

    // Verificar tipo de operação
    if (is_bool($result)) {
        // Operação de escrita (INSERT, UPDATE, DELETE)
        if ($id = mysqli_insert_id($arrSETTINGS['db_link'])) {
            return $id; // Retornar ID do registo criado (INSERT)
        }
        return $result; // Retornar true ou false
    }

    // Operação de leitura (SELECT) - Retornar dados como array associativo
    return mysqli_fetch_all($result, MYSQLI_ASSOC) ?: [];
}

function db_close() {
    global $arrSETTINGS;

    // Fechar a conexão com a base de dados
    if (isset($arrSETTINGS['db_link']) && $arrSETTINGS['db_link']) {
        return mysqli_close($arrSETTINGS['db_link']);
    }

    return false; // Caso a conexão já esteja fechada ou inexistente
}
?>
