<?php
declare(strict_types=1);

namespace App\Domains\UserActivity;

/**
 * Entity
 *
 * 集約ルート
 */
class UserActivity
{
    // 記事を編集中にしておける最大数
    private const EDITING_LIMIT = 5;

    private function __construct()
    {
        //
    }

    final public static function getEditingLimit(): int
    {
        return self::EDITING_LIMIT;
    }
}
