<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ClienteController extends Controller
{
    public function mostrartodos()
    {
        $clientes = DB::table('cliente')->where('estado', 'ACTIVO')->get();

        return response()->json([
            'status' => 'success',
            'data'   => $clientes
        ], 200);
    }

    // Guardar nuevo cliente
    public function guardar(Request $req)
    {
        try {
            $res = DB::table('cliente')->insert([
                'nombre'    => $req->nombre,
                'correo'    => $req->correo,
                'telefono'  => $req->telefono,
                'direccion' => $req->direccion,
                'historial' => $req->historial,
                'estado'    => 'ACTIVO'
            ]);

                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Cliente insertado correctamente'
                ], 201);

        } catch (Exception $e) {

                return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ], 500);

        }
    }

    // Mostrar formulario de edición
    public function editar($id)
    {
        $cliente = DB::table('cliente')->where('id_cliente', $id)->first();
        return view('/clientes/editar')->with('cliente', $cliente);
    }

    // Actualizar cliente existente
    public function actualizar(Request $req, $id)
    {
        DB::beginTransaction();
        try {
            $res = DB::table('cliente')
                ->where('id_cliente', $id)
                ->update([
                    'nombre'    => $req->nombre,
                    'correo'    => $req->correo,
                    'telefono'  => $req->telefono,
                    'direccion' => $req->direccion,
                    'historial' => $req->historial
                ]);

            DB::commit();

            if ($req->expectsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Cliente actualizado correctamente'
                ], 200);
            }

            return redirect('/clientes/index')->with('mensaje', 'Actualizado correctamente');

        } catch (Exception $e) {
            DB::rollBack();

            if ($req->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Mostrar detalle de un cliente
    public function mostrar($id)
    {
        $cliente = DB::table('cliente')->where('id_cliente', $id)->first();

        if (!$cliente) {
            return response()->json([
                'status' => 'error',
                'message' => 'cliente no encontrado'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $cliente
        ], 200);
    }

    // Inhabilitar cliente
    public function inhabilitar( $id)
    {
        try {
            $res = DB::table('cliente')
                ->where('id_cliente', $id)
                ->update(['estado' => 'INACTIVO']);

                if ($res) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Cliente inhabilitado correctamente'
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 'warning',
                        'message' => 'No se encontró el cliente o ya estaba inactivo'
                    ], 404);
                }

        } catch (Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
         }
    }
}
