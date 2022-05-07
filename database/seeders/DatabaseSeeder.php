<?php

namespace Database\Seeders;

/* use App\Models\SiteContato; */
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(FornecedorSeeder::class); //para não executar novamente essa classe, ou comenta a linha ou você adiciona o nome da classe no comando: php artisan db:seed --class=nome_da_classe  
        $this->call(SiteContatoSeeder::class); //para executar comandos da seeder
        $this->call(MotivoContatoSeeder::class);

    }
}
