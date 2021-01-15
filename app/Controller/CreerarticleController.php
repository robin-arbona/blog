<?php


namespace App\Controller;


class CreerarticleController extends Controller
{
/** Specific method render taking in count the '-'
 */
    public function render()
    {
        $viewPath = $this->viewPath;
        ob_start();
        require $viewPath .'/creer-article.php';
        $content = ob_get_clean();
        require $viewPath .'/template/template.php';
    }

}