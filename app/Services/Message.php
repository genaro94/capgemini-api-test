<?php

namespace App\Services;

class Message {

    public static function tokenExpiredException() {
        return 'Token de acesso expirado. Faça login na sua conta novamente.';
    }

    public static function tokenInvalidException() {
        return 'Token de acesso inválido. Faça login na sua conta novamente.';
    }

    public static function jwtException() {
        return 'Aconteceu um erro. Tente logar na sua conta novamente.';
    }

    public static function blacklistedException() {
        return 'Aconteceu um erro. Tente logar na sua conta novamente.';
    }

    public static function logoutAccount() {
        return 'Deslogado com sucesso.';
    }

    public static function invalidAccess() {
        return 'E-mail e/ou senha incorretos.';
    }

    public static function failedCreateProduct() {
        return 'Erro ao tentar cadastrar o produto.';
    }

    public static function successCreateProduct() {
        return 'Produto cadastrado com sucesso.';
    }
}
