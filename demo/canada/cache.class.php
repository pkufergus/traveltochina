<?php
/**
 * Cache
 * @author Jason.Wei <jasonwei06@hotmail.com>
 * @license http://www.sunbloger.com/
 * @version 2.0 utf-8
 */

class cache
{
    /**
     * 缓存目录
     * 
     * @var string
     */
    protected $cache_dir = './cache/';
    
    /**
     * 缓存生命周期（单位：秒）
     * 
     * @var int
     */
    protected $cache_lifetime = 18000;
    
    /**
     * 设置缓存目录
     * 
     * @param string $dir 目录
     */
    public function setCacheDir($dir)
    {
        $this->cache_dir = $dir;
    }
    
    /**
     * 设置缓存生命周期
     * 
     * @param int $second 秒
     */
    public function setCacheLeftTime($second)
    {
        $this->cache_lifetime = $second;
    }
    
    /**
     * 写入缓存数据
     * 
     * @param string $cache_name 缓存名
     * @param mixed $cache_data 缓存数据
     * @return bool
     */
    public function writeCache($cache_name, $cache_data)
    {
        $cache_key = $this->getCacheKey($cache_name);
        $cache_value = json_encode($cache_data);
        
        $save_dir = $this->cache_dir;
        if ( !file_exists($save_dir) ) {
            mkdir($save_dir);
            chmod($save_dir, 0777);
        }
        $cache_file = $save_dir.$cache_key;
        $fso = fopen($cache_file, "w"); //打开文件指针
        if (flock($fso, LOCK_EX)) { //独占锁定
            fwrite($fso, $cache_value); //写入
            
            flock($fso, LOCK_UN); //释放锁定
            fclose($fso);
            return true;
        } else {
            fclose($fso);
            return false;
        }
    }
    
    /**
     * 读取缓存数据
     * 
     * @param string $cache_name 缓存名
     * @return mixed
     */
    public function readCache($cache_name)
    {
        $cache_key = $this->getCacheKey($cache_name);
        if (!$this->checkLifeTime($cache_key)) {
            return false;
        }
        $cache_file = $this->getCacheFile($cache_key);
        if (!file_exists($cache_file)) {
            return false;
        }
        $fso = fopen($cache_file, "r"); //打开文件指针
        
        if (flock($fso, LOCK_SH | LOCK_NB)) {
            $cache_value = @fread($fso, filesize($cache_file));
            flock($fso, LOCK_UN); //释放锁定
            fclose($fso);
            if (!empty($cache_value)) {
                $cache_data = json_decode($cache_value, true);
                return $cache_data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    /**
     * 清除指定的缓存
     * 
     * @param string $cache_name
     * @return bool
     */
    public function clearCache($cache_name)
    {
        $cache_key = $this->getCacheKey($cache_name);
        $cache_file = $this->getCacheFile($cache_key);
        return unlink($cache_file);
    }
    
    /**
     * 获取缓存名对应的Key
     * 
     * @param string $cache_name 缓存名
     * @return string
     */
    private function getCacheKey($cache_name)
    {
        return md5($cache_name);
    }
    
    /**
     * 获取缓存文件
     * 
     * @param string $cache_key 缓存KEY
     * @return string
     */
    private function getCacheFile($cache_key)
    {
        $save_dir = $this->cache_dir;
        $cache_file = $save_dir.$cache_key;
        return $cache_file;
    }
    
    /**
     * 获取缓存文件最后修改时间的UNIX时间戳
     * 
     * @param string $cache_key 缓存KEY
     * @return int
     */
    private function getCacheTime($cache_key)
    {
        $cache_file = $this->getCacheFile($cache_key);
        return @filemtime($cache_file);
    }
    
    /**
     * 检查缓存生命周期
     * 
     * @param string $cache_key 缓存KEY
     * @return bool
     */
    private function checkLifeTime($cache_key)
    {
        $cache_time = $this->getCacheTime($cache_key);
        if ($cache_time == false) {
            return false;
        }
        if ((time() - $cache_time) > $this->cache_lifetime) {
            return false;
        } else {
            return true;
        }
    }
}
?>