<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\I18n\FrozenTime;

/**
 * Rendezvous Controller
 *
 * @property \App\Model\Table\RendezvousTable $Rendezvous
 * @method \App\Model\Entity\Rendezvous[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RendezvousController extends AppController
{

    public function beforeRender(EventInterface $event)
    {
        parent::beforeRender($event);

        $this->set('activeNavItem', 'home');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients'],
        ];
        $rendezvous = $this->paginate($this->Rendezvous);

        $this->set(compact('rendezvous'));
    }

    /**
     * Feed method
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Exception
     */
    public function feed()
    {
        $start = $this->request->getQuery('start');
        $end = $this->request->getQuery('end');

        $query = $this->Rendezvous->find('all')
            ->contain(['Patients'])
            ->where([
                'Rendezvous.date_heure >=' => new \DateTime($start),
                'Rendezvous.date_heure <=' => new \DateTime($end)
            ]);
        $data = [];
        foreach ($query as $rendezvous) {
            $data[] = [
                'id' => $rendezvous->id,
                'title' => $rendezvous->patient->prenom . ' ' . $rendezvous->patient->nom,
                'start' => $rendezvous->date_heure->toDateTimeString(),
                'end' => $rendezvous->date_heure->addMinutes($rendezvous->duree)->toDateTimeString()
            ];
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }

    /**
     * View method
     *
     * @param string|null $id Rendezvous id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rendezvous = $this->Rendezvous->get($id, [
            'contain' => ['Patients'],
        ]);

        $this->set(compact('rendezvous'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Initialisation :
        $rendezvous = $this->Rendezvous->newEmptyEntity();
        $rendezvous->date_heure = new FrozenTime('08:00:00');
        $rendezvous->duree = 60;

        // Utiliser les paramètres passés :
        if ($start = $this->request->getQuery('start')) {
            $rendezvous->date_heure = new FrozenTime($start);

            if ($end = $this->request->getQuery('end')) {
                $dt = new FrozenTime($end);
                $rendezvous->duree = $rendezvous->date_heure->diffInMinutes($dt);
            }
        }

        if ($this->request->is('post')) {
            $rendezvous = $this->Rendezvous->patchEntity($rendezvous, $this->request->getData());
            if ($this->Rendezvous->save($rendezvous)) {
                return $this->disableAutoRender()->response;
            }
            $this->Flash->error('Rendez-vous n’a pas pu être enregistré! Veuillez réessayer.');
        }
        $patients = $this->Rendezvous->Patients->find('list', ['limit' => 200]);
        $this->set(compact('rendezvous', 'patients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rendezvous id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rendezvous = $this->Rendezvous->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $rendezvous = $this->Rendezvous->patchEntity($rendezvous, $this->request->getData());
            if ($this->Rendezvous->save($rendezvous)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Rendez-vous n’a pas pu être enregistré! Veuillez réessayer.');
        }
        $patients = $this->Rendezvous->Patients->find('list', ['limit' => 200]);
        $this->set(compact('rendezvous', 'patients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rendezvous id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rendezvous = $this->Rendezvous->get($id);
        if (!$this->Rendezvous->delete($rendezvous)) {
            $this->Flash->error('Rendez-vous n’a pas pu être supprimé! Veuillez réessayer.');
            return $this->redirect(['action' => 'edit', $id]);
        }
        return $this->redirect(['action' => 'index']);
    }
}
