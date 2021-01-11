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

namespace Patterns;

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
            
            class ' . ucfirst($nameObj) . 'Controller 
            {
                private object $dao;
                
                public function __construct()
                {
                    $this->dao = new ' . ucfirst($nameObj) . 'Dao();
                }
                        
                
                /**
                 * Undocumented function
                 *
                 * @param array $arrData
                 * @return void
                 */
                public function create(array $arrData)
                {
                    $this->dao->create($arrData);
                }

                /**
                 * Undocumented function
                 *
                 * @param string $query
                 * @return void
                 */
                public function read(string $query = NULL)
                {
                    $this->dao->read($query);
                }

                /**
                 * Undocumented function
                 *
                 * @param int $id
                 * @param array $arrData
                 * @return void
                 */
                public function update(array $arrData, int $id)
                {
                    $this->dao->update($arrData, $id);
                }

                /**
                 * delete element from table of  
                 *
                 * @param int $id
                 * @return void
                 */
                public function delete(int $id)
                {
                    $this->dao->delete($id);
                }
            
            }
        ';
    }
}
