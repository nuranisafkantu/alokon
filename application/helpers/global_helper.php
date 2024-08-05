<?php
    if (!function_exists('checkLogin')) {
        function checkLogin()
        {
            $ci = &get_instance();

            if (!$ci->session->userdata('id')) {
				redirect('auth');
			}
        }
    }

    if (!function_exists('doneLogin')) {
        function doneLogin()
        {
            $ci = &get_instance();

            if ($ci->session->userdata('id')) {
				redirect('dashboard');
			}
        }
    }

    if (!function_exists('checkAkses')) {
        function checkAkses($required_levels)
		{
			$CI =& get_instance();
			$user_level = $CI->session->userdata('role');
			
			if (!is_array($required_levels)) {
				$required_levels = array($required_levels);
			}
			
			if (!in_array($user_level, $required_levels)) {
				redirect('404_override');
			}
		}
    }
?>
