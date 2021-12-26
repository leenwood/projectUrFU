<?php

abstract class BaseController
{

    /**
     * Return template content
     * @param $templateName
     * @param array $vars
     * @return false|string
     */
    protected function render($templateName, $vars = [])
    {
        ob_start();
        extract($vars);
        include sprintf('templates/%s.php', $templateName);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * Return 301 redirect
     * @param $url
     * @return Response
     */
    protected function redirect($url)
    {
        return new Response(
            '/', '301', 'Moved'
        );
    }


    public function __call($name, $arguments)
    {
        return new Response('Sorry but this action not found',
            '404', 'Not found');
    }


}