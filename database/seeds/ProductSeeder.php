<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // category 1, Proteins
        Product::create([
            'product_name' => "GOLD STANDARD 100% WHEY PROTEIN",
            'product_code' => 222222222222,
            'product_price' => 30,
            'image' => 'protein.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'La Gold Standard Whey concentre 24,2 g de protéines de whey à haute valeur biologique ainsi que 3,5 g de glutamine et 5 g de BCAA naturellement présents dans la composition. Associé à ces teneurs élevées, seulement 1,3 g de glucides et 0,9 g de matières grasses entrent dans la composition du produit. Grâce à sa formulation propre à des procédés de filtratation innovants et adaptés, la poudre de protéines qui constitue la Gold Standard Whey est facilement soluble. Mixez-la avec du lait, un smoothie ou simplement avec de l\'eau pour un apport hydrique additionnel sans matières grasses ni glucides. Ses 3 différentes saveurs et sa texture onctueuse expliquent également son succès',
            'sold_price' => 25,
            'category_id' => 1
        ]);

        Product::create([
            'product_name' => "Whey Perfection 2.27kg & Barebells Protein Bars (box)",
            'product_code' => 222224442222,
            'product_price' => 40,
            'image' => 'protectionsProtein.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Issu d’un rigoureux travail de recherche et développement par notre équipe d’experts, la Whey Perfection propose une ingénieuse association d\'isolat, d’hydrolysat et de concentré de protéines de haute qualité pour un rapport qualité-prix imbattable. Une formulation complétée par de la glutamine et des BCAA naturellement présents. Elle convient parfaitement en période de sèche ou prise de masse sèche grâce à de faibles valeurs en sucres et acides gras saturés. En plus d\'avoir une texture onctueuse, la Whey Perfection offre un large choix de saveurs gourmandes pour une expérience unique et intègre la longue liste des facteurs qui expliquent le succès et la popularité du complément. Des milliers de personnes nous ont fait confiance, pourquoi pas vous ?',
            'sold_price' => 25,
            'category_id' => 1
        ]);

        Product::create([
            'product_name' => "Perfect Protein",
            'product_code' => 222224442222,
            'product_price' => 40,
            'image' => 'perfectProtein.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Perfect Protein contient le mélange de protéines optimal pour les sportifs confirmés. Perfect Protein contient de 40 % de Whey Isolate avec 30 % de concentré de Whey ultrafiltré et 30 % de protéines de lait. Buvez Perfect Protein le matin, entre les repas, après un entraînement ou le soir. En combinant des protéines de Whey avec des protéines de lait, on obtient Perfect Protein, une efficacité maximale à tout moment de la journée !',
            'sold_price' => 25,
            'category_id' => 1
        ]);

        Product::create([
            'product_name' => "100% Whey",
            'product_code' => 222224442222,
            'product_price' => 40,
            'image' => '100whey.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Besoin de protéines de lactosérum polyvalentes que vous pouvez utiliser dans des shakes, des smoothies ou des crêpes ? 100% Whey de Stacker 2 contient 24 g de protéines de lactosérum par portion, pour vous aider à développer et à entretenir votre masse musculaire. Avec son mélange de concentré et d’isolat de protéines de lactosérum, vous pouvez boire 100% Whey après l’entraînement ou à tout moment de la journée. Cette poudre de lactosérum facile à utiliser vous aidera à atteindre vos objectifs de mise en forme ou à obtenir le corps de vos rêves.',
            'sold_price' => 25,
            'category_id' => 1
        ]);

        //category 2, Vitamins

        Product::create([
            'product_name' => "Vitamine D3 - 3 000 UI",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'vitamine-d3.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'La Vitamine D3 est excellente pour vos muscles, joue un rôle important dans le maintien de la souplesse et de la force musculaire, et soutient le système immunitaire (naturel) des cellules de l’organisme. La Vitamine D3 est probablement la vitamine la plus utilisée par les sportifs. Nous offrons de la Vitamine D3 dans un dosage supérieur de 3000UI. Idéal pour les sportifs confirmés !
La Vitamine D3 3000UI peut se prendre quotidiennement tout au long de l’année. Une boîte de 180 capsules de Vitamine D3 3000UI suffit pour 6 mois. Le conseil de santé néerlandais recommande aux personnes âgées et aux personnes de peau foncée de prendre un supplément de Vitamine D pour renforcer les os.',
            'sold_price' => 25,
            'category_id' => 2
        ]);

        Product::create([
            'product_name' => "Vitamine B12",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'vitamine-b12.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Contribue à un métabolisme énergétique normal Contribue au fonctionnement normal du système nerveux Contribue au métabolisme normal de l’homocystéine Contribue au fonctionnement normal de la fonction psychologique Contribue à la formation normale des globules rouges Contribue au fonctionnement normal du système immunitaire Contribue à la réduction de la fatigue et de l’épuisement Intervient dans le processus de mitose',
            'sold_price' => 25,
            'category_id' => 2
        ]);

        Product::create([
            'product_name' => "Vitamine E-400 naturelle",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'vE.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Des capsules molles avec de la vitamine E 100 % naturelle avec des tocophérols mixtes. Cette version non estérifiée de vitamine E est la moins modifiée et elle est devenue plus populaire que tous les autres formes ces dernières années. La vitamine E-400 naturelle contient 400 UI de D-alpha-tocophérol ainsi que des petites quantités de bêta, gamma et delta-tocophérols.',
            'sold_price' => 25,
            'category_id' => 2
        ]);

        Product::create([
            'product_name' => "Omega 3-6-9",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'omega.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'L’Omega 3-6-9 de Now Foods contient de l’oméga 3 & 9 de graines de lin, huile de colza, oméga 6 (GLA) d’onagre et de cassis.',
            'sold_price' => 25,
            'category_id' => 2
        ]);

        //category 3, foods

        Product::create([
            'product_name' => "Cookies protéinés Smart",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'cookies.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Vous cherchez des cookies riches en protéines mais à faible teneur en sucre pour un petit extra sucré ? Nos cookies protéinés Smart sont disponibles en cinq saveurs délicieuses et chaque sachet de 175 g contient 21 cookies. Vous pouvez les emporter avec vous pour un shot de protéines à tout moment ou les manger après votre entraînement pour aider à développer et à maintenir la masse musculaire. Ou pourquoi ne pas les savourer avec votre boisson chaude préférée ou en dessert après le repas !',
            'sold_price' => 25,
            'category_id' => 3
        ]);

        Product::create([
            'product_name' => "Galettes de Superfood",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'superfood.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Intégralement composées de riz brun complet, épeautre, son d’avoine, sarrasin et quinoa, ces galettes possèdent des valeurs nutritionnelles remarquables en plus de leur goût et saveur caractéristiques. Les Galettes de Superfood possèdent 10,1 g de protéines et 6,4 g de fibres pour 100 g en plus d’être faibles en sucres et acides gras saturés. Elles constituent une excellente source de glucides complexes pour un soutien optimal durant la journée.',
            'sold_price' => 25,
            'category_id' => 3
        ]);

        Product::create([
            'product_name' => "Coconut Cookies (sugar free)",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'p.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'All The Taste Without The Sugar" Tels sont les objectifs de Diablo. Déguster tranquillement la nourriture sans tous ces sucres superflus. Ils l’ont réalisé, les produits ont un goût absolument fantastique, sans ajout de sucres ou même sans aucun sucre ! Tout le monde doit de temps en temps pouvoir se gâter avec une friandise, n’est-ce pas ? Les produits de Diablo ont gardé tout leur goût, sans mauvais sucres ! En bref : appréciez plus souvent sans culpabilité.',
            'sold_price' => 25,
            'category_id' => 3
        ]);

        Product::create([
            'product_name' => "Smart Crunchy Wafers",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'smart-wafels.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Besoin d’un en-cas gourmand, consistant, faible en sucres et riche en protéines et fibres ? Ne cherchez plus, les Smart Crunchy Wafers vous feront craquer ! Des gaufrettes enrobées d’une fine couche de chocolat au lait et constituées d’un concentré de protéines de whey, voilà de quoi satisfaire vos envies gourmandes tout en respectant vos ambitions sportives.',
            'sold_price' => 25,
            'category_id' => 3
        ]);

        //category 4, Nutrition sportive

        Product::create([
            'product_name' => "Cookies protéinés Smart",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'cookies.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Vous cherchez des cookies riches en protéines mais à faible teneur en sucre pour un petit extra sucré ? Nos cookies protéinés Smart sont disponibles en cinq saveurs délicieuses et chaque sachet de 175 g contient 21 cookies. Vous pouvez les emporter avec vous pour un shot de protéines à tout moment ou les manger après votre entraînement pour aider à développer et à maintenir la masse musculaire. Ou pourquoi ne pas les savourer avec votre boisson chaude préférée ou en dessert après le repas !',
            'sold_price' => 25,
            'category_id' => 3
        ]);

    }
}
