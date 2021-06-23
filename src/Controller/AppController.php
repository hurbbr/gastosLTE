<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use App\Model\Entity\User;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\FrozenDate;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    // public function initialize(): void
    // {
    //     parent::initialize();

    //     $this->loadComponent('RequestHandler');
    //     $this->loadComponent('Flash');

    //     /*
    //      * Enable the following component for recommended CakePHP form protection settings.
    //      * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
    //      */
    //     //$this->loadComponent('FormProtection');
    // }


    public function initialize(): void
    {
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Authorization.Authorization');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        if (isset($this->Authentication) && $this->Authentication->getIdentity()) {
            $usuarioLogado = $this->getUser();
            $this->Authorization->skipAuthorization();

            $this->set(compact(['usuarioLogado']));
        }

        // dd($usuarioLogado);

        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        // $this->Authentication->addUnauthenticatedActions(['index', 'view']);
        // dd($this->Authentication->getResult());
    }

    public function getUser(): User
    {
        $user = $this->Authentication->getIdentity()->getOriginalData();
        unset($user['password']);

        return $user;
    }

    public function trataValor($valor): float
    {

        $valor = str_replace('R$', '', $valor);
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        $valor = trim($valor);

        return floatval($valor);
    }

    public function trataData($data): FrozenDate
    {
        $data = explode('/', $data);
        $data = "{$data[2]}/{$data[1]}/{$data[0]}";

        return new FrozenDate($data);
    }
}
