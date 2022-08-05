<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        $companies = [

            [
                'name' => 'PSF',
                'email' => 'psf@python.org',
                'phone' => '+1 (858) 712-8966',
                'description' => 'The Python Software Foundation known as PSF is an American nonprofit organization devoted to the Python programming language, launched on March 6, 2001.',
            ],

            [
                'name' => 'Masds Torgersen (Microsoft)',
                'email' => 'wehelp@microsoft.com',
                'phone' => '+1 (800) 642 7676',
                'description' => 'Mads Torgersen is a senior program manager at Microsoft. As the program manager for the C# language, he runs the C# language design meetings and maintains the C# language specification.'
            ],

            [
                'name' => 'Brendan Eich',
                'email' => 'brendan.eich@gmail.com',
                'phone' => '+1 408-823-6486',
                'description' => 'Brendan Eich is an American computer programmer and technology executive. He created the JavaScript programming language and co-founded the Mozilla project, the Mozilla Foundation, and the Mozilla Corporation.'
            ],

            [
                'name' => 'W3C',
                'email' => 'susan@w3.org',
                'phone' => '+1 617-253-2613',
                'description' => 'The World Wide Web Consortium known as W3C is the main international standards organization for the World Wide Web. Founded in 1994 and currently led by Tim Berners-Lee, the consortium is made up of member organizations that maintain full-time staff working together in the development of standards for the World Wide Web.'
            ],

            [
                'name' => 'Zend Technologies',
                'email' => 'Support-Zend@perforce.com',
                'phone' => '+1 612-517-2100',
                'description' => 'Mads Torgersen is a senior program manager at Microsoft. As the program manager for the C# language, he runs the C# language design meetings and maintains the C# language specification.'
            ],

            [
                'name' => 'James Gosling',
                'email' => 'jamesgosling@gmail.com',
                'phone' => '+1 (216) 647-4284',
                'description' => 'Mads Torgersen is a senior program manager at Microsoft. As the program manager for the C# language, he runs the C# language design meetings and maintains the C# language specification.'
            ],
        ];

        Company::insert($companies);


    }
}
