<?php
/**
 * Websafe\View\Helper\Git\Repository
 *
 * @link http://github.com/websafe/lib-view-helper-git-repository/
 * @copyright Copyright (c) 2013-2015 WEBSAFE.PL (http://websafe.pl/)
 * @license BSD-3-Clause
 */

namespace Websafe\View\Helper\Git\Repository;

use Zend\View\Helper\AbstractHelper;

/**
 * View helper plugin for retrieving the local repo's description.
 */
class Description extends AbstractHelper
{
    /**
     * Default location of `.git/description`
     */
    const DESCRIPTION_PATH = '.git/description';

    /**
     * Retrieve the description of the current local repository, if any.
     *
     * If `.git/description` is not available or not readable, returns null.
     *
     * @return string|null
     */
    public function __invoke()
    {
        // When self::DESCRIPTION_LOCATION is a file and is readable:
        if (is_readable(self::DESCRIPTION_PATH)
            && is_file(self::DESCRIPTION_PATH)) {
            // Try to get its content:
            if (false !== ($c = file_get_contents(self::DESCRIPTION_PATH))) {
                // and return the content:
                return $c;
            }
        }
        // otherwise be quiet:
        return null;
    }
}
