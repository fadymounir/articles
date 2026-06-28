<?php
/**
 * Rendering helpers for topic Q&A sections
 */

function render_qa(array $qa): void {
    $q_en = $qa['q_en'] ?? '';
    $q_ar = $qa['q_ar'] ?? $q_en;
    $a_en = $qa['a_en'] ?? '';
    $a_ar = $qa['a_ar'] ?? '';
    $example = $qa['example'] ?? null;
    $tip_en = $qa['tip_en'] ?? null;
    $tip_ar = $qa['tip_ar'] ?? null;
    $bad_en = $qa['bad_en'] ?? null;
    $bad_ar = $qa['bad_ar'] ?? null;
    $followups = $qa['followups'] ?? [];
    $extra_html_en = $qa['extra_html_en'] ?? null;
    $extra_html_ar = $qa['extra_html_ar'] ?? null;

    echo '<div class="qa">';
    echo '<div class="q en-only">' . htmlspecialchars($q_en) . '</div>';
    echo '<div class="q ar-only">' . htmlspecialchars($q_ar) . '</div>';

    if ($a_en) {
        echo '<span class="lbl en-only">English Answer</span>';
        echo '<div class="en-only">' . $a_en . '</div>';
    }
    if ($a_ar) {
        echo '<span class="lbl ar-only">الإجابة بالعربي</span>';
        echo '<div class="ar-only">' . $a_ar . '</div>';
    }

    if ($extra_html_en) echo '<div class="en-only">' . $extra_html_en . '</div>';
    if ($extra_html_ar) echo '<div class="ar-only">' . $extra_html_ar . '</div>';

    if ($example) {
        echo '<span class="lbl en-only">Example</span>';
        echo '<span class="lbl ar-only">مثال</span>';
        echo '<pre><code>' . htmlspecialchars($example) . '</code></pre>';
    }

    if ($bad_en || $bad_ar) {
        echo '<div class="warn">';
        if ($bad_en) echo '<div class="en-only"><strong class="mistake">❌ Don\'t say:</strong> ' . $bad_en . '</div>';
        if ($bad_ar) echo '<div class="ar-only"><strong class="mistake">❌ لا تقل:</strong> ' . $bad_ar . '</div>';
        echo '</div>';
    }

    if ($tip_en || $tip_ar) {
        echo '<div class="tip">';
        if ($tip_en) echo '<div class="en-only"><strong class="ok">✔️ Senior Tip:</strong> ' . $tip_en . '</div>';
        if ($tip_ar) echo '<div class="ar-only"><strong class="ok">✔️ نصيحة Senior:</strong> ' . $tip_ar . '</div>';
        echo '</div>';
    }

    if (!empty($followups)) {
        echo '<span class="lbl en-only">Follow-up Questions</span>';
        echo '<span class="lbl ar-only">أسئلة متابعة</span>';
        echo '<ul>';
        foreach ($followups as $fu) echo '<li>' . htmlspecialchars($fu) . '</li>';
        echo '</ul>';
    }

    echo '</div>';
}

function find_adjacent_topics(array $topics, string $currentSlug): array {
    $slugs = array_keys($topics);
    $idx = array_search($currentSlug, $slugs, true);
    $prev = $idx > 0 ? $slugs[$idx - 1] : null;
    $next = ($idx !== false && $idx < count($slugs) - 1) ? $slugs[$idx + 1] : null;
    return [$prev, $next];
}
