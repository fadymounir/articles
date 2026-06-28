<?php
/** Part X — Async & Concurrency in PHP */

return [

'async-fibers' => [
    'part' => 'Part X — Async & Concurrency', 'part_ar' => 'الجزء العاشر — Async و Concurrency',
    'icon' => '🧵',
    'title_en' => 'PHP Fibers',
    'title_ar' => 'PHP Fibers',
    'desc_en' => 'PHP 8.1+ primitive enabling stackful coroutines',
    'desc_ar' => 'Primitive في PHP 8.1+ يفتح Coroutines حقيقية',
    'qa' => [
        [
            'q_en' => 'What are PHP Fibers?',
            'q_ar' => 'ما هي PHP Fibers؟',
            'a_en' => '<p>A Fiber is a <strong>stackful coroutine</strong> — a callable that can suspend itself and be resumed later from the same point. Introduced in PHP 8.1, Fibers are the low-level primitive that frameworks like <strong>ReactPHP</strong>, <strong>AmphP</strong>, and <strong>Swoole</strong>-bridges build on to deliver async I/O without callback hell.</p>',
            'a_ar' => '<p>الـ Fiber هو <strong>Stackful Coroutine</strong> — كود قابل للاستدعاء يستطيع أن يُعلّق نفسه ويُستأنف لاحقًا من نفس النقطة. ظهر في PHP 8.1، وهو الـ Primitive الذي تبني فوقه مكتبات مثل <strong>ReactPHP</strong> و <strong>AmphP</strong> و <strong>Swoole</strong> لتقدم Async I/O بدون Callback Hell.</p>',
            'example' => "\$fiber = new Fiber(function (): void {\n    \$value = Fiber::suspend('paused');\n    echo \"Resumed with: \$value\\n\";\n});\n\$received = \$fiber->start();   // 'paused'\n\$fiber->resume('hello');       // prints 'Resumed with: hello'",
        ],
        [
            'q_en' => 'Fibers vs Threads vs Generators',
            'q_ar' => 'Fibers vs Threads vs Generators',
            'a_en' => '<ul><li><strong>Threads:</strong> OS-managed, true parallelism, expensive context switch, race conditions.</li><li><strong>Generators:</strong> stackless, only suspend at <code>yield</code> from <em>themselves</em>.</li><li><strong>Fibers:</strong> stackful, can suspend from <em>any depth</em> of the call stack — that\'s what makes them work for async libraries.</li></ul>',
            'a_ar' => '<ul><li><strong>Threads:</strong> يديرها الـ OS، Parallelism حقيقي، Context Switch مكلف، خطر Race Conditions.</li><li><strong>Generators:</strong> Stackless، تُعلّق فقط عند <code>yield</code> من <em>نفسها</em>.</li><li><strong>Fibers:</strong> Stackful، تستطيع التعليق من <em>أي عمق</em> في Stack — لهذا تصلح للمكتبات الـ Async.</li></ul>',
        ],
        [
            'q_en' => 'Do Fibers give me parallelism?',
            'q_ar' => 'هل Fibers يعطيني Parallelism؟',
            'a_en' => '<p><strong>No.</strong> Fibers are <em>concurrency</em>, not parallelism. PHP still runs one thing at a time per process. The win is hiding I/O latency: while one fiber waits for a DB/HTTP response, the runtime resumes another fiber.</p>',
            'a_ar' => '<p><strong>لا.</strong> Fibers تعطي <em>Concurrency</em> لا Parallelism. PHP لا تزال تنفذ شيئًا واحدًا في الـ Process في أي لحظة. الربح أنها تُخفي زمن انتظار I/O: بينما Fiber ينتظر رد من DB/HTTP، الـ Runtime يستأنف Fiber آخر.</p>',
        ],
        [
            'q_en' => 'When would I use Fibers directly?',
            'q_ar' => 'متى أستخدم Fibers مباشرة؟',
            'a_en' => '<p>Almost never in app code — you\'ll use a framework on top (AmphP, ReactPHP, Octane/Swoole). Use raw Fibers if you\'re writing an async library or a runtime.</p>',
            'a_ar' => '<p>نادرًا في كود التطبيق — ستستخدم Framework فوقها (AmphP, ReactPHP, Octane/Swoole). استخدم Fibers الخام فقط إذا كنت تكتب مكتبة Async أو Runtime.</p>',
            'tip_en' => 'Knowing what Fibers are and why they unlocked the modern async PHP ecosystem is the senior-level point.',
            'tip_ar' => 'النقطة Senior هي معرفة ما هي Fibers ولماذا فتحت بيئة Async الحديثة في PHP.',
        ],
    ],
],

'async-octane' => [
    'part' => 'Part X — Async & Concurrency', 'part_ar' => 'الجزء العاشر — Async و Concurrency',
    'icon' => '🚀',
    'title_en' => 'Laravel Octane',
    'title_ar' => 'Laravel Octane',
    'desc_en' => 'Booted-once worker model with Swoole/RoadRunner/FrankenPHP',
    'desc_ar' => 'تشغيل Workers مع Boot مرة واحدة عبر Swoole/RoadRunner/FrankenPHP',
    'qa' => [
        [
            'q_en' => 'What problem does Octane solve?',
            'q_ar' => 'ما المشكلة التي يحلها Octane؟',
            'a_en' => '<p>Traditional PHP-FPM <strong>boots the framework on every request</strong> (autoload, config, providers, routes). Octane boots once into a long-lived worker; subsequent requests reuse the booted application. Result: <strong>5–10× throughput</strong> for typical Laravel apps.</p>',
            'a_ar' => '<p>PHP-FPM التقليدي <strong>يُمهّد Framework في كل Request</strong> (Autoload, Config, Providers, Routes). Octane يُمهّد مرة واحدة في Worker طويل العمر، والـ Requests التالية تُعيد استخدام التطبيق المُمهّد. النتيجة: <strong>إنتاجية 5-10x</strong> لتطبيقات Laravel.</p>',
        ],
        [
            'q_en' => 'Octane runtimes: Swoole vs RoadRunner vs FrankenPHP',
            'q_ar' => 'Runtimes الـ Octane: Swoole vs RoadRunner vs FrankenPHP',
            'a_en' => '<ul><li><strong>Swoole:</strong> PHP extension; full coroutines, <code>Octane::concurrently()</code>, tightest perf.</li><li><strong>RoadRunner:</strong> Go-based app server; simpler ops, no extension, no concurrency primitive.</li><li><strong>FrankenPHP:</strong> Caddy-embedded PHP runtime with native HTTPS/HTTP/3 — fastest cold path; modern choice.</li></ul>',
            'a_ar' => '<ul><li><strong>Swoole:</strong> امتداد PHP؛ Coroutines كاملة، <code>Octane::concurrently()</code>، أعلى Performance.</li><li><strong>RoadRunner:</strong> App Server بـ Go؛ تشغيل أبسط، بدون امتداد، بدون Concurrency Primitive.</li><li><strong>FrankenPHP:</strong> Runtime مدمج في Caddy مع HTTPS/HTTP/3 جاهز — أسرع Cold Path؛ خيار حديث.</li></ul>',
        ],
        [
            'q_en' => 'Octane gotchas — state leakage',
            'q_ar' => 'مخاطر Octane — تسرب الحالة',
            'a_en' => '<p>Because the worker stays alive, <strong>singletons keep their state between requests</strong>. Common bugs:</p><ul><li>Auth user / session leaking</li><li>Static properties accumulating data</li><li>Container-bound singletons containing per-request state</li><li>Container-resolved values referencing stale closures</li></ul><p>Use <code>scoped</code> bindings instead of <code>singleton</code> for per-request services, and listen for <code>RequestReceived</code> to reset state.</p>',
            'a_ar' => '<p>لأن Worker يظل حيًا، <strong>الـ Singletons تحتفظ بحالتها بين Requests</strong>. أخطاء شائعة:</p><ul><li>تسرب Auth User / Session</li><li>Static Properties تتراكم</li><li>Singletons في Container تحمل حالة Request</li><li>Closures قديمة</li></ul><p>استخدم <code>scoped</code> بدلاً من <code>singleton</code> للخدمات per-request، واستمع لـ <code>RequestReceived</code> لإعادة ضبط الحالة.</p>',
            'bad_en' => 'Use `singleton` everywhere "for performance".',
            'bad_ar' => 'استخدام `singleton` لكل شيء "للأداء".',
        ],
        [
            'q_en' => 'Octane::concurrently()',
            'q_ar' => 'Octane::concurrently()',
            'a_en' => '<p>Swoole-only. Runs multiple I/O-bound closures <strong>in parallel</strong> on the same worker via coroutines.</p>',
            'a_ar' => '<p>متاح فقط على Swoole. يُشغّل عدة Closures من نوع I/O <strong>بالتوازي</strong> داخل نفس Worker عبر Coroutines.</p>',
            'example' => "[\$users, \$posts, \$weather] = Octane::concurrently([\n    fn() => User::all(),\n    fn() => Http::get('/posts')->json(),\n    fn() => Http::get('/weather')->json(),\n]);",
        ],
    ],
],

'async-swoole' => [
    'part' => 'Part X — Async & Concurrency', 'part_ar' => 'الجزء العاشر — Async و Concurrency',
    'icon' => '⚡',
    'title_en' => 'Swoole & Coroutines',
    'title_ar' => 'Swoole و Coroutines',
    'desc_en' => 'Async runtime, coroutine scheduling, hook system',
    'desc_ar' => 'Runtime غير متزامن، جدولة Coroutines، Hooks',
    'qa' => [
        [
            'q_en' => 'What is Swoole?',
            'q_ar' => 'ما هو Swoole؟',
            'a_en' => '<p>A C extension turning PHP into an async, coroutine-based runtime. It hooks blocking I/O (mysql, redis, curl, file) and yields control while waiting — single-threaded, event-loop based, similar to Node.js.</p>',
            'a_ar' => '<p>امتداد C يُحوّل PHP إلى Runtime غير متزامن مبني على Coroutines. يربط I/O الـ Blocking (mysql, redis, curl, file) ويُسلم التحكم أثناء الانتظار — Single-threaded مبني على Event Loop، مشابه لـ Node.js.</p>',
        ],
        [
            'q_en' => 'Coroutines vs Threads',
            'q_ar' => 'Coroutines vs Threads',
            'a_en' => '<p>Coroutines are <strong>user-space</strong>, scheduled cooperatively (yield at I/O), and cheap (KB of memory). Threads are kernel-scheduled, preemptive, and expensive (MB stacks). A single PHP process can run tens of thousands of coroutines.</p>',
            'a_ar' => '<p>الـ Coroutines في <strong>User Space</strong>، جدولة تعاونية (Yield عند I/O)، رخيصة (KBs ذاكرة). الـ Threads تُجدولها Kernel، Preemptive، مكلفة (Stacks بحجم MB). Process واحد يستطيع تشغيل عشرات الآلاف من Coroutines.</p>',
        ],
        [
            'q_en' => 'Swoole gotchas',
            'q_ar' => 'مخاطر Swoole',
            'a_en' => '<ul><li>Some packages do native I/O bypassing the hook — they block the whole worker.</li><li>Global state (statics, registries) is shared across coroutines on the same worker.</li><li>Debugging is harder — stack traces span async hops.</li><li>Long-running coroutines leak file descriptors if not managed.</li></ul>',
            'a_ar' => '<ul><li>بعض المكتبات تستخدم I/O أصلي ولا يلتقطه Hook — يُعطّل الـ Worker كله.</li><li>Global State (Statics, Registries) مشترك عبر Coroutines في نفس Worker.</li><li>التصحيح أصعب — Stack Traces تمتد عبر قفزات Async.</li><li>Coroutines طويلة قد تُسرّب File Descriptors.</li></ul>',
        ],
    ],
],

'async-event-loops' => [
    'part' => 'Part X — Async & Concurrency', 'part_ar' => 'الجزء العاشر — Async و Concurrency',
    'icon' => '🔁',
    'title_en' => 'ReactPHP & AmphP',
    'title_ar' => 'ReactPHP & AmphP',
    'desc_en' => 'Pure-PHP event loops, Promise/Future patterns',
    'desc_ar' => 'Event Loops بـ PHP خالص وأنماط Promise/Future',
    'qa' => [
        [
            'q_en' => 'What are ReactPHP and AmphP?',
            'q_ar' => 'ما هي ReactPHP و AmphP؟',
            'a_en' => '<p>Pure-PHP async libraries. <strong>ReactPHP</strong> uses Promises (callback-style). <strong>AmphP v3</strong> uses Fibers — code looks synchronous but is async under the hood. Both run on a single-threaded event loop with non-blocking I/O.</p>',
            'a_ar' => '<p>مكتبات Async مكتوبة بـ PHP خالص. <strong>ReactPHP</strong> تستخدم Promises (نمط Callback). <strong>AmphP v3</strong> تستخدم Fibers — الكود يبدو متزامنًا لكنه Async في الخلفية. كلاهما يعمل على Event Loop Single-threaded مع I/O غير Blocking.</p>',
        ],
        [
            'q_en' => 'Promises vs Fibers (AmphP v2 vs v3)',
            'q_ar' => 'Promises vs Fibers',
            'a_en' => '<p>AmphP v2 (Promises): nested <code>->then()</code>, callback hell on complex flows. v3 (Fibers): write straight-line code; <code>Future::await()</code> hides the suspension. Strong senior signal: explain why Fibers ended PHP\'s callback era.</p>',
            'a_ar' => '<p>AmphP v2 (Promises): <code>->then()</code> متداخل و Callback Hell عند التعقيد. v3 (Fibers): اكتب كودًا مستقيمًا و<code>Future::await()</code> يُخفي التعليق. إشارة Senior قوية: اشرح كيف أنهت Fibers عصر Callbacks في PHP.</p>',
        ],
        [
            'q_en' => 'When pick Octane/Swoole vs pure-PHP loop',
            'q_ar' => 'متى Octane/Swoole vs Loop بـ PHP خالص',
            'a_en' => '<ul><li><strong>Octane/Swoole:</strong> standard Laravel app needing throughput.</li><li><strong>AmphP/ReactPHP:</strong> long-running services (workers, daemons, bots, websockets servers) where adding a C extension isn\'t desired.</li></ul>',
            'a_ar' => '<ul><li><strong>Octane/Swoole:</strong> تطبيق Laravel تحتاج Throughput.</li><li><strong>AmphP/ReactPHP:</strong> خدمات طويلة العمر (Workers, Daemons, Bots, WebSocket Servers) حيث لا تريد امتدادًا.</li></ul>',
        ],
    ],
],

];
