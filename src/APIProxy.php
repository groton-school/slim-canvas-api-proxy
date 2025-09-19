<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\CanvasLMS;

use GrotonSchool\OAuth2\Client\Provider\CanvasLMS;
use GrotonSchool\Slim\OAuth2\APIProxy\Domain\Provider\ProviderInterface;
use GrotonSchool\Slim\OAuth2\APIProxy\Domain\Provider\Defaults;

class APIProxy extends CanvasLMS implements ProviderInterface
{
    use Defaults\AuthorizedRedirect;
    use Defaults\Headers;
    use Defaults\AccessTokenRepository;

    public function getSlug(): string
    {
        return 'canvas';
    }

    public function getBaseApiUrl(): string
    {
        return $this->canvasInstanceUrl;
    }
}
