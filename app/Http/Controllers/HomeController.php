<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Notifications\InvoicePaid;
use App\Services\HomeService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

session_start();
class HomeController extends Controller
{
    protected $service;
    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = Category::where('status', 2)->get();
        //home page world
        $world = $this->service->world();
        $titleWorld = $this->service->titleWorld();
        $worlds = $this->service->worlds();
        //home page VN
        $vietnam = $this->service->vietnam();
        $titleVietnam = $this->service->titleVietnam();
        $vietnams = $this->service->vietnams();
        //home page oto - xe may
        $car = $this->service->car();
        $cars = $this->service->cars();
        //home page nhan vat - su kien
        $person = $this->service->person();
        $people = $this->service->people();
        //home page transfer
        $transfer = $this->service->transfer();
        //home page hot
        $hot = $this->service->hot();
        $hots = $this->service->hots();
        //home page tieu diem
        $focus = $this->service->focus();
        //home page new
        $new = $this->service->newPost();
        $news = $this->service->newsPost();
        return view(
            'user.index',
            [
                'categories' => $categories,
                'world' => $world,
                'titleWorld' => $titleWorld,
                'worlds' => $worlds,
                'vietnam' => $vietnam,
                'titleVietnam' => $titleVietnam,
                'vietnams' => $vietnams,
                'car' => $car,
                'cars' => $cars,
                'person' => $person,
                'people' => $people,
                'transfer' => $transfer,
                'hot' => $hot,
                'hots' => $hots,
                'new' => $new,
                'news' => $news,
                'focus' => $focus
            ]
        );
    }
    public function register(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

//        $permission = Role::findOrFail('3')->permission()->pluck('permission_id');
//        $user->permissions()->attach($permission);
        $user->roles()->attach('3');
        event(new Registered($user));
        Auth::login($user);
        return redirect()->back();
    }
    public function create(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        if($request->session()->regenerate()){
            return back()->with([
                'message' => 'Đăng nhập thành công',
                'type' => 'success'
            ]);
        }else{
            return back()->with([
                'message'=> 'Đăng nhập thất bại',
                'type' => 'danger'
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }
    public function sendMail(Request $request)
    {
         Password::sendResetLink(
            $request->only('email')
        );
        return redirect()->back();
    }
}
