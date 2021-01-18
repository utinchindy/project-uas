<?php 


namespace App\Http\Controllers;
use App\Models\Pembeli;
use Auth;
use App\Models\User;
/**
 * 
 */
class AuthController extends Controller
{
	
	function showLogin()
	{
		return view('login');	
	}
	
	function prosesLogin()
	{
		if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
			$user = Auth::user();
			if($user->level == 1) return redirect('admin/beranda')->with('success', 'Login Administrator berhasil');
			if($user->level == 2) return redirect('admin/beranda')->with('success', 'Login Penjual berhasil');
			if($user->level == 3) return redirect('/')->with('success', 'Login Pelanggan berhasil');
			

		} else {
			return back()->with('danger', 'Login anda gagal, mohon periksa email atau password anda!');
		}

		//$email = request('email');
		//$user = Pembeli::where('email', $email)->first();
		//if($user){
			//$guard = 'pembeli';
		//}else{
			//$user = Penjual::where('email', $email)->first();
			//if($user){
				//$guard = 'penjual';
			//}else{
				//$guard = false;
			//}
		//}

		
		//if(!$guard){
			//return back()->with('danger', 'Login Gagal, Email Tidak Ditemukan Di Database');
		//}else{
			//if(Auth::guard($guard)->attempt(['email' => request('email'), 'password' => request('password') ])){
				//return redirect('admin/beranda/$guard')->with('success', 'Login Berhasil');
			//}else{

				//return back()->with('danger', 'Login anda gagal, mohon periksa email atau password anda!');
			//}

		//}


		//if(request('login_as') == 1){
			//if(Auth::guard('pembeli')->attempt(['email' => request('email'), 'password' => request('password')])){
				//return redirect('admin/beranda/pembeli')->with('success', 'Login Berhasil');
			//}else{
				//return back()->with('danger', 'Login anda gagal, mohon periksa email atau password anda!');
			//}
		//}else{
			
			//if(Auth::guard('penjual')->attempt(['email' => request('email'), 'password' => request('password')])){
				//return redirect('admin/beranda/penjual')->with('success', 'Login Berhasil');
			//}else{
				//return back()->with('danger', 'Login anda gagal, mohon periksa email atau password anda!');
			//}
		//}
	//}
	}

	function logout()
	{
		Auth::logout();
		Auth::guard('pembeli')->logout();
		Auth::guard('penjual')->logout();
		return redirect('/');
	}
	
	function registrasi()
	{
		return view('registrasi');
	}

	function store()
	{
		$user = new User;
		$user->level = request('sebagai');
		$user->nama = request('nama');
		$user->username = request('username');
		$user->email = request('email');
		$user->password = request('password');
		$user->save();

		return redirect('login')->with('success', 'Selamat! Anda Berhasil Mendaftar. Silahkan Login');
	}
	
	function forgotPassword()
	{
		
	}

}
