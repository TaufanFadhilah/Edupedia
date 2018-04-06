<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Storage;
class ApplicantController extends Controller
{
    public function edit()
    {
      return view('auth.profile');
    }

    public function update(Request $request, User $user)
    {
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'originSchool' => 'required|string',
        'graduateAt' => 'required|integer|min:0',
        'birthday' => 'required|date',
        'address' => 'required|string',
        'score' => 'required|integer|min:0|max:100',
        'gender' => 'required|string',
        'photo' => 'file',
       ]);

       if ($request->photo) {
         $path = Storage::disk('public')->put('avatar/applicant', $request->photo);
       }else{
         $path = $user->photo;
       }

       $user->name = $request->name;
       $user->email = $request->email;
       $user->originSchool = $request->originSchool;
       $user->graduateAt = $request->graduateAt;
       $user->birthday = $request->birthday;
       $user->address = $request->address;
       $user->score = $request->score;
       $user->gender = $request->gender;
       $user->photo = $path;
       $user->save();
       return redirect(route('applicant.edit'));
    }

    public function updatePassword(Request $request, User $user)
    {
      $request->validate([
          'password' => 'required|string|confirmed',
      ]);
      if (password_verify($request->passwordOld, $user->password)) {
          $user->password = bcrypt($request->password);
          $user->save();
          $request->session()->flash('status', 'Rubah password berhasil');
      } else {
          $request->session()->flash('status', 'Rubah password tidak berhasil (password lama tidak sesuai)');
      }
      return redirect(route('applicant.edit'));
    }
}
