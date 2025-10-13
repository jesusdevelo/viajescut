<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class AdminController extends Controller
{
    /**
     * Mostrar todos los administradores activos.
     */
    public function mostrartodos(): JsonResponse
    {
        $administradores = DB::table('administrador')
            ->where('estado', 'ACTIVO')
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => $administradores
        ], 200);
    }

    /**
     * Guardar un nuevo administrador
     */
    public function guardar(Request $req): JsonResponse
    {
        DB::beginTransaction();
        try {
            $id = DB::table('administrador')->insertGetId([
                'nombre'   => $req->nombre,
                'correo'   => $req->correo,
                'telefono' => $req->telefono,
                'imagen'   => "imagenes/administradores/imagen_default.jpg",
                'password' => $req->password,
                'estado'   => 'ACTIVO',
            ]);

            if ($id > 0 && $req->hasFile('imagen')) {
                $imagen = $req->imagen;
                $extension = $imagen->extension();
                $nuevo_nombre = "administrador_" . $id . "." . $extension;
                $ruta = $imagen->storeAs('imagenes/administradores/', $nuevo_nombre, 'public');

                DB::table('administrador')->where('id_admin', $id)->update([
                    'imagen' => asset('storage/' . $ruta)
                ]);
            }

            DB::commit();
            return response()->json([
                'status'  => 'success',
                'message' => 'Administrador agregado correctamente',
                'id'      => $id
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Editar (obtener info para edición)
     */
    public function editar($id): JsonResponse
    {
        $administrador = DB::table('administrador')->where('id_admin', $id)->first();

        if (!$administrador) {
            return response()->json([
                'status' => 'error',
                'message' => 'Administrador no encontrado'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $administrador
        ], 200);
    }

    /**
     * Actualizar un administrador
     */
    public function actualizar(Request $req, $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $res = DB::table('administrador')->where('id_admin', $id)->update([
                'nombre'   => $req->nombre,
                'correo'   => $req->correo,
                'estado'   =>"ACTIVO",
                'telefono' => $req->telefono
            ]);

            if ($req->hasFile('imagen')) {
                $imagen = $req->imagen;
                $extension = $imagen->extension();
                $nuevo_nombre = "administrador_" . $id . "." . $extension;
                $ruta = $imagen->storeAs('imagenes/administradores/', $nuevo_nombre, 'public');

                DB::table('administrador')->where('id_admin', $id)->update([
                    'imagen' => asset('storage/' . $ruta)
                ]);
            }

            DB::commit();
            return response()->json([
                'status'  => 'success',
                'message' => 'Administrador actualizado correctamente',
                'rows'    => $res
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar un administrador específico
     */
    public function mostrar($id): JsonResponse
    {
        $administrador = DB::table('administrador')->where('id_admin', $id)->first();

        if (!$administrador) {
            return response()->json([
                'status' => 'error',
                'message' => 'Administrador no encontrado'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $administrador
        ], 200);
    }


    public function inhabilitar($id): JsonResponse
    {
        try {
            $res = DB::table('administrador')->where('id_admin', $id)->update([
                'estado' => 'INACTIVO',
            ]);

            if ($res) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Administrador inhabilitado correctamente'
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'No se pudo inhabilitar el administrador'
                ], 400);
            }

        } catch (Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
