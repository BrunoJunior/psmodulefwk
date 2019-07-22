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

use bdesprez\psmodulefwk\ILabeledKeys;

/**
 * Description of InputSelect
 *
 * @author bruno
 */
class InputSelect extends InputForm
{

    /**
     * Options
     * @var array
     */
    private $options;

    /**
     * Select input
     * @param ILabeledKeys $labeledKeys
     * @param string $name
     * @param array $options ['query' => $array_of_rows, 'id' => 'id_carrier']
     * @return InputSelect
     */
    public static function getInstance(ILabeledKeys $labeledKeys, $name, array $options)
    {
        $input = new InputSelect($name, $labeledKeys->getLabelByKey($name));
        $input->options = $options;
        return $input;
    }

    /**
     * Attributs spécifiques au type
     * @return array
     */
    protected function getPrestaShopArrayFormat()
    {
        return [
            'options' => $this->options,
        ];
    }

    /**
     * select
     * @return string
     */
    protected function getType()
    {
        return static::TYPE_SELECT;
    }

    /**
     * @param array $array
     * @param string $idKey
     * @param string $valueKey
     * @return array
     */
    public static function arrayToOptions(array $array, $idKey = 'id', $valueKey = 'value') {
        return [
            'query' => $array,
            'id' => $idKey,
            'name' => $valueKey,
        ];
    }

}
