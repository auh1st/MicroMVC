<?php
/**
 * 统计每天pv、uv
 */
namespace Sso\Daemons;
use Framework\Libraries\Daemon;

class CountPVUV extends Daemon {
    public function __construct($params) {
        var_dump($params);
        parent::__construct($params);
    }
    public function init() {
        // 无法处理同时新起相同进程的排重判断
        $num = count($this->getCurrentProcessList());
        if ($num > 1) {
            echo "last CountPVUV task not finish\n";
            exit();
        }
        echo "CountPVUV init\n";
    }
    public function doJob() {
        echo "CountPVUV run\n";
        sleep(8);
        echo "CountPVUV finished\n";
    }
}
