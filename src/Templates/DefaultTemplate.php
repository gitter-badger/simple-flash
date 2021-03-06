<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class DefaultTemplate.
 * Use default Bootstrap 3 markdown for flash messages.
 */
class DefaultTemplate implements TemplateInterface
{
    private $prefix  = '<p>';
    private $postfix = '</p>';
    private $wrapper = '<div class="alert alert-%s" role="alert">%s</div>';

    /**
     * @param $message - message text
     *
     * @return string
     */
    public function wrapMessage($message)
    {
        return $this->getPrefix() . $message . $this->getPostfix();
    }

    /**
     * @param $messages - message text
     * @param $type     - message type: success, info, warning, danger
     *
     * @return string
     */
    public function wrapMessages($messages, $type)
    {
        return sprintf($this->getWrapper(), ($type == 'error') ? 'danger' : $type, $messages);
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return string
     */
    public function getPostfix()
    {
        return $this->postfix;
    }

    /**
     * @param string $postfix
     */
    public function setPostfix($postfix)
    {
        $this->postfix = $postfix;
    }

    /**
     * @param string $wrapper
     */
    public function setWrapper($wrapper)
    {
        $this->wrapper = $wrapper;
    }

    /**
     * @return string
     */
    public function getWrapper()
    {
        return $this->wrapper;
    }
}
