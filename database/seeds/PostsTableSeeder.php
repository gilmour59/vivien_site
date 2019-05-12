<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'type' => 'Domestic'
        ]);

        $category2 = Category::create([
            'type' => 'International'
        ]);

        $post1 = Post::create([
            'title' => 'Title 1',
            'description' => 'description1',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id' => $category1->id,
            'image' => 'posts/img/d1.jpg',
            'days' => 2,
            'nights' => 1,
            'price' => 3000
        ]);

        $post2 = Post::create([
            'title' => 'Title 2',
            'description' => 'description2',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id' => $category1->id,
            'image' => 'posts/img/d2.jpg',
            'days' => 3,
            'nights' => 2,
            'price' => 4000
        ]);

        $post3 = Post::create([
            'title' => 'Title 3',
            'description' => 'description3',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id' => $category2->id,
            'image' => 'posts/img/d3.jpg',
            'days' => 4,
            'nights' => 3,
            'price' => 5000
        ]);

        $post4 = Post::create([
            'title' => 'Title 4',
            'description' => 'description3',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id' => $category2->id,
            'image' => 'posts/img/d4.jpg',
            'days' => 3,
            'nights' => 2,
            'price' => 6000
        ]);
    }
}
