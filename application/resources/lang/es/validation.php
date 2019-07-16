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

    'accepted' => 'El :atributo debe ser aceptado.',
    'active_url' => 'El :atributo no es una URL válida.',
    'after' => 'El :atributo debe ser una fecha posterior :fecha.',
    'after_or_equal' => 'El :atributo debe ser una fecha posterior o igual a :fecha.',
    'alpha' => 'El :atributo puede contener sólo letras.',
    'alpha_dash' => 'El :atributo puede contener sólo letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :atributo puede contener sólo letras y números.',
    'array' => 'El :atributo puede ser una serie.',
    'before' => 'El :atributo debe ser una fecha anterior :fecha.',
    'before_or_equal' => 'El :atributo debe ser una fecha anterior o igual a :fecha.',
    'between' => [
        'numeric' => 'El :atributo debe estar entre :min y :max.',
        'file' => 'El :atributo debe estar entre :min y :max kilobites.',
        'string' => 'El :atributo debe estar entre :min y :max caracteres.',
        'array' => 'El :atributo debe tener entre :min y :max ítems.',
    ],
    'boolean' => 'El :atributo debe ser verdadero o falso.',
    'confirmed' => 'La confirmacion del :atributo no coincide.',
    'date' => 'El :atributo no es una fecha válida.',
    'date_equals' => 'El :atributo debe ser una fecha igual a :fecha.',
    'date_format' => 'El :atributo no concuerda con el formato :formato.',
    'different' => 'El :atributo y :otro deben ser diferentes.',
    'digits' => 'El :atributo debe ser :dígitos dígitos.',
    'digits_between' => 'El :atributo debe estar entre :min y :max dígitos.',
    'dimensions' => 'Las dimensiones de imágen del :atributo no son válidas.',
    'distinct' => 'El campo :atributo tiene un valor duplicado.',
    'email' => 'El :atributo debe ser una dirección de correo electrónica válida.',
    'exists' => 'El :atributo seleccionado no es válido.',
    'file' => 'El atributo debe ser un archivo.',
    'filled' => 'El campo :atributo debe tener un valor.',
    'gt' => [
        'numeric' => 'El :atributo debe ser más grande que :valor.',
        'file' => 'El :atributo debe ser más grande que :valor kilobites.',
        'string' => 'El :atributo debe ser más grande que :valor caracteres.',
        'array' => 'El :atributo debe tener más de :valor ítems.',
    ],
    'gte' => [
        'numeric' => 'El :atributo debe ser más grande o igual a :valor.',
        'file' => 'El :atributo debe ser más grande o igual a :valor kilobites.',
        'string' => 'El :atributo deb ser más grande o igual que :valor caracteres.',
        'array' => 'El :atributo debe tener :valor ítems o más.',
    ],
    'image' => 'El :atributo debe ser una imágen.',
    'in' => 'El :atributo seleccionado no es válido.',
    'in_array' => 'El campo :atributo no existe en :otro.',
    'integer' => 'El :atributo debe ser un entero.',
    'ip' => 'El :atributo debe ser una dirección IP válida.',
    'ipv4' => 'El :atributo debe ser una dirección IPv4 válida.',
    'ipv6' => 'El :atributo debe ser una dirección IPv6 válida.',
    'json' => 'El :atributo debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El :atributo debe ser menor que :valor.',
        'file' => 'el :atributo debe ser menor que :valor kilobites.',
        'string' => 'El :atributo debe ser menor que :valor caracteres.',
        'array' => 'El :atributo debe tener menos de :valor ítems.',
    ],
    'lte' => [
        'numeric' => 'El :atributo debe ser menor o igual que :valor.',
        'file' => 'El :atributo debe ser menor o igual que :valor kilobites.',
        'string' => 'El :atributo debe ser menor o igual que :valor caracteres.',
        'array' => 'El :atributo no debe tener mas de :valor ítems.',
    ],
    'max' => [
        'numeric' => 'El :atributo no puede ser mayor que :max.',
        'file' => 'El :atributo no puede ser mayor de :valor kilobites.',
        'string' => 'El :atributo no puede ser mayor de :max caracteres.',
        'array' => 'El :atributo no puede tener más de :max ítems.',
    ],
    'mimes' => 'El :atributo debe ser un archivo de tipo: :valores.',
    'mimetypes' => 'El :atributo debe ser un archivo de tipo: :valores.',
    'min' => [
        'numeric' => 'El :atributo debe ser de al menos :min.',
        'file' => 'El :atributo debe ser de al menos :min kilobites.',
        'string' => 'El :atributo debe se de al menos :min caracteres.',
        'array' => 'El :atributo debe tener al menos :min ítems.',
    ],
    'not_in' => 'El :atributo seleccionado no es válido.',
    'not_regex' => 'El formato del :atributo no es válido.',
    'numeric' => 'El :atributo debe ser un número.',
    'present' => 'El campo :atributo debe estar presente.',
    'regex' => 'El formato del :atributo no es válido.',
    'required' => 'El campo :atributo es requerido.',
    'required_if' => 'El campo :atributo se requiere cuando :otro es :valor.',
    'required_unless' => 'El campo :atributo se requiere a menos que :otro esté en :valores.',
    'required_with' => 'El campo :atributo se requiere cuando :valores esté presente.',
    'required_with_all' => 'El campo :atributo se requiere cuando :valores estén presentes.',
    'required_without' => 'El campo :atributo se requiere cuando :valores no este presente.',
    'required_without_all' => 'El campo :atributo se requiere cuando ninguno de :valores estén presentes.',
    'same' => 'El :atributo y :otro no coinciden.',
    'size' => [
        'numeric' => 'El :atributo debe ser :tamaño. The :attribute must be :size.',
        'file' => 'El :atributo debe ser :tamaño kilobites.',
        'string' => 'El :atributo debe ser :tamaño caracteres.',
        'array' => 'El :atributo debe contener :tamaño ítems.',
    ],
    'starts_with' => 'El :atributo debe iniciar con uno de los siguientes :valores',
    'string' => 'El atributo debe se una cadena.',
    'timezone' => 'El : atributo debe ser una zona válida.',
    'unique' => 'El :atributo ya ha sido tomado.',
    'uploaded' => 'El :atributo falló en actualizarse.',
    'url' => 'El formato de :atributo no es válido.',
    'uuid' => 'El :atributo debe ser una UUID válida.',

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
            'rule-name' => 'mensaje-personalizado',
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
