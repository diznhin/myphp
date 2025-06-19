<?php include __DIR__ . '/includes/header.php'; ?>

<section id="services" class="section-box alt-bg" data-aos="fade-up" data-aos-duration="1200">
    <div class="container">
        <h2><i class="fa-solid fa-briefcase"></i> Services</h2>
        <ul class="services-list">
            <?php foreach ($services as $service): ?>
                <li>
                    <i class="<?= htmlspecialchars($service['icon_class']) ?>"></i>
                    <h3><?= htmlspecialchars($service['title']) ?></h3>
                    <p><?= htmlspecialchars($service['description']) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
