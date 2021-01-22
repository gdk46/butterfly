<?php

/**
 * Gleisson Neves - Copyright (c) Gleisson Neves (https://github.com/gdk46)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author     Gleisson Neves (https://github.com/gdk46)
 * @copyright  Copyright (c) Gleisson Neves (https://github.com/gdk46)
 * @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Armazena as configurações de acesso a banco de dados todos os ambientes
 * necessários.
 *
 * @package Pattern
 * @category Configurations
 * @version 1.0
 */

namespace Butterfly\Patterns;

class Controller
{

    /**
     * modelos de Controller para obejetos
     *
     * @param String $nameObj name Class
     * @return String
     */
    public function moldController(string $nameObj)
    {

        return '<?php
            namespace Controller;
            
            use Dao\\' . ucfirst($nameObj) . 'Dao;
            use Exception;
            
            class ' . ucfirst($nameObj) . 'Controller 
            {
                private object $dao;
                
                public function __construct()
                {
                    $this->dao = new ' . ucfirst($nameObj) . 'Dao();
                }
                
                /**
                 * Page
                 *
                 * @return void
                 */
                public function index()
                {        
                    try {            
                        $loader   = new \Twig\Loader\FilesystemLoader("' . $nameObj . '/");
                        $twig     = new \Twig\Environment($loader);
                        $template = $twig->load("vizualizar.html");
                        

                        $conteudo = $template->render(array("to funfa"));
                        echo $conteudo;
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                }

                /**
                 * Page
                 *
                 * @return void
                 */
                public function change($id)
                {
                    $loader = new \Twig\Loader\FilesystemLoader("' . $nameObj . '/");
                    $twig = new \Twig\Environment($loader);
                    $template = $twig->load("update.html");

                    $arrDao = $this->dao->read("WHERE id = {$id}");

                    $conteudo = $template->render($arrDao);
                    echo $conteudo;
                }

                /**
                 * action
                 * 
                 * @return void
                 */
                public function create()
                {
                    try {
                        $arrDao = $this->dao->create($_POST);
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                }

                /**
                 * action
                 * 
                 * @return void
                 */
                public function read()
                {
                    try {
                        $arrDao = $this->dao->read();
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                }

                /**
                 * action
                 * 
                 * @return void
                 */
                public function update()
                {
                    try {
                        $arrDao = $this->dao->update($_POST);
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    
                }

                /**
                 * action
                 * 
                 * @return void
                 */
                public function delete($id)
                {
                    $arrDao = $this->dao->delete($id);
                }
            }
        ';
    }
}
