<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('roles')->insert([
            ['nombre' => 'Administrador', 'descripcion' => 'Acceso total al sistema', 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Cajero', 'descripcion' => 'Gestiona ventas y pagos', 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Mesero', 'descripcion' => 'Gestiona reservas y mesas', 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
        $roleIds = DB::table('roles')->orderBy('id')->pluck('id')->values();

        DB::table('usuarios')->insert([
            ['rol_id' => $roleIds[0], 'nombre' => 'Administrador Principal', 'email' => 'admin@discoteca.test', 'password' => Hash::make('password'), 'telefono' => '3000000001', 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
            ['rol_id' => $roleIds[1], 'nombre' => 'Carlos Cajero', 'email' => 'cajero@discoteca.test', 'password' => Hash::make('password'), 'telefono' => '3000000002', 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
            ['rol_id' => $roleIds[2], 'nombre' => 'Maria Mesera', 'email' => 'mesero@discoteca.test', 'password' => Hash::make('password'), 'telefono' => '3000000003', 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
        $userIds = DB::table('usuarios')->orderBy('id')->pluck('id')->values();

        DB::table('empleados')->insert([
            ['documento' => '1000000001', 'nombres' => 'Carlos', 'apellidos' => 'Cajero', 'cargo' => 'Cajero', 'fecha_ingreso' => '2026-01-10', 'salario' => 1800000, 'tipo' => 'regular', 'usuario_id' => $userIds[1], 'created_at' => $now, 'updated_at' => $now],
            ['documento' => '1000000002', 'nombres' => 'Maria', 'apellidos' => 'Mesera', 'cargo' => 'Mesero', 'fecha_ingreso' => '2026-01-15', 'salario' => 1700000, 'tipo' => 'regular', 'usuario_id' => $userIds[2], 'created_at' => $now, 'updated_at' => $now],
        ]);
        $employeeIds = DB::table('empleados')->orderBy('id')->pluck('id')->values();

        DB::table('clientes')->insert([
            ['documento' => '1100000001', 'nombres' => 'Laura', 'apellidos' => 'Gomez', 'email' => 'laura@example.com', 'telefono' => '3100000001', 'fecha_nacimiento' => '1995-04-12', 'tipo' => 'vip', 'created_at' => $now, 'updated_at' => $now],
            ['documento' => '1100000002', 'nombres' => 'Andres', 'apellidos' => 'Rojas', 'email' => 'andres@example.com', 'telefono' => '3100000002', 'fecha_nacimiento' => '1998-09-20', 'tipo' => 'regular', 'created_at' => $now, 'updated_at' => $now],
        ]);
        $clientIds = DB::table('clientes')->orderBy('id')->pluck('id')->values();

        DB::table('zonas')->insert([
            ['nombre' => 'VIP', 'descripcion' => 'Zona exclusiva', 'aforo_maximo' => 80, 'precio_cover' => 50000, 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Pista', 'descripcion' => 'Pista principal de baile', 'aforo_maximo' => 300, 'precio_cover' => 25000, 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
        $zoneIds = DB::table('zonas')->orderBy('id')->pluck('id')->values();

        DB::table('mesas')->insert([
            ['numero' => 'VIP-01', 'capacidad' => 8, 'tipo' => 'vip', 'estado' => 'libre', 'zona_id' => $zoneIds[0], 'created_at' => $now, 'updated_at' => $now],
            ['numero' => 'P-01', 'capacidad' => 4, 'tipo' => 'estandar', 'estado' => 'libre', 'zona_id' => $zoneIds[1], 'created_at' => $now, 'updated_at' => $now],
        ]);
        $tableIds = DB::table('mesas')->orderBy('id')->pluck('id')->values();

        DB::table('djs_artistas')->insert([
            ['nombre_artistico' => 'DJ Luna', 'nombre_real' => 'Lucia Navarro', 'genero_musical' => 'Electronic', 'biografia' => 'DJ residente de la casa', 'contacto' => 'dj.luna@example.com', 'cache_base' => 2500000, 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
            ['nombre_artistico' => 'MC Rayo', 'nombre_real' => 'Rafael Torres', 'genero_musical' => 'Reggaeton', 'biografia' => 'Artista invitado', 'contacto' => 'mc.rayo@example.com', 'cache_base' => 1800000, 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
        $artistIds = DB::table('djs_artistas')->orderBy('id')->pluck('id')->values();

        DB::table('eventos')->insert([
            ['nombre' => 'Noche Electronica', 'descripcion' => 'Sesion especial de musica electronica', 'fecha_inicio' => '2026-09-05 21:00:00', 'fecha_fin' => '2026-09-06 03:00:00', 'aforo' => 300, 'precio_entrada' => 40000, 'estado' => 'programado', 'zona_id' => $zoneIds[1], 'dj_artista_id' => $artistIds[0], 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Noche Urbana', 'descripcion' => 'Los mejores sonidos urbanos', 'fecha_inicio' => '2026-09-12 21:00:00', 'fecha_fin' => '2026-09-13 03:00:00', 'aforo' => 250, 'precio_entrada' => 35000, 'estado' => 'programado', 'zona_id' => $zoneIds[0], 'dj_artista_id' => $artistIds[1], 'created_at' => $now, 'updated_at' => $now],
        ]);
        $eventIds = DB::table('eventos')->orderBy('id')->pluck('id')->values();

        DB::table('reservas')->insert([
            ['fecha_reserva' => '2026-09-05 22:00:00', 'cantidad_personas' => 6, 'anticipo' => 100000, 'observaciones' => 'Celebracion de cumpleanos', 'estado' => 'pendiente', 'cliente_id' => $clientIds[0], 'mesa_id' => $tableIds[0], 'evento_id' => $eventIds[0], 'empleado_id' => $employeeIds[1], 'created_at' => $now, 'updated_at' => $now],
            ['fecha_reserva' => '2026-09-12 22:30:00', 'cantidad_personas' => 3, 'anticipo' => 50000, 'observaciones' => null, 'estado' => 'pendiente', 'cliente_id' => $clientIds[1], 'mesa_id' => $tableIds[1], 'evento_id' => $eventIds[1], 'empleado_id' => $employeeIds[1], 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('categorias_producto')->insert([
            ['nombre' => 'Bebidas', 'descripcion' => 'Bebidas y cocteles', 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Snacks', 'descripcion' => 'Comidas ligeras', 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
        $categoryIds = DB::table('categorias_producto')->orderBy('id')->pluck('id')->values();

        DB::table('proveedores')->insert([
            ['nit' => '900000001-1', 'razon_social' => 'Bebidas del Valle', 'contacto' => 'Juan Perez', 'telefono' => '6010000001', 'email' => 'ventas@bebidas.test', 'direccion' => 'Calle 10 # 20-30', 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
            ['nit' => '900000002-2', 'razon_social' => 'Snacks La Casa', 'contacto' => 'Ana Ruiz', 'telefono' => '6010000002', 'email' => 'ventas@snacks.test', 'direccion' => 'Carrera 5 # 12-10', 'estado' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
        $supplierIds = DB::table('proveedores')->orderBy('id')->pluck('id')->values();

        DB::table('productos')->insert([
            ['categoria_id' => $categoryIds[0], 'proveedor_id' => $supplierIds[0], 'codigo' => 'BEB-001', 'nombre' => 'Botella de ron', 'descripcion' => 'Botella de ron premium', 'precio_venta' => 180000, 'precio_compra' => 110000, 'estado' => true, 'unidad_medida' => 'unidad', 'created_at' => $now, 'updated_at' => $now],
            ['categoria_id' => $categoryIds[1], 'proveedor_id' => $supplierIds[1], 'codigo' => 'SNK-001', 'nombre' => 'Tabla de pasabocas', 'descripcion' => 'Pasabocas para compartir', 'precio_venta' => 35000, 'precio_compra' => 18000, 'estado' => true, 'unidad_medida' => 'unidad', 'created_at' => $now, 'updated_at' => $now],
        ]);
        $productIds = DB::table('productos')->orderBy('id')->pluck('id')->values();

        DB::table('inventarios')->insert([
            ['stock_actual' => 25, 'stock_minimo' => 5, 'ubicacion' => 'Bodega principal', 'Ultima_entrada' => $now, 'Ultima_salida' => null, 'producto_id' => $productIds[0], 'created_at' => $now, 'updated_at' => $now],
            ['stock_actual' => 40, 'stock_minimo' => 10, 'ubicacion' => 'Cocina', 'Ultima_entrada' => $now, 'Ultima_salida' => null, 'producto_id' => $productIds[1], 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('promociones')->insert([
            ['nombre' => 'Descuento de apertura', 'descripcion' => 'Descuento para la primera noche', 'tipo_descuento' => 'porcentaje', 'valor_descuento' => 10, 'fecha_inicio' => '2026-09-01 00:00:00', 'fecha_fin' => '2026-09-30 23:59:59', 'estado' => true, 'evento_id' => $eventIds[0], 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Combo 2x1', 'descripcion' => 'Promocion de bebidas seleccionadas', 'tipo_descuento' => '2x1', 'valor_descuento' => 0, 'fecha_inicio' => '2026-09-01 00:00:00', 'fecha_fin' => '2026-09-30 23:59:59', 'estado' => true, 'evento_id' => $eventIds[1], 'created_at' => $now, 'updated_at' => $now],
        ]);
        $promotionIds = DB::table('promociones')->orderBy('id')->pluck('id')->values();

        DB::table('ventas')->insert([
            ['numero_factura' => 'FAC-000001', 'fecha_venta' => '2026-09-05 23:00:00', 'subtotal' => 180000, 'descuento' => 18000, 'total' => 162000, 'estado' => 'pagada', 'cliente_id' => $clientIds[0], 'empleado_id' => $employeeIds[0], 'mesa_id' => $tableIds[0], 'promocion_id' => $promotionIds[0], 'created_at' => $now, 'updated_at' => $now],
            ['numero_factura' => 'FAC-000002', 'fecha_venta' => '2026-09-12 23:30:00', 'subtotal' => 35000, 'descuento' => 0, 'total' => 35000, 'estado' => 'abierta', 'cliente_id' => $clientIds[1], 'empleado_id' => $employeeIds[0], 'mesa_id' => $tableIds[1], 'promocion_id' => $promotionIds[1], 'created_at' => $now, 'updated_at' => $now],
        ]);
        $saleIds = DB::table('ventas')->orderBy('id')->pluck('id')->values();

        DB::table('detalle_ventas')->insert([
            ['cantidad' => 1, 'precio_unitario' => 180000, 'subtotal' => 180000, 'venta_id' => $saleIds[0], 'producto_id' => $productIds[0], 'created_at' => $now, 'updated_at' => $now],
            ['cantidad' => 1, 'precio_unitario' => 35000, 'subtotal' => 35000, 'venta_id' => $saleIds[1], 'producto_id' => $productIds[1], 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('pagos')->insert([
            ['metodo' => 'tarjeta', 'monto' => 162000, 'referencia' => 'TRX-000001', 'fecha_pago' => '2026-09-05 23:05:00', 'estado' => 'exitoso', 'venta_id' => $saleIds[0], 'created_at' => $now, 'updated_at' => $now],
            ['metodo' => 'efectivo', 'monto' => 35000, 'referencia' => 'PEND-000002', 'fecha_pago' => '2026-09-12 23:35:00', 'estado' => 'pendiente', 'venta_id' => $saleIds[1], 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('cargos_empleado')->insert([
            ['nombre' => 'Cajero', 'descripcion' => 'Responsable de caja y pagos', 'empleado_id' => $employeeIds[0], 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Mesero', 'descripcion' => 'Atencion de mesas y reservas', 'empleado_id' => $employeeIds[1], 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
