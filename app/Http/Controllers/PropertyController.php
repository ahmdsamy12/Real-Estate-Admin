<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PropertyController extends Controller
{
    /**
     * Display the full property listing page.
     */
    public function index(): View
    {
        $properties = $this->getAllProperties();
        return view('pages.properties', compact('properties'));
    }

    /**
     * Display a single property's detail page.
     */
    public function show(int $id): View|RedirectResponse
    {
        $properties = $this->getAllProperties();

        $property = collect($properties)->firstWhere('id', $id);

        if (! $property) {
            return redirect()->route('properties.index');
        }

        return view('pages.property-detail', compact('property'));
    }

    /**
     * Static dataset for all properties.
     * In a real app this would come from the database.
     */
    public function getAllProperties(): array
    {
        return [
            [
                'id'          => 1,
                'name'        => 'Skyline Residences – Penthouse',
                'type'        => 'Apartment',
                'price'       => '$1,250,000',
                'status'      => 'Available',
                'location'    => 'Downtown Cairo, EG',
                'bedrooms'    => 4,
                'bathrooms'   => 3,
                'area'        => '320 m²',
                'year_built'  => 2022,
                'description' => 'A stunning top-floor penthouse offering panoramic city views, an open-plan living area flooded with natural light, and a wrap-around terrace ideal for entertaining. Finished to the highest specification with Italian marble floors and smart-home automation throughout.',
                'features'    => ['Smart Home System', 'Wrap-around Terrace', 'Private Elevator', 'Concierge Service', 'Indoor Gym', 'Covered Parking (x2)'],
                'images'      => [
                    'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1560448204-603b3fc33ddc?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=900&auto=format&fit=crop&q=75',
                ],
            ],
            [
                'id'          => 2,
                'name'        => 'Palm Grove Villa',
                'type'        => 'Villa',
                'price'       => '$2,800,000',
                'status'      => 'Available',
                'location'    => 'New Cairo, EG',
                'bedrooms'    => 6,
                'bathrooms'   => 5,
                'area'        => '750 m²',
                'year_built'  => 2021,
                'description' => 'An expansive private villa set within a gated community surrounded by manicured gardens. Features a heated pool, home cinema, and a state-of-the-art chef\'s kitchen. Perfect for families seeking luxury and privacy.',
                'features'    => ['Heated Pool', 'Home Cinema', 'Chef\'s Kitchen', 'Landscaped Gardens', 'Guest House', 'Triple Garage'],
                'images'      => [
                    'https://images.unsplash.com/photo-1613977257363-707ba9348227?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1523217582562-09d0def993a6?w=900&auto=format&fit=crop&q=75',
                ],
            ],
            [
                'id'          => 3,
                'name'        => 'Nile Tower – Executive Suite',
                'type'        => 'Office',
                'price'       => '$640,000',
                'status'      => 'Sold',
                'location'    => 'Garden City, Cairo, EG',
                'bedrooms'    => 0,
                'bathrooms'   => 2,
                'area'        => '210 m²',
                'year_built'  => 2020,
                'description' => 'A premium executive office suite on the 22nd floor of Nile Tower with direct river views. Fully fitted with glass partitions, integrated AV systems, a boardroom, and a private reception area. Ideal for boutique firms and corporate headquarters.',
                'features'    => ['River View', 'Boardroom', 'Reception Area', 'Fiber Internet', 'AV Integration', 'Valet Parking'],
                'images'      => [
                    'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1604328698692-f76ea9498e76?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1497215842964-222b430dc094?w=900&auto=format&fit=crop&q=75',
                ],
            ],
            [
                'id'          => 4,
                'name'        => 'Maadi Garden Apartment',
                'type'        => 'Apartment',
                'price'       => '$320,000',
                'status'      => 'Reserved',
                'location'    => 'Maadi, Cairo, EG',
                'bedrooms'    => 3,
                'bathrooms'   => 2,
                'area'        => '165 m²',
                'year_built'  => 2019,
                'description' => 'A charming ground-floor apartment with direct garden access in one of Cairo\'s most sought-after residential neighbourhoods. Features a renovated kitchen, hardwood floors, and a private courtyard.',
                'features'    => ['Private Garden', 'Renovated Kitchen', 'Hardwood Floors', 'Storage Room', 'Security System', 'Parking Space'],
                'images'      => [
                    'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1484154218962-a197022b5858?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1556909045-8e0e0b45c3a3?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=900&auto=format&fit=crop&q=75',
                ],
            ],
            [
                'id'          => 5,
                'name'        => 'Heliopolis Tech Hub',
                'type'        => 'Office',
                'price'       => '$890,000',
                'status'      => 'Available',
                'location'    => 'Heliopolis, Cairo, EG',
                'bedrooms'    => 0,
                'bathrooms'   => 4,
                'area'        => '480 m²',
                'year_built'  => 2023,
                'description' => 'A modern open-plan tech campus designed for fast-growing companies. Features collaborative zones, private pods, a rooftop garden terrace, and a café area. Built to LEED Silver standards with energy-efficient systems throughout.',
                'features'    => ['Open-plan Layout', 'Private Pods', 'Rooftop Terrace', 'Café Area', 'LEED Silver', 'EV Charging'],
                'images'      => [
                    'https://images.unsplash.com/photo-1568992688065-536aad8a12f6?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1416339684178-3a239570f315?w=900&auto=format&fit=crop&q=75',
                ],
            ],
            [
                'id'          => 6,
                'name'        => 'October Hills Villa',
                'type'        => 'Villa',
                'price'       => '$1,700,000',
                'status'      => 'Available',
                'location'    => '6th of October City, EG',
                'bedrooms'    => 5,
                'bathrooms'   => 4,
                'area'        => '560 m²',
                'year_built'  => 2022,
                'description' => 'A contemporary architectural masterpiece with clean lines and floor-to-ceiling glass walls that frame sweeping hillside views. Features a rooftop infinity pool, fully equipped outdoor kitchen, and a basement entertainment suite.',
                'features'    => ['Infinity Pool', 'Outdoor Kitchen', 'Home Theatre', 'Solar Panels', 'Smart Security', 'Landscaped Rooftop'],
                'images'      => [
                    'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1600607687939-ce8a6d350803?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?w=900&auto=format&fit=crop&q=75',
                ],
            ],
            [
                'id'          => 7,
                'name'        => 'Zamalek Classic Flat',
                'type'        => 'Apartment',
                'price'       => '$480,000',
                'status'      => 'Sold',
                'location'    => 'Zamalek, Cairo, EG',
                'bedrooms'    => 3,
                'bathrooms'   => 2,
                'area'        => '185 m²',
                'year_built'  => 1998,
                'description' => 'A beautifully restored pre-war apartment in the heart of Zamalek, Cairo\'s most prestigious island district. High ceilings, original parquet floors, and a spacious balcony overlooking lush tree-lined streets.',
                'features'    => ['High Ceilings', 'Original Parquet', 'Large Balcony', 'Doorman', 'Central Location', 'Storage'],
                'images'      => [
                    'https://images.unsplash.com/photo-1550581190-9c1c48d21d6c?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1505873242700-f289a29e1724?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?w=900&auto=format&fit=crop&q=75',
                ],
            ],
            [
                'id'          => 8,
                'name'        => 'Smart Village Office Campus',
                'type'        => 'Office',
                'price'       => '$2,100,000',
                'status'      => 'Reserved',
                'location'    => 'Smart Village, 6th October, EG',
                'bedrooms'    => 0,
                'bathrooms'   => 6,
                'area'        => '1,200 m²',
                'year_built'  => 2021,
                'description' => 'A landmark Grade-A office campus within Egypt\'s premier business park. Features a ground-floor atrium, multiple conference suites, a dedicated IT room, backup power, and ample secure parking across two floors.',
                'features'    => ['Grade-A Office', 'Conference Suites', 'Atrium Lobby', 'Backup Generator', 'Fiber Redundancy', '2-Level Parking'],
                'images'      => [
                    'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1560179707-f14e90ef3623?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1517502884422-41eaead166d4?w=900&auto=format&fit=crop&q=75',
                    'https://images.unsplash.com/photo-1462826303086-329426d1aef5?w=900&auto=format&fit=crop&q=75',
                ],
            ],
        ];
    }
}
