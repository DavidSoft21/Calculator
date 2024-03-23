<?php

namespace App\Support\Utils\Responses;

/** 
 * @author DavidSoft21
 * @date 2024-02-22
 * @email emer.riascos@correounivalle.edu.co
 * 
 */


/**
 * Class Responses for handling HTTP responses.
 */
class  Response
{


    public $response = [
        'status' => 200,
        'message' => 'ok',
        'data' => []
    ];


    /**
     * Constructor of the Responses class.
     *
     * @param int $status HTTP status code.
     * @param string $message Response message.
     * @param array $data Response data.
     * @return array The response array.
     */
    public function __construct($status = 200, $msg = 'OK', $data = [])
    {
        $this->response['status'] = $status;
        $this->response['message'] = $msg == '' ? 'OK' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }

    /**
     * Method to handle 200 response (result).
     *
     * @param string $msg Response message.
     * @return array Response with the message.
     */
    public function result($msg = '', $data = [])
    {
        $this->response['status'] = 200;
        $this->response['message'] = $msg == '' ? 'OK' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }

    /**
     * Method to handle 405 error (Method Not Allowed).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_405($msg = '', $data = [])
    {
        $this->response['status'] = 405;
        $this->response['message'] = $msg == '' ? 'Method Not Allowed' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }

    /**
     * Method to handle 404 error (Not Found).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_404($msg = '', $data = [])
    {
        $this->response['status'] = 404;
        $this->response['message'] = $msg == '' ? 'Not Found' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }

    /**
     * Method to handle 500 error (Internal Server Error).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_500($msg = '', $data = [])
    {
        $this->response['status'] = 500;
        $this->response['message'] = $msg == '' ?  'Internal Server Error' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }

    /**
     * Method to handle 400 error (Bad Request).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_400($msg = '', $data = [])
    {
        $this->response['status'] = 400;
        $this->response['message'] = $msg == '' ? 'Bad Request' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }


    /**
     * Method to handle 401 error (Unauthorized).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_401($msg = '', $data = [])
    {
        $this->response['status'] = 401;
        $this->response['message'] = $msg == '' ? 'Unauthorized' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }

    /**
     * Method to handle 403 error (Forbidden).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_403($msg = '', $data = [])
    {
        $this->response['status'] = 403;
        $this->response['message'] = $msg == '' ? 'Forbidden' : $msg;
        $this->response['data'] = $data;

        return $this->response;
    }


    /**
     * Method to handle 200 error (OK).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_422($msg = '', $data = [])
    {
        $this->response['status'] = 422;
        $this->response['message'] = $msg == '' ? 'Unprocessable Entity' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }

    /**
     * Method to handle 409 error (Conflict).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_409($msg = '', $data = [])
    {
        $this->response['status'] = 409;
        $this->response['message'] = $msg == '' ? 'Conflict' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }

    /**
     * Method to handle 503 error (Service Unavailable).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_503($msg = '', $data = [])
    {
        $this->response['status'] = 503;
        $this->response['message'] =  $msg == '' ? 'Service Unavailable' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }

    /**
     * Method to handle 504 error (Gateway Timeout).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_504($msg = '', $data = [])
    {
        $this->response['status'] = 504;
        $this->response['message'] = $msg == '' ? 'Gateway Timeout' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }


    /**
     * Method to handle 502 error (Bad Gateway).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_502($msg = '', $data = [])
    {
        $this->response['status'] = 502;
        $this->response['message'] = $msg == '' ? 'Bad Gateway' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }

    /**
     * Method to handle 501 error (Not Implemented).
     *
     * @param string $msg Error message.
     * @return array Response with the error.
     */
    public function error_501($msg = '', $data = [])
    {
        $this->response['status'] = 501;
        $this->response['message'] = $msg == '' ? 'Not Implemented' : $msg;
        $this->response['data'] = $data;
        return $this->response;
    }
}
