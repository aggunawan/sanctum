<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self HTTP_CREATED_CODE()
 * @method static self HTTP_SUCCESS_CODE()
 * @method static self HTTP_CREATED_MESSAGE()
 * @method static self HTTP_SUCCESS_MESSAGE()
 * @method static self TOKEN()
 */
final class Constant extends Enum
{
	/**
	 * Override enums value
	 * 
	 * @return array
	 */
	protected static function values(): array
    {
        return [
            'HTTP_CREATED_CODE' => 201,
            'HTTP_CREATED_MESSAGE' => 'created',
            'HTTP_SUCCESS_CODE' => 200,
            'HTTP_SUCCESS_MESSAGE' => 'success',
        ];
    }
}
