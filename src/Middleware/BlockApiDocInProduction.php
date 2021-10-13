<?phpnamespace Behamin\Support\Middleware;use Illuminate\Http\Request;use Closure;use Illuminate\Http\Response;class BlockApiDocInProduction{    /**     * Handle an incoming request.     *     * @param  \Illuminate\Http\Request  $request     * @param  Closure  $next     * @return mixed|void     */    public function handle(Request $request, Closure $next)    {        $env = config('app.env', 'production');        $validEnv = ['local', 'development'];        if (in_array($env, $validEnv, true)) {            return $next($request);        }        abort(Response::HTTP_FORBIDDEN, 'Access denied');        return;    }}