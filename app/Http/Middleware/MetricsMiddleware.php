<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Prometheus\CollectorRegistry;
use Symfony\Component\HttpFoundation\Response;

class MetricsMiddleware
{

    public function __construct( protected CollectorRegistry $collectorRegistry) {}
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $counter =  $this->collectorRegistry->getOrRegisterCounter('app','http_requests_total','Total number of requests',['path']);
        $counter->inc([$request->path()]);

        $start = hrtime(true);
        $response = $next($request);
        $duration = hrtime(true) - $start;

        $histogram = $this->collectorRegistry->getOrRegisterHistogram('app','http_requests_total','Request duration',['path']);
        $histogram->observe($duration,[$request->path()]);

        return $response;
    }
}
