<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


trait ExceptionTrait
{

	public function apiException($request, $e)
	{
		if($this->isModel($e))
		{
		    return response()->json([

		        'errors' => 'Model Product Not Found'

		    ], Response::HTTP_NOT_FOUND);
		}

		if($this->isHttp($e))
		{
		    return response()->json([

		        'errors' => 'Model Product Not Found'

		    ], Response::HTTP_NOT_FOUND);
		}

    	return parent::render($request, $e);
	}

	protected function isModel($e)
	{
		return $e instanceof ModelNotFoundException;
	}

	protected function isHttp($e)
	{
		return $e instanceof NotFoundHttpException;
	}

}

?>
