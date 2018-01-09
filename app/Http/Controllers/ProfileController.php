<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

use App\Providers\CropAvatar;

use App\Http\Requests;
use App\User;
use App\Role;
use App\RoleUser;
use Session;
use DB;
use Hash;
use Auth;
use File;

class ProfileController extends Controller
{

    public $path_to_upload_dir = "img/uploads/";

    /**
     * Display the specified resource.
     *
     * @param  int  $username
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {
        $usuario = User::where('username', $username)->first();

        $usuarioRole = $usuario->roles->lists('id','id')->toArray();

        return view('perfiles.show', compact('usuario','roles','usuarioRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $usuario = User::where('username', $username)->first();

        $usuarioRole = $usuario->roles->lists('id','id')->toArray();

        return view('perfiles.edit', compact('usuario','roles','usuarioRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request, $username)
    {
        // dd( $request->avatar_file );
        $error = false;
        $response = '';

        $imagen = array('image' => $request->avatar_file);
		$rules  = array(
			'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
		);

		$validator = Validator::make($imagen, $rules);

		if ( $validator->fails() ) {
            $error = $validator->errors()->messages();
            $response = [ 'message' => $error['image'][0], 'status' => 400 ];

		} else {

            $upload_dir = public_path($this->path_to_upload_dir);
            $usuario = User::where('username', $username)->first();

            if ( !file_exists( $upload_dir )) {

                $response = [ 'message' => 'El directorio donde se almacenan las imagenes no existe.', 'status' => 400 ];

            } else {

                if ( !is_null( $usuario->pic ) ) {
                    File::delete( $upload_dir.$usuario->pic );
                }

                $image = new CropAvatar($request->avatar_file->getRealPath(), $request->avatar_data, $request->avatar_file);

                if ( is_null($image->msg) ) {

                    $usuario->pic = $image->file_name;

                    $usuario->save();

                    $response = [
                      'status'   => 200,
                      'message' => 'La imagen se ha almacenado correctamente.',
                      'result'  =>  $image->getResult()
                  ];

                } else {
                    $response = $image->msg;
                }
            }
        }

        if ( $error ) return response()->json(['error' => $response], $response['status']);
        else return response()->json($response,  $response['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $usuario = User::where('username', $username)->first();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$usuario->id,
            'password' => 'same:confirm-password'
        ]);

        $input = $request->all();

        if( !empty($input['password']) ){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $usuario = User::where('username', $username)->first();
        $usuario->update($input);

        return redirect()->route('perfiles.index', $username)
                            ->with('message', 'Usuario actualizado correctamente')
                            ->with('alert-class', 'alert-success');
    }
}
