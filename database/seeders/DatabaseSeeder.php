<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use PhpParser\Node\Expr\AssignOp\Pow;

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


        User::factory(3)->create();
        // User::create([
        //     'name' => 'Yusuf Bagus',
        //     'email' => 'yusuf.bagus@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Masbag Herlambang',
        //     'email' => 'yusuf.herlambang@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);



        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);


        Post::factory(20)->create();
        // Post::create([
        //     'tittle' => 'Judul Post Pertama',
        //     'slug' => 'judul-post-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis aut
        //     consectetur accusamus at soluta nostrum iste ut corrupti inventore.',
        //     'body' => '<p>
        //     Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis aut
        //     consectetur accusamus at soluta nostrum iste ut corrupti inventore. Modi eum
        //     minus, voluptate id suscipit ipsa, vero sit dolorem recusandae, molestiae ea
        //     quasi necessitatibus esse eius quo quas ratione explicabo aut!
        // </p>
        // <p>
        //     Expedita esse itaque eligendi laboriosam suscipit voluptas dolorum ratione
        //     rerum voluptatem soluta, minus blanditiis earum rem atque pariatur
        //     molestias? A non sunt odit fugit modi sapiente hic deserunt voluptate quos
        //     reiciendis. Labore iste fugiat magni aperiam atque unde est? Ea esse
        //     deleniti non necessitatibus odit debitis officia vero ut minus quam tenetur,
        //     perspiciatis labore doloribus, exercitationem vel sit. Eum!
        // </p>
        // <p>
        //     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus eius
        //     nostrum dolorum in laudantium inventore fuga pariatur reprehenderit
        //     repellendus quo voluptatem cum libero dignissimos magnam, voluptas deserunt
        //     ex quas nam ullam vitae quibusdam. Deleniti doloribus, facere quas nostrum
        //     hic incidunt itaque dolore perspiciatis explicabo amet officia, facilis
        //     error aut totam suscipit voluptates modi.
        // </p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'tittle' => 'Judul Post Kedua',
        //     'slug' => 'judul-post-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis aut
        //     consectetur accusamus at soluta nostrum iste ut corrupti inventore.',
        //     'body' => '<p>
        //     Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis aut
        //     consectetur accusamus at soluta nostrum iste ut corrupti inventore. Modi eum
        //     minus, voluptate id suscipit ipsa, vero sit dolorem recusandae, molestiae ea
        //     quasi necessitatibus esse eius quo quas ratione explicabo aut!
        // </p>
        // <p>
        //     Expedita esse itaque eligendi laboriosam suscipit voluptas dolorum ratione
        //     rerum voluptatem soluta, minus blanditiis earum rem atque pariatur
        //     molestias? A non sunt odit fugit modi sapiente hic deserunt voluptate quos
        //     reiciendis. Labore iste fugiat magni aperiam atque unde est? Ea esse
        //     deleniti non necessitatibus odit debitis officia vero ut minus quam tenetur,
        //     perspiciatis labore doloribus, exercitationem vel sit. Eum!
        // </p>
        // <p>
        //     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus eius
        //     nostrum dolorum in laudantium inventore fuga pariatur reprehenderit
        //     repellendus quo voluptatem cum libero dignissimos magnam, voluptas deserunt
        //     ex quas nam ullam vitae quibusdam. Deleniti doloribus, facere quas nostrum
        //     hic incidunt itaque dolore perspiciatis explicabo amet officia, facilis
        //     error aut totam suscipit voluptates modi.
        // </p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'tittle' => 'Judul Post Ketiga',
        //     'slug' => 'judul-post-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis aut
        //     consectetur accusamus at soluta nostrum iste ut corrupti inventore.',
        //     'body' => '<p>
        //     Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis aut
        //     consectetur accusamus at soluta nostrum iste ut corrupti inventore. Modi eum
        //     minus, voluptate id suscipit ipsa, vero sit dolorem recusandae, molestiae ea
        //     quasi necessitatibus esse eius quo quas ratione explicabo aut!
        // </p>
        // <p>
        //     Expedita esse itaque eligendi laboriosam suscipit voluptas dolorum ratione
        //     rerum voluptatem soluta, minus blanditiis earum rem atque pariatur
        //     molestias? A non sunt odit fugit modi sapiente hic deserunt voluptate quos
        //     reiciendis. Labore iste fugiat magni aperiam atque unde est? Ea esse
        //     deleniti non necessitatibus odit debitis officia vero ut minus quam tenetur,
        //     perspiciatis labore doloribus, exercitationem vel sit. Eum!
        // </p>
        // <p>
        //     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus eius
        //     nostrum dolorum in laudantium inventore fuga pariatur reprehenderit
        //     repellendus quo voluptatem cum libero dignissimos magnam, voluptas deserunt
        //     ex quas nam ullam vitae quibusdam. Deleniti doloribus, facere quas nostrum
        //     hic incidunt itaque dolore perspiciatis explicabo amet officia, facilis
        //     error aut totam suscipit voluptates modi.
        // </p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
