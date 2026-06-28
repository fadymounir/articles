<?php
require __DIR__ . '/includes/render.php';
require __DIR__ . '/includes/illustrations.php';

$topics = require __DIR__ . '/data/topics.php';

$slug = $_GET['slug'] ?? '';
if (!isset($topics[$slug])) {
    http_response_code(404);
    $pageTitle = 'Not Found';
    require __DIR__ . '/includes/header.php';
    echo '<div class="container"><div class="qa">';
    echo '<div class="q en-only">Topic not found</div>';
    echo '<div class="q ar-only">الموضوع غير موجود</div>';
    echo '<p><a href="index.php" class="btn">← Back to all topics</a></p>';
    echo '</div></div>';
    require __DIR__ . '/includes/footer.php';
    exit;
}

$topic = $topics[$slug];
[$prevSlug, $nextSlug] = find_adjacent_topics($topics, $slug);
$pageTitle   = $topic['title_en'];
$currentSlug = $slug;

require __DIR__ . '/includes/header.php';
?>

<div class="topic-page">

  <header class="topic-header">
    <div class="icon"><?= $topic['icon'] ?></div>
    <div class="subtitle en-only"><?= htmlspecialchars($topic['part']) ?></div>
    <div class="subtitle ar-only"><?= htmlspecialchars($topic['part_ar']) ?></div>
    <h1 class="en-only"><?= htmlspecialchars($topic['title_en']) ?></h1>
    <h1 class="ar-only"><?= htmlspecialchars($topic['title_ar']) ?></h1>
    <p class="subtitle en-only"><?= htmlspecialchars($topic['desc_en']) ?></p>
    <p class="subtitle ar-only"><?= htmlspecialchars($topic['desc_ar']) ?></p>
  </header>

  <nav class="topic-nav">
    <a class="btn" href="index.php">
      <span class="en-only">🏠 All topics</span>
      <span class="ar-only">🏠 كل المواضيع</span>
    </a>
    <?php if ($prevSlug): ?>
      <a class="btn" href="topic.php?slug=<?= urlencode($prevSlug) ?>">
        <span class="en-only">← <?= htmlspecialchars($topics[$prevSlug]['title_en']) ?></span>
        <span class="ar-only">→ <?= htmlspecialchars($topics[$prevSlug]['title_ar']) ?></span>
      </a>
    <?php endif; ?>
    <?php if ($nextSlug): ?>
      <a class="btn" href="topic.php?slug=<?= urlencode($nextSlug) ?>">
        <span class="en-only"><?= htmlspecialchars($topics[$nextSlug]['title_en']) ?> →</span>
        <span class="ar-only"><?= htmlspecialchars($topics[$nextSlug]['title_ar']) ?> ←</span>
      </a>
    <?php endif; ?>
  </nav>

  <?php
    $illust = topic_illustration_svg($slug, $topic);
    if ($illust): ?>
    <div class="topic-illustration-wrap"><?= $illust ?></div>
  <?php endif; ?>

  <?php foreach ($topic['qa'] as $qa) render_qa($qa); ?>

  <nav class="topic-nav" style="margin-top:30px;">
    <a class="btn" href="index.php">
      <span class="en-only">🏠 All topics</span>
      <span class="ar-only">🏠 كل المواضيع</span>
    </a>
    <?php if ($prevSlug): ?>
      <a class="btn" href="topic.php?slug=<?= urlencode($prevSlug) ?>">
        <span class="en-only">← Previous</span>
        <span class="ar-only">→ السابق</span>
      </a>
    <?php endif; ?>
    <?php if ($nextSlug): ?>
      <a class="btn" href="topic.php?slug=<?= urlencode($nextSlug) ?>">
        <span class="en-only">Next →</span>
        <span class="ar-only">التالي ←</span>
      </a>
    <?php endif; ?>
  </nav>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
