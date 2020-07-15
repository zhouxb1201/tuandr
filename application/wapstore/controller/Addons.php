<?php

namespace app\wapstore\controller;


/**
 * 插件执行默认控制器
 * Class Addons
 * @package think\addons
 */
class Addons
{

    public function __construct()
    {
       // parent::__construct();
    }

    /**
     * 插件执行
     */
    public function execute($addons = null, $controller = null, $action = null, $addons_type = null)
    {
        
        if (!empty($addons) && !empty($controller) && !empty($action)) {
            $website_id = checkUrl();
            if (!getAddons($addons, $website_id)) {
                    return json(['code' => -1, 'message' => $addons . '应用不存在']);
            }
            // 获取类的命名空间
            if ($addons_type == null) {
                //addon
                $class = get_addon_class($addons, 'addon_controller', $controller);
            } else {
                //addons
                $class = get_addon_class($addons_type, $addons, $controller);
            }
            if (class_exists($class)) {
                // 调用操作
                return \think\App::invokeMethod([$class, $action]);
            } else {

                return json(['code' => -1, 'message' => $addons . '应用不存在']);
                
            }
        }
        return json(['code' => -1, 'message' => $controller . '应用不存在']);
        
    }


}
