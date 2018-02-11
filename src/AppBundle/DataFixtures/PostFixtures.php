<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 30; $i++) {
            $post = new Post;
            $post->setTitleEn($this->title_en[$i]);
            $post->setSlugEn($this->slugify($post->getTitleEn()));
            $post->setAuthorNameEn('William Shakespeare');
            $post->setAuthorEmailEn('goethe@berlin.de');
            $post->setPostTextEn($this->text_en);

            $post->setTitleDe($this->title_de[$i]);
            $post->setSlugDe($this->slugify($post->getTitleDe()));
            $post->setAuthorNameDe('Johann Wolfgang von Goethe');
            $post->setAuthorEmailDe('william@london.com');
            $post->setPostTextDe($this->text_de);

            $manager->persist($post);
        }

        $manager->flush();
    }

    private function slugify($text)
    {
        return preg_replace('/[^A-z0-9-]/', '', preg_replace('/\s+/', '-', mb_strtolower(trim(strip_tags($text)), 'UTF-8')));
    }

    private $text_en = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae tortor ac nulla posuere mollis. Phasellus ac ex vel ipsum malesuada venenatis. Quisque consectetur porta libero et aliquet. Etiam ac eros eros. Suspendisse id semper diam. Curabitur rutrum leo lacus, sit amet feugiat mauris dictum ut. Suspendisse tempor quis velit nec porta. Nunc auctor augue sit amet lacus tempor, nec porttitor nisl malesuada. Maecenas id mattis tellus, non rhoncus arcu. Pellentesque interdum ut ex vel aliquam. Proin congue et lectus vitae auctor. Praesent euismod viverra massa, pretium fermentum nibh eleifend at.';
    private $text_de = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae tortor ac nulla posuere mollis. Phasellus dapibus habitasse ac sowie oder sterilisiert. Jeder Haupttor frei und Bananen. Selbst als eros. Es wird immer Durchmesser empfohlen. Der Löwe Chat-Make-up-Leckage, ist es wichtig, dass Mauris eu. Wer würde wünschen iaculis leo Suspendisse tempor. Jetzt ist der Autor von augue sit amet lacus tempor ang porttitor nisl malesuada. Maecenas id mattis tellus, nicht rhoncus arcu. Einige Kinder entweder von Zeit zu Zeit. Proin congue, seine Sofas, der Autor des Lebens. Performance Pull Masse vorhanden, aber der Preis fermentum nibh absetzbar.';

    private $title_en = [
        'Lorem ipsum dolor sit amet consectetur adipiscing elit',
        'Pellentesque vitae velit ex',
        'Mauris dapibus risus quis suscipit vulputate',
        'Eros diam egestas libero eu vulputate risus',
        'In hac habitasse platea dictumst',
        'Morbi tempus commodo mattis',
        'Ut suscipit posuere justo at vulputate',
        'Ut eleifend mauris et risus ultrices egestas',
        'Aliquam sodales odio id eleifend tristique',
        'Urna nisl sollicitudin id varius orci quam id turpis',
        'Nulla porta lobortis ligula vel egestas',
        'Curabitur aliquam euismod dolor non ornare',
        'Sed varius a risus eget aliquam',
        'Nunc viverra elit ac laoreet suscipit',
        'Pellentesque et sapien pulvinar consectetur',
        'Ubi est barbatus nix',
        'Abnobas sunt hilotaes de placidus vita',
        'Ubi est audax amicitia',
        'Eposs sunt solems de superbus fortis',
        'Vae humani generis',
        'Diatrias tolerare tanquam noster caesium',
        'Teres talis saepe tractare de camerarius flavum sensorem',
        'Silva de secundus galatae demitto quadra',
        'Sunt accentores vitare salvus flavum parses',
        'Potus sensim ad ferox abnoba',
        'Sunt seculaes transferre talis camerarius fluctuies',
        'Era brevis ratione est',
        'Sunt torquises imitari velox mirabilis medicinaes',
        'Mineralis persuadere omnes finises desiderium',
        'Bassus fatalis classiss virtualiter transferre de flavum',
    ];

    private $title_de = [
        'Lorem ipsum Möhren Bachelor-Tomatensuppe',
        'Pellentesque des Lebens, keine Lust in der',
        'Wer erhält das größte Protein Lächeln vulputate',
        'Lassen Sie Durchmesser Durchsetzung Lecks vulputate Lächeln',
        'die Refinanzierung',
        'Viel Komfort Fußball',
        'Nur setzen sie erhält vulputate',
        'Um absetzbar lustig und Lachen Basketball Durchsetzung',
        'Einige Mitglieder des Hasses, die eleifend',
        'Urna nisl varius orci quam id turpis sollicitudin id',
        'Es gibt kein Tor oder Strafverfolgungs Karton Reserviert',
        'Der Schmerz ist nicht auf die Global Times Leistung zu schmücken',
        'Aber die vielfältige Notwendigkeit eines Lächeln',
        'Nun ziehen Entwickler hier Montag unternimmt',
        'Volleyball Android und Tomaten sapien',
        'Wo bärtiger Schnee',
        'Wald ist die ruhige Art hilotaes',
        'Wo fett Freundschaft',
        'EPOS ist stolz auf den starken solemis',
        'Wehe der Menschheit',
        'Diatrias wie unser Cäsium reduzieren',
        'Chamberlain behandeln oft solche den gelben Sensor glätten',
        'Das Holz befeuerten von einem der 42.en Galatae',
        'Accentores rettete die gelben Parsen zu vermeiden',
        'Trinken langsam und wilden Wald',
        'Es gibt eine säkulare Verschiebung wie Chamberlain fluctuies',
        'Es gibt eine kurze Zeit',
        'Sie lernen schnell torquises wunderbar medicinaris',
        'Das Mineral davon zu überzeugen, den Wunsch aller Finist',
        'Der Bass, classism, praktisch dazu bestimmt, die gelb durchzuführen'
    ];
}
