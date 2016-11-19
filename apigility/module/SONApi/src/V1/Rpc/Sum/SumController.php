<?php
namespace SONApi\V1\Rpc\Sum;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Http\Request;

class SumController extends AbstractActionController
{
    public function sumAction()
    {   
        $method = $this->getRequest()->getMethod();
        $num1 = $method == Request::METHOD_GET ? 
            $this->params()->fromQuery('num1') : $this->params()->fromPost('num1'); 
        $num2 = $method == Request::METHOD_GET ? 
            $this->params()->fromQuery('num2') : $this->params()->fromPost('num2'); 
         
        $sum = $num1 + $num2;
        return new ViewModel([
           'sum' => $sum 
        ]);
    }
}
