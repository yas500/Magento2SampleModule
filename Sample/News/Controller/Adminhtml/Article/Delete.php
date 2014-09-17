<?php
/**
 * Sample_News extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category       Sample
 * @package        Sample_News
 * @copyright      Copyright (c) 2014
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
namespace Sample\News\Controller\Adminhtml\Article;

class Delete
    extends \Sample\News\Controller\Adminhtml\Article {
    /**
     * Create new article
     *
     * @return void
     */
    public function execute() {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $article = $this->_objectManager->create('Sample\News\Model\Article');
                $article->load($id);
                $article->delete();
                $this->messageManager->addSuccess(__('The article has been deleted.'));
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
                return;
            }
        }
        $this->messageManager->addError(__('We can\'t find a article to delete.'));
        $this->_redirect('*/*/');
    }
}