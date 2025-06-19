<?php include __DIR__ . '/includes/header.php'; ?>
<html>
<head>
    <title>Education</title>
</head>
<body>
<section id="education" class="section-box" data-aos="fade-up" data-aos-duration="1200">
    <div class="container">
        <h2><i class="fa-solid fa-graduation-cap"></i> Education </h2>
        <div class="education-timeline">
            <?php foreach ($educations as $edu): ?>
                <div class="education-item">
                    <div class="edu-icon"><i class="<?= htmlspecialchars($edu['icon_class']) ?>"></i></div>
                    <div class="edu-details">
                        <h3><?= htmlspecialchars($edu['level']) ?></h3>
                        <span class="edu-school"><b><?= htmlspecialchars($edu['school']) ?></b></span>
                        <span class="edu-year"><?= htmlspecialchars($edu['year_range']) ?></span>
                        <p><?= htmlspecialchars($edu['description']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</body>
</html>
<?php include __DIR__ . '/includes/footer.php'; ?>
