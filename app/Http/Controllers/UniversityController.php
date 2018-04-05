<?php
namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;
use Auth;
use Storage;
class UniversityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:university');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('university.dashboard');
    }

    public function edit()
    {
      return view('auth.university.profile');
    }

    public function update(Request $request, University $university)
    {
      if ($request->photo) {
        $path = Storage::disk('public')->put('avatar/university', $request->photo);
      }else{
        $path = $university->photo;
      }
      $university->name = $request->name;
      $university->email = $request->email;
      $university->decree = $request->decree;
      $university->address = $request->address;
      $university->country = $request->country;
      $university->website = $request->website;
      $university->phone = $request->phone;
      $university->desc = $request->desc;
      $university->photo = $path;
      $university->save();

      return redirect(route('university.edit'));
    }

    public function updatePassword(Request $request, University $university)
    {
      $request->validate([
          'password' => 'required|string|confirmed',
      ]);
      if (password_verify($request->passwordOld, $university->password)) {
          $university->password = bcrypt($request->password);
          $university->save();
          $request->session()->flash('status', 'Rubah password berhasil');
      } else {
          $request->session()->flash('status', 'Rubah password tidak berhasil (password lama tidak sesuai)');
      }
      return redirect(route('university.edit'));
    }
}
