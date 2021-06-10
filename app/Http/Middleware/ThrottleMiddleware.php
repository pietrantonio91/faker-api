<?php
 
namespace App\Http\Middleware;
 
use Closure;
 
class ThrottleMiddleware extends \Illuminate\Routing\Middleware\ThrottleRequests
{
  protected function resolveRequestSignature($request)
  {
    return sha1(implode('|', [
      $request->method(),
      $request->root(),
      $request->path(),
      $request->ip(),
    //   $request->query('access_token')
    ]
  ));
 
  return $request->fingerprint();
}
 
}