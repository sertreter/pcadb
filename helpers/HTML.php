<?php
class HTML
{
    public static function printCss()
    {
        $css = include_once ROOT . '/config/html_css_set.php';
        foreach ($css as $src)
        {
               echo "<link href=\"$src\" rel='stylesheet' type='text/css'>\n";
        }
    }
    public static function printJs()
    {
        $js = include_once ROOT . '/config/html_js_set.php';
        foreach ($js as $src) {
                echo "<script src='$src'></script> \n";
        }
    }
    public static function startPage()
    {
        echo <<<START
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
START;
    }
    public static function startHead()
    {
        echo <<<START
        <head>
            <meta name="keywords" content="" />
            <meta name="description" content="" />
START;
    }
    public static function setTitle($title)
    {
        echo "<title>$title</title>";
    }
    public static function endHead()
    {
        echo "</head>";
    }
    public static function startBody()
    {
        echo "<body>";
    }
    public static function endBody()
    {
        echo "</body>";
    }
    public static function endPage()
    {
        echo "</html>";
    }
}
