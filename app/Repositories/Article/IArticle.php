<?php
declare(strict_types=1);

namespace App\Repositories\Media;

use App\Domains\Media;

interface IMediaRepository
{
    public function getMedia(): Media;
}
