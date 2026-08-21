<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $rolId = DB::table('roles')->insertGetId([
            'nombre' => 'Administrador',
            'descripcion' => 'Acceso completo al sistema.',
            'estado' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $usuarioId = DB::table('usuarios')->insertGetId([
            'rol_id' => $rolId,
            'nombre' => 'Administrador Principal',
            'email' => 'admin@discoteca.test',
            'password' => Hash::make('password'),
            'telefono' => '3000000000',
            'estado' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $empleadoId = DB::table('empleados')->insertGetId([
            'documento' => '1000000001',
            'nombres' => 'Laura',
            'apellidos' => 'Gomez',
            'cargo' => 'Administrador',
            'fecha_ingreso' => '2026-01-15',
            'salario' => 3500000,
            'tipo' => 'regular',
            'usuario_id' => $usuarioId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('cargos_empleado')->insert([
            'nombre' => 'Administrador',
            'descripcion' => 'Gestiona la operación de la discoteca.',
            'empleado_id' => $empleadoId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $clienteId = DB::table('clientes')->insertGetId([
            'documento' => '1000000002',
            'nombres' => 'Carlos',
            'apellidos' => 'Rodriguez',
            'email' => 'carlos@cliente.test',
            'telefono' => '3010000000',
            'fecha_nacimiento' => '1995-06-20',
            'tipo' => 'vip',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $zonaId = DB::table('zonas')->insertGetId([
            'nombre' => 'Zona VIP',
            'descripcion' => 'Area exclusiva con servicio de mesa.',
            'aforo_maximo' => 80,
            'precio_cover' => 50000,
            'estado' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $artistaId = DB::table('djs_artistas')->insertGetId([
            'nombre_artistico' => 'DJ Aurora',
            'nombre_real' => 'Andrea Torres',
            'genero_musical' => 'Electronica',
            'biografia' => 'DJ residente especializada en musica electronica.',
            'contacto' => 'booking@djaurora.test',
            'cache_base' => 1800000,
            'estado' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $mesaId = DB::table('mesas')->insertGetId([
            'numero' => 'VIP-01',
            'capacidad' => 8,
            'tipo' => 'vip',
            'estado' => 'libre',
            'zona_id' => $zonaId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $eventoId = DB::table('eventos')->insertGetId([
            'nombre' => 'Noche Electronica',
            'descripcion' => 'Evento principal del fin de semana.',
            'fecha_inicio' => '2026-12-12 21:00:00',
            'fecha_fin' => '2026-12-13 03:00:00',
            'aforo' => 80,
            'precio_entrada' => 60000,
            'estado' => 'programado',
            'zona_id' => $zonaId,
            'dj_artista_id' => $artistaId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('reservas')->insert([
            'fecha_reserva' => '2026-12-12 21:30:00',
            'cantidad_personas' => 6,
            'anticipo' => 100000,
            'observaciones' => 'Celebracion de cumpleaños.',
            'estado' => 'pendiente',
            'cliente_id' => $clienteId,
            'mesa_id' => $mesaId,
            'evento_id' => $eventoId,
            'empleado_id' => $empleadoId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $categoriaId = DB::table('categorias_producto')->insertGetId([
            'nombre' => 'Licores',
            'descripcion' => 'Bebidas alcoholicas y destilados.',
            'estado' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $proveedorId = DB::table('proveedores')->insertGetId([
            'nit' => '900123456-7',
            'razon_social' => 'Distribuciones Nocturnas SAS',
            'contacto' => 'Sandra Perez',
            'telefono' => '3020000000',
            'email' => 'ventas@distribuciones.test',
            'direccion' => 'Carrera 10 # 20-30',
            'estado' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $productoId = DB::table('productos')->insertGetId([
            'categoria_id' => $categoriaId,
            'proveedor_id' => $proveedorId,
            'codigo' => 'LIC-001',
            'nombre' => 'Vodka Premium',
            'descripcion' => 'Botella de vodka premium de 750 ml.',
            'precio_venta' => 220000,
            'precio_compra' => 140000,
            'estado' => true,
            'unidad_medida' => 'botella',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('inventarios')->insert([
            'stock_actual' => 25,
            'stock_minimo' => 5,
            'ubicacion' => 'Bodega principal',
            'Ultima_entrada' => '2026-08-01 10:00:00',
            'Ultima_salida' => null,
            'producto_id' => $productoId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $promocionId = DB::table('promociones')->insertGetId([
            'nombre' => 'Preventa Electronica',
            'descripcion' => 'Descuento para entradas compradas en preventa.',
            'tipo_descuento' => 'porcentaje',
            'valor_descuento' => 10,
            'fecha_inicio' => '2026-11-01 00:00:00',
            'fecha_fin' => '2026-12-12 20:59:59',
            'estado' => true,
            'evento_id' => $eventoId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $ventaId = DB::table('ventas')->insertGetId([
            'numero_factura' => 'FAC-2026-0001',
            'fecha_venta' => '2026-08-20 22:00:00',
            'subtotal' => 220000,
            'descuento' => 0,
            'total' => 220000,
            'estado' => 'pagada',
            'cliente_id' => $clienteId,
            'empleado_id' => $empleadoId,
            'mesa_id' => $mesaId,
            'promocion_id' => $promocionId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('detalle_ventas')->insert([
            'cantidad' => 1,
            'precio_unitario' => 220000,
            'subtotal' => 220000,
            'venta_id' => $ventaId,
            'producto_id' => $productoId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('pagos')->insert([
            'metodo' => 'tarjeta',
            'monto' => 220000,
            'referencia' => 'TRX-2026-0001',
            'fecha_pago' => '2026-08-20 22:01:00',
            'estado' => 'exitoso',
            'venta_id' => $ventaId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

    }
}
