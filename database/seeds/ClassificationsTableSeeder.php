<?php

use Illuminate\Database\Seeder;

class ClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$classifications = ["Agricultura, forestal y pesca" , "Minería y cantería", "Manufactura","Abastecimiento de electricidad, gas vapor y aire acondicionado", "Abastecimiento de agua, alcantarillado, manejo de desechos y actividades de remediación", "Construcción", "Venta al por mayor y de retail; reparación de motores de vehiculos y motocicletas", "Transporte y almacenamiento", "Hotelería y actividades de servicios de comida","Información y comunicación", "Actividades financieras y de seguros", "Actividades inmobiliarias o de corretaje", "Actividades técnicas, científicas y profesionales", "Actividades administrativas y de soporte", "Administración pública y defensa; seguridad social obligatoria", "Educación", "Salud humana y actividades de trabajo social", "Arte, entretenimiento y recreación", "Otras actividades de servicios", "Actividades de los hogares como empleadores; bienes indiferenciados y producción de servicios", "Actividades de los hogares para su propio uso", "Actividades de organizaciones y cuerpos extraterritoriales"];
    	foreach ($classifications as $value) {
    		$classification = new App\Classification;
    		$classification->classification = $value;
    		$classification->save();
    	}
        
    }
}
