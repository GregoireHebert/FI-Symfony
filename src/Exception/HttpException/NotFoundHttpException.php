<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;

class NotFoundHttpException extends \Exception implements RequestExceptionInterface {
}