<?php namespace inais\Http\Middleware;;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

    class SessionTimeoutMiddleware {
    protected $session;
    protected $timeout=1200;

    public function __construct(Store $session){
        $this->session=$session;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$this->session->has('lastActivityTime'))
            $this->session->put('lastActivityTime',time());
        elseif(time() - $this->session->get('lastActivityTime') > $this->timeout){
            $this->session->forget('lastActivityTime');
            Auth::logout();
            return redirect('inicio-de-sesion')->with(['warning' => 'Sesion expirada, no has tenido actividad desde hace '.$this->timeout/60 .' minutos.']);
        }
        $this->session->put('lastActivityTime',time());
        return $next($request);
    }

}
