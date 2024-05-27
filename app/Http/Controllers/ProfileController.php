<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rumah;
use App\Models\Komunitas;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        // $memberKomunitas = Rumah::where('user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        return view('profile.edit', compact('komunitasKu', 'komunitas', 'memberKomunitas'), ['user' => $request->user(),]);
    }

    //Update informasi akun
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('pengaturan.index')->with('success', 'Informasi akun berhasil diperbarui.');
    }


    /**
     * Update the user's profile information foto.
     */
    public function updatePhoto(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fotoPath = $file->store('profile-fotos', 'public'); // 'public' adalah nama dari driver penyimpanan yang digunakan
            $user->update(['foto' => $fotoPath]);
        }

        // Logika lain yang diperlukan setelah update foto profil
        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
    // public function updatePhoto(Request $request)
    // {
    //     $user = User::find(auth()->user()->id);
    //     if ($request->hasFile('foto')) {
    //         // Mengunggah file foto profil
    //         $file = $request->file('foto');
    //         $foto = $file->store('profile-fotos');
    //         $user->update(['foto' => $foto]);
    //     }

    //     // Logika lain yang diperlukan setelah update foto profil
    //     return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    // }

    /**
     * Delete the user's profile information foto.
     */
    public function deletePhoto()
    {
        $user = User::find(auth()->user()->id);
        $user->update(['foto' => null]);
        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }
}
