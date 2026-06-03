<?php

function botaoEnviar()
{
    return "<button type='submit' class='btn btn-outline-primary'>
                Enviar
            </button>";
}

function botaoVoltar()
{
    return "<button type='button'
                class='btn btn-outline-secondary'
                onclick='history.back()'>
                Voltar
            </button>";
}

function botaoAtualizar($link)
{
    return "<button class='btn btn-outline-primary btn-sm'
                onclick=\"location.href='{$link}';\">
                Atualizar
            </button>";
}

function botaoExcluir($link)
{
    return "<button class='btn btn-outline-danger btn-sm'
                onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='{$link}';}\">
                Excluir
            </button>";
}

function botaoEmprestar($link)
{
    return "<button class='btn btn-outline-success btn-sm'
                onclick=\"location.href='{$link}';\">
                Emprestar
            </button>";
}

function botaoDevolver($link)
{
    return "<button class='btn btn-outline-warning btn-sm'
                onclick=\"if(confirm('Confirmar devolução?')){location.href='{$link}';}\">
                Devolver
            </button>";
}

function botaoCadastrarNovo($link)
{
    return "<button class='btn btn-outline-warning btn-sm'
                onclick=\"if(confirm('Confirmar Cadastro?')){location.href='{$link}';}\">
                Cadastrar Novo
            </button>";
}

function botaoNovoEmprestimo($link)
{
    return "<button class='btn btn-outline-warning btn-sm'
                onclick=\"if(confirm('Confirmar Novo Emprestimo?')){location.href='{$link}';}\">
                Novo Emprestimo
            </button>";
}

function botaoHistorico($link)
{
    return "<button class='btn btn-outline-info btn-sm'
                onclick=\"location.href='{$link}';\">
                Histórico
            </button>";
}
