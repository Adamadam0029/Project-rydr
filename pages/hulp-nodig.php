<?php require "includes/header.php"; ?>

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
            <details>
                <summary>Hoe huur ik een auto?</summary>
                <div class="faq-answer">
                    <p>Kies een auto, selecteer je datum en voltooi de boeking via onze website.</p>
                </div>
            </details>
        </div>

        <div class="faq-item">
            <details>
                <summary>Wat heb ik nodig om te huren?</summary>
                <div class="faq-answer">
                    <p>Een geldig rijbewijs, ID en een betaalmethode.</p>
                </div>
            </details>
        </div>

        <div class="faq-item">
            <details>
                <summary>Kan ik mijn boeking annuleren?</summary>
                <div class="faq-answer">
                    <p>Ja, annuleren kan tot 24 uur van tevoren zonder kosten.</p>
                </div>
            </details>
        </div>

        <div class="faq-item">
            <details>
                <summary>Is er een kilometerlimiet?</summary>
                <div class="faq-answer">
                    <p>Dit verschilt per auto, dit zie je bij de details van de auto.</p>
                </div>
            </details>
        </div>

    </section>

    <section class="contact">
        <h2>Contact opnemen</h2>

        <form>
            <input type="text" placeholder="Naam" required>
            <input type="email" placeholder="E-mail" required>
            <textarea placeholder="Je vraag..." required></textarea>
            <button type="submit" class="button">Versturen</button>
        </form>
    </section>

</main>

</body>
</html>

<?php require "includes/footer.php"; ?>