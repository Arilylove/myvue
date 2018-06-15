<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/14
 * Time: 19:35
 */
namespace App\Http\Middleware;

use Closure;
class CrossHttp{
    public function handle($request, Closure $next) {
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Headers', 'Origin,Content-Type,Cookie,Accept');
        $response->header('Access-Control-Allow-Methods', 'GET,POST,PATCH,PUT,OPTIONS');
        $response->header('Access-Control-Allow-Credentials', 'true');  //session共享的需求才用到
        return $response;
    }
}