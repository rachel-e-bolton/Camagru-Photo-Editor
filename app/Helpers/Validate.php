<?php

class Validate
{
    /**
	 * A password should be at least 8 characters in length and contain at least: a special character, a number and a capital letter.
	 *
	 * @param string $password User supplied password.
	 * 
	 */
    public static function password($password)
    {
        if (strlen($password) < 8)
            return FALSE;
        
        if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password))
            return FALSE;

        if (!preg_match('/[0-9]/', $password))
            return FALSE;

        return TRUE;
    }
}