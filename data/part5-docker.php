<?php
/** Part V — Docker */

return [

'docker-basics' => [
    'part' => 'Part V — Docker', 'part_ar' => 'الجزء الخامس — Docker',
    'icon' => '🐳',
    'title_en' => 'Docker Basics',
    'title_ar' => 'أساسيات Docker',
    'desc_en' => 'Containers, images, namespaces, cgroups',
    'desc_ar' => 'Containers و Images و Namespaces',
    'qa' => [
        [
            'q_en' => 'What is a container?',
            'q_ar' => 'ما هو Container؟',
            'a_en' => '<p>A process tree isolated by Linux <strong>namespaces</strong> (pid, net, mnt, uts, ipc, user) and constrained by <strong>cgroups</strong> (CPU, memory, IO). Containers share the host kernel — they are <strong>not VMs</strong>.</p>',
            'a_ar' => '<p>شجرة Processes معزولة عبر Linux <strong>Namespaces</strong> (pid, net, mnt, uts, ipc, user) ومُقيدة بـ <strong>cgroups</strong> (CPU, memory, IO). تشارك Kernel المضيف — ليست VMs.</p>',
        ],
        [
            'q_en' => 'Image vs Container',
            'q_ar' => 'Image vs Container',
            'a_en' => '<p><strong>Image:</strong> immutable blueprint (layers). <strong>Container:</strong> running instance with a writable layer on top.</p>',
            'a_ar' => '<p><strong>Image:</strong> مخطط ثابت (طبقات). <strong>Container:</strong> Instance يعمل بطبقة قابلة للكتابة في الأعلى.</p>',
        ],
    ],
],

'docker-dockerfile' => [
    'part' => 'Part V — Docker', 'part_ar' => 'الجزء الخامس — Docker',
    'icon' => '📄',
    'title_en' => 'Dockerfile Best Practices',
    'title_ar' => 'أفضل ممارسات Dockerfile',
    'desc_en' => 'Multi-stage builds, layer caching, security',
    'desc_ar' => 'Multi-stage و Layer Caching والأمان',
    'qa' => [
        [
            'q_en' => 'Best practices',
            'q_ar' => 'أفضل الممارسات',
            'a_en' => '<ul><li><strong>Multi-stage builds</strong> — small final images</li><li>Order layers from least → most changing for cache hits</li><li>Use specific tags, not <code>:latest</code></li><li>Run as a non-root user</li><li>One process per container</li><li>Use <code>.dockerignore</code> to keep context small</li></ul>',
            'a_ar' => '<ul><li><strong>Multi-stage Builds</strong> — Images نهائية صغيرة</li><li>رتب الطبقات من الأقل تغيّرًا للأكثر للحصول على Cache</li><li>استخدم Tags محددة، لا <code>:latest</code></li><li>شغل كـ User غير Root</li><li>Process واحد لكل Container</li><li>استخدم <code>.dockerignore</code></li></ul>',
        ],
        [
            'q_en' => 'Example PHP-FPM Dockerfile',
            'q_ar' => 'مثال Dockerfile لـ PHP-FPM',
            'a_en' => '<p>Multi-stage build with Composer:</p>',
            'a_ar' => '<p>Multi-stage Build مع Composer:</p>',
            'example' => "FROM composer:2 AS deps\nWORKDIR /app\nCOPY composer.json composer.lock ./\nRUN composer install --no-dev --no-scripts --no-interaction --prefer-dist\n\nFROM php:8.3-fpm-alpine\nRUN docker-php-ext-install pdo_pgsql opcache\nWORKDIR /var/www\nCOPY --from=deps /app/vendor ./vendor\nCOPY . .\nUSER www-data\nCMD [\"php-fpm\"]",
        ],
    ],
],

'docker-prod' => [
    'part' => 'Part V — Docker', 'part_ar' => 'الجزء الخامس — Docker',
    'icon' => '🔧',
    'title_en' => 'Volumes, Networks, Production',
    'title_ar' => 'Volumes و Networks والإنتاج',
    'desc_en' => 'Storage, networking, production tips',
    'desc_ar' => 'التخزين والشبكات ونصائح الإنتاج',
    'qa' => [
        [
            'q_en' => 'Volumes vs bind mounts',
            'q_ar' => 'Volumes vs Bind Mounts',
            'a_en' => '<p><strong>Volumes:</strong> Docker-managed, portable, ideal for data. <strong>Bind mounts:</strong> map a host path — great for dev, risky in prod.</p>',
            'a_ar' => '<p><strong>Volumes:</strong> يديرها Docker، Portable، مثالية للبيانات. <strong>Bind Mounts:</strong> تربط مسار Host — جيدة للتطوير، خطرة في Production.</p>',
        ],
        [
            'q_en' => 'Docker networks',
            'q_ar' => 'شبكات Docker',
            'a_en' => '<p><code>bridge</code> (default per host), <code>host</code> (no isolation), <code>overlay</code> (multi-host Swarm/K8s), <code>none</code>.</p>',
            'a_ar' => '<p><code>bridge</code> (افتراضي لكل Host)، <code>host</code> (بدون عزل)، <code>overlay</code> (Multi-host Swarm/K8s)، <code>none</code>.</p>',
        ],
        [
            'q_en' => 'Production tips',
            'q_ar' => 'نصائح الإنتاج',
            'a_en' => '<ul><li>Set resource limits — prevent noisy neighbors</li><li>Health checks (HTTP / TCP)</li><li>Read-only root filesystem; tmpfs for caches</li><li>Scan images (Trivy, Grype)</li><li>Sign &amp; verify images (Sigstore / Cosign)</li></ul>',
            'a_ar' => '<ul><li>اضبط Resource Limits — لمنع Noisy Neighbors</li><li>Health Checks (HTTP / TCP)</li><li>Read-only Root Filesystem؛ tmpfs للـ Caches</li><li>افحص Images (Trivy, Grype)</li><li>وقّع وتحقق من Images (Sigstore / Cosign)</li></ul>',
        ],
    ],
],

];
