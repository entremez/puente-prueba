<?php

use Illuminate\Database\Seeder;
use App\Provider;
use App\User;
use App\InstanceImage;
use App\Instance;
use App\InstanceService;
use App\Service;
use App\ProviderService;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Service::class, 15)->create();
        $providers = factory(Provider::class, 10)->create();
        $providers->each(function($provider){
                $user = factory(User::class)->create();
                $user->type = "Provider";
                $user->type_id = $provider->id;
                $user->save();
                $cases = factory(Instance::class, 3)->make();
                $provider->cases()->saveMany($cases);
                $services = Service::inRandomOrder()->get();
                for ($i=0; $i < rand(3,6); $i++) {
                    $provider_service = new ProviderService();
                    $provider_service->service_id = $services[$i]->id;
                    $provider_service->provider_id = $provider->id;
                    $provider_service->save();
                    $servicios[$i] = $provider_service->service_id;
                }

                $cases->each(function($case) use ($servicios){
                        $images = factory(InstanceImage::class, 3)->make();
                        $case->images()->saveMany($images);
                        $images[0]->featured = true;
                        $images[0]->save();
                        for ($i=0; $i < rand(1,3); $i++) {
                            $instance_service = new InstanceService();
                            $instance_service->instance_id = $case->id;
                            $instance_service->service_id = $servicios[$i];
                            $instance_service->save();
                        }
                    });
        });
    }
}
