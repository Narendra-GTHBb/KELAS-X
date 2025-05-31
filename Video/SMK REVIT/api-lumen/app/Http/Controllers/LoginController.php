<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $data = User::where('level','<>', 'pelanggan')->get();
        return response()->json($data);
    }

    public function register(Request $request)
    {
        $data = [
            'email'=>$request->input('email'),
            'password'=>Hash::make ($request->input('password')),
            'level'=>$request->input('level'),
            'api_token'=>'123456',
            'status'=> 1,
            'relasi'=>$request->input('relasi'),
        ];
        User::create($data);
        return response()->json($data);
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        
        // Cari user berdasarkan email
        $user = User::where('email', $email)->first();

        // ✅ PERBAIKAN: Cek apakah user ditemukan
        if (!$user) {
            return response()->json([
                'pesan' => 'User tidak ditemukan',
                'data' => '',
            ], 404);
        }

        // ✅ PERBAIKAN: Cek status user (aktif/tidak aktif)
        if ($user->status !== 1) {
            return response()->json([
                'pesan' => 'Akun tidak aktif',
                'data' => '',
            ], 401);
        }

        // ✅ PERBAIKAN: Cek password
        if ($user->password !== $password) {
            return response()->json([
                'pesan' => 'Password salah',
                'data' => '',
            ], 401);
        }

        // ✅ Login berhasil - generate token baru
        $token = Str::random(40);
        $user->update([
            'api_token' => $token,
        ]);

        // ✅ PENTING: Response sesuai dengan yang diharapkan frontend
        return response()->json([
            'pesan' => 'login sukses',
            'token' => $token,  // Frontend mencari 'token' di response
            'data' => $user,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            Log::info('=== UPDATE USER DEBUG ===');
            Log::info('User ID: ' . $id);
            Log::info('Request Data: ', $request->all());
            
            $user = User::find($id);
            if (!$user) {
                return response()->json([
                    'pesan' => 'User tidak ditemukan'
                ], 404);
            }
            
            Log::info('User Before Update: ', $user->toArray());
            
            if ($request->has('status')) {
                $user->status = (int)$request->input('status');
                Log::info('Setting status to: ' . $user->status);
            }
            
            if ($request->has('email')) {
                $user->email = $request->input('email');
            }
            
            if ($request->has('level')) {
                $user->level = $request->input('level');
            }
            
            if ($request->has('relasi')) {
                $user->relasi = $request->input('relasi');
            }
            
            if ($request->has('password')) {
                $user->password = $request->input('password');
            }
            
            $saved = $user->save();
            Log::info('Save Result: ' . ($saved ? 'SUCCESS' : 'FAILED'));
            
            $user->refresh();
            Log::info('User After Update: ', $user->toArray());
            
            return response()->json([
                'pesan' => 'Data berhasil diubah',
                'data' => $user,
                'saved' => $saved
            ], 200);
            
        } catch (\Exception $e) {
            Log::error('Update Error: ' . $e->getMessage());
            return response()->json([
                'pesan' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            Log::info('=== UPDATE STATUS ONLY ===');
            Log::info('User ID: ' . $id);
            Log::info('New Status: ' . $request->input('status'));
            
            $user = User::find($id);
            if (!$user) {
                return response()->json(['pesan' => 'User tidak ditemukan'], 404);
            }
            
            $oldStatus = $user->status;
            $newStatus = (int)$request->input('status');
            
            $user->status = $newStatus;
            $saved = $user->save();
            
            Log::info('Save Result: ' . ($saved ? 'SUCCESS' : 'FAILED'));
            Log::info('Old Status: ' . $oldStatus);
            Log::info('New Status: ' . $user->status);
            
            return response()->json([
                'pesan' => 'Status berhasil diubah',
                'old_status' => $oldStatus,
                'new_status' => $user->status,
                'data' => $user
            ], 200);
            
        } catch (\Exception $e) {
            Log::error('Update Status Error: ' . $e->getMessage());
            return response()->json([
                'pesan' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}