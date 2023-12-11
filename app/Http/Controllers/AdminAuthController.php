<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ReservationDetails;
use App\Models\Reservee;



class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index1']);
    }

    public function DisplayLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email:filter'],
            'password' => ['required', 'string'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role_id) {
                case 1:
                    return redirect()->route('index1'); 
                case 2:
                    return redirect()->route('index2'); 
                default:
                    return view('dashboard.default'); 
            }
        }

        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    public function index1()
    {
        return view('dashboard.admin.index');
    }

    public function index2()
    {
        return view('dashboard.user.index'); 
    }

    

    protected $redirectTo = '/dashboard'; 

    public function logout()
    {
        Auth::logout(); 
        return redirect()->route('login');
    }

    public function insertAdmin(Request $request)
    {
        $admins = new User();
        $admins->username = 'Ruffa';
        $admins->email = 'ruffa@example.com';
        $admins->password = bcrypt('12345');
        $admins->role_id= 2;
        $admins->save();

        return 'Admin user created successfully';
    }


    public function welcomeAdmin(Request $request)
    {
        $user = Auth::user();
    
        $reservations = ReservationDetails::join('reservee', 'reservation_details.reservedetailsID', '=', 'reservee.reservedetailsID')
            ->select('reservation_details.*', 'reservee.*')
            ->orderBy('reservation_details.reservedetailsID', 'desc')

            ->get();
    
        return view('dashboard.user.index', ['user' => $user, 'reservations' => $reservations]);
    }
    public function HelloAdmin(Request $request)
    {
        $user = Auth::user();
    
        $reservations = ReservationDetails::join('reservee', 'reservation_details.reservedetailsID', '=', 'reservee.reservedetailsID')
            ->leftJoin('selected_facilities', 'reservation_details.reservedetailsID', '=', 'selected_facilities.reservedetailsID')
            ->leftJoin('facilities', 'selected_facilities.facilityID', '=', 'facilities.facilityID')
            ->select(
                'reservation_details.*',
                'reservee.*',
                'selected_facilities.*',
                'facilities.*'
            )
            ->orderBy('reservation_details.reservedetailsID', 'desc')
            ->get();
    
        return view('dashboard.admin.index', ['user' => $user, 'reservations' => $reservations]);
    }
    
    

}
