<?php

if (!function_exists('set_message')) {
    /**
     * @param string $type
     * @param string $text
     * @return void
     */
    function set_message(string $type, string $text) :void {
        $_SESSION['message'] = [
            'type' => $type,
            'text' => $text
        ];
    }
}