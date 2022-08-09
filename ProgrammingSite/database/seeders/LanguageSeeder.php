<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [

            [
                'name' => 'Python',
                'company_id' => 1, 
                'description' => 'Python is a high-level, interpreted, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation.',
                'image_url' => 'storage/python.2png'
            ],

            [
                'name' => 'C#',
                'company_id' => 2,
                'description' => 'C# is a general-purpose, multi-paradigm programming language. C# encompasses static typing, strong typing, lexically scoped, imperative, declarative, functional, generic, object-oriented (class-based), and component-oriented programming disciplines.',
                'image_url' => 'storage/csharp.2png'
            ],

            [
                'name' => 'JavaScript',
                'company_id' => 3,
                'description' => 'JavaScript often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. As of 2022, 98% of websites use JavaScript on the client side for webpage behavior, often incorporating third-party libraries.',
                'image_url' => 'storage/javascript.2png'
            ],

            [
                'name' => 'CSS',
                'company_id' => 4,
                'description' => 'Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language such as HTML or XML (including XML dialects such as SVG, MathML or XHTML).',
                'image_url' => 'storage/css.2png'
            ],

            [
                'name' => 'PHP',
                'company_id' => 5,
                'description' => 'PHP is a general-purpose scripting language geared toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.',
                'image_url' => 'storage/php.2png'
            ],

            [
                'name' => 'JAVA',
                'company_id' => 6,
                'description' => 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.',
                'image_url' => 'storage/java.2png'
            ],
        ];

        Language::insert($languages);
    }
}
