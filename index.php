<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <!-- Meta description here -->
    <!-- Meta keywords  here -->
    <script src="https://kit.fontawesome.com/02b1d6d912.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monda&family=Montserrat&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Techomania.IO - Product</title>
</head>

<body>
    <?php require_once 'inc/header.php'; ?>

    <section>
        <div class="title">
            <h2>Hottest Products 🔥</h2>
        </div>
    </section>

    <main>
        <?php
        // On importe puis on parcours les produits ici
        require_once 'fiche_product.php';

        for ($i = 0; $i < count($fiche_product); $i++) {
            $product = $fiche_product[$i];
        ?>
            <div class="card">
                <div class="box_image">
                    <a href="product.php?id_product=<?= $product['id'] ?>"><img src="pictures-home/<?= $product['img_principale'] ?>" alt="<?= $product['titre'] ?>"></a>
                    <div class="icones">
                        <i class="fa-solid fa-heart"></i>
                        1.1M
                        <i class="fa-solid fa-comment-dots"></i>
                        9779K
                    </div>
                </div>

                <div class="infos">
                    <div class="container_title">
                        <h2><?= $product['titre'] ?></h2>
                    </div>

                    <div class="star">
                        <?= $product['nb_etoiles'] ?>
                        <span><?= $product['avis'] ?></span>
                        <p><?= $product['achat_mensuel'] ?></p>
                    </div>

                    <h3><?= $product['prix_reduit'] ?> <span class="barre"><?= $product['prix'] ?></span> <i class="fa-solid fa-tags"></i></h3>
                </div>
            </div>
        <?php
        }
        ?>

    </main>

    <?php require_once 'inc/footer.php'; ?>
</body>

</html>