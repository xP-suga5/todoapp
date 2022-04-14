<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    public static $rules = array(
        [
            'content' => 'required||max:20',
        ],
        [
            'content.required' => 'コンテンツ入力してください。',
            'content.max' => '最大文字数は20文字です。',
        ]
    );
}
