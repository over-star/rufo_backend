<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Storage;
use Symfony\Component\HttpFoundation\Request;
class ResponseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //判断是否是debug模式
        $is_debug=env('APP_DEBUG');
        if($is_debug){
            //判断状态吗是否异常
            $code=(string)$response->getStatusCode();
            if(substr($code,0,1)!=2&&substr($code,0,1)!=3){
                //将请求写到log目录下
                $directory=storage_path().'/logs/';
                if(!is_dir($directory)){
                    //判断文件夹是否存在
                    $mkResult = mkdir($directory);
                    //if(!$mkResult)
                }
                $date=date('Y-m-d',time());//日志名称
                $datetime=date('Y-m-d h:i:s',time());//日志内记录时间
                $filename=$directory.'/'.$date.'.log';

                $sizes=1024*10*1024;//日志文件大小,10*1024*1024
                if(file_exists($directory.'/'.$date.'.log')){
                    $filesize=filesize($directory.'/'.$date.'.log');
                    if($filesize > $sizes){
                        $is_=file_exists($directory.'/who_is_log');
                        if(!$is_) {
                            //不存在就创建该文件
                            file_put_contents($directory.'/who_is_log','');
                        }
                        $str=file_get_contents($directory.'/who_is_log');
                        //是否存在正在写的日志
                        if($str){
                            if(file_exists($directory.'/'.$str)){
                                //判断该文件是否满
                                $filesize=filesize($directory.'/'.$str);
                                if($filesize > $sizes){
                                    $gentime=date('h:i:s',time());
                                    file_put_contents($directory.'/who_is_log',$date.'-'.$gentime.'.log');
                                    $filename=$directory.'/'.$date.'-'.$gentime.'.log';
                                }else{
                                    $filename=$directory.'/'.$str;
                                }
                            }else{
                                $gentime=date('h:i:s',time());
                                $filename=$directory.'/'.$date.'-'.$gentime.'.log';
                                file_put_contents($directory.'/who_is_log',$date.'-'.$gentime.'.log');
                            }
                        }else{
                            $gentime=date('h:i:s',time());
                            $filename=$directory.'/'.$date.'-'.$gentime.'.log';
                            file_put_contents($directory.'/who_is_log',$date.'-'.$gentime.'.log');
                        }
                    }
                }
                //将请求信息写入到日志文件中
                $value='['.$datetime.']'.' local.ERROR: '.$response->getStatusCode().'/'.$request->method();
                $value.="********************************************************";
                if(!strstr($response->content(),"<html>")){
                    $value.=PHP_EOL.'返回信息:'.PHP_EOL.$response->content().PHP_EOL;
                }else{
                    $value.=PHP_EOL.'返回信息:'.'返回为html页面,请登录浏览器查看!'.PHP_EOL;
                }
                //回去请求的参数
                $value.='请求参数信息信息:';
                $value.=PHP_EOL.$request->getContent();
                $value.=PHP_EOL.'request信息:';
                foreach ($request->headers as $k=>$v){
                    if($k=='cookie') continue;
                    $value.=PHP_EOL.'#'.$k.'==>'.$v[0];
                }

                foreach ($request->headers as $k=>$v){
                    if($k=='content-type'&&strstr($v[0],'multipart/form-data;')){
                        $value.=PHP_EOL.'上传文件信息:';
                        $vallll=$request->file();
                        foreach ($_FILES as $k1=>$v1){
                            $value.=PHP_EOL.'##文件名:'.$k1;
                            foreach ($v1 as $q=>$w){
                                $value.=PHP_EOL.'#'.$q.'==>'.$w;
                            }
                        }
                    }
                }
                //添加堆栈信息
                $traces=debug_backtrace();
                $count=0;
                $msg='';
                foreach($traces as $trace)
                {
                    if(isset($trace['file'],$trace['line']))
                    {
                        $msg.=PHP_EOL."#in ".$trace['file'].' ('.$trace['line'].')';
                    }
                }
                $value.=PHP_EOL.'堆栈信息:'.$msg.PHP_EOL;
                $value.="********************************************************".PHP_EOL;
                file_put_contents($filename,$value, FILE_APPEND|LOCK_EX);
            }
        }

        return $response;
    }

}
