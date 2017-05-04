<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class ApiController extends Controller {

	protected $statusCode = 200;

	// Getters and Setters
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	// Reponses
	public function respond($data, $headers = [])
	{
		return Response::json($data, $this->getStatusCode(), $headers);
	}

	public function respondNotFound($message = 'Not Found!')
	{
		return $this->setStatusCode(404)->respondWithError($message);
	}

	public function respondInternalError($message = 'Internal Error!')
	{
		return $this->setStatusCode(500)->respondInternalError($message);
	}

	

	// Helper
	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode()
			]
		]);
	}

}