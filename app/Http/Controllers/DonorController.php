<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Donor;
use Auth;
use Storage;
class DonorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:donor');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('donor.dashboard');
    }
    public function edit()
    {
      return view('auth.donor.profile');
    }

    public function update(Request $request, Donor $donor)
    {
      if ($request->photo) {
        $path = Storage::disk('public')->put('avatar/donor', $request->photo);
      }else{
        $path = $donor->photo;
      }
      $donor->name = $request->name;
      $donor->email = $request->email;
      $donor->address = $request->address;
      $donor->desc = $request->desc;
      $donor->website = $request->website;
      $donor->photo = $path;
      $donor->save();
      $request->session()->flash('status', 'Rubah password berhasil');
      return redirect(route('donor.edit'));
    }

    public function updatePassword(Request $request, Donor $donor){
      $request->validate([
          'password' => 'required|string|confirmed',
      ]);
      if (password_verify($request->passwordOld, $donor->password)) {
          $donor->password = bcrypt($request->password);
          $donor->save();
          $request->session()->flash('status', 'Rubah password berhasil');
      } else {
          $request->session()->flash('status', 'Rubah password tidak berhasil (password lama tidak sesuai)');
      }
      return redirect(route('donor.edit'));
    }
}
