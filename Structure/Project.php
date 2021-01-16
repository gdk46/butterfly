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
 * Armazena as configurações de estrutura 
 *
 * @package Structure
 * @category Configurations
 * @version 1.0
 */

namespace Butterfly\Structure;

class Project
{
    private array $structureFolder;
    private array $structureFile;
    private string $nameProject;

    public function __construct(string $nameProject)
    {
        $this->nameProject = $nameProject;
    }

    /**
     *
     * @return array
     */
    public function getStructureFolder(): array
    {
        return $this->structureFolder;
    }

    /**
     * Set structure folder 
     *
     * @param array $structureFolder
     * @return array
     */
    public function setStructureFolder(array $structureFolder): array
    {
        return $this->structureFolder = $structureFolder;
    }

    /**
     * Set structure file 
     *
     * @param array $structureFolder
     * @return array
     */
    public function setStructureFile(array $structureFile): array
    {
        return $this->structureFile = $structureFile;
    }

    /**
     *
     * @return array
     */
    public function getStructureFile(): array
    {
        return $this->structureFile;
    }

    /**
     *
     * @return string
     */
    public function getNameProject(): string
    {
        return $this->nameProject;
    }

    /**
     * Set name project
     *
     * @param string $nameProject
     * @return string
     */
    public function setNameProject(string $nameProject): string
    {
        return $this->nameProject = $nameProject;
    }

    /**
     * @return string
     */
    public function getPathController(): string
    {
        return "{$this->getNameProject()}/app/Controller/";
    }

    /**
     * @return string
     */
    public function getPathModel(): string
    {
        return "{$this->getNameProject()}/app/Model/";
    }

    /**
     * @return string
     */
    public function getPathDao(): string
    {
        return "{$this->getNameProject()}/app/Dao/";
    }

    /**
     * @return string
     */
    public function getPathView(): string
    {
        return "{$this->getNameProject()}/resources/View";
    }

    /**
     * @return string
     */
    public function getPathApi(): string
    {
        return "{$this->getNameProject()}/app/Api/";
    }

    /**
     * structure of the project to be created
     *
     * @return array
     */
    public function structure(): array
    {
        return $this->structureFolder = [
            "{$this->getNameProject()}/",
            "{$this->getNameProject()}/app",
            "{$this->getNameProject()}/app/Api",
            "{$this->getNameProject()}/app/Api/Repository",
            "{$this->getNameProject()}/app/Api/Service",
            "{$this->getNameProject()}/app/Controller",
            "{$this->getNameProject()}/app/Dao",
            "{$this->getNameProject()}/app/Libs",
            "{$this->getNameProject()}/app/Model",
            "{$this->getNameProject()}/app/Util",
            "{$this->getNameProject()}/app/Vendor",
            "{$this->getNameProject()}/Environment",
            "{$this->getNameProject()}/Environment/Tests",
            "{$this->getNameProject()}/Environment/Config",
            "{$this->getNameProject()}/resources",
            "{$this->getNameProject()}/resources/assets",
            "{$this->getNameProject()}/resources/assets/boot",
            "{$this->getNameProject()}/resources/assets/css",
            "{$this->getNameProject()}/resources/assets/js",
            "{$this->getNameProject()}/resources/assets/img",
            "{$this->getNameProject()}/resources/assets/img/icon",
            "{$this->getNameProject()}/resources/assets/img/wllp",
            "{$this->getNameProject()}/resources/assets/libs",
            "{$this->getNameProject()}/resources/View",
            "{$this->getNameProject()}/resources/View/home",
            "{$this->getNameProject()}/resources/View/__layout__",
        ];
    }

    /**
     * file structure of the project to be created
     *
     * @return array
     */
    public function structureFile(): array
    {
        return $this->structureFolder = [
            "{$this->getNameProject()}/autoload.php",
            "{$this->getNameProject()}/.gitignore",
            "{$this->getNameProject()}/app/composer.json",
            "{$this->getNameProject()}/app/Controller/HomeController.php",
            "{$this->getNameProject()}/app/Controller/ErroController.php",
            "{$this->getNameProject()}/Environment/Config/Env.php",
            "{$this->getNameProject()}/resources/View/__layout__/layout.html",
            "{$this->getNameProject()}/resources/View/.htaccess",
            "{$this->getNameProject()}/resources/View/home",
            "{$this->getNameProject()}/resources/View/home/login.html",
            "{$this->getNameProject()}/resources/View/home/registre.html",
            "{$this->getNameProject()}/resources/View/home/recovery.html",
            "{$this->getNameProject()}/resources/View/home/home.html",
            "{$this->getNameProject()}/resources/View/index.php",
        ];
    }
}
