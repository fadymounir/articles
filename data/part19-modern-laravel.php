<?php
/** Part XIX — Modern Laravel */

return [

'lvm-octane-deep' => [
    'part' => 'Part XIX — Modern Laravel', 'part_ar' => 'الجزء التاسع عشر — Laravel الحديث',
    'icon' => '🚀',
    'title_en' => 'Octane in Depth',
    'title_ar' => 'Octane بعمق',
    'desc_en' => 'Workers, state leaks, request hooks',
    'desc_ar' => 'Workers وتسرب الحالة و Hooks الطلب',
    'qa' => [
        [
            'q_en' => 'Stateful vs stateless services in Octane',
            'q_ar' => 'Stateful vs Stateless في Octane',
            'a_en' => '<p>Anything bound as <code>singleton</code> survives across requests. Anything <code>bind</code>-ed gets a fresh instance. New <code>scoped</code> binding lives per request — use it for request-bound dependencies (current user, request context, multi-tenant config).</p>',
            'a_ar' => '<p>أي شيء مربوط كـ <code>singleton</code> يبقى عبر Requests. الـ <code>bind</code> يعطي Instance جديد كل مرة. الجديد <code>scoped</code> يعيش لكل Request — استخدمه للـ Dependencies المرتبطة بالطلب (المستخدم الحالي، السياق، Multi-tenant Config).</p>',
        ],
        [
            'q_en' => 'Octane request hooks',
            'q_ar' => 'Hooks الـ Request في Octane',
            'a_en' => '<p><code>RequestReceived</code>, <code>RequestTerminated</code>, <code>WorkerStarting</code>, <code>WorkerStopping</code>, <code>TaskReceived</code>, <code>TickReceived</code>. Use <code>RequestTerminated</code> for cleanup of per-request state.</p>',
            'a_ar' => '<p><code>RequestReceived</code> و <code>RequestTerminated</code> و <code>WorkerStarting</code> و <code>WorkerStopping</code> و <code>TaskReceived</code> و <code>TickReceived</code>. استخدم <code>RequestTerminated</code> لتنظيف حالة الطلب.</p>',
        ],
        [
            'q_en' => 'Common Octane bug: leaking auth user',
            'q_ar' => 'خطأ شائع: تسرب Auth User',
            'a_en' => '<p>A singleton service caches <code>auth()->user()</code> at construction time → first user that hits the worker is "Auth-cached" for all subsequent requests on the same worker. Fix: never cache request-scoped data in singletons; resolve at use time.</p>',
            'a_ar' => '<p>Singleton يخزن <code>auth()->user()</code> في Construction → أول مستخدم يصل لـ Worker يصبح "محفوظًا" لكل الطلبات التالية. الحل: لا تخزن بيانات Request في Singletons؛ احصل عليها وقت الاستخدام.</p>',
        ],
        [
            'q_en' => 'When NOT to use Octane',
            'q_ar' => 'متى لا تستخدم Octane',
            'a_en' => '<p>Legacy apps with global static state, packages that rely on per-request bootstrapping (some auth packages did this), workloads dominated by external HTTP/DB calls (Octane wins on CPU; if you\'re already 90% I/O-bound, gains shrink).</p>',
            'a_ar' => '<p>تطبيقات قديمة بـ Static State، حزم تعتمد على Bootstrap لكل Request، أعباء يهيمن عليها HTTP/DB خارجي (Octane يربح في CPU؛ إذا كنت 90% I/O، الربح يقل).</p>',
        ],
    ],
],

'lvm-reverb' => [
    'part' => 'Part XIX — Modern Laravel', 'part_ar' => 'الجزء التاسع عشر — Laravel الحديث',
    'icon' => '📻',
    'title_en' => 'Reverb (Broadcasting)',
    'title_ar' => 'Reverb (Broadcasting)',
    'desc_en' => 'First-party WebSocket server for Laravel',
    'desc_ar' => 'WebSocket Server رسمي لـ Laravel',
    'qa' => [
        [
            'q_en' => 'What is Reverb?',
            'q_ar' => 'ما هو Reverb؟',
            'a_en' => '<p>A first-party WebSocket server built on ReactPHP, Pusher-protocol compatible. Replaces external Pusher / Soketi for the broadcasting layer. Horizontally scalable via Redis pub/sub.</p>',
            'a_ar' => '<p>WebSocket Server رسمي مبني على ReactPHP ومتوافق مع بروتوكول Pusher. يستبدل Pusher / Soketi لطبقة Broadcasting. قابل للتوسع الأفقي عبر Redis Pub/Sub.</p>',
        ],
        [
            'q_en' => 'Channels: public, private, presence',
            'q_ar' => 'القنوات: Public و Private و Presence',
            'a_en' => '<ul><li><strong>Public:</strong> anyone can subscribe.</li><li><strong>Private:</strong> subscription requires server-side auth callback (<code>routes/channels.php</code>).</li><li><strong>Presence:</strong> like private + you see who else is on the channel — useful for live cursors, viewer counts.</li></ul>',
            'a_ar' => '<ul><li><strong>Public:</strong> أي شخص يشترك.</li><li><strong>Private:</strong> يحتاج Auth Callback من السيرفر.</li><li><strong>Presence:</strong> مثل Private + ترى من معك — مفيد لـ Live Cursors وعدد المشاهدين.</li></ul>',
        ],
        [
            'q_en' => 'Operational concerns',
            'q_ar' => 'مخاوف تشغيلية',
            'a_en' => '<ul><li>Long-lived connections — handle ulimit, ephemeral ports</li><li>Sticky load balancing OR a Redis pub/sub backplane</li><li>Graceful drain on deploy (SIGTERM, finish current handshakes)</li><li>Monitor active connections, channel counts, broadcast rate</li></ul>',
            'a_ar' => '<ul><li>اتصالات طويلة — راعِ ulimit و Ephemeral Ports</li><li>Sticky LB أو Redis Pub/Sub Backplane</li><li>Graceful Drain على Deploy (SIGTERM)</li><li>راقب الاتصالات النشطة وعدد القنوات ومعدل البث</li></ul>',
        ],
    ],
],

'lvm-multi-tenancy' => [
    'part' => 'Part XIX — Modern Laravel', 'part_ar' => 'الجزء التاسع عشر — Laravel الحديث',
    'icon' => '🏢',
    'title_en' => 'Multi-Tenancy',
    'title_ar' => 'Multi-Tenancy',
    'desc_en' => 'Single DB, schema-per-tenant, DB-per-tenant',
    'desc_ar' => 'DB واحدة أو Schema لكل Tenant أو DB لكل Tenant',
    'qa' => [
        [
            'q_en' => 'The three strategies',
            'q_ar' => 'الاستراتيجيات الثلاث',
            'a_en' => '<ul><li><strong>Single DB, tenant_id column:</strong> simplest, cheapest, hardest isolation guarantees</li><li><strong>Schema per tenant</strong> (Postgres): physical separation, single connection pool, harder migrations</li><li><strong>DB per tenant:</strong> strongest isolation, easiest "export tenant", most ops</li></ul>',
            'a_ar' => '<ul><li><strong>DB واحدة + عمود tenant_id:</strong> أبسط وأرخص، أصعب في ضمان العزل</li><li><strong>Schema لكل Tenant</strong> (Postgres): فصل فيزيائي، Connection Pool واحد، Migrations أصعب</li><li><strong>DB لكل Tenant:</strong> أقوى عزل، Export سهل، تشغيل أصعب</li></ul>',
        ],
        [
            'q_en' => 'Picking a strategy',
            'q_ar' => 'اختيار الاستراتيجية',
            'a_en' => '<ul><li><strong>1000s of small tenants:</strong> single DB + global scope</li><li><strong>10s of large tenants:</strong> DB per tenant; per-tenant scaling</li><li><strong>Regulated industries:</strong> isolation often required</li><li><strong>Free tier + paid tier:</strong> hybrid — single DB for free, dedicated for paid</li></ul>',
            'a_ar' => '<ul><li><strong>آلاف من Tenants الصغار:</strong> DB واحدة + Global Scope</li><li><strong>عشرات من Tenants الكبار:</strong> DB لكل واحد</li><li><strong>صناعات منظمة:</strong> العزل عادة مطلوب</li><li><strong>مجاني + مدفوع:</strong> هجين</li></ul>',
        ],
        [
            'q_en' => 'Common bugs',
            'q_ar' => 'أخطاء شائعة',
            'a_en' => '<ul><li>Forgetting the tenant scope in a query → cross-tenant data leak</li><li>Caching <em>without</em> tenant in the key → Tenant A sees Tenant B\'s data</li><li>Octane carrying the previous request\'s tenant container into the next</li><li>Background jobs needing to re-establish tenant context</li></ul>',
            'a_ar' => '<ul><li>نسيان Tenant Scope في Query → تسرب بيانات</li><li>Caching <em>بدون</em> Tenant في الـ Key → Tenant A يرى بيانات Tenant B</li><li>Octane يحمل Tenant Container من الطلب السابق</li><li>Jobs خلفية تحتاج لإعادة تأسيس Tenant Context</li></ul>',
            'tip_en' => 'In senior interviews, the cache-key tenancy bug is a great war story to bring up — it shows you\'ve seen production multi-tenancy.',
            'tip_ar' => 'في مقابلات Senior، خطأ Cache Key بدون Tenant قصة ممتازة — تُظهر أنك رأيت Multi-tenancy في الإنتاج.',
        ],
    ],
],

'lvm-pulse-pennant' => [
    'part' => 'Part XIX — Modern Laravel', 'part_ar' => 'الجزء التاسع عشر — Laravel الحديث',
    'icon' => '💗',
    'title_en' => 'Pulse & Pennant',
    'title_ar' => 'Pulse و Pennant',
    'desc_en' => 'Real-time app insights & first-party feature flags',
    'desc_ar' => 'رؤى لحظية + Feature Flags رسمية',
    'qa' => [
        [
            'q_en' => 'Pulse — what it shows',
            'q_ar' => 'Pulse — ماذا يُظهر',
            'a_en' => '<p>Slow queries, slow requests, slow jobs, busy queues, exceptions, cache hit rates, user activity. Lightweight, sample-based, stores aggregates only — fits in your existing Redis/DB.</p>',
            'a_ar' => '<p>Queries بطيئة، Requests بطيئة، Jobs بطيئة، Queues مزدحمة، Exceptions، معدلات Cache Hit، نشاط المستخدمين. خفيف، Sample-based، يخزن Aggregates فقط — يناسب Redis/DB الحالية.</p>',
        ],
        [
            'q_en' => 'Pennant — feature flags',
            'q_ar' => 'Pennant — Feature Flags',
            'a_en' => '<p>First-party flag system. Drivers: array (tests), database, in-memory. Supports per-user, per-team, percentage rollout via custom resolvers. Pairs with feature-flag-driven development for safer rollouts.</p>',
            'a_ar' => '<p>نظام Feature Flags رسمي. Drivers: Array (للاختبار)، Database، In-memory. يدعم Flags لكل مستخدم/فريق ونسبة تدريجية عبر Resolvers مخصصة. يتكامل مع تطوير مدفوع بـ Feature Flags لنشر أأمن.</p>',
        ],
    ],
],

'lvm-static-analysis' => [
    'part' => 'Part XIX — Modern Laravel', 'part_ar' => 'الجزء التاسع عشر — Laravel الحديث',
    'icon' => '🔬',
    'title_en' => 'Static Analysis & Style',
    'title_ar' => 'تحليل ثابت وأسلوب الكود',
    'desc_en' => 'PHPStan, Larastan, Psalm, Pint',
    'desc_ar' => 'PHPStan و Larastan و Psalm و Pint',
    'qa' => [
        [
            'q_en' => 'PHPStan vs Psalm',
            'q_ar' => 'PHPStan vs Psalm',
            'a_en' => '<p>Both find bugs without running code. PHPStan is more popular, Laravel-aware via <strong>Larastan</strong>. Psalm focuses on type strictness. PHPStan level 9 is the senior bar — types everywhere, no <code>mixed</code>.</p>',
            'a_ar' => '<p>كلاهما يكشف أخطاء بدون تشغيل. PHPStan أشهر، يدعم Laravel عبر <strong>Larastan</strong>. Psalm يركز على صرامة Types. PHPStan Level 9 هو المستوى Senior — Types في كل مكان، بلا <code>mixed</code>.</p>',
        ],
        [
            'q_en' => 'Pint',
            'q_ar' => 'Pint',
            'a_en' => '<p>Laravel\'s opinionated PHP-CS-Fixer wrapper. Zero-config, fast. Run in CI to reject unformatted code; run as a pre-commit hook locally.</p>',
            'a_ar' => '<p>غلاف رأيي حول PHP-CS-Fixer. بلا إعدادات وسريع. شغّله في CI لرفض الكود غير المنسق، وكـ Pre-commit Hook محليًا.</p>',
        ],
        [
            'q_en' => 'Rector for automated refactoring',
            'q_ar' => 'Rector للـ Refactoring الآلي',
            'a_en' => '<p>Apply codemods at scale: upgrade PHP versions, modernize syntax (constructor promotion, readonly), Laravel version upgrades. Pair with Pint &amp; PHPStan in CI.</p>',
            'a_ar' => '<p>تطبيق Codemods على نطاق واسع: ترقية إصدار PHP، تحديث الـ Syntax (Constructor Promotion, readonly)، ترقيات Laravel. ادمجه مع Pint و PHPStan في CI.</p>',
        ],
    ],
],

];
