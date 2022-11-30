<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\View\JsonView;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /* set json render */
        $this->RequestHandler->renderAs($this, 'json');
        $this->set('_serialize', true);
    }

    public function viewClasses(): array
    {
        return [JsonView::class];
    }
}
