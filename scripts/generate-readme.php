<?php
/**
 * Generate a comprehensive README.md from data/topics.php
 *
 * Run:   php scripts/generate-readme.php > README.md
 */

declare(strict_types=1);

$root = dirname(__DIR__);
$topics = require $root . '/data/topics.php';

/* ---------------- HTML → Markdown ---------------- */
function html_to_md(string $html): string {
    if ($html === '') return '';
    $s = $html;
    // Block tags
    $s = preg_replace('#<p[^>]*>(.*?)</p>#is',          "\n\n$1\n", $s);
    $s = preg_replace('#<br\s*/?>#i',                    "  \n", $s);
    // Lists
    $s = preg_replace_callback('#<ul[^>]*>(.*?)</ul>#is', function ($m) {
        $items = preg_match_all('#<li[^>]*>(.*?)</li>#is', $m[1], $li);
        $out = "\n";
        foreach ($li[1] as $item) $out .= "- " . trim(strip_my_tags($item)) . "\n";
        return $out . "\n";
    }, $s);
    $s = preg_replace_callback('#<ol[^>]*>(.*?)</ol>#is', function ($m) {
        preg_match_all('#<li[^>]*>(.*?)</li>#is', $m[1], $li);
        $out = "\n";
        foreach ($li[1] as $i => $item) $out .= ($i+1) . ". " . trim(strip_my_tags($item)) . "\n";
        return $out . "\n";
    }, $s);
    // Tables — keep them as raw HTML so GitHub renders them
    // (md tables would need careful escaping; HTML is allowed in README.md)
    $s = strip_my_tags($s);
    // Tidy whitespace
    $s = preg_replace("/\n{3,}/", "\n\n", $s);
    return trim($s);
}

