<?php

namespace App\Http\Controllers;

use App\Helper\PusherNotificationHelper;
use App\Jobs\SendEmail;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class AuthController extends Controller
{
    use PusherNotificationHelper;
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $input = $request->only(['email', 'password']);
        $cred = ['email' => $input['email'], 'password' => $input['password']];
        if (Auth::attempt($cred)) {
            $auth = Auth::user();
            $pengembalian = Peminjaman::where('user_id', '=', $auth->id)->where('waktu_pengembalian', '=', null)->first();
            // dd($pengembalian->created_at);
            if (!empty($pengembalian)) {
                $created_at = Carbon::createFromTimeString($pengembalian->created_at)->addDay();
                // dd($pengembalian->user_id);
                if ($created_at <= Carbon::now()) {
                    $data = array(
                        // 'id_peminjaman' => $pengembalian->id,
                        'peminjaman' => $pengembalian,
                        // 'user' => $auth
                    );
                    $pusher = new Pusher(
                        env('PUSHER_APP_KEY'),
                        env('PUSHER_APP_SECRET'),
                        env('PUSHER_APP_ID'),
                        array('cluster' => env('PUSHER_APP_CLUSTER'))
                    );
                    $pusher->trigger(
                        'notifikasi-keterlambatan.' . $pengembalian->user_id,
                        'my-event',
                        $data
                    );
                    // dispatch(new SendEmail($auth['email']));

                }
            }

            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error','true');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        $year = Carbon::now()->format('Y');
        $auth = Auth::user();
        $pengembalian = Peminjaman::whereYear('created_at', '=', $year)->where('terlambat', '=', 'true')
            ->selectRaw('MONTH(created_at) AS month, MIN(MONTHNAME(created_at)) AS monthname, count(id) as keterlambatan')
            ->groupBy('month')
            ->orderBy('month', 'desc')->get()->toArray();
        $peminjaman_tepat_waktu = Peminjaman::whereYear('created_at', '=', $year)
            ->selectRaw('MONTH(created_at) AS month, MIN(MONTHNAME(created_at)) AS monthname, count(id) as keterlambatan')
            ->groupBy('month')
            ->orderBy('month', 'desc')->get()->toArray();
        $arrayChart = array();
        foreach ($pengembalian as $key => $value) {
            $arrayChart[] = $value['keterlambatan'];
        }
        $arrayMonth = ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $peminjaman = Peminjaman::where('user_id', '=', $auth->id)->where('waktu_pengembalian', '=', null)->first();
            // dd($pengembalian->created_at);
            if (!empty($peminjaman)) {
                $created_at = Carbon::createFromTimeString($peminjaman->created_at)->addDay();
                // dd($pengembalian->user_id);
                if ($created_at <= Carbon::now()) {
                    $data = array(
                        // 'id_peminjaman' => $pengembalian->id,
                        'peminjaman' => $peminjaman,
                        // 'user' => $auth
                    );
                    $pusher = new Pusher(
                        env('PUSHER_APP_KEY'),
                        env('PUSHER_APP_SECRET'),
                        env('PUSHER_APP_ID'),
                        array('cluster' => env('PUSHER_APP_CLUSTER'))
                    );
                    $pusher->trigger(
                        'notifikasi-keterlambatan.' . $peminjaman->user_id,
                        'my-event',
                        $data
                    );
                    // dispatch(new SendEmail($auth['email']));

                }
            }
        // dd($pengembalian);
        return view('admin.dashboard', compact('arrayChart', 'arrayMonth', 'pengembalian','peminjaman','peminjaman_tepat_waktu'));
    }

    public function update_akun() {
        $user = Auth::user();
        return view('admin.update-akun',compact('user'));
    }

    public function simpan_akun(Request $request) {
        $auth = Auth::user();
        $user = User::find($auth->id);
        $user->password = $request->input('password');
        $user->update();
        return redirect()->route('login');
    }
}

