<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectImage;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $project1 = Project::create([
            'title' => 'Pool Construction: Shah Alam Expressway',
            'subtitle' => 'Crafting Pool Perfection',
            'description' => 'Designed and built a stunning, durable swimming pool tailored to the client’s vision. The project included premium materials, advanced features, and meticulous craftsmanship, completed on time and within budget.',
            'category' => 'Pool Construction',
            'location' => 'Shah Alam Expressway',
            'client' => 'ABC Hotel',
            'date' => '2024-1-1',
        ]);

        $project2 = Project::create([
            'title' => 'Landscaping and Features: Seksyen 32, Shah Alam',
            'subtitle' => 'Elevating Poolside Landscapes',
            'description' => 'Enhance your pool area with thoughtfully designed landscaping and features that blend beauty and functionality. From lush greenery and elegant decking to striking water features and ambient lighting, we create inviting outdoor spaces that perfectly complement your pool.',
            'category' => 'Landscaping and Features',
            'location' => 'Petaling Jaya, Selangor',
            'client' => 'Mr. Wong',
            'date' => '2023-9-25',
        ]);

        $project3 = Project::create([
            'title' => 'Renovation and Upgrades: Petaling Jaya, Selangor',
            'subtitle' => 'Revitalizing Pools with Modern Upgrades',
            'description' => 'Transform your existing pool into a contemporary masterpiece with our renovation and upgrade services. From updated tiling and advanced filtration systems to stunning lighting and added features, we enhance both the aesthetics and functionality of your pool to meet modern standards.',
            'category' => 'Renovation and Upgrades',
            'location' => 'Petaling Jaya, Selangor',
            'client' => 'Good Park',
            'date' => '2024-11-15',
        ]);

        $images1 = [
            '/assets/img/projects/project1/1.jpeg',
            '/assets/img/projects/project1/2.jpeg',
            '/assets/img/projects/project1/3.jpeg',
            '/assets/img/projects/project1/4.jpeg',
            '/assets/img/projects/project1/5.jpeg',
            '/assets/img/projects/project1/6.jpeg',
            '/assets/img/projects/project1/7.jpeg',
            '/assets/img/projects/project1/8.jpeg',
            '/assets/img/projects/project1/9.jpeg',
            '/assets/img/projects/project1/10.jpeg',
            '/assets/img/projects/project1/11.jpeg',
        ];
    
        foreach ($images1 as $image) {
            ProjectImage::create([
                'project_id' => $project1->id,
                'image_path' => $image,
            ]);
        }
    
        $images2 = [
            '/assets/img/projects/project2/1.jpeg',
            '/assets/img/projects/project2/2.jpeg',
            '/assets/img/projects/project2/3.jpeg',
            '/assets/img/projects/project2/4.jpeg',
            '/assets/img/projects/project2/5.jpeg',
            '/assets/img/projects/project2/6.jpeg',
            '/assets/img/projects/project2/7.jpeg',
            '/assets/img/projects/project2/8.jpeg',
            '/assets/img/projects/project2/9.jpeg',
            '/assets/img/projects/project2/10.jpeg',
            '/assets/img/projects/project2/11.jpeg',
        ];
    
        foreach ($images2 as $image) {
            ProjectImage::create([
                'project_id' => $project2->id,
                'image_path' => $image,
            ]);
        }

        $images3 = [
            '/assets/img/projects/project3/1.jpeg',
            '/assets/img/projects/project3/2.jpeg',
            '/assets/img/projects/project3/3.jpeg',
            '/assets/img/projects/project3/4.jpeg',
            '/assets/img/projects/project3/5.jpeg',
            '/assets/img/projects/project3/6.jpeg',
            '/assets/img/projects/project3/7.jpeg',
            '/assets/img/projects/project3/8.jpeg',
            '/assets/img/projects/project3/9.jpeg',
            '/assets/img/projects/project3/10.jpeg',
            '/assets/img/projects/project3/11.jpeg',
        ];
    
        foreach ($images3 as $image) {
            ProjectImage::create([
                'project_id' => $project3->id,
                'image_path' => $image,
            ]);
        }
    }
}
