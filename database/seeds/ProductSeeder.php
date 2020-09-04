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
            'sold_price' => null,
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
            'sold_price' => null,
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
            'sold_price' => null,
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
            'sold_price' => null,
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
            'sold_price' => null,
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
            'sold_price' => null,
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
            'product_name' => "Boisson Monster Energy Ultra",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'energyDrink.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Monster, la boisson énergétique numéro 1 en Amérique, est maintenant disponible chez Body & Fit ! Cette boisson énergétique est synonyme de passion, saveur et expérience. Les six saveurs délicieuses de la boisson Monster Ultra sont sans calories et sans sucres, mais elles contiennent des vitamines B3, B6, B5, B12, ainsi que 160 mg de caféine par canette de 500 ml. Savourez une boisson Monster Ultra quand vous avez besoin d’un coup de pouce ou que vous voulez booster votre entraînement !',
            'sold_price' => null,
            'category_id' => 4
        ]);

        Product::create([
            'product_name' => "BSN BCAA - 200g (40 servings) 2 for 1",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'bcaa.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' => 'Développée en 2016 par la marque BSN, la gamme DNA est une garantie de qualité, mot d’ordre pour l’entreprise américaine dans le développement de ses produits. BCAA DNA concentre 5 g d’acides aminés à chaîne ramifiée (2:1:1) par dose, éléments très convoités et utilisés dans le monde du fitness et bodybuilding pour leurs nombreux intérêts.',
            'sold_price' => 25,
            'category_id' => 4
        ]);

        Product::create([
            'product_name' => "Gold Standard Pre-Workout",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'pre-workout.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' =>'Ne vous contentez pas du minimum et exploitez vos ressources lors d\'entraînements intenses ! Le Gold Standard Pre-Workout vous aide a y parvenir grâce à une formulation complète et adaptée. Il contient notamment 3,4 g de créatine monohydrate par dose, qui améliore les capacités physiques en cas de séries successives d\'exercices très intenses de courte durée. Ce produit concentre également 2,9 g d\'un complexe d\'acides aminés qui constituent les protéines. Pour clore le tout, le Gold Standard Pre-Workout mélange vitamines D, B1, B3, B5, B6, B9 et B12 pour produit unique en son genre. Ces vitamines contribuent à de nombreux processus biologiques utiles au sportif en situation d\'entraînement. La vitamine D contribue, par exemple, au maintien d\'une fonction musculaire normale, au maintien d\'une ossature normale et à une calcémie normale. Les vitamines B3, B6, B9 et B12 contribuent à réduire la fatigue et à un métabolisme énergétique normal.',
            'sold_price' => 25,
            'category_id' => 4
        ]);

        Product::create([
            'product_name' => "Creatine DNA",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'creatine.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' =>'Développée en 2016 par la marque BSN, la gamme DNA est une réelle garantie de qualité, mot d’ordre pour l’entreprise américaine dans le développement de ses produits. Creatine DNA est issu d’un processus de micronisation sophistiqué pour une assimilation facilitée et des vertus entièrement exploitées. À prendre avant ou directement après l’entraînement.',
            'sold_price' => null,
            'category_id' => 4
        ]);

        // category 5,  clothes

        Product::create([
            'product_name' => "Homme - Short mi-long",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'short.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' =>'Pour s’entraîner, il est essentiel de porter un short qui offre une grande liberté de mouvement. Ce short mi-long est le modèle idéal pour la salle. Doux et confortable, il est très agréable à porter.',
            'sold_price' => 25,
            'category_id' => 5
        ]);

        Product::create([
            'product_name' => "Homme - Sweat à capuche zippé",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'C100494_Image_01.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' =>'Ce sweat à capuche est idéal pour rester au chaud dans la salle comme en dehors. Fonctionnel, ce sweat à capuche zippé est stylé et offre une grande liberté de mouvement. Avec ses finitions haut de gamme et sa doublure douce, ce sweat sera l’allié incontournable de vos échauffements.',
            'sold_price' => null,
            'category_id' => 5
        ]);

        Product::create([
            'product_name' => "T-shirt Small Logo Noir Pour Femme",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'C100546_Image_01.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' =>'Vous serez à l’aise et stylée pendant vos entraînements avec ce t-shirt extensible, doté de manches raglan et d’une encolure profonde. Il régule très bien l’humidité et vous garde au frais pendant vos exercices, grâce au coton qui absorbe la transpiration. Astuce : lavez-le sur l’envers pour préserver sa couleur et sa qualité.',
            'sold_price' => 25,
            'category_id' => 5
        ]);

        Product::create([
            'product_name' => "Débardeur dos nageur",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'C100547_Image_01.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' =>'Débardeur dos nageur doté d’une encolure profonde. Ce débardeur dos nageur est confectionné dans un mélange coton/élasthanne, qui associe douceur, confort et extensibilité. Vous disposerez de toute la liberté de mouvement nécessaire aux exercices les plus intensifs. Astuce : lavez-le sur l’envers pour préserver sa couleur et sa qualité.',
            'sold_price' => 9,
            'category_id' => 5
        ]);

        // category 6, Beaty

        Product::create([
            'product_name' => "Super Collagen de NeoCell – 250 comprimés",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'super-colleganc_Image_01.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' =>'En vieillissant, le corps produit moins de collagène. Donnez un coup de pouce à votre corps avec Super Collagen de NeoCell !',
            'sold_price' => 6,
            'category_id' => 6
        ]);

        Product::create([
            'product_name' => "Best Collagen Types 1 & 3",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'best-collagen-types-1-3_Image_01.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' =>'Le collagène est la protéine la plus importante dans le tissu conjonctif.',
            'sold_price' => null,
            'category_id' => 6
        ]);

        Product::create([
            'product_name' => "Déodorant naturel We love - Forever Fresh",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'C100176_Image_01.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' =>'Le déodorant est essentiel pour une sensation de fraîcheur. Naturellement, nous voulons vivre cette expérience tout au long de la journée et c’est encore plus important quand on mène une vie active. Les types de déodorants habituels regorgent de produits chimiques non naturels. Ils sont mauvais pour la peau et peuvent même provoquer des irritations. ',
            'sold_price' => 5,
            'category_id' => 6
        ]);

        Product::create([
            'product_name' => "Shampoing Perfect Curl d’Andrélon - 300 ml",
            'product_code' => 222224442222,
            'product_price' => 10,
            'image' => 'C100362_Image_01.jpg',
            'shopping_cost' => 0,
            'stock' => 20,
            'product_info' =>'Vous recherchez un shampoing nourrissant intensif pour vos boucles ? Perfect Curl d’Andrélon est la réponse ! Cette gamme a été spécialement conçue pour nourrir intensément les cheveux bouclés. Le shampoing est enrichi en huile d’argan et définit vos boucles. Avec Perfect Curl d’Andrélon, vos boucles redeviennent faciles à coiffer et sont douces, souples et résistantes. Le résultat parfait pour des cheveux bouclés. Pour un résultat optimal, utilisez également les autres produits de la ligne Perfect Curl d’Andrélon.',
            'sold_price' => null,
            'category_id' => 6
        ]);

    }
}
