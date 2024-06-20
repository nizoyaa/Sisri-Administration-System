<?
// app/Http/Controllers/Student/RegistrationController.php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        if (auth()->check()) {
            return redirect(route('home')); // atau halaman lain yang sesuai
        }

        return view('student.register');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nisn' => ['required', 'string', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],
            'class' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'nisn' => $data['nisn'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'class' => $data['class'],
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'roles' => 'STUDENT',
        ]);
    }
    protected function register(Request $request)
    {
        if (auth()->check()) {
            return redirect(route('home')); // atau halaman lain yang sesuai
        }
    }
}
