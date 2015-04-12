<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Core\Controller\ActionController;

use Zend\View\Model\ViewModel;

class IndexController extends ActionController
{
    public function indexAction()
    {
        $productService = $this->getService('Application\Service\Product');
        $product = $productService->get(1);

        return new ViewModel(array(
            'product' => $product
        ));
    }

    public function createProductAction()
    {
        $productService = $this->getService('Application\Service\Product');
        $data = array();
        $productService->create($data);
    }
}
