<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <!-- Meta description here -->
    <!-- Meta keywords  here -->
    <script src="https://kit.fontawesome.com/b408c921ca.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monda&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/product.css">
    <title>Techomania.IO - Product</title>
</head>

<body>
    <?php require_once 'inc/header.php'; ?>

    <div class="link">
        <p><a href="index.php"> &lt; Back to home</a></p>
    </div>

    <!-- Start of main container CSS properties-->
    <main>
        <section>
            <?php
            // Function that links to the home page if the product id is > 10
            if ($_GET['id_product'] < 1 || $_GET['id_product'] > 10) {
                header('location: index.php');
            }
            require_once 'fiche_product.php';

            $id_product = $_GET['id_product'];
            $product = $fiche_product[$id_product - 1];

            ?>
            <div id="galerie">
                <div id="big">
                    <img src="pictures-home/<?= $product['img_principale']; ?>" alt="<?= $product['titre']; ?>">
                </div>
                <div id="container-thumbs">
                    <?php
                    $thumbs = $product['img_thumbs'];
                    foreach ($thumbs as $thumb) : ?>
                        <div class="thumb">
                            <img src="pictures-product/<?= $thumb; ?>" alt="">
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <!-- information about products-->
            <div class="details">
                <h1><?= $product['titre']; ?></h1>
                <div class="star">
                    <?= $product['nb_etoiles']; ?>
                    <span><?= $product['avis']; ?></span>
                </div>
                <h2><?= $product['achat_mensuel']; ?></h2>
                <?= $product['avantages']; ?>
                <h3><?= $product['prix_reduit']; ?><span class="barre"><?= $product['prix']; ?></span><i class=" fa-solid fa-tags"></i></h3>
                <div class="button">
                    <i class="fa-brands fa-amazon"></i>
                    <a href="<?= $product['lien_amazon']; ?>" target="_blank">Buy On Amazon</a>
                </div>
            </div>
            <?php ?>
        </section>

        <div class="separator"></div>

        <?php
        if ($product['fiche_product'] == null) {
        } else {
            echo file_get_contents($product['fiche_product']);
        }
        ?>
    </main>
    <!-- End of main container CSS properties -->


    <?php require_once 'inc/footer.php'; ?>

    <script>
        // Manage display of large thumbnail pictures
        let imageBig = document.querySelector('#big img');
        let imageThumb = document.querySelectorAll('.thumb img');

        // Displays the picture in large at the click on the thumbnails
        imageThumb.forEach(thumb => {
            thumb.addEventListener('mouseover', () => {
                imageBig.src = thumb.src;
            });
        });
    </script>
</body>

</html>