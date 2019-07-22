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

namespace bdesprez\psmodulefwk\form;

/**
 * Description of InputRadio
 *
 * @author bruno
 */
class InputRadio extends InputFormValues
{

    /**
     * This is only useful if type == radio. It displays a "yes or no" choice
     * @var boolean
     */
    private $isBool;

    /**
     * Radio button
     * @param string $name
     * @param string $label
     * @param array $values
     * @param boolean $isBool
     * @return InputRadio
     */
    public static function getInstance($name, $label, array $values, $isBool = false)
    {
        $input = new InputRadio($name, $label);
        $input->isBool = $isBool;
        $input->values = $values;
        return $input;
    }

    /**
     * Attributs spécifiques au type
     * @return array
     */
    protected function getPrestaShopArrayFormat()
    {
        return [
            'values' => $this->values,
            'is_bool' => $this->isBool,
        ];
    }

    /**
     * radio
     * @return string
     */
    protected function getType()
    {
        return static::TYPE_RADIO;
    }

}
