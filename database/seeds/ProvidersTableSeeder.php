<?php

use Illuminate\Database\Seeder;
use App\Provider;
use App\User;
use App\CaseImage;
use App\Instance;
use App\InstanceService;

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
                $cases = factory(Instance::class, 10)->make();
                $provider->cases()->saveMany($cases);

                $cases->each(function($case){
                        $images = factory(CaseImage::class, 3)->make();
                        $case->images()->saveMany($images);
                        for ($i=0; $i < rand(1,3); $i++) {
                            $instance_service = new InstanceService();
                            $instance_service->instance_id = $case->id;
                            $instance_service->service_id = rand(1,15);
                            $instance_service->save();
                        }
                    });
        });
    }
}
