<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Str;
use Validator;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Upload the user's profile image.
     */
    public function profile_image_upload(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image',
            'user_id' => 'required|integer',
        ]);

        try {
            if($validator->fails()){
                throw new \Exception($validator->errors(),422);
            }
            $user=User::where('id',$request->user_id)->first();
            if($request->hasFile('image')){
                if (file_exists(public_path(Storage::url($user->image)))){
                    Storage::disk('public')->delete($user->image);
                }
                $image = $this->upload($request->image);
                $user->update(['image'=>$image]);
            }
            return response()->json([
                'status' => true,
                'message' => 'Profile image has uploaded.',
                'data' => []
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'errors' => $e->getMessage(),
                'data' => []
            ],$e->getCode());
        }
    }

    public function upload($file)
    {
        $file_name = time() . "_" . Str::random('20') . "." . $file->extension();

        return $file->storeAs('users',$file_name, 'public');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
