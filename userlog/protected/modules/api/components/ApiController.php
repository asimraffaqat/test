<?php
/**
 * Api Base Controller
 */
class ApiController extends FrontEndController
{
    public $layout = false;
    
	public function filters()
    {
        return array(
            // we only want to allow post requests on this base controller
            'postOnly',
            'accessControl',
        );
    }
 
    public function accessRules()
    {
        return array(

            array('allow',
                'users'=>array('*'),
                 'actions'=>array(
                     'test',
                 ),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
    private function _getStatusCodeMessage($status)
	{
	    // these could be stored in a .ini file and loaded
	    // via parse_ini_file()... however, this will suffice
	    // for an example
	    $codes = Array(
	        200 => 'OK',
	        400 => 'Bad Request',
	        401 => 'Unauthorized',
	        402 => 'Payment Required',
	        403 => 'Forbidden',
	        404 => 'Not Found',
	        500 => 'Internal Server Error',
	        501 => 'Not Implemented',
	    );
	    return (isset($codes[$status])) ? $codes[$status] : '';
	}

    protected function sendResponse($status = 200, $message = '', $contentType = 'json', $force200Status = true)
    {
        // checks if we are forcing 200 status OK or not, api default error checks should send false on  $force200Status
        if($force200Status){
            $response['data'] = $message;

            if($status == 200){
                $response['status'] = 'true';
            }
            else{
                $response['status'] = 'false';
            }
            // dont want to do this, but on request of app team putting 200 status on all responses
            // need to improve this in future
            $status = 200;
        }
        else{
            $response = $message;
        }    

    	$status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
	    
	    header($status_header);
	    header('Content-type: ' . $contentType);
	    
        echo CJSON::encode($response);
    }

    protected function getJsonRequest ($returnJson = false)
    {
        //read the post input (use this technique if you have no post variable name):
        //$request = file_get_contents("php://input");
        $request = Yii::app()->request->rawBody;

        // if raw json is required
        if($returnJson)
            return $request;
        
        //decode json post input as php array:
        return CJSON::decode($request, true);
    }

}