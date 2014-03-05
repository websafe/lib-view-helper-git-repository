Websafe\View\Helper\Git\Repository
==================================

A library of [ZF2] - [View Helpers] for retrieving information about current
application's local [Git] repository.



Quickstart
----------



### Add this package to your [Composer] based application


Add this package to `composer.json` and install in `vendor/` by running:

~~~~ bash
composer require \
    websafe/lib-view-helper-git-repository:0.1.*
~~~~


or

~~~~ bash
php vendor/bin/composer.phar require \
    websafe/lib-view-helper-git-repository:0.1.*
~~~~




### Enable provided [view helpers] in your [ZF2 application]

To enable the provided view helpers in your application - copy the file
`websafe.view.helper.git.repository.global.php.dist` found in
`vendor/websafe/lib-view-helper-git-repository/config/`, to
`config/autoload/websafe.view.helper.git.repository.global.php`.

The copied file declares the required [invokables] for the provided 
[view helpers] in your [ZF2 application].

~~~~ php
return array(
    'view_helpers' => array(
        'invokables' => array(
            'gitRepoCurrentBranch'
                => 'Websafe\View\Helper\Git\Repository\CurrentBranch',
            'gitRepoDescription'
                => 'Websafe\View\Helper\Git\Repository\Description',
        ),
    ),
);
~~~~




### Use provided view helpers in your view scripts



#### Websafe\View\Helper\Git\Repository\CurrentBranch

~~~~ php
<h1><?php echo $this->gitRepoCurrentBranch();?></h1>
~~~~


Result:

~~~~ html
<h1>master</h1>
~~~~



####  Websafe\View\Helper\Git\Repository\Description

~~~~ php
<p><?php echo $this->gitRepoDescription();?><p>
~~~~


Result:

~~~~ html
<p>Unnamed repository; edit this file 'description' to name the repository.</p>
~~~~



[ZF2]: http://framework.zend.com/
[ZF2 application]: https://github.com/zendframework/ZendSkeletonApplication
[View Helpers]: http://framework.zend.com/manual/2.2/en/modules/zend.view.helpers.html
[Git]: http://git-scm.com/
[Composer]: https://getcomposer.org/‎
[invokables]: http://framework.zend.com/manual/2.2/en/modules/zend.view.helpers.advanced-usage.html#registering-helpers