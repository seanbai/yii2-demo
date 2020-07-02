<?php
namespace console\controllers;

use yii\console\Controller;

class BaseController extends Controller
{
    public $responseData = '';
    /** @var string $description 描述 */
    public $description = '定时任务';
    /**
     * 操作类型，当键为数字时不设置别名
     * [
     *     actionID => [
     *          aliases => option
     *      ]
     * ]
     * @var array
     */
    protected $_options = [];
    /**
     * [
     *     aliases => option
     * ]
     * @var array
     */
    protected $_commonOptions = [];

    /**
     * @param string $actionID
     * @return array
     */
    public function options($actionID)
    {
        $options = $this->_getOptions($actionID);
        return array_merge(array_values($options), parent::options($actionID));
    }

    /**
     * @param $actionID
     * @return array
     */
    protected function _getOptions($actionID){
        if (isset($this->_options[$actionID]))
            return array_merge($this->_commonOptions, $this->_options[$actionID]);

        return $this->_commonOptions;
    }

    /**
     * @return array
     */
    public function optionAliases()
    {
        $aliases = parent::optionAliases();

        $tmp = $this->_commonOptions;
        foreach ($this->_options as $option){
            $tmp = array_merge($tmp, $option);
        }

        foreach ($tmp as $key => $value){
            if (!is_numeric($key))
                $aliases[$key] = $value;
        }

        return $aliases;
    }


    public function afterAction($action, $result)
    {
        return parent::afterAction($action, $result);
    }
}