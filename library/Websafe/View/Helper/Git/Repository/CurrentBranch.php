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
 * View helper plugin to fetch the active Git branch of current project.
 */
class CurrentBranch extends AbstractHelper
{
    /**
     * Default location of .git/HEAD
     */
    const HEAD_LOCATION = '.git/HEAD';

    /**
     * Default maximum length og line in HEAD_LOCATION containing the
     */
    const MAX_LINE_LENGHT = 1024;

    /**
     * Retrieve the current branch, if any.
     *
     * If `.git/HEAD` is not available or nor readable, returns null.
     *
     * @return string|null
     */
    public function __invoke()
    {
        // When self::HEAD_LOCATION is a file and is readable:
        if (is_readable(self::HEAD_LOCATION) && is_file(self::HEAD_LOCATION)) {
            // Try to initialize a file pointer resource:
            if (false !== ($fp = @fopen(self::HEAD_LOCATION, 'r'))) {
                // and if the pointer was initialized with success
                // try to read the first line from self::HEAD_LOCATION:
                if (false !== ($line = fgets($fp, self::MAX_LINE_LENGHT))) {
                    // strip 'ref: refs/heads/' and return the branch name:
                    return trim(str_replace('ref: refs/heads/', '', $line));
                }
            }
        }

        return null;
    }
}
