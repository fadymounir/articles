<?php
/** @var string $pageTitle  Optional page title override */
/** @var string|null $currentSlug  Active topic slug (for highlighting) */
$pageTitle   = $pageTitle   ?? 'Senior PHP Interview Bible';
$currentSlug = $currentSlug ?? null;

// Load topics once for the sidebar
$__sidebarTopics  = require __DIR__ . '/../data/topics.php';
$__sidebarGrouped = [];
foreach ($__sidebarTopics as $__slug => $__t) {
    $__sidebarGrouped[$__t['part']]['part_en'] = $__t['part'];
    $__sidebarGrouped[$__t['part']]['part_ar'] = $__t['part_ar'];
    $__sidebarGrouped[$__t['part']]['topics'][$__slug] = $__t;
}
?>
<!DOCTYPE html>
<html data-theme="dark" data-lang="en" lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?> — Senior Interview Bible</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <script>
    // Apply theme/lang BEFORE body renders to prevent flash
    (function(){
      var t = localStorage.getItem('theme') || 'dark';
      var l = localStorage.getItem('lang') || 'en';
      var r = document.documentElement;
      r.setAttribute('data-theme', t);
      r.setAttribute('data-lang', l);
      r.setAttribute('lang', l);
      r.setAttribute('dir', l === 'ar' ? 'rtl' : 'ltr');
    })();
  </script>
</head>
<body>

<nav class="topnav">
  <button id="sidebar-toggle" class="btn btn-icon" title="Toggle sidebar" aria-label="Toggle sidebar">☰</button>
  <a href="index.php" class="brand">
    <span class="logo">📘</span>
    <span class="en-only">Senior Interview Bible</span>
    <span class="ar-only">دليل المقابلات للمستوى السينيور</span>
  </a>
  <div class="nav-actions">
    <button id="lang-toggle" class="btn btn-icon" title="Toggle Language">AR</button>
    <button id="theme-toggle" class="btn btn-icon" title="Toggle Theme">☀️</button>
  </div>
</nav>

<div class="app-layout">

  <aside class="sidebar" id="sidebar">

    <div class="sidebar-search">
      <input id="sidebar-search-input" type="search"
             placeholder="🔍 Search topics…"
             autocomplete="off">
      <div id="sidebar-search-empty" class="sidebar-empty" hidden>
        <span class="en-only">No matches</span>
        <span class="ar-only">لا توجد نتائج</span>
      </div>
    </div>

    <nav class="sidebar-nav">
      <?php foreach ($__sidebarGrouped as $partKey => $group): ?>
        <div class="sidebar-part" data-part="<?= htmlspecialchars($partKey) ?>">
          <h4 class="sidebar-part-title">
            <span class="en-only"><?= htmlspecialchars($group['part_en']) ?></span>
            <span class="ar-only"><?= htmlspecialchars($group['part_ar']) ?></span>
            <span class="sidebar-count"><?= count($group['topics']) ?></span>
          </h4>
          <ul>
            <?php foreach ($group['topics'] as $__slug => $__topic): ?>
              <?php
                $__isActive = ($__slug === $currentSlug);
                $__keywords = strtolower($__slug . ' ' . $__topic['title_en'] . ' ' . $__topic['title_ar'] . ' ' . $__topic['desc_en'] . ' ' . $__topic['desc_ar']);
              ?>
              <li class="sidebar-item<?= $__isActive ? ' active' : '' ?>"
                  data-keywords="<?= htmlspecialchars($__keywords) ?>">
                <a href="topic.php?slug=<?= urlencode($__slug) ?>">
                  <span class="sidebar-icon"><?= $__topic['icon'] ?></span>
                  <span class="sidebar-text">
                    <span class="en-only"><?= htmlspecialchars($__topic['title_en']) ?></span>
                    <span class="ar-only"><?= htmlspecialchars($__topic['title_ar']) ?></span>
                  </span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </nav>
  </aside>

  <div id="sidebar-backdrop" class="sidebar-backdrop"></div>

  <main class="app-main">