function strip_my_tags(string $s): string {
    // Inline formatting
    $s = preg_replace('#<strong[^>]*>(.*?)</strong>#is', '**$1**', $s);
    $s = preg_replace('#<b[^>]*>(.*?)</b>#is',           '**$1**', $s);
    $s = preg_replace('#<em[^>]*>(.*?)</em>#is',         '*$1*',   $s);
    $s = preg_replace('#<i[^>]*>(.*?)</i>#is',           '*$1*',   $s);
    $s = preg_replace('#<code[^>]*>(.*?)</code>#is',     '`$1`',   $s);
    // Add space between adjacent tags so <span>a</span><span>b</span> doesn't merge to "ab"
    $s = preg_replace('#></#', '> <', $s);
    // Drop wrapping <div>/<span> but keep contents
    $s = preg_replace('#</?(div|span)[^>]*>#i', ' ', $s);
    // Collapse double spaces left behind
    $s = preg_replace('/ +/u', ' ', $s);
    // Decode entities
    $s = html_entity_decode($s, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    return $s;
}

function slug_anchor(string $slug): string {
    return strtolower(preg_replace('/[^a-z0-9-]/i', '-', $slug));
}

/**
 * Mirror GitHub's heading-anchor algorithm:
 *   1. lowercase
 *   2. strip non-alphanumeric except space/hyphen/underscore (drops em-dashes)
 *   3. replace whitespace runs with single hyphen
 */
function part_anchor(string $part): string {
    $a = strtolower($part);
    // Remove characters that GitHub drops (em-dash, &, etc.). Keep alnum/space/hyphen/underscore.
    $a = preg_replace('/[^\p{L}\p{N}\s_-]+/u', '', $a);
    // Whitespace → hyphen (consecutive whitespace becomes multiple hyphens, matching GitHub)
    $a = preg_replace('/\s/u', '-', $a);
    return $a;
}

function topics_word(int $n): string {
    return $n === 1 ? 'topic' : 'topics';
}

/* ---------------- Group topics by part ---------------- */
$grouped = [];
foreach ($topics as $slug => $t) {
    $grouped[$t['part']]['part_en'] = $t['part'];
    $grouped[$t['part']]['part_ar'] = $t['part_ar'];
    $grouped[$t['part']]['topics'][$slug] = $t;
}

$total_topics = count($topics);
$total_qa = 0;
foreach ($topics as $t) $total_qa += count($t['qa']);
$date = date('Y-m-d');

/* ---------------- Emit ---------------- */
echo <<<MD
# 📘 Senior Backend Engineer Interview Bible

> **English + العربية** · {$total_topics} topics · {$total_qa} Q&A · 2026 Edition

A bilingual reference and interactive PHP web app for preparing for **senior PHP / Laravel / Backend / Software Engineer** interviews. Built specifically to go beyond rote definitions and answer like a senior — with production context, trade-offs, common mistakes, and follow-up questions.

---

## 🚀 Quick start

```bash
cd /home/fady/Desktop/interview_question
php -S 127.0.0.1:8000
```
Open <http://127.0.0.1:8000> — sidebar lists every topic, search filters live, theme & language toggle in the top bar.

## 📁 Project structure

```
.
├── index.php                  # Home (topic grid by Part)
├── topic.php?slug=...         # Single focused topic page (illustration + Q&A)
├── assets/
│   ├── css/style.css          # Dark + light theme, RTL for Arabic
│   └── js/app.js              # Theme toggle, language toggle, sidebar search
├── includes/
│   ├── header.php             # Sticky top nav + sidebar
│   ├── footer.php
│   ├── render.php             # Q&A render helpers
│   └── illustrations.php      # ~113 inline SVG diagrams
└── data/
    ├── topics.php             # Aggregator
    └── part*-*.php            # One file per Part (PHP arrays)
```

## ✨ Features

- **{$total_topics} topics across 20 Parts** — PHP, Laravel, Databases, Redis, Docker, System Design, Architecture, Linux, CI/CD, Async, Security, Observability, Messaging, Microservices, Kubernetes, Networking, Modern Data, AI/LLM, Modern Laravel, Interview Tactics
- **Bilingual content** — every question, answer, code example, tip, and follow-up in both English and Arabic
- **Themable** — dark / light mode toggle (persisted)
- **RTL support** — switches direction when language is Arabic
- **Inline SVG illustrations** for every topic — auto-themed via CSS variables
- **Senior framing** — each Q&A includes `❌ Don't say` and `✔️ Senior tip` callouts where relevant
- **Sidebar with live search** — filter by title, slug, or description in either language

## 🗂 Table of contents


MD;

/* --- Per-part TOC --- */
foreach ($grouped as $partKey => $group) {
    $anchor = part_anchor($partKey);
    $count  = count($group['topics']);
    $word   = topics_word($count);
    echo "- [{$group['part_en']}](#{$anchor}) — {$count} {$word}  \n";
    echo "  &nbsp;&nbsp;<sub>{$group['part_ar']}</sub>\n";
}

echo "\n---\n\n";

/* --- Per-part content --- */
foreach ($grouped as $partKey => $group) {
    $anchor = part_anchor($partKey);
    echo "## {$group['part_en']}\n\n";
    echo "<sub>{$group['part_ar']}</sub>\n\n";
    foreach ($group['topics'] as $slug => $topic) {
        $title_en = $topic['title_en'];
        $title_ar = $topic['title_ar'];
        $desc_en  = $topic['desc_en'];
        $desc_ar  = $topic['desc_ar'];
        $icon     = $topic['icon'];
        $tanchor  = slug_anchor($slug);

        echo "### {$icon} {$title_en}\n\n";
        echo "**Slug:** `{$slug}` · **AR:** {$title_ar}\n\n";
        echo "> {$desc_en}  \n> *{$desc_ar}*\n\n";

        foreach ($topic['qa'] as $idx => $qa) {
            $q_en = $qa['q_en'] ?? '';
            $q_ar = $qa['q_ar'] ?? '';
            $a_en = html_to_md($qa['a_en'] ?? '');
            $a_ar = html_to_md($qa['a_ar'] ?? '');
            $ex_en = html_to_md($qa['extra_html_en'] ?? '');
            $ex_ar = html_to_md($qa['extra_html_ar'] ?? '');
            $example = $qa['example'] ?? null;
            $tip_en  = html_to_md($qa['tip_en'] ?? '');
            $tip_ar  = html_to_md($qa['tip_ar'] ?? '');
            $bad_en  = html_to_md($qa['bad_en'] ?? '');
            $bad_ar  = html_to_md($qa['bad_ar'] ?? '');
            $followups = $qa['followups'] ?? [];

            echo "#### ❓ {$q_en}\n\n";
            if ($q_ar) echo "<sub>**AR:** {$q_ar}</sub>\n\n";

            if ($a_en !== '') {
                echo "**Answer (EN):**\n\n{$a_en}\n\n";
            }
            if ($ex_en !== '') {
                echo "{$ex_en}\n\n";
            }
            if ($a_ar !== '') {
                echo "<details><summary>الإجابة بالعربي</summary>\n\n{$a_ar}\n\n</details>\n\n";
            }
            if ($ex_ar !== '' && $ex_ar !== $ex_en) {
                echo "<details><summary>تفاصيل بالعربي</summary>\n\n{$ex_ar}\n\n</details>\n\n";
            }

            if ($example) {
                echo "```php\n{$example}\n```\n\n";
            }

            if ($bad_en) {
                echo "> ❌ **Don't say:** {$bad_en}\n>\n";
                if ($bad_ar) echo "> ❌ **لا تقل:** {$bad_ar}\n";
                echo "\n";
            }
            if ($tip_en) {
                echo "> ✔️ **Senior tip:** {$tip_en}\n>\n";
                if ($tip_ar) echo "> ✔️ **نصيحة Senior:** {$tip_ar}\n";
                echo "\n";
            }

            if (!empty($followups)) {
                echo "**Follow-up questions:**\n\n";
                foreach ($followups as $fu) echo "- {$fu}\n";
                echo "\n";
            }

            echo "---\n\n";
        }
    }
}

echo <<<MD

## 🛠 Regenerating this file

This README is generated from `data/*.php`. To regenerate:

```bash
php scripts/generate-readme.php > README.md
```

## 📝 License & contributing

This reference is open for personal and team use. PRs improving accuracy, depth, or adding new topics are welcome — keep the bilingual format and the senior framing.

---

<sub>Generated {$date}.  {$total_topics} topics · {$total_qa} Q&A.</sub>

MD;

