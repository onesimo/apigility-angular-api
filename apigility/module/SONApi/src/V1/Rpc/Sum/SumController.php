<?php
namespace SONApi\V1\Rpc\Sum;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

class SumController extends AbstractActionController
{
    public function sumAction()
    {
        $num1 = $this->params()->fromQuery('num1');
        $num2 = $this->params()->fromQuery('num2');
        $sum = $num1 + $num2;
        return new ViewModel([
           'sum' => $sum 
        ]);
    }
}
