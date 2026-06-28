<?php
$topics = require __DIR__ . '/data/topics.php';

// Group topics by part (preserving insertion order)
$grouped = [];
foreach ($topics as $slug => $topic) {
    $part = $topic['part'];
    $grouped[$part]['part_en'] = $topic['part'];
    $grouped[$part]['part_ar'] = $topic['part_ar'];
    $grouped[$part]['topics'][$slug] = $topic;
}

$pageTitle = 'Home';
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <h1 class="en-only">📘 Senior Backend Engineer Interview Bible</h1>
  <h1 class="ar-only">📘 دليل مهندس Backend Senior للمقابلات</h1>
  <p class="en-only">PHP • Laravel • Databases • Redis • Docker • Linux • CI/CD • System Design</p>
  <p class="ar-only">PHP • Laravel • قواعد البيانات • Redis • Docker • Linux • CI/CD • تصميم الأنظمة</p>
  <p class="en-only">English + العربية — 2026 Edition</p>
  <div style="margin-top:14px;">
    <span class="badge">PHP Internals</span>
    <span class="badge">Laravel</span>
    <span class="badge">SQL</span>
    <span class="badge">PostgreSQL</span>
    <span class="badge">Redis</span>
    <span class="badge">Docker</span>
    <span class="badge">System Design</span>
    <span class="badge">CI/CD</span>
  </div>
</section>

<div class="container">

  <?php foreach ($grouped as $partKey => $group): ?>
    <section class="part-section">
      <h2 class="part-title">
        <span class="en-only"><?= htmlspecialchars($group['part_en']) ?></span>
        <span class="ar-only"><?= htmlspecialchars($group['part_ar']) ?></span>
        <span class="part-num"><?= count($group['topics']) ?>
          <span class="en-only">topics</span><span class="ar-only">موضوع</span>
        </span>
      </h2>
      <div class="topics-grid">
        <?php foreach ($group['topics'] as $slug => $topic): ?>
          <a class="topic-card" href="topic.php?slug=<?= urlencode($slug) ?>">
            <div class="icon"><?= $topic['icon'] ?></div>
            <h3 class="en-only"><?= htmlspecialchars($topic['title_en']) ?></h3>
            <h3 class="ar-only"><?= htmlspecialchars($topic['title_ar']) ?></h3>
            <div class="desc en-only"><?= htmlspecialchars($topic['desc_en']) ?></div>
            <div class="desc ar-only"><?= htmlspecialchars($topic['desc_ar']) ?></div>
            <div class="meta">
              <span class="en-only">Open article →</span>
              <span class="ar-only">← فتح المقال</span>
              <span class="count"><?= count($topic['qa']) ?> Q&amp;A</span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endforeach; ?>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
