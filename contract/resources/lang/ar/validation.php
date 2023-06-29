<?php 


return [ 
  /* |-------------------------------------------------------------------------- | Validation Language Lines |-------------------------------------------------------------------------- | 
  | The following language lines contain the default error messages used by | the validator class. Some of these rules have multiple versions such | as the size rules. Feel free to tweak each of these messages here. | */
   'accepted' => 'يجب قبول :attribute.',
    'accepted_if' => 'يجب قبول :attribute عندما يكون :other هو :value.', 
    'active_url' => ':attribute ليس عنوان URL صالحًا.', 
    'after' => ':attribute يجب أن يكون تاريخًا بعد :date.', 
    'after_or_equal' => ':attribute يجب أن يكون تاريخًا بعد أو يساوي :date.', 
    'alpha' => ':attribute يجب أن يحتوي على أحرف فقط.', 
    'alpha_dash' => ':attribute يجب أن يحتوي على أحرف وأرقام وشرطات وشرطات سفلية فقط.', 
    'alpha_num' => ':attribute يجب أن يحتوي على أحرف وأرقام فقط.', 
    'array' => ':attribute يجب أن يكون مصفوفة.', 
    'before' => ':attribute يجب أن يكون تاريخًاقبل :date.', 
    'before_or_equal' => ':attribute يجب أن يكون تاريخًا قبل أو يساوي :date.', 
    'between' => [ 
      'numeric' => ':attribute يجب أن يكون بين :min و :max.', 
      'file' => ':attribute يجب أن يكون بين :min و :max كيلوبايت.', 
      'string' => ':attribute يجب أن يكون بين :min و :max حرفًا.', 
      'array' => ':attribute يجب أن يحتوي بين :min و :max عنصرًا.', 
    ], 
    'boolean' => 'يجب أن يكون حقل :attribute صحيحًا أو خاطئًا.', 
    'confirmed' => 'تأكيد :attribute غير متطابق.', 
    'current_password' => 'كلمة المرور غير صحيحة.', 
    'date' => ':attribute ليس تاريخًا صالحًا.', 
    'date_equals' => ':attribute يجب أن يكون تاريخًا يساوي :date.', 
    'date_format' => ':attribute لا يتطابق مع الصيغة :format.', 
    'declined' => 'يجب رفض :attribute.', 
    'declined_if' => 'يجب رفض :attribute عندما يكون :other هو :value.', 
    'different' => ':attribute و :other يجب أن يكونا مختلفين.', 
    'digits' => ':attribute يجب أن يكون :digits أرقام.', 
    'digits_between' => ':attribute يجب أن يكون بين :min و :max أرقام.', 
    'dimensions' => ':attribute يحتوي على أبعاد صورة غير صالحة.', 
    'distinct' => 'حقل :attribute يحتوي على قيمة مكررة.', 'email' => 
    ':attribute يجب أن يكون عنوان بريد إلكتروني صالحًا.', 'ends_with' => 
    ':attribute يجب أن ينتهي بأحد القيم التالية: :values.', 
    'enum' => ':attribute المحدد غير صالح.', 
    'exists' => ':attribute المحدد غير صالح.', 
    'file' => ':attribute يجب أن يكون ملفًا.', 
    'filled' => 'يجب أن يحتوي حقل :attribute على قيمة.', 
    'gt' => [ 
      'numeric' => ':attribute يجب أن يكون أكبر من :value.', 
      'file' => ':attribute يجب أن يكون أكبر من :value كيلوبايت.', 
      'string' => ':attribute يجب أن يكون أكبر من :value حرفًا.', 
      'array' => ':attribute يجب أن يحتوي على أكثر من :value عنصرًا.', 
    ], 'gte' => [ 
      'numeric' => ':attribute يجب أن يكون أكبر من أو يساوي :value.', 
      'file' => ':attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.', 
      'string' => ':attribute يجب أن يكون أكبر من أو يساوي :value حرفًا.', 
      'array' => ':attribute يجب أن يحتوي على :value عنصرًا أو أكثر.', 
    ], 
    'image' => 'يجب أن يكون :attribute صورة.',
    'in' => ':attribute المحدد غير صالح.',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون :attribute عنوان IP صالحًا.',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صالحًا.',
    'json' => 'يجب أن يكون :attribute سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => 'يجب أن يكون :attribute أصغر من :value.',
        'file' => 'يجب أن يكون :attribute أصغر من :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أصغر من :value حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على أقل من :value عنصرًا.',
    ],
    'lte' => [
        'numeric' => 'يجب أن يكون :attribute أصغر من أو يساوي :value.',
        'file' => 'يجب أن يكون :attribute أصغر من أو يساوي :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أصغر من أو يساوي :value حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على أقل من أو يساوي :value عنصرًا.',
    ],
    'mac_address' => 'يجب أن يكون :attribute عنوان MAC صالحًا.',
    'max' => [
        'numeric' => 'يجب أن لا يكون :attribute أكبر من :max.',
        'file' => 'يجب أن لا يكون حجم :attribute أكبر من :max كيلوبايت.',
        'string' => 'يجب أن لا يتجاوز :attribute عدد الأحرف :max.',
        'array' => 'يجب أن لا يحتوي :attribute على أكثر من :max عنصرًا.',
    ],
    'mimes' => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'mimetypes' => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'min' => [
        'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
        'file' => 'يجب أن يكون حجم :attribute على الأقل :min كيلوبايت.',
        'string' => 'يجب أن يتألف :attribute من على الأقل :min أحرفًا.',
        'array' => 'يجب أن يحتوي :attribute على الأقل على :min عنصرًا.',
    ],
    'multiple_of' => 'يجب أن يكون :attribute مضاعفًا لـ :value.',
    'not_in' => 'القيمة المحددة لـ :attribute غير صالحة.',
    'not_regex' => 'صيغة :attribute غير صالحة.',
    'numeric' => 'يجب أن يكون :attribute رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب توفر حقل :attribute.',
    'prohibited' => 'حقل :attribute محظور.',
    'prohibited_if' => 'حقل :attribute محظور عندما :other يساوي :value.',
    'prohibited_unless' => 'حقل :attribute محظور ما لم يكن :other يساوي :values.',
    'prohibits' => 'حقل :attribute يمنع توفر :other.',
    'regex' => 'صيغة :attribute غير صالحة.',
    'required' => 'حقل :attribute مطلوب.',
    'required_array_keys' => 'يجب توفر مفاتيح :attribute لـ :values.',
    'required_if' => 'حقل :attribute مطلوب عندما :other يساوي :value.',
    'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other يساوي :values.',
    'required_with' => 'حقل :attribute مطلوب عندما يتوفر :values.',
    'required_with_all' => 'حقل :attribute مطلوب عندما تتوفر :values.',
    'required_without' => 'حقل :attribute مطلوب عندما لا يتوفر :values.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا تتوفر أي من :values.',
    'same' => 'يجب أن يتطابق :attribute مع :other.',
    'size' => [
        'numeric' => 'يجب أن يكون :attribute بحجم :size.',
        'file' => 'يجب أن يكون حجم :attribute بحجم :size كيلوبايت.',
        'string' => 'يجب أن يتكون :attribute من :size أحرف.',
        'array' => 'يجب أن يحتوي :attribute على :size عنصرًا.',
    ],
    'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values.',
    'string' => 'يجب أن يكون :attribute نصًا.',
    'timezone' => 'يجب أن يكون :attribute منطقة زمنية صالحة.',
    'unique' => 'قيمة :attribute مستخدمة بالفعل.',
    'uploaded' => 'فشل تحميل الملف :attribute.',
    'url' => 'يجب أن يكون :attribute عنوان URL صالحًا.',
    'uuid' => 'يجب أن يكون :attribute UUID صالحًا.',
    'today' => 'اليوم',
    

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

    'attributes' => [
      'email' => 'البريد الإلكترونى',
      'quran_date' => 'تاريخ القران',
      'is_mosque' => 'فى المسجد'
    ],

    'dates' => [
      'today' => 'اليوم'
    ]

];
