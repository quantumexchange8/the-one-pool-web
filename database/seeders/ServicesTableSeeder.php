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
                'name' => 'Swimming Pool Design & Build Service',
                'subtitle' => 'Tailored Designs to Reflect Your Vision',
                'description' => 'We design and build swimming pools that perfectly align with your vision, creating a space that is both functional and beautiful. Every project is crafted to reflect your unique preferences, ensuring complete satisfaction.',
                'details' => json_encode([
                    'Personalized Design Process:' => [
                        'Collaborate with clients to capture their vision and design preferences.',
                        'Deliver designs that harmonize with the surrounding environment.',
                    ],
                    'Construction Excellence:' => [
                        'Execute every stage of construction with precision, from excavation to finishing.',
                        'Ensure durability and quality with expert craftsmanship and premium materials.',
                    ],
                    'Seamless Integration:' => [
                        'Create pools that blend effortlessly into the landscape, maximizing usability and aesthetic appeal.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pool Cleaning Service (Monthly)',
                'subtitle' => 'Keep Your Pool Sparkling Clean',
                'description' => 'Our monthly pool cleaning services ensure your pool stays clean, safe, and inviting. Let us handle the maintenance so you can enjoy a pristine swimming experience year-round.',
                'details' => json_encode([
                    'Thorough Cleaning:' => [
                        'Skim, vacuum, and scrub surfaces to remove debris and algae.',
                        'Clean and maintain pool filters to ensure clear water.',
                    ],
                    'Chemical Balancing:' => [
                        'Test and adjust water chemistry to maintain safety and comfort.',
                        'Use high-quality chemicals to prevent bacteria and algae growth.',
                    ],
                    'Inspection and Maintenance:' => [
                        'Regularly inspect pool equipment for optimal performance.',
                        'Address minor issues before they escalate into costly repairs.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pool Maintenance Works',
                'subtitle' => 'Comprehensive Care for Long-Lasting Pools',
                'description' => 'Extend the life and beauty of your pool with our maintenance services. From equipment checks to water quality adjustments, we provide everything your pool needs to perform at its best.',
                'details' => json_encode([
                    'Routine Checks:' => [
                        'Inspect pumps, filters, and other equipment for wear and tear.',
                        'Ensure all systems are running efficiently.',
                    ],
                    'Water Quality Management:' => [
                        'Monitor and adjust pH, chlorine, and other chemical levels.',
                        'Prevent buildup of harmful substances with regular treatment.',
                    ],
                    'Preventive Measures:' => [
                        'Identify and resolve potential issues before they require major repairs.',
                        'Provide guidance on pool care between service visits.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pool Problem Tackle',
                'subtitle' => 'Solve Issues, Restore Enjoyment',
                'description' => 'We specialize in diagnosing and fixing pool-related problems, ensuring your pool is back to its optimal condition quickly and efficiently.',
                'details' => json_encode([
                    'Leak Detection and Repair:' => [
                        'Identify leaks in the pool structure or plumbing.',
                        'Perform efficient repairs to restore water-tightness.',
                    ],
                    'Equipment Troubleshooting:' => [
                        'Resolve issues with pumps, filters, heaters, and other components.',
                        'Replace or repair malfunctioning equipment as needed.',
                    ],
                    'Water Quality Recovery:' => [
                        'Eliminate green water, cloudiness, or other water quality problems.',
                        'Restore chemical balance for safe and enjoyable swimming.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trading All Pool Equipment, Accessories & Chemical',
                'subtitle' => 'Your One-Stop Pool Supply Shop',
                'description' => 'We offer a wide range of pool equipment, accessories, and chemicals to meet all your pool care needs. From pumps to pool floats, we’ve got you covered.',
                'details' => json_encode([
                    'Equipment and Accessories:' => [
                        'Supply high-quality pumps, filters, and heaters.',
                        'Offer pool covers, ladders, and cleaning tools.',
                    ],
                    'Chemical Solutions:' => [
                        'Provide premium chemicals for water treatment and balance.',
                        'Guide customers on proper chemical usage for safety and effectiveness.',
                    ],
                    'Expert Advice:' => [
                        'Assist in selecting the right products for your specific pool.',
                        'Ensure customers understand the maintenance process.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Water Feature & Water Fountain Design & Build',
                'subtitle' => 'Transform Spaces with Elegant Water Features',
                'description' => 'Add elegance and tranquility to your property with our bespoke water features and fountains. We design and build stunning additions that create a serene ambiance.',
                'details' => json_encode([
                    'Custom Designs:' => [
                        'Create unique water features tailored to your space and style.',
                        'Incorporate modern and classic designs to suit any preference.',
                    ],
                    'Expert Craftsmanship:' => [
                        'Construct durable and visually striking fountains.',
                        'Use premium materials to ensure longevity and low maintenance.',
                    ],
                    'Enhanced Ambiance:' => [
                        'Integrate lighting and landscaping for a complete look.',
                        'Design features that blend seamlessly with existing architecture.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Supply & Install Outdoor Architecture Items',
                'subtitle' => 'Functional and Aesthetic Outdoor Additions',
                'description' => 'Elevate your outdoor spaces with architectural items designed for style and durability. We supply and install pergolas, gazebos, and other custom structures.',
                'details' => json_encode([
                    'Custom Structures:' => [
                        'Design and install pergolas, gazebos, and cabanas.',
                        'Create functional spaces for relaxation or entertainment.',
                    ],
                    'Material Selection:' => [
                        'Offer a variety of materials, including wood, metal, and composite.',
                        'Ensure durability and resistance to outdoor conditions.',
                    ],
                    'Seamless Integration:' => [
                        'Blend structures with existing landscaping and architecture.',
                        'Provide professional installation for a flawless finish.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Landscaping Works',
                'subtitle' => 'Create Stunning Outdoor Retreats',
                'description' => 'Transform your poolside and backyard with expert landscaping services. From lush greenery to decorative hardscapes, we design beautiful and functional outdoor spaces.',
                'details' => json_encode([
                    'Design and Planning:' => [
                        "Craft landscaping plans that enhance your property's natural beauty.",
                        'Incorporate features like walkways, gardens, and seating areas.',
                    ],
                    'Hardscaping Solutions:' => [
                        'Install decorative paving, stonework, and retaining walls.',
                        'Provide durable and visually appealing hardscape elements.',
                    ],
                    'Lush Greenery:' => [
                        'Select plants that thrive in your climate and soil conditions.',
                        'Create a harmonious blend of greenery and architectural elements.',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);        

        $services = DB::table('services')->get();

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
