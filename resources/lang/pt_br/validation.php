<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | O following language lines contain O default error messages used by
    | O validator class. Some of these rules have multiple versions such
    | as O size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O :attribute deve ser aceito.',
    'active_url' => 'O :attribute não é uma URL válida.',
    'after' => 'O :attribute deve ser uma data depois de :date.',
    'after_or_equal' => 'O :attribute deve ser uma data posterior ou igual a :date.',
    'alpha' => 'O :attribute pode conter apenas letras.',
    'alpha_dash' => 'O :attribute pode conter apenas letras, números, traços e sublinhados.',
    'alpha_num' => 'O :attribute pode conter apenas letras e números.',
    'array' => 'O :attribute deve ser um array.',
    'before' => 'O :attribute deve ser uma data antes da :date.',
    'before_or_equal' => 'O :attribute deve ser uma data anterior ou igual a :date.',
    'between' => [
        'numeric' => 'O :attribute deve esta entre o valor :min e :max.',
        'file' => 'O :attribute deve esta entre :min e :max kilobytes.',
        'string' => 'O :attribute deve esta entre :min e :max caracteres.',
        'array' => 'O :attribute deve ter entre :min e :max itens.',
    ],
    'boolean' => 'O :attribute deve ser verdadeiro ou falso.',
    'confirmed' => 'O :attribute confirmação não corresponde.',
    'date' => 'O :attribute não é data valida.',
    'date_equals' => 'O :attribute deve ser uma data igual a  :date.',
    'date_format' => 'O :attribute não corresponde ao formato  :format.',
    'different' => 'O :attribute e :other deve ser diferentes.',
    'digits' => 'O :attribute devem ser :digits digitos.',
    'digits_between' => 'O :attribute deve esta entre :min e :max digitos.',
    'dimensions' => 'O :attribute tem dimensões de imagem inválidas.',
    'distinct' => 'O :attribute campo tem um valor duplicado.',
    'email' => 'O :attribute deve ser endereço de e-mail válido.',
    'exists' => 'O selecionado :attribute é inválido.',
    'file' => 'O :attribute deve ser um arquivo.',
    'filled' => 'O :attribute deve ter um valor.',
    'gt' => [
        'numeric' => 'O :attribute deve ser maior que :value.',
        'file' => 'O :attribute deve ser maior :value kilobytes.',
        'string' => 'O :attribute deve ser maior que :value caracteres.',
        'array' => 'O :attribute deve ser maior que :value itens.',
    ],
    'gte' => [
        'numeric' => 'O :attribute deve ser maior ou igual :value.',
        'file' => 'O :attribute deve ser maior ou igual :value kilobytes.',
        'string' => 'O :attribute deve ser maior ou igual :value caracteres.',
        'array' => 'O :attribute deve ter :value itens ou mais.',
    ],
    'image' => 'O :attribute deve ser uma imagem.',
    'in' => 'O selecionado :attribute é inválido.',
    'in_array' => 'O :attribute não existe em :other.',
    'integer' => 'O :attribute deve ser um inteiro.',
    'ip' => 'O :attribute deve ser um endereço de IP válido.',
    'ipv4' => 'O :attribute deve ser um endereço IPv4 válido.',
    'ipv6' => 'O :attribute deve ser um endereço IPv6 válido.',
    'json' => 'O :attribute deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'O :attribute deve ser menor que :value.',
        'file' => 'O :attribute deve ser menor que :value kilobytes.',
        'string' => 'O :attribute deve ser menor que :value caracter.',
        'array' => 'O :attribute deve ter menos de :value itens.',
    ],
    'lte' => [
        'numeric' => 'O :attribute deve ser menor que ou igual :value.',
        'file' => 'O :attribute deve ser menor ou igual :value kilobytes.',
        'string' => 'O :attribute deve ser menor que or equal :value caracter.',
        'array' => 'O :attribute não deve ter mais do que :value itens.',
    ],
    'max' => [
        'numeric' => 'O :attribute não pode ser maior que :max.',
        'file' => 'O :attribute não pode ser maior que :max kilobytes.',
        'string' => 'O :attribute não pode ser maior que :max caracter.',
        'array' => 'O :attribute não pode ter mais que :max itens.',
    ],
    'mimes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O :attribute deve ser pelo menos :min.',
        'file' => 'O :attribute deve ser pelo menos :min kilobytes.',
        'string' => 'O :attribute deve ser pelo menos :min caracter.',
        'array' => 'O :attribute deve ter pelo menos :min itens.',
    ],
    'not_in' => 'O selecionado :attribute é inválido.',
    'not_regex' => 'O :attribute formato é inválido.',
    'numeric' => 'O :attribute deve ser um número.',
    'present' => 'O :attribute deve esta presente.',
    'regex' => 'O :attribute formato é inválido.',
    'required' => 'O :attribute é obrigatório.',
    'required_if' => 'O :attribute é obrigatório quando :other é :value.',
    'required_unless' => 'O :attribute é obrigatório a menos que :other esteja em :values.',
    'required_with' => 'O :attribute é obrigatório quando :values é presente.',
    'required_with_all' => 'O :attribute é obrigatório quando :values estão presentes.',
    'required_without' => 'O :attribute é obrigatório quando :values não esta presente.',
    'required_without_all' => 'O :attribute é obrigatório quando nenhum :values esta presente.',
    'same' => 'O :attribute e :other deve combinar.',
    'size' => [
        'numeric' => 'O :attribute deve ser :size.',
        'file' => 'O :attribute deve ser :size kilobytes.',
        'string' => 'O :attribute deve ser :size caracteres.',
        'array' => 'O :attribute deve conter :size itens.',
    ],
    'starts_with' => 'O :attribute deve começar com um dos seguintes: :values',
    'string' => 'O :attribute deve ser uma string.',
    'timezone' => 'O :attribute deve ser uma zona válida.',
    'unique' => 'O :attribute já possui.',
    'uploaded' => 'O :attribute não foi possível fazer o upload.',
    'url' => 'O :attribute formato é inválido.',
    'uuid' => 'O :attribute deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name O lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | O following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
