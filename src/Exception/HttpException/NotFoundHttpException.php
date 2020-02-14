<?php

namespace App\Exception\HttpException;

use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;

class NotFoundHttpException extends \Exception implements RequestExceptionInterface {
}