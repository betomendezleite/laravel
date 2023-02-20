<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Planes;
use \stdClass;

class AuthController extends Controller
{

    public function index()
    {
        $user = User::all();
        return $user;
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'admin' => 'required|string|max:255',
            'telefonos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'planes_id' => 'required|string|max:255',
            'vencimiento_plan' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'username' => $request->username,
            'admin' => $request->admin,
            'telefonos' => $request->telefonos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'planes_id' => $request->planes_id,
            'vencimiento_plan' => $request->vencimiento_plan,
        ]);


        return response()->json([
            'message' => 'El usuario: ' . $request->username . ' ha sido creado con exito',
        ]);
    }
    public function login(Request $request)
    {


        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'code' => 2,
                'message' => 'La contraseña o usuario son incorrectos'
            ], 401);
        }



        $user = User::where('email', $request->email)->firstOrFail();

        $verificar = DB::table('personal_access_tokens')->where('tokenable_id', $user->id)->get();
        $verificar = $verificar->count() + 1;
        $usrinfo = User::join('planes', 'planes.id', '=', 'users.id')
            ->select('*')
            ->where('email', $request->email)
            ->get();


        if ($verificar > $usrinfo[0]['dispositivos']) {

            return response()->json([
                'code' => 1,
                'message' => 'Numero de dispositivos ha superado el limite de su plan. Elimina las sesiones o actualiza tu plan.',
                'user' => $user
            ]);
        } else {
            $token = $user->createtoken('auth_token')->plainTextToken;

            return response()->json([
                'code' => 3,
                'message' => 'Bienvenido ' . $user->name,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
                'dispositivos' => $verificar
            ]);
        }
    }

    public function logouts($id)
    {
        //auth()->user()->tokens()->delete();
        DB::table('personal_access_tokens')->where('id',$id)->delete();
        return [
            'message' => 'Mensaje: Tokens eliminados'
        ];
    }

    public function update(Request $request, user $users)
    {
        /*         $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'admin' => 'required|string|max:255',
            'telefonos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'planes_id' => 'required|string|max:255',
            'vencimiento_plan' => 'required|string|max:255',
        ]);
 */
        $users = User::find($request->id);
        $users->nombres = $request->nombres;
        $users->apellidos = $request->apellidos;
        $users->username = $request->username;
        $users->admin = $request->admin;
        $users->telefonos = $request->telefonos;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->planes_id = $request->planes_id;
        $users->vencimiento_plan = $request->vencimiento_plan;

        $users->save();

        return response()->json([
            'message' => 'Usuario: ' . $users->username . ' actualizado con exito'
        ]);
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:255',
        ]);

        $planes = User::destroy($request->id);


        return response()->json([
            'message' => 'Usuario eliminado con exito'
        ]);
    }
}
