<?php include __DIR__ . '/includes/header.php'; ?>
<section id="about" class="about-section" data-aos="fade-up" data-aos-duration="1200">
    <h2><i class="fa-solid fa-user"></i> <?= htmlspecialchars($about['title']) ?></h2>
    <div class="about-content">
        <div class="about-image">
            <img src="<?= htmlspecialchars($about['image_url']) ?>" alt="About Me">
        </div>
        <div class="about-text">
                <p><?= nl2br($about['description']) ?></p>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
