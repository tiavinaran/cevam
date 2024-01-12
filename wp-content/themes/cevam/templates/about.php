<?php
/*
  Template Name: About
 */

get_header();
?>

<main id="main-section" data-template="about">
    <section id="about-title" style="--page-background: url(<?php echo get_template_directory_uri() . '/assets/img/praising.jpg'; ?>);">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/logo-light.svg'; ?>" alt="Logo" title="Logo" />
        <h1>A propos de Cevam Church</h1>
        <section id="goto-content">
            <div class="arrow-scroll">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </section>
    </section>
    <section id="about-contents">
        <article class="about-content">
            <h2 class="about-content-title">Horaires</h2>
            <section class="open-days about-content-body">
                <article class="open-day">
                    <h3 class="open-day-title">Dimanche</h3>
                    <section class="open-hours">
                        <article class="open-hour" title="Le dimanche à 09:30 UTC+3">
                            <span>09:30</span>
                            <strong>- Culte d'adoration</strong>
                        </article>
                        <article class="open-hour" title="Le dimanche à 16:00 UTC+3">
                            <span>16:00</span>
                            <strong>- Service d'onction</strong>
                        </article>
                    </section>
                </article>
            </section>
        </article>
        <article class="about-content">
            <h2 class="about-content-title">Histoire</h2>
            <section class="about-story about-content-body">
                <p>L'église CEVAM a été fondée à Tananarive en 1996 par le pasteur Salomon et son épouse.</p>
                <p>Originaire d'une famille protestante, il a initialement adhéré à l'église pentecôtiste Jesosy Mamonjy dans les années 1960 où il a reçu le Seigneur. Fondée par le pasteur Daoud et sa femme, c'était la première église pentecôtiste malgache. Plus tard, il a commencé à servir de traducteur au pasteur Daoud et à l'assister dans certains domaines.</p>
                <p>En 1993, le pasteur Salomon a reçu l'appel de Dieu et a commencé, avec son épouse, comme évangélistes itinérants. Le couple pastoral visitait les communautés, prêchait dans les églises locales, dans la rue, et n'hésitait pas à prendre l'avion ou l'hélicoptère s'il le faut pour annoncer l'évangile. Ils prêchaient aussi sur la radio et donnaient régulièrement leur adresse qui a fait venir des gens et a fait naître une cellule de maison chez eux. La vision de départ n'était pas centrée sur la création d'une église, mais la croissance de la cellule de maison, entre 1995 et 1996, a conduit à la formation de l'église.</p>
                <p>Cette année 1996, il y a eu 50 personnes dans le salon, il avait fallu élever les murs dans la cour, etc. Bref, il était temps de bâtir. L'acquisition d'un domaine mitoyen s'est présentée et ils l'ont acheté pour faire l'église qui prend forme donc dans un espace de 100m2 dont un baptistère.</p>
                <p>L'église CEVAM s'est développée, avec l'enseignement chrétien évangélique, la vie dans l'Esprit, et cet accent sur l'excellence, la louange, la bonté de Dieu. Tout n'est pas facile, il y a beaucoup de méfiance chez certains mais l'oeuvre se développe. Nous nous sommes agrandis et dans nos locaux actuels, tout neufs, que nous avons pu payer sans faire de dettes, nous pouvons accueillir des centaines de personnes dans des conditions excellentes, pour la gloire de Dieu. Notre lieu de culte s'appelle le Palais des louanges pour honorer le Seigneur.</p>
            </section>
            <section id="about-signature">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/logo-dark.svg'; ?>" alt="Cevam" title="Cevam" />
            </section>
        </article>
    </section>
</main>

<?php
get_footer();
