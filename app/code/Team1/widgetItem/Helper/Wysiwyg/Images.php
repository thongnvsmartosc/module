<?php

namespace Team1\widgetItem\Helper\Wysiwyg;

class Images extends \Magento\Cms\Helper\Wysiwyg\Images
{
    /**
     * Check whether using static URLs is allowed
     *
     * @return bool
     */
    public function isUsingStaticUrlsAllowed()
    {
        return true;
    }
}
