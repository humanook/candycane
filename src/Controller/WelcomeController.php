<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\NewsTable;
use Cake\Event\EventInterface;
use Cake\Http\Response;
use Cake\ORM\Table;

/**
 * welcome_controller.php
 */
class WelcomeController extends AppController
{
    /**
     * @var \App\Model\Table\NewsTable|\Cake\ORM\Table
     */
    private NewsTable|Table $News;

    /**
     * initialize action
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->News = $this->fetchTable('News');
    }

    /**
     * @param \Cake\Event\EventInterface $event
     * @return void
     */
    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index']);
    }

    /**
     * index action
     */
    public function index(): Response
    {
        $newsEntities = [];
        if ($this->isLoggIn() === true) {
            $newsEntities = $this->News->getLatest($this->currentUser);
        }
        $this->set(compact('newsEntities'));

        return $this->render();
    }
}
