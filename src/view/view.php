<?php

namespace Sectheater\view;


class view 
{
    public static function make($view, $params = []) {

        $bascContent = self::getBaseContent();
        
        $viewContent = self::getViewContent($view, params: $params);

        echo str_replace('{{content}}', $viewContent, $bascContent);
    } 

    protected static function getBaseContent() {

        ob_start();

        include base_path() . 'view/layout/main.php';

        return ob_get_clean();
    }

    
    public static function makeError($error)
    {
        self::getViewContent($error, true);
    }

    protected static function getViewContent($view, $isError = false, $params = []) {

        $path = $isError ? view_path() . 'errors/' : view_path() ;

        if (str_contains($view, '.')) {
            
            $views = explode('.', $view);

            foreach ($views as $view) {

                if (is_dir($path . $view)) {
                    
                    $path = $path . $view . '/';
                }
            }

            $view = $path . end($views) . '.php'; 
        }

        // foreach($params as $param -> $value) {

        //     $$param = $value;
        // }

        if ($isError) {
            include $view;
        } else {
            ob_start();

            include $view;

            return ob_get_clean();
        }
    }
}

?>