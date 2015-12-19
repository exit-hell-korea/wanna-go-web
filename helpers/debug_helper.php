<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Outputs an array or variable
*
* @param    $var array, string, integer
* @return    string
*/

    function debug_log($var = '', $file_name='')
    {
        if (is_array($var) || is_object($var))
        {
            ob_start();
            print_r($var);
            $_var = ob_get_clean();

            debug_write_log($_var,$file_name);
        }
            else
        {
            debug_write_log($var,$file_name);
        }
    }
// --------------------------------------------------------------------

    /**
     * debug_write_log Log File
     *
     * Generally this function will be called using the global log_message() function
     *
     * @param   string  the error message
     * @param   bool    whether the error is a native PHP error
     * @return  bool
     */
    function debug_write_log($msg,$file_name)
    {

        $config =& get_config();

        $_log_path = ($config['log_path'] != '') ? $config['log_path'] : APPPATH.'logs/';

        $_path = $_log_path.date('Y')."/";
        if(!is_dir($_path)) {
            @mkdir($_path, 0777, TRUE);
            @chmod($_path, 0777);
        }

        $_path = $_log_path.date('Y')."/".date('m')."/";
        if(!is_dir($_path)) {
            @mkdir($_path, 0777, TRUE);
            @chmod($_path, 0777);
        }

        $_path = $_log_path.date('Y')."/".date('m')."/".$file_name."/";
        if(!is_dir($_path)) {
            @mkdir($_path, 0777, TRUE);
            @chmod($_path, 0777);
        }

        if ($file_name) {
           $filepath = $_path.'log-'.$file_name.'-'.date('Y-m-d').'.php';
        }else{
            $filepath = $_path.'log-'.date('Y-m-d').'.php';
        }

        $message  = '';

        if ( ! file_exists($filepath))
        {
            $message .= "<"."?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?".">\n\n";
        }

        if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
        {
            return FALSE;
        }


        $message .= date($config['log_date_format']). ' --> '.$msg."\n";

        flock($fp, LOCK_EX);
        fwrite($fp, $message);
        flock($fp, LOCK_UN);
        fclose($fp);

        @chmod($filepath, FILE_WRITE_MODE);
        return TRUE;
    }

//------------------------------------------------------------------------------
//
/**
* Outputs an array or variable
*
* @param    $var array, string, integer
* @return    string
*/

    function debug_var($var = '')
    {
        echo _before();
        if (is_array($var) || is_object($var))
        {
            print_r($var);
        }
            else
        {
            echo $var;
        }
        echo _after();
    }

//------------------------------------------------------------------------------


/**
* Outputs the last query
*
* @return    string
*/

    function debug_last_query()
    {
        $CI =& get_instance();
        echo _before();
        echo $CI->db->last_query();
        echo _after();
    }

//------------------------------------------------------------------------------

/**
* Outputs the query result
*
* @param    $query object
* @return    string
*/

    function debug_query_result($query = '')
    {
        echo _before();
        print_r($query->result_array());
        echo _after();
    }

//------------------------------------------------------------------------------

/**
* Outputs all session data
*
* @return    string
*/
    function debug_session()
    {
        $CI =& get_instance();
        echo _before();
        print_r($CI->session->all_userdata());
        echo _after();
    }

//------------------------------------------------------------------------------

/**
* Logs a message or var
*
* @param    $message array, string, integer
* @return    string
*/

    function debug_log_msg($message = '')
    {
        is_array($message) ? log_message('debug', print_r($message)) : log_message('debug', $message);
    }

//------------------------------------------------------------------------------

/**
* _before
*
* @return    string
*/
    function _before()
    {
        $before = '<div style="padding:10px 20px 10px 20px; background-color:#fbe6f2; border:1px solid #d893a1; color: #000; font-size: 12px;>'."\n";
        $before .= '<h5 style="font-family:verdana,sans-serif; font-weight:bold; font-size:18px;">Debug Helper Output</h5>'."\n";
        $before .= '<pre>'."\n";
        return $before;
    }

//------------------------------------------------------------------------------

/**
* _after
*
* @return    string
*/

    function _after()
    {
        $after = '</pre>'."\n";
        $after .= '</div>'."\n";
        return $after;
    }

//------------------------------------------------------------------------------


    function debug_log_master($var = '', $file_name='')
    {
        if(IS_REAL){
            $ci = & get_instance();

            $ci->lib_gearman->gearman_master_client();
            $g_data = array();
            $g_data['name'] = $_SERVER['SERVER_ADDR'].'_'.$file_name;
            $g_data['str'] = $var;
            $ci->lib_gearman->do_job_background('debugLog', serialize($g_data));
        }else{

            debug_log($var,$file_name);
        }

    }

    function debug_log_master_one($var = '', $file_name='')
    {
        if(IS_REAL){
            $ci = & get_instance();

            $ci->lib_gearman->gearman_master_client();
            $g_data = array();
            $g_data['name'] = $file_name;
            $g_data['str'] = $var;
            $ci->lib_gearman->do_job_background('debugLog', serialize($g_data));
        }else{

            debug_log($var,$file_name);
        }

    }
 ?>
