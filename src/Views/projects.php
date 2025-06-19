<?php include __DIR__ . '/includes/header.php'; ?>

<section id="projects" class="section-box" data-aos="fade-up" data-aos-duration="1200">
    <h2><i class="fa-solid fa-briefcase"></i> Projects</h2>
    <div class="projects-list">
        <?php if (!empty($projects)): ?>
            <?php foreach ($projects as $project): ?>
                <div class="project-item">
                    <?php if (!empty($project['image_url'])): ?>
                        <img 
                            src="<?= htmlspecialchars($project['image_url']) ?>" 
                            alt="<?= htmlspecialchars($project['title']) ?>" 
                            loading="lazy"
                        >
                    <?php endif; ?>
                    
                    <h3><?= htmlspecialchars($project['title']) ?></h3>
                    <p><?= nl2br(htmlspecialchars($project['description'])) ?></p>
                    
                    <?php if (!empty($project['detail_link']) && $project['detail_link'] !== '#'): ?>
                        <a href="<?= htmlspecialchars($project['detail_link']) ?>" target="_blank" rel="noopener noreferrer">
                            Xem chi tiết
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có dự án nào để hiển thị.</p>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
