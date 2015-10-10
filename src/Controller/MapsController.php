<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class MapsController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function beforeFilter(Event $event) {
        $this->Auth->allow('nearby');
    }
    public function index()
    {
    }

    public function nearby() {
        $walkers = TableRegistry::get('Walkers');
        $lat = $this->request->data['latitude'];
        $long = $this->request->data['longitude'];
        $query = $walkers->find('all', ['fields' => ['id', 'email', 'bio', 'lat', 'lng', 'name'], 'conditions' => ['Walkers.active =' => true, 'Walkers.lat >' => $lat - .0144, 'Walkers.lat <' => $lat + .0144, 'Walkers.lng >' => $long - .0288, 'Walkers.lng <' => $long + .0288]]);
        $this->set('json', json_encode($query));
    }
}
