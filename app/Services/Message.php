<?php

namespace App\Services;

class Message {

    public static function tokenExpiredException()
    {
        return 'Token de acesso expirado. Faça login na sua conta novamente.';
    }

    public static function tokenInvalidException()
    {
        return 'Token de acesso inválido. Faça login na sua conta novamente.';
    }

    public static function jwtException()
    {
        return 'Aconteceu um erro. Tente logar na sua conta novamente.';
    }

    public static function blacklistedException()
    {
        return 'Aconteceu um erro. Tente logar na sua conta novamente.';
    }

    public static function logoutAccount()
    {
        return 'Deslogado com sucesso.';
    }

    public static function invalidAccess()
    {
        return 'E-mail e/ou senha incorretos.';
    }

    public static function failedWithdraw()
    {
        return 'Ocorreu erro ao tentar realizar o saque.';
    }

    public static function successWithdraw()
    {
        return 'Sucesso ao realizar o saque.';
    }

    public static function nonAccountExist()
    {
        return 'Conta não existe em nossa base de dados.';
    }

    public static function successDeposit()
    {
        return 'Deposito realizado com sucesso.';
    }

    public static function failedDeposit()
    {
        return 'Erro ao tentar depositar.';
    }

    public static function failedGetBalance()
    {
        return 'Ocorreu algum erro ao tentar obter o saldo.';
    }

    public static function failedUserDetails()
    {
        return 'Ocorreu algum erro ao tentar obter os dados do usuário';
    }
}
