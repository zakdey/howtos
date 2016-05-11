<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Service\RecepyService;
use Application\Form\RecepyForm;

class BackofficeController extends AbstractActionController
{

    private $recepyService;
    private $recepyForm;
    private $auth;


    public function __construct(RecepyService $recepyService, RecepyForm $recepyForm/*, $auth*/) {
        $this->recepyService = $recepyService;
        $this->recepyForm = $recepyForm;
        /*$this->auth = $auth;*/
    }
    public function indexAction()
    {
      return new ViewModel([
          'list' => $this->recepyService->getUserRecepyList()
      ]);
    }
    public function createAction()
    {
      if ($this->getRequest()->isPost()) {
          $request = $this->getRequest();

          // merge dati che arrivano dalla form
          $postData = array_merge_recursive(
              $request->getPost()->toArray()/*,
              $request->getFiles()->toArray()*/
          );

          $this->recepyForm->setData($postData);

          if ($this->recepyForm->isValid()) {

              $recepy = $this->recepyService->createNewRecepy($postData);

              // salvataggio del file nella posizione finale
              /*if (!empty($postData['immagine'])) {
                  move_uploaded_file($postData['immagine']['tmp_name'], '/srv/apps/corso/public/prodotti/' . $prodotto->getCodice() . '.jpg');
              }*/

              /*$mail = new Mail\Message();
              $mail->setBody('Nuovo prodotto '.$postData['nome'].' creato con successo.');
              $mail->setFrom('info@corso.mv', 'MvChocolates');
              $mail->addTo('my@example.com');
              $mail->setSubject('Prodotto aggiunto');

              $this->transport->send($mail);*/

              $this->redirect()->toRoute('backoffice');

          }
      }

      return new ViewModel([
          'form' => $this->recepyForm
      ]);
    }
    public function updateAction()
    {
      $id = $this->params()->fromRoute('id');
      if ($this->getRequest()->isPost()) {
          $request = $this->getRequest();

          // merge dati che arrivano dalla form
          $postData = array_merge_recursive(
              $request->getPost()->toArray()
          );

          $this->recepyForm->setData($postData);

          if ($this->recepyForm->isValid()) {
              $recepy = $this->recepyService->updateRecepy($id, $postData);
              $this->redirect()->toRoute('backoffice');
          }
      }
      $recepy = $this->recepyService->getRecepy($id);
      return new ViewModel([
          'form' => $this->recepyForm->setData(["title"=>$recepy->getTitle(), "content"=>$recepy->getContent()])
      ]);
    }
}
