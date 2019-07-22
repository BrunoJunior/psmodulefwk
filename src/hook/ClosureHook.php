<?php
/**
 * 2019 BJ
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    BJ <perso@bdesprez.com>
 *  @copyright 2019 BJ
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

namespace bdesprez\psmodulefwk\hook;

use Closure;
use Exception;

/**
 * Description of ClosureHook
 *
 * @author bruno
 */
class ClosureHook extends Hook
{
    /**
     * Execution
     * @var Closure
     */
    private $execution;
    
    /**
     * The hook name
     * @var string
     */
    private $hookName;
    
    /**
     * Init closure
     * @param array $initParams
     * @throws Exception
     */
    protected function init(array $initParams)
    {
        if (count($initParams) !== 2) {
            throw new Exception("Please define a hook name and a closure !");
        }
        if (!$initParams[1] instanceof Closure) {
            throw new Exception("Unable to define a ClosureHook without Closure …");
        }
        $this->hookName = $initParams[0];
        $this->execution = $initParams[1];
    }
    
    /**
     * Run the closure
     * @param array $params
     * @return mixed
     */
    protected function run($params)
    {
        $function = $this->execution;
        return $function($params);
    }

    /**
     * The hook name
     * @return string
     */
    public function getHookName()
    {
        return $this->hookName;
    }

}
