<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Yalnızca role_id 1 olan kullanıcıların bu controllera erişimine izin ver.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Sadece oturum açmış kullanıcıları kabul et
            if (!Auth::check()) {
                return redirect('/')->with('error', 'Bu sayfaya erişim izniniz yok.');
            }
            
            return $next($request);
        });
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function users(Request $request)
    {
        // Arama terimi varsa filtrele
        $query = User::query();
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }
    
        $users = $query->paginate(5); // Her sayfada 10 kayıt göster
    
        return view('admin.users.index', compact('users'));
    }

    public function usercreate()
    {
        return view('admin.users.create');
    }

    public function userstore(Request $request, User $model)
    {
        // Doğrulama işlemi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Yeni kullanıcıyı kaydet
        $model->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    
        return redirect()->route('user.index')->withStatus(__('Kullanıcı başarıyla oluşturuldu.'));
    }

    public function useredit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    
    public function userupdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.index')->with('status', __('Kullanıcı başarıyla güncellendi.'));
    }

    public function userdestroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('Kullanıcı başarıyla silindi.'));
    }

    public function profile_edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user')); // Görünüm yolunuza göre düzenleyin
    }

   // Profil güncelleme metodu
   public function profile_update(Request $request)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
       ]);

       $user = Auth::user();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->save();

       return redirect()->route('admin.profile.edit')->with('status', 'Profil başarıyla güncellendi.');
   }

   // Şifre değiştirme metodu
   public function changePassword(Request $request)
   {
       $request->validate([
           'old_password' => 'required',
           'password' => 'required|string|min:8|confirmed',
       ]);

       $user = Auth::user();
       if (!Hash::check($request->old_password, $user->password)) {
           return back()->withErrors(['old_password' => 'Mevcut şifre yanlış.']);
       }

       $user->password = Hash::make($request->password);
       $user->save();

       return redirect()->route('admin.profile.edit')->with('status_password', 'Şifre başarıyla güncellendi.');
   }



}
