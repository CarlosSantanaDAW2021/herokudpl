<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El :attribute ha sido aceptado.',
    'active_url' => 'El :attribute no es una url válida.',
    'after' => 'El :attribute debe de ser una fecha antes de  :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha antes o igual a :date.',
    'alpha' => 'El :attribute solo debe contener letras.',
    'alpha_dash' => 'El :attribute solo debe contener letras,números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute solo debe contener letras y números.',
    'array' => 'El :attribute debe ser un array.',
    'before' => 'El :attribute debe ser una fecha después de :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha después o igual a :date.',
    'between' => [
        'numeric' => 'El :attribute debe estar entre :min and :max.',
        'file' => 'El :attribute debe de estar entre :min and :max Kilobytes.',
        'string' => 'El :attribute debe de estar entre :min and :max caracteres.',
        'array' => 'El :attribute debe de estar entre  :min and :max objetos.',
    ],
    'boolean' => 'El :attribute debe ser verdadero o falso.',
    'confirmed' => 'El campo de confirmacion :attribute no coincide.',
    'date' => 'El :attribute no es una fecha válida.',
    'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'different' => 'El :attribute y :other deben de ser diferentes.',
    'digits' => 'El :attribute deben ser :digits digits.',
    'digits_between' => 'El :attribute debe estar entre :min and :max digits.',
    'dimensions' => 'El :attribute contiene dimensiones inválidas.',
    'distinct' => 'El campo :attribute tiene valores duplicados.',
    'email' => 'El :attribute debe ser un email valido.',
    'ends_with' => 'El :attribute debe terminar con el siguiente valor: :values.',
    'exists' => 'El campo seleccionado :attribute es invalido.',
    'file' => 'El :attribute debe ser un fichero.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El :attribute debe ser mayor que :value.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El :attribute debe ser mayor que :value caracteres.',
        'array' => 'El :attribute debe ser mas que :value objetos.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe ser mayor o igual a :value.',
        'file' => 'El :attribute debe ser mayor o igual a :value kilobytes.',
        'string' => 'El :attribute debe ser mayor o igual a :value carácteres.',
        'array' => 'El :attribute debe tener :value objetos o más.',
    ],
    'image' => 'El :attribute debe ser ser una imagen.',
    'in' => 'El archivo seleccionado :attribute es inválido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El :attribute debe ser un entero.',
    'ip' => 'El :attribute debe de ser una dirección ip válida.',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe de ser un string(JSON) válido.',
    'lt' => [
        'numeric' => 'El :attribute debe ser menor que :value.',
        'file' => 'El :attribute debe ser menor que :value kilobytes.',
        'string' => 'El :attribute debe ser menor que :value carácteres.',
        'array' => 'El :attribute debe ser menor que :value objetos.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor o igual que :value.',
        'file' => 'El :attribute debe ser menor o igual que :value kilobytes.',
        'string' => 'El :attribute debe ser menor o igual que :value carácteres.',
        'array' => 'El :attribute no debe tener más de  :value objetos.',
    ],
    'max' => [
        'numeric' => 'El :attribute no puede ser más grande que :max.',
        'file' => 'El :attribute no puede ser más grande que :max kilobytes.',
        'string' => 'El :attribute no puede ser más grande que :max carácteres.',
        'array' => 'El :attribute no puede tener más de :max objetos.',
    ],
    'mimes' => 'El :attribute debe de ser un fichero del tipo: :values.',
    'mimetypes' => 'El :attribute debe de ser un fichero del tipo: :values.',
    'min' => [
        'numeric' => 'El :attribute debe ser como mínimo :min.',
        'file' => 'El :attribute debe ser como mínimo de :min kilobytes.',
        'string' => 'El :attribute debe ser como mínimo de :min carácteres.',
        'array' => 'El :attribute debe ser como mínimo de :min objetos.',
    ],
    'multiple_of' => 'El :attribute debe ser de múltiples :value.',
    'not_in' => 'El campo seleccionado :attribute es inválido.',
    'not_regex' => 'El formato :attribute es inválido.',
    'numeric' => 'El :attribute debe ser un número.',
    'password' => 'La contraseña es inválida.',
    'present' => 'El campo :attribute debe ser presente.',
    'regex' => 'El formato :attribute es inválido.',
    'required' => 'El campo :attribute es requerido.',
    'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless' => 'El campo :attribute es requerido a no ser que :other esté en :values.',
    'required_with' => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando :values están presentes.',
    'required_without' => 'El campo :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de los :values están presentes.',
    'same' => 'El :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El :attribute debe ser de :size.',
        'file' => 'El :attribute debe ser de :size kilobytes.',
        'string' => 'El :attribute debe ser de :size carácteres.',
        'array' => 'El :attribute debe contener :size objetos.',
    ],
    'starts_with' => 'El :attribute debe empezar con uno de los siguientes valores: :values.',
    'string' => 'El :attribute debe ser un string.',
    'timezone' => 'El :attribute debe ser una zona válida.',
    'unique' => 'El :attribute ya ha sido guardado.',
    'uploaded' => 'El :attribute ha fallado al subirse.',
    'url' => 'El formato de :attribute es inválido.',
    'uuid' => 'El :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
