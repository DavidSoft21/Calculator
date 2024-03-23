<?php

// Importing necessary classes
namespace App\Backend\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Utils\Controllers\Controller;
use App\Backend\Models\Calculator\CalculatorModel;

/** 
 * HomeController class
 * 
 * This class is responsible for handling requests to the application's home page.
 * It extends the base Controller class.
 * 
 * @author DavidSoft21
 * @date 2024-02-19
 * @email emer.riascos@correounivalle.edu.co
 */
class HomeController extends Controller
{
    /**
     * index method
     *
     * This method is responsible for generating and sending the response for the welcome page.
     * It prepares the data for the view and then returns the view.
     *
     * @param array $request The request data
     * @return string The view
     */
    public function index($request)
    {
        // Preparing the data for the view
        $data = ['content' =>  ''];
        $view =  $this->view('wellcome', $data);

        // Preparing the layout view
        $data = [
            'title' => 'Welcome',
            'app_description' => 'Welcome, to TaskListAPP page index...',
            'content' =>  $view,
            'showHome' => false,
            'showAbout' => true,
            'showContact' => true,
            'showCalculator' => true,
            'showServices' => true
        ];
        $view =  $this->view('layouts/main', $data);

        // Returning the view
        return $view;
    }

    /**
     * suma method
     *
     * This method is responsible for performing the addition operation and returning the result as a JSON response.
     *
     * @param array $request The request data
     * @return string The JSON response
     */
    public function suma($request)
    {
        // Performing the addition operation
        $calculator = new CalculatorModel($request['numeroA'], $request['numeroB'], '+');
        $result = $calculator->suma();

        // Preparing and returning the JSON response
        header('Content-Type: application/json');
        return json_encode($this->result(['response' => $result]));
    }

    /**
     * resta method
     *
     * This method is responsible for performing the subtraction operation and returning the result as a JSON response.
     *
     * @param array $request The request data
     * @return string The JSON response
     */
    public function resta($request)
    {
        // Performing the subtraction operation
        $calculator = new CalculatorModel($request['numeroA'], $request['numeroB'], '-');
        $result = $calculator->resta();

        // Preparing and returning the JSON response
        header('Content-Type: application/json');
        return json_encode($this->result(['response' => $result]));
    }

    /**
     * multiplicacion method
     *
     * This method is responsible for performing the multiplication operation and returning the result as a JSON response.
     *
     * @param array $request The request data
     * @return string The JSON response
     */
    public function multiplicacion($request)
    {
        // Performing the multiplication operation
        $calculator = new CalculatorModel($request['numeroA'], $request['numeroB'], '*');
        $result = $calculator->multiplicacion();

        // Preparing and returning the JSON response
        header('Content-Type: application/json');
        return json_encode($this->result(['response' => $result]));
    }

    /**
     * division method
     *
     * This method is responsible for performing the division operation and returning the result as a JSON response.
     *
     * @param array $request The request data
     * @return string The JSON response
     */
    public function division($request)
    {
        // Performing the division operation
        $calculator = new CalculatorModel($request['numeroA'], $request['numeroB'], '/');
        $result = $calculator->division();

        // Preparing and returning the JSON response
        header('Content-Type: application/json');
        return json_encode($this->result(['response' => $result]));
    }
}
