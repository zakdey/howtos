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

class IndexController extends AbstractActionController
{
    private $recepyService;

    public function __construct(RecepyService $recepyService) {
        $this->recepyService = $recepyService;
    }

    public function indexAction()
    {
      return new ViewModel([
          'list' => $this->recepyService->getRecepyList()
      ]);
    }
    public function recepiesAction()
    {
        return new ViewModel();
    }
    public function singleAction()
    {
        return new ViewModel();
    }
}
