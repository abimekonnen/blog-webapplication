<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $author1 = User::create(
            [
                'name' => 'John Doe',
                'email' => 'John@gmail.com',
                'password' => Hash::make('password')
            ]
            );
        $author2 = User::create(
            [
                'name' => 'La festa',
                'email' => 'lala@gmail.com',
                'password' => Hash::make('password')
            ]
            );
        $author3 = User::create(
            [
                'name' => 'La3 festa3',
                'email' => 'lala3@gmail.com',
                'password' => Hash::make('password')
            ]
            );
        $author4 = User::create(
            [
                'name' => 'La4 festa4',
                'email' => 'lala4@gmail.com',
                'password' => Hash::make('password')
            ]
            );
        $author5 = User::create(
            [
                'name' => 'La4 festa4',
                'email' => 'lala5@gmail.com',
                'password' => Hash::make('password')
            ]
            );
        $category1 = Category::create(
            [
                'name' => 'News'
            ]
            );
        $category2 = Category::create(
            [
                'name' => 'Marketing'
            ]
            );
        $category3 = Category::create(
            [
                'name' => 'Partnership'
            ]
            );
        $category4 = Category::create(
            [
                'name' => 'Design'
            ]
            );
        $category5 = Category::create(
            [
                'name' => 'Hiring'
            ]
            );
        $category6 = Category::create(
            [
                'name' => 'Offers'
            ]
            );
                           
        $post1 =$author1->posts()->create(
            [
                'title' => 'We relocated our office to a new designed garage',
                'discription' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'content' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'category_id'=>1,
                'image' => 'posts/1.jpg',
              
            ]
        ) ;
        $post2 = $author2->posts()->create(
            [
                'title' => 'Top 5 brilliant content marketing strategies',
                'discription' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'content' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'category_id'=>2,
                'image' => 'posts/2.jpg'
            ]
        ) ;
        $post3 = $author2->posts()->create(
            [
                'title' => 'Best practices for minimalist design with example',
                'discription' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'content' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'category_id'=>3,
                'image' => 'posts/3.jpg'
            ]
        ) ;
        $post4 = $author3->posts()->create(
            [
                'title' => 'Congratulate and thank to Maryam for joining our team',
                'discription' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'content' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'category_id'=>4,
                'image' => 'posts/4.jpg'
            ]
        ) ;
        $post5 = $author4->posts()->create(
            [
                'title' => 'New published books to read by a product designer',
                'discription' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'content' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'category_id'=>5,
                'image' => 'posts/5.jpg'
            ]
        ) ;
               $post6 =  $author5->posts()->create(
            [
                'title' => 'This is why it time to ditch dress codes at work',
                'discription' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'content' => 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
                'category_id'=>6,
                'image' => 'posts/6.jpg'
            ]
        ) ;
        $tag1 = Tag::create(
            [
                'name' => 'job'
            ]
        );
        $tag2 = Tag::create(
            [
                'name' => 'customer'
            ]
            );
        $tag3 = Tag::create(
            [
                'name' => 'technology'
            ]
            );
        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]);
        $post3->tags()->attach([$tag3->id,$tag3->id]);
        $post4->tags()->attach([$tag1->id,$tag3->id]);
        $post5->tags()->attach([$tag2->id,$tag1->id]);
        $post6->tags()->attach([$tag3->id,$tag2->id]);
    }
}
