<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'title' => 'About Us',
            'text' => 'Lorem, ipsum dolor sit amet consectetur 
            adipisicing elit. Quos quibusdam, odio autem distinctio
            quo doloremque, accusantium sit quae odit eligendi animi
            laboriosam exercitationem nobis 
            ea dignissimos, dolorum voluptatum voluptas itaque.',
            'image' => null,

        ];

        AboutUs::create($data);

    }
}
