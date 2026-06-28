<?php
/** Part VIII (Linux) + Part IX (CI/CD) */

return [

'linux-essentials' => [
    'part' => 'Part VIII — Linux', 'part_ar' => 'الجزء الثامن — Linux',
    'icon' => '🐧',
    'title_en' => 'Linux Essentials',
    'title_ar' => 'أساسيات Linux',
    'desc_en' => 'Processes, FDs, signals, networking, systemd',
    'desc_ar' => 'Processes و FDs و Signals والشبكات',
    'qa' => [
        [
            'q_en' => 'Process model',
            'q_ar' => 'نموذج الـ Process',
            'a_en' => '<p>Each process has a PID, parent (PPID), file descriptors, virtual memory map. <code>fork()</code> + <code>exec()</code> spawn child processes. PHP-FPM uses a master + worker model.</p>',
            'a_ar' => '<p>كل Process له PID و Parent (PPID) و File Descriptors و Virtual Memory Map. <code>fork()</code> + <code>exec()</code> ينشئون Child Processes. PHP-FPM يستخدم نموذج Master + Worker.</p>',
        ],
        [
            'q_en' => 'File descriptors & ulimit',
            'q_ar' => 'File Descriptors و ulimit',
            'a_en' => '<p>Sockets and files are FDs. Bump <code>ulimit -n</code> on busy servers. PHP-FPM and Nginx hit defaults quickly.</p>',
            'a_ar' => '<p>الـ Sockets والملفات FDs. ارفع <code>ulimit -n</code> على Servers مزدحمة. PHP-FPM و Nginx يصلون للحدود الافتراضية بسرعة.</p>',
        ],
        [
            'q_en' => 'Signals',
            'q_ar' => 'Signals',
            'a_en' => '<p><code>SIGTERM</code> (graceful), <code>SIGKILL</code> (forced), <code>SIGHUP</code> (reload), <code>SIGUSR1/2</code> (app-defined). Queue workers should handle SIGTERM to finish the current job then exit.</p>',
            'a_ar' => '<p><code>SIGTERM</code> (لطيف)، <code>SIGKILL</code> (قسري)، <code>SIGHUP</code> (إعادة تحميل)، <code>SIGUSR1/2</code> (تطبيقية). Queue Workers يجب أن تتعامل مع SIGTERM لإنهاء Job ثم الخروج.</p>',
        ],
        [
            'q_en' => 'Networking commands',
            'q_ar' => 'أوامر الشبكات',
            'a_en' => '<p><code>ss -tlnp</code>, <code>tcpdump</code>, <code>curl -v</code>, <code>dig</code>, <code>traceroute</code>, <code>ip a</code>, <code>iptables</code>/<code>nftables</code>.</p>',
            'a_ar' => '<p><code>ss -tlnp</code> و <code>tcpdump</code> و <code>curl -v</code> و <code>dig</code> و <code>traceroute</code> و <code>ip a</code> و <code>iptables</code>/<code>nftables</code>.</p>',
        ],
        [
            'q_en' => 'systemd basics',
            'q_ar' => 'أساسيات systemd',
            'a_en' => '<p><code>systemctl status|start|stop|restart|enable</code>. Use a unit file for your queue workers; let systemd handle restarts.</p>',
            'a_ar' => '<p><code>systemctl status|start|stop|restart|enable</code>. استخدم Unit File لـ Queue Workers؛ دع systemd يدير إعادة التشغيل.</p>',
        ],
        [
            'q_en' => 'Performance tools',
            'q_ar' => 'أدوات الأداء',
            'a_en' => '<p><code>top</code>, <code>htop</code>, <code>iotop</code>, <code>vmstat</code>, <code>iostat</code>, <code>strace</code>, <code>perf</code>. For CPU profiling: <code>perf top</code>. For latency: <code>bcc</code>/<code>bpftrace</code>.</p>',
            'a_ar' => '<p><code>top</code> و <code>htop</code> و <code>iotop</code> و <code>vmstat</code> و <code>iostat</code> و <code>strace</code> و <code>perf</code>. لـ CPU Profiling: <code>perf top</code>. للـ Latency: <code>bcc</code>/<code>bpftrace</code>.</p>',
        ],
        [
            'q_en' => 'Logs',
            'q_ar' => 'الـ Logs',
            'a_en' => '<p><code>journalctl -u app</code>, <code>tail -F /var/log/...</code>. In containers, write logs to stdout/stderr.</p>',
            'a_ar' => '<p><code>journalctl -u app</code> و <code>tail -F /var/log/...</code>. في Containers، اكتب Logs لـ stdout/stderr.</p>',
        ],
    ],
],

'cicd-overview' => [
    'part' => 'Part IX — CI/CD', 'part_ar' => 'الجزء التاسع — CI/CD',
    'icon' => '🚀',
    'title_en' => 'CI/CD Pipelines',
    'title_ar' => 'CI/CD',
    'desc_en' => 'Continuous Integration/Delivery/Deployment, strategies',
    'desc_ar' => 'الاستمرارية والاستراتيجيات',
    'qa' => [
        [
            'q_en' => 'CI vs CD vs CD',
            'q_ar' => 'CI vs CD vs CD',
            'a_en' => '<p><strong>Continuous Integration:</strong> auto build &amp; test on every push. <strong>Continuous Delivery:</strong> any green commit is releasable. <strong>Continuous Deployment:</strong> green commits auto-ship to production.</p>',
            'a_ar' => '<p><strong>Continuous Integration:</strong> Build و Test تلقائي مع كل Push. <strong>Continuous Delivery:</strong> أي Commit أخضر قابل للنشر. <strong>Continuous Deployment:</strong> Commits خضراء تنشر تلقائيًا.</p>',
        ],
        [
            'q_en' => 'A solid PHP CI pipeline',
            'q_ar' => 'CI Pipeline قوي لـ PHP',
            'a_en' => '<ol><li>Checkout</li><li>Cache composer + node modules</li><li>Composer install (--no-dev for prod build)</li><li>PHPStan / Psalm (static analysis)</li><li>PHP-CS-Fixer / Pint (lint)</li><li>Pest / PHPUnit (tests with real DB)</li><li>Build Docker image</li><li>Push to registry</li><li>Deploy to staging → smoke tests → production</li></ol>',
            'a_ar' => '<ol><li>Checkout</li><li>Cache لـ Composer و Node Modules</li><li>Composer Install (--no-dev للـ Production)</li><li>PHPStan / Psalm (تحليل ثابت)</li><li>PHP-CS-Fixer / Pint (Lint)</li><li>Pest / PHPUnit (اختبارات بـ DB حقيقية)</li><li>بناء Docker Image</li><li>Push للـ Registry</li><li>نشر لـ Staging → Smoke Tests → Production</li></ol>',
        ],
        [
            'q_en' => 'Deployment strategies',
            'q_ar' => 'استراتيجيات النشر',
            'a_en' => '<p><strong>Rolling:</strong> replace pods batch by batch. <strong>Blue/Green:</strong> two environments, swap traffic. <strong>Canary:</strong> route small % of traffic first. <strong>Feature flags</strong> to ship dark and toggle on.</p>',
            'a_ar' => '<p><strong>Rolling:</strong> استبدال Pods دفعة دفعة. <strong>Blue/Green:</strong> بيئتان مع تبديل Traffic. <strong>Canary:</strong> توجيه نسبة صغيرة من Traffic أولاً. <strong>Feature Flags</strong> للنشر مع التشغيل لاحقًا.</p>',
        ],
        [
            'q_en' => 'Database migrations in CD',
            'q_ar' => 'Database Migrations في CD',
            'a_en' => '<ul><li>Migrations must be <strong>backwards-compatible</strong></li><li>Two-phase changes: add column → deploy code → backfill → drop old column</li><li>Never block deployment on long migrations — run async</li></ul>',
            'a_ar' => '<ul><li>Migrations يجب أن تكون <strong>متوافقة للخلف</strong></li><li>تغييرات على مرحلتين: أضف عمود → انشر كود → اعمل Backfill → احذف العمود القديم</li><li>لا تعطل النشر بسبب Migrations طويلة — شغلها Async</li></ul>',
        ],
        [
            'q_en' => 'Secrets management',
            'q_ar' => 'إدارة الـ Secrets',
            'a_en' => '<p>Vault, AWS Secrets Manager, GCP Secret Manager, Doppler. Never commit secrets — they leak via diffs even with .gitignore.</p>',
            'a_ar' => '<p>Vault و AWS Secrets Manager و GCP Secret Manager و Doppler. لا تعمل Commit للـ Secrets أبدًا — تتسرب عبر Diffs.</p>',
        ],
        [
            'q_en' => 'Zero-downtime Laravel deploys',
            'q_ar' => 'نشر Laravel بدون توقف',
            'a_en' => '<ul><li>Symlink-based releases (Envoyer / Deployer)</li><li><code>php artisan config:cache route:cache view:cache event:cache</code></li><li><code>php artisan migrate --force</code> with backward-compatible schemas</li><li>Graceful PHP-FPM reload (USR2) and queue worker restart (<code>queue:restart</code>)</li></ul>',
            'a_ar' => '<ul><li>Releases بـ Symlinks (Envoyer / Deployer)</li><li><code>php artisan config:cache route:cache view:cache event:cache</code></li><li><code>php artisan migrate --force</code> بمخططات متوافقة للخلف</li><li>إعادة تحميل PHP-FPM (USR2) وإعادة تشغيل Workers (<code>queue:restart</code>)</li></ul>',
        ],
    ],
],

];
