<?php

class ArticleValidator
{
    protected $rules;

    public function __construct()
    {

        $this->rules = [

            'name' => [
                'required' => [
                    'message' => 'Name is required.'
                ],

                'size' => [
                    'value' => 255,
                    'message' => 'Name must be less than 255 chars.'
                ]
            ],

            'body' => [
                'required' => [
                    'message' => 'Body is required.'
                ],
                'size' => [
                    'value' => 10000,
                    'message' => 'Body must be less than 10000 chars.'
                ]
            ]

        ];

    }


    public function validate($data) {

        $errors = [
        ];


        foreach ($this->rules as $fieldName =>  $rule) {
            $fieldNotEmpty = !empty(trim($data[$fieldName]));

            if (isset($rule['required']) && $fieldNotEmpty === false)  {
                $errors[$fieldName] = isset($rule['required']['message']) ?  $rule['required']['message']  : 'Required.';
            }

            if (isset($rule['size']) && $fieldNotEmpty === true) {

                $size = strlen($data[$fieldName]);

                if ($size > $rule['size']['value']) {
                    $errors[$fieldName] = isset($rule['size']['message']) ?  $rule['size']['message']  : 'Size exceeded.';
                }
            }

        }


        return $errors;

    }
}