<?php require "includes/header.php" ?>
<?php ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Hulp nodig? - Rydr</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/hulp.css">
</head>
<body>

<main class="help-container">

    <section class="help-header">
        <h1>Hulp nodig?</h1>
        <p>We helpen je graag. Bekijk de veelgestelde vragen of neem contact met ons op.</p>
    </section>

    <section class="faq">
        <h2>Veelgestelde vragen</h2>

        <div class="faq-item">
            <button class="faq-question">Hoe huur ik een auto?</button>
            <div class="faq-answer">
                <p>Kies een auto, selecteer je datum en voltooi de boeking via onze website.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Wat heb ik nodig om te huren?</button>
            <div class="faq-answer">
                <p>Een geldig rijbewijs, ID en een betaalmethode.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Kan ik mijn boeking annuleren?</button>
            <div class="faq-answer">
                <p>Ja, annuleren kan tot 24 uur van tevoren zonder kosten.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Is er een kilometerlimiet?</button>
            <div class="faq-answer">
                <p>Dit verschilt per auto, dit zie je bij de details van de auto.</p>
            </div>
        </div>

    </section>

    <section class="contact">
        <h2>Contact opnemen</h2>

        <form>
            <input type="text" placeholder="Naam" required>
            <input type="email" placeholder="E-mail" required>
            <textarea placeholder="Je vraag..." required></textarea>
            <button type="submit" class="button-primary">Versturen</button>
        </form>
    </section>

</main>



</body>
</html>>
<?php require "includes/footer.php" ?>

