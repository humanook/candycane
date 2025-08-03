<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Log\Log;
use Cake\ORM\Entity;

class News extends Entity
{
    /**
     * @return string
     */
    public function getProjectName(): string
    {
        $ret = "";
        try {
            $entity = $this->get('project');
            $ret = $entity->get('name');
        } catch (\Exception $ex) {
            Log::debug($ex->getMessage());
        }
        return $ret;
    }

    /**
     * @return string
     */
    public function getProjectId(): string
    {
        $ret = "";
        try {
            $entity = $this->get('project');
            $ret = $entity->get('identifier');
        } catch( \Exception $ex) {
            Log::debug($ex->getMessage());
        }
        return $ret;
    }

    /**
     * @return string
     */
    public function getAuthorFullName(): string
    {
        $ret = "";
        try {
            $entity = $this->get('author');
            $ret = $entity->getFullName();
        } catch (\Exception $ex) {
            Log::debug($ex->getMessage());
        }
        return $ret;
    }
}
