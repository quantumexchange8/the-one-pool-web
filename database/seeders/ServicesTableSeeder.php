<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'Custom Pool Design',
                'subtitle' => 'Tailored Designs to Reflect Your Vision',
                'description' => 'We bring your dream pool to life with designs that perfectly align with your vision, space, and budget. Each custom pool is a blend of innovation, functionality, and style, ensuring a unique and personalized outcome.',
                'details' => json_encode([
                    'Personalized Design Process:' => [
                        'Work closely with clients to understand their needs and preferences.',
                        'Create designs that complement the surrounding landscape and architecture.',
                    ],
                    'Space Optimization:' => [
                        'Maximize the available space while creating a pool that fits seamlessly into the environment.',
                        'Consideration for pool size, shape, and any additional features like spas or waterfalls.',
                    ],
                    'Budget-Friendly Solutions:' => [
                        'Offer designs that fit within your budget without compromising on quality.',
                        'Provide cost-effective options for materials and features.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pool Construction',
                'subtitle' => 'Building Pools with Precision and Care',
                'description' => 'From excavation to the final touches, we handle every step of the pool construction process. Our team ensures that each pool is built to last, with a focus on quality materials, expert craftsmanship, and attention to detail.',
                'details' => json_encode([
                    'Full Construction Service:' => [
                        'Handle every aspect of pool construction, including excavation, plumbing, electrical work, and finishing.',
                    ],
                    'High-Quality Materials:' => [
                        'Use only the best materials for durability and long-term performance.',
                        'Ensure all materials meet industry standards for safety and quality.',
                    ],
                    'Timely Project Completion:' => [
                        'Deliver the project on time and within the agreed-upon schedule.',
                        "Ensure minimal disruption to the client's property.",
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Commercial Pool Projects',
                'subtitle' => 'Large-Scale Pools for Commercial Spaces',
                'description' => 'We specialize in constructing large-scale pools for hotels, resorts, fitness centers, and other commercial spaces. Our projects adhere to the highest industry standards, providing a luxury experience for guests and clients alike.',
                'details' => json_encode([
                    'Custom Commercial Designs:' => [
                        'Tailored pool designs to fit the needs of commercial clients, ensuring maximum functionality and aesthetics.',
                        'Incorporate unique features like infinity edges, large hot tubs, or water slides.',
                    ],
                    'Compliance with Standards:' => [
                        'Adhere to local regulations and safety standards for public and commercial pool installations.',
                        'Ensure pools meet accessibility requirements and industry standards.',
                    ],
                    'Efficient Construction:' => [
                        'Manage large-scale projects with a focus on efficiency, ensuring minimal downtime for commercial operations.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Renovation & Upgrades',
                'subtitle' => 'Transform Your Pool into a Modern Masterpiece',
                'description' => "Breathe new life into your existing pool with our renovation and upgrade services. Whether it's updating the pool’s aesthetic or enhancing its functionality, we help create a modern, high-performing pool you’ll love.",
                'details' => json_encode([
                    'Pool Resurfacing:' => [
                        'Update pool surfaces with new tiling, pebble finishes, or plaster to improve both aesthetics and durability.',
                    ],
                    'System Upgrades:' => [
                        'Enhance pool systems with the latest energy-efficient pumps, filtration systems, and smart pool technology.',
                    ],
                    'Feature Additions:' => [
                        'Add features such as waterfalls, spas, or lighting to elevate the pool experience.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Landscaping & Features',
                'subtitle' => 'Enhance Your Pool with Stunning Surroundings',
                'description' => 'Transform your pool area into a relaxing retreat with our landscaping and features. From lush greenery and decorative decking to stunning waterfalls and lighting, we create beautiful outdoor spaces that complement your pool.',
                'details' => json_encode([
                    'Custom Landscaping:' => [
                        'Design and install gardens, walkways, and patios that complement the pool’s design.',
                        'Select plants that thrive in your area while enhancing the overall aesthetic.',
                    ],
                    'Water Features:' => [
                        'Add dynamic elements such as waterfalls, fountains, or streams to enhance the ambiance.',
                    ],
                    'Lighting Solutions:' => [
                        'Incorporate ambient lighting to highlight the pool and surrounding landscape, perfect for evening relaxation',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Get the inserted services
        $services = DB::table('services')->get();

        // Insert service images
        foreach ($services as $service) {
            DB::table('service_images')->insert([
                [
                    'service_id' => $service->id,
                    'image_path' => '/assets/img/services/service' . $service->id . '/1.jpeg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'service_id' => $service->id,
                    'image_path' => '/assets/img/services/service' . $service->id . '/2.jpeg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'service_id' => $service->id,
                    'image_path' => '/assets/img/services/service' . $service->id . '/3.jpeg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'service_id' => $service->id,
                    'image_path' => '/assets/img/services/service' . $service->id . '/4.jpeg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'service_id' => $service->id,
                    'image_path' => '/assets/img/services/service' . $service->id . '/5.jpeg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
