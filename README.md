#How to use Multi Language in laravel 5.2
###First Step :
1.	Create a new Project.
2.	Create two controller named HomeController & LangController 
3.	E:\yourproject\resources\lang go this path and create two folder named en & bn,
en maybe allready created in this case create just bn folder.

###Second Step:
1.	under en folder create a file named home.php 
write
return ['hello' => 'English']; 
2.	under bn folder create a file named home.php 
write
return ['hello' => 'বাংলা'];

###Third Step :
1.	E:\yourproject\resources\views go this path create a file langtest.blade.php
then copy paste this code
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"></head>
<body>
<div class="col-md-4"></div>
<div class="col-md-4">
    {{session('lang_msg')}}
    <h3>{{Lang::get('home.hello')}}</h3>
    Default Language: {{Lang::getLocale()}}<br>
    select language: <a href="{{url('lang/bn')}}">বাংলা</a> | <a href="{{url('lang/en')}}">English</a>
</div>
<div class="col-md-4"></div>
</body>
</html>

###Step Four: 
1.	E:\yourproject\app\Http go this path and open route.php file then write 
Route::get('/','HomeController@home');
Route::get('/lang/{lang}','LangController@home');
and save out here. 
2.	E:\yourproject\app\Http\Controllers go this path and open HomeController.php & LangController.php 
under homecontroller write 
public function home(){
    return view('langtest');
}
and under langcontroller write 
public function home($lang){
    $langs=['bn','en'];
    if (in_array($lang, $langs)) {
        Session::set('lang', $lang);
        return Redirect::back()->with('lang_msg','Your changing language');
    }
}
then save and exit here.

###Step Five :
1. open your cmd create a middleware file 
	php artisan make:middleware Lang 
now go E:\yourproject\app\Http\Middleware and open Lang.php file then write below code 
    public function handle($request, Closure $next)
    {
        if ($lang = Session::get('lang')) {
            \Lang::setLocale($lang);
        }
        return $next($request);
    }
2.	Finally E:\yourproject\app\Http go here and open kernel.php add below code
 \App\Http\Middleware\Lang::class,
under class Kernel extends HttpKernel this class  

public function home(){
    return view(‘langtest’);
}
