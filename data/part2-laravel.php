<?php
/** Part II — Laravel */

return [

'lv-lifecycle' => [
    'part' => 'Part II — Laravel',
    'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🔄',
    'title_en' => 'Request Lifecycle',
    'title_ar' => 'دورة حياة الطلب',
    'desc_en' => 'From public/index.php to terminating middleware',
    'desc_ar' => 'من index.php حتى Terminating Middleware',
    'qa' => [
        [
            'q_en' => 'Explain the Laravel request lifecycle (senior answer)',
            'q_ar' => 'اشرح دورة حياة الـ Request في Laravel',
            'a_en' => '<p>The request enters via <code>public/index.php</code>, which bootstraps the application container. The HTTP Kernel registers <strong>bootstrappers</strong> (env, config, exception handler, facades, service providers). <strong>Service providers</strong> are then <em>registered</em> then <em>booted</em>. Global middleware runs, the router matches the request, route middleware runs, the controller is resolved from the container with its dependencies, the response is built and sent, and finally <strong>terminating middleware</strong> runs after the response is delivered.</p>',
            'a_ar' => '<p>الطلب يدخل عبر <code>public/index.php</code> الذي يُمهّد الـ Application Container. الـ HTTP Kernel يُسجّل الـ <strong>Bootstrappers</strong> (env, config, exception handler, facades, service providers). الـ <strong>Service Providers</strong> تُسجَّل ثم تُشغَّل (boot). تعمل Global Middleware، يُطابق الـ Router الطلب، تعمل Route Middleware، يُحلّ الـ Container الـ Controller مع Dependencies، يُبنى الـ Response ويُرسَل، وفي النهاية تعمل <strong>Terminating Middleware</strong>.</p>',
            'extra_html_en' => '<div class="flow"><span>public/index.php</span><span class="arrow">→</span><span>Bootstrap App</span><span class="arrow">→</span><span>HTTP Kernel</span><span class="arrow">→</span><span>Global Middleware</span><span class="arrow">→</span><span>Router</span><span class="arrow">→</span><span>Route Middleware</span><span class="arrow">→</span><span>Controller</span><span class="arrow">→</span><span>Response</span><span class="arrow">→</span><span>Terminating Middleware</span></div>',
            'extra_html_ar' => '<div class="flow"><span>public/index.php</span><span class="arrow">→</span><span>Bootstrap</span><span class="arrow">→</span><span>HTTP Kernel</span><span class="arrow">→</span><span>Global Middleware</span><span class="arrow">→</span><span>Router</span><span class="arrow">→</span><span>Route Middleware</span><span class="arrow">→</span><span>Controller</span><span class="arrow">→</span><span>Response</span><span class="arrow">→</span><span>Terminating</span></div>',
            'tip_en' => 'Don\'t just say "Controller then Model." Mention boot → service providers → middleware → container resolution → terminating middleware.',
            'tip_ar' => 'لا تقل فقط "Controller ثم Model". اذكر boot ثم service providers ثم middleware ثم container resolution ثم terminating middleware.',
        ],
    ],
],

'lv-container' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '📦',
    'title_en' => 'Service Container',
    'title_ar' => 'Service Container',
    'desc_en' => 'IoC, automatic resolution, bindings',
    'desc_ar' => 'IoC والـ Bindings و Automatic Resolution',
    'qa' => [
        [
            'q_en' => 'What is the Service Container?',
            'q_ar' => 'ما هو Service Container؟',
            'a_en' => '<p>An <strong>IoC container</strong> that manages class dependencies and performs <em>automatic resolution</em> via reflection. It is the heart of Laravel.</p>',
            'a_ar' => '<p>هو <strong>IoC Container</strong> يدير Class Dependencies ويقوم بـ <em>Automatic Resolution</em> عبر Reflection. هو قلب Laravel.</p>',
        ],
        [
            'q_en' => 'bind vs singleton vs instance vs scoped',
            'q_ar' => 'الفرق بين bind و singleton و instance و scoped',
            'a_en' => '<ul><li><code>bind</code> — new instance each resolve</li><li><code>singleton</code> — same instance for the request lifetime</li><li><code>instance</code> — pre-built object you hand to the container</li><li><code>scoped</code> — per request scope (useful with Octane)</li></ul>',
            'a_ar' => '<ul><li><code>bind</code> — Instance جديدة في كل Resolve</li><li><code>singleton</code> — نفس الـ Instance خلال عمر الـ Request</li><li><code>instance</code> — كائن جاهز تُعطيه للـ Container</li><li><code>scoped</code> — Scope لكل Request (مهم مع Octane)</li></ul>',
        ],
        [
            'q_en' => 'Contextual binding',
            'q_ar' => 'Contextual Binding',
            'a_en' => '<p>Bind different implementations based on the class consuming them.</p>',
            'a_ar' => '<p>اربط تطبيقات مختلفة حسب الـ Class المستهلك.</p>',
            'example' => "\$this->app->when(VideoController::class)\n          ->needs(Filesystem::class)\n          ->give(fn() => Storage::disk('s3'));",
        ],
    ],
],

'lv-providers' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🔌',
    'title_en' => 'Service Providers',
    'title_ar' => 'Service Providers',
    'desc_en' => 'register() vs boot(), deferred providers',
    'desc_ar' => 'register vs boot والـ Deferred Providers',
    'qa' => [
        [
            'q_en' => 'register() vs boot()',
            'q_ar' => 'الفرق بين register و boot',
            'a_en' => '<p><strong>register():</strong> only bind into the container. Do NOT use other services here — they may not be registered yet. <strong>boot():</strong> runs after all providers registered; safe to use other services, define routes, events, view composers, etc.</p>',
            'a_ar' => '<p><strong>register():</strong> فقط للـ Bindings. لا تستخدم Services أخرى — قد لا تكون مُسجَّلة بعد. <strong>boot():</strong> يعمل بعد تسجيل كل الـ Providers؛ آمن لاستخدام Services أخرى وتعريف Routes و Events و View Composers.</p>',
        ],
        [
            'q_en' => 'Deferred providers',
            'q_ar' => 'Deferred Providers',
            'a_en' => '<p>Implement <code>DeferrableProvider</code> + <code>provides()</code>. The provider only loads when one of its services is requested — speeds up boot.</p>',
            'a_ar' => '<p>نفّذ <code>DeferrableProvider</code> + <code>provides()</code>. الـ Provider يُحمَّل فقط عند طلب أحد Services الخاصة به — يُسرّع الـ Boot.</p>',
        ],
    ],
],

'lv-middleware' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🚦',
    'title_en' => 'Middleware',
    'title_ar' => 'Middleware',
    'desc_en' => 'Global, route, before/after, terminable',
    'desc_ar' => 'الأنواع و before/after و Terminable',
    'qa' => [
        [
            'q_en' => 'What is middleware?',
            'q_ar' => 'ما هو Middleware؟',
            'a_en' => '<p>HTTP layer that intercepts requests and responses. Implemented as a <strong>pipeline</strong> (chain of decorators).</p>',
            'a_ar' => '<p>طبقة HTTP تعترض Requests و Responses. مُنفّذة كـ <strong>Pipeline</strong> (سلسلة Decorators).</p>',
        ],
        [
            'q_en' => 'Global vs route vs group middleware',
            'q_ar' => 'الفرق بين Global و Route و Group middleware',
            'a_en' => '<p><strong>Global</strong> runs on every request (CORS, trim strings). <strong>Group</strong> applied to a set of routes (<code>web</code>, <code>api</code>). <strong>Route-level</strong> applies to individual routes.</p>',
            'a_ar' => '<p><strong>Global</strong> يعمل في كل Request (CORS, trim strings). <strong>Group</strong> يُطبَّق على مجموعة Routes (<code>web</code>, <code>api</code>). <strong>Route-level</strong> يُطبَّق على Route واحد.</p>',
        ],
        [
            'q_en' => 'Before vs after middleware',
            'q_ar' => 'الفرق بين Before و After Middleware',
            'a_en' => '<p>Code before <code>$next($request)</code> runs before the controller; after it runs after.</p>',
            'a_ar' => '<p>الكود قبل <code>$next($request)</code> يعمل قبل الـ Controller، والذي بعده يعمل بعد.</p>',
            'example' => "public function handle(\$request, Closure \$next) {\n    // before\n    \$response = \$next(\$request);\n    // after\n    return \$response;\n}",
        ],
        [
            'q_en' => 'Terminable middleware',
            'q_ar' => 'Terminable Middleware',
            'a_en' => '<p>Has a <code>terminate()</code> method that runs <em>after</em> the response is sent to the client — great for logging or async cleanup.</p>',
            'a_ar' => '<p>يحتوي على <code>terminate()</code> يعمل <em>بعد</em> إرسال الـ Response — مفيد للتسجيل والـ Cleanup.</p>',
        ],
    ],
],

'lv-routing' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🗺',
    'title_en' => 'Routing',
    'title_ar' => 'Routing',
    'desc_en' => 'Route model binding, caching, resource controllers',
    'desc_ar' => 'Route Model Binding والـ Caching',
    'qa' => [
        [
            'q_en' => 'Route model binding',
            'q_ar' => 'Route Model Binding',
            'a_en' => '<p>Auto-resolve a model instance from a route parameter.</p>',
            'a_ar' => '<p>يُحلّ Laravel كائن Model تلقائيًا من Route Parameter.</p>',
            'example' => "Route::get('/users/{user}', fn(User \$user) => \$user);\n// Custom key\nRoute::get('/posts/{post:slug}', fn(Post \$post) => \$post);",
        ],
        [
            'q_en' => 'Route caching',
            'q_ar' => 'Route Caching',
            'a_en' => '<p><code>php artisan route:cache</code> serializes all routes for fast lookup. <strong>Don\'t use closures</strong> in routes if you want this.</p>',
            'a_ar' => '<p><code>php artisan route:cache</code> يُسلسل كل الـ Routes لتسريع البحث. <strong>لا تستخدم Closures</strong> في Routes إذا أردت ذلك.</p>',
        ],
        [
            'q_en' => 'Resource controllers',
            'q_ar' => 'Resource Controllers',
            'a_en' => '<p>Auto-generate the 7 RESTful routes: index, create, store, show, edit, update, destroy.</p>',
            'a_ar' => '<p>يُنتج تلقائيًا 7 Routes RESTful: index, create, store, show, edit, update, destroy.</p>',
            'example' => "Route::resource('posts', PostController::class);",
        ],
    ],
],

'lv-validation' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '✅',
    'title_en' => 'Validation',
    'title_ar' => 'Validation',
    'desc_en' => 'Inline, Form Requests, custom rules',
    'desc_ar' => 'Inline و Form Requests و Rules مخصصة',
    'qa' => [
        [
            'q_en' => 'Three ways to validate',
            'q_ar' => 'ثلاث طرق للـ Validation',
            'a_en' => '<ul><li>Inline <code>$request->validate([...])</code></li><li><code>Validator::make()</code> facade</li><li><strong>Form Requests</strong> — recommended for non-trivial validation</li></ul>',
            'a_ar' => '<ul><li>Inline <code>$request->validate([...])</code></li><li><code>Validator::make()</code></li><li><strong>Form Requests</strong> — موصى بها للـ Validation المعقد</li></ul>',
        ],
        [
            'q_en' => 'Form Request example',
            'q_ar' => 'مثال Form Request',
            'a_en' => '<p>Combine authorization and validation in one class.</p>',
            'a_ar' => '<p>تجمع التحقق من الصلاحية والـ Validation في Class واحدة.</p>',
            'example' => "class StoreUserRequest extends FormRequest {\n    public function authorize(): bool {\n        return \$this->user()->can('create', User::class);\n    }\n    public function rules(): array {\n        return [\n            'email' => ['required','email','unique:users'],\n            'password' => ['required', Password::min(8)->mixedCase()->numbers()],\n        ];\n    }\n}",
        ],
    ],
],

'lv-eloquent' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '💎',
    'title_en' => 'Eloquent ORM',
    'title_ar' => 'Eloquent ORM',
    'desc_en' => 'Active Record, N+1, relationships, scopes',
    'desc_ar' => 'Active Record و N+1 والعلاقات',
    'qa' => [
        [
            'q_en' => 'What pattern is Eloquent?',
            'q_ar' => 'ما هو نمط Eloquent؟',
            'a_en' => '<p>Eloquent implements the <strong>Active Record</strong> pattern — each model wraps a DB row and contains both data and persistence behavior.</p>',
            'a_ar' => '<p>Eloquent تطبيق لنمط <strong>Active Record</strong> — كل Model يُغلّف صف في DB ويحتوي على البيانات وسلوك الحفظ.</p>',
        ],
        [
            'q_en' => 'N+1 problem',
            'q_ar' => 'مشكلة N+1',
            'a_en' => '<p>Lazy loading inside a loop fires one query per iteration. Solution: eager load with <code>with()</code>.</p>',
            'a_ar' => '<p>Lazy Loading داخل Loop يُطلق Query لكل عنصر. الحل: Eager Loading عبر <code>with()</code>.</p>',
            'example' => "// Bad: N+1\nforeach (Post::all() as \$post) {\n    echo \$post->author->name;\n}\n// Good: eager load\nforeach (Post::with('author')->get() as \$post) {\n    echo \$post->author->name;\n}",
            'tip_en' => 'Enable <code>Model::preventLazyLoading()</code> in local/staging to catch this in dev.',
            'tip_ar' => 'فعّل <code>Model::preventLazyLoading()</code> في local/staging للكشف المبكر.',
        ],
        [
            'q_en' => 'Relationship types',
            'q_ar' => 'أنواع العلاقات',
            'a_en' => '<p><code>hasOne</code>, <code>hasMany</code>, <code>belongsTo</code>, <code>belongsToMany</code>, <code>hasManyThrough</code>, <code>morphTo</code>, <code>morphMany</code>, <code>morphedByMany</code>.</p>',
            'a_ar' => '<p><code>hasOne</code> و <code>hasMany</code> و <code>belongsTo</code> و <code>belongsToMany</code> و <code>hasManyThrough</code> و <code>morphTo</code> و <code>morphMany</code> و <code>morphedByMany</code>.</p>',
        ],
        [
            'q_en' => 'Local & global scopes',
            'q_ar' => 'Local و Global Scopes',
            'a_en' => '<p><strong>Local:</strong> <code>scopePublished()</code> on the model. <strong>Global:</strong> implement <code>Scope</code> and attach in <code>booted()</code>.</p>',
            'a_ar' => '<p><strong>Local:</strong> <code>scopePublished()</code> على Model. <strong>Global:</strong> نفّذ <code>Scope</code> وأرفقه في <code>booted()</code>.</p>',
        ],
        [
            'q_en' => 'Mass assignment protection',
            'q_ar' => 'حماية Mass Assignment',
            'a_en' => '<p>Use <code>$fillable</code> (whitelist) or <code>$guarded = []</code> with care. Mass assignment vulnerabilities ship to production frequently.</p>',
            'a_ar' => '<p>استخدم <code>$fillable</code> (whitelist) أو <code>$guarded = []</code> بحذر. ثغرات Mass Assignment تُنشر في الإنتاج كثيرًا.</p>',
        ],
        [
            'q_en' => 'When NOT to use Eloquent',
            'q_ar' => 'متى لا تستخدم Eloquent؟',
            'a_en' => '<ul><li>Bulk inserts (use <code>DB::insert</code> with chunks)</li><li>Reporting queries (raw SQL with <code>DB::select</code>)</li><li>Heavy transformations (database views)</li></ul>',
            'a_ar' => '<ul><li>Bulk Inserts (استخدم <code>DB::insert</code> مع Chunks)</li><li>Reporting Queries (Raw SQL)</li><li>تحويلات ثقيلة (Database Views)</li></ul>',
        ],
    ],
],

'lv-events' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '📡',
    'title_en' => 'Events & Listeners',
    'title_ar' => 'Events & Listeners',
    'desc_en' => 'Decouple side effects, sync vs queued',
    'desc_ar' => 'فصل التأثيرات الجانبية',
    'qa' => [
        [
            'q_en' => 'When to use events',
            'q_ar' => 'متى تستخدم Events؟',
            'a_en' => '<p>Decouple side effects from your core flow. On <code>OrderPlaced</code>, listeners send confirmation email, update analytics, notify warehouse.</p>',
            'a_ar' => '<p>افصل التأثيرات الجانبية عن منطقك الأساسي. على <code>OrderPlaced</code>، Listeners ترسل البريد وتحدث الـ Analytics وتُنبه المخزن.</p>',
        ],
        [
            'q_en' => 'Sync vs queued listeners',
            'q_ar' => 'Sync vs Queued Listeners',
            'a_en' => '<p>Implement <code>ShouldQueue</code> on the listener for async dispatch. Sync listeners run inline — they fail the request if they fail.</p>',
            'a_ar' => '<p>نفّذ <code>ShouldQueue</code> على Listener للتنفيذ غير المتزامن. Sync Listeners تعمل Inline — وفشلها يُفشل الـ Request.</p>',
        ],
        [
            'q_en' => 'Model events vs domain events',
            'q_ar' => 'Model Events vs Domain Events',
            'a_en' => '<p>Eloquent fires <code>creating</code>, <code>created</code>, <code>updating</code>, etc. These are <em>persistence</em> events — tightly coupled to the model. Domain events should be raised from services, not models.</p>',
            'a_ar' => '<p>Eloquent يُطلق <code>creating</code> و <code>created</code> و <code>updating</code>... هذه أحداث <em>حفظ</em> مرتبطة بالـ Model. أحداث الـ Domain يجب رفعها من Services، لا من Models.</p>',
        ],
    ],
],

'lv-queues' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '📬',
    'title_en' => 'Queues & Jobs',
    'title_ar' => 'Queues & Jobs',
    'desc_en' => 'Async work, retries, idempotency, Horizon',
    'desc_ar' => 'العمل غير المتزامن و Retries و Horizon',
    'qa' => [
        [
            'q_en' => 'Why use queues?',
            'q_ar' => 'لماذا نستخدم Queues؟',
            'a_en' => '<p>Move slow / unreliable work off the request path: emails, third-party API calls, image processing, report generation.</p>',
            'a_ar' => '<p>انقل العمل البطيء وغير الموثوق خارج Request: البريد، استدعاءات APIs خارجية، معالجة الصور، تقارير.</p>',
        ],
        [
            'q_en' => 'Drivers',
            'q_ar' => 'الـ Drivers',
            'a_en' => '<p><code>sync</code>, <code>database</code>, <code>redis</code>, <code>sqs</code>, <code>beanstalkd</code>. <strong>Redis</strong> and <strong>SQS</strong> dominate production.</p>',
            'a_ar' => '<p><code>sync</code> و <code>database</code> و <code>redis</code> و <code>sqs</code> و <code>beanstalkd</code>. <strong>Redis</strong> و <strong>SQS</strong> هما الأكثر استخدامًا في الإنتاج.</p>',
        ],
        [
            'q_en' => 'Job idempotency',
            'q_ar' => 'Job Idempotency',
            'a_en' => '<p>Workers can retry. Make jobs idempotent — guard with a DB unique key, idempotency token, or <code>WithoutOverlapping</code> middleware.</p>',
            'a_ar' => '<p>Workers قد تعيد المحاولة. اجعل Jobs idempotent — احمها بـ DB Unique Key أو Idempotency Token أو <code>WithoutOverlapping</code> middleware.</p>',
        ],
        [
            'q_en' => 'Retries, backoff, failed jobs',
            'q_ar' => 'Retries و Backoff و Failed Jobs',
            'a_en' => '<p><code>$tries</code>, <code>$backoff</code>, <code>$timeout</code>, <code>$maxExceptions</code>. Use <strong>failed_jobs</strong> table + <code>queue:retry</code>. Long-term: alert on dead-letter growth.</p>',
            'a_ar' => '<p><code>$tries</code> و <code>$backoff</code> و <code>$timeout</code> و <code>$maxExceptions</code>. استخدم جدول <strong>failed_jobs</strong> + <code>queue:retry</code>. على المدى الطويل: نبه على نمو Dead Letter.</p>',
        ],
        [
            'q_en' => 'Horizon',
            'q_ar' => 'Horizon',
            'a_en' => '<p>Dashboard + supervisor for Redis queues — autoscaling, metrics, failure notifications.</p>',
            'a_ar' => '<p>لوحة تحكم + Supervisor لـ Redis Queues — Autoscaling و Metrics وإشعارات الفشل.</p>',
        ],
        [
            'q_en' => 'Job batching, chains, unique jobs',
            'q_ar' => 'Job Batching و Chains و Unique Jobs',
            'a_en' => '<p><code>Bus::batch()</code>, <code>Bus::chain()</code>, <code>ShouldBeUnique</code>. Used for fan-out workflows.</p>',
            'a_ar' => '<p><code>Bus::batch()</code> و <code>Bus::chain()</code> و <code>ShouldBeUnique</code>. تُستخدم في Workflows من نوع Fan-out.</p>',
        ],
    ],
],

'lv-notifications' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🔔',
    'title_en' => 'Notifications',
    'title_ar' => 'Notifications',
    'desc_en' => 'Mail, SMS, Slack, broadcast, push',
    'desc_ar' => 'البريد و SMS و Slack و Push',
    'qa' => [
        [
            'q_en' => 'What\'s the Notifications system?',
            'q_ar' => 'ما هو نظام Notifications؟',
            'a_en' => '<p>A unified API to send messages across channels: mail, database, SMS (Vonage), Slack, broadcast (websockets), push.</p>',
            'a_ar' => '<p>API موحَّد لإرسال رسائل عبر قنوات مختلفة: بريد، Database، SMS (Vonage)، Slack، Broadcast، Push.</p>',
        ],
        [
            'q_en' => 'via() method',
            'q_ar' => 'method via()',
            'a_en' => '<p>Decide channels per notifiable user.</p>',
            'a_ar' => '<p>تحدد القنوات لكل مستخدم.</p>',
            'example' => "public function via(\$notifiable): array {\n    return \$notifiable->prefers_sms ? ['vonage'] : ['mail','database'];\n}",
        ],
    ],
],

'lv-authn' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🔐',
    'title_en' => 'Authentication',
    'title_ar' => 'Authentication',
    'desc_en' => 'Guards, providers, password hashing',
    'desc_ar' => 'Guards و Providers والتشفير',
    'qa' => [
        [
            'q_en' => 'Guards and providers',
            'q_ar' => 'Guards و Providers',
            'a_en' => '<p><strong>Guards:</strong> how users are authenticated per request (session, token, JWT). <strong>Providers:</strong> how users are fetched (eloquent, database).</p>',
            'a_ar' => '<p><strong>Guards:</strong> كيفية التحقق من المستخدم لكل Request (session, token, JWT). <strong>Providers:</strong> كيفية جلب المستخدم (eloquent, database).</p>',
        ],
        [
            'q_en' => 'Password hashing',
            'q_ar' => 'تشفير كلمات السر',
            'a_en' => '<p>Bcrypt (default) or Argon2id. <strong>Never</strong> store plain or md5/sha1.</p>',
            'a_ar' => '<p>Bcrypt (الافتراضي) أو Argon2id. <strong>لا تخزن</strong> كلمة سر صريحة أو md5/sha1.</p>',
        ],
        [
            'q_en' => 'Remember tokens, password resets',
            'q_ar' => 'Remember Tokens و Password Resets',
            'a_en' => '<p>Use built-in flows. Rolling your own is risky.</p>',
            'a_ar' => '<p>استخدم Flows المُدمجة. كتابة Flow خاصة بك محفوفة بالمخاطر.</p>',
        ],
    ],
],

'lv-authz' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🛡',
    'title_en' => 'Authorization',
    'title_ar' => 'Authorization',
    'desc_en' => 'Gates, Policies, roles & permissions',
    'desc_ar' => 'Gates و Policies والصلاحيات',
    'qa' => [
        [
            'q_en' => 'Gates vs Policies',
            'q_ar' => 'Gates vs Policies',
            'a_en' => '<p><strong>Gates:</strong> closure-based, good for global checks. <strong>Policies:</strong> class-based per model.</p>',
            'a_ar' => '<p><strong>Gates:</strong> Closure للتحقق العام. <strong>Policies:</strong> Class لكل Model.</p>',
        ],
        [
            'q_en' => 'Roles vs Permissions',
            'q_ar' => 'Roles vs Permissions',
            'a_en' => '<p>Don\'t hardcode role checks. Check <strong>permissions</strong>. Roles are bundles of permissions. <code>spatie/laravel-permission</code> is the de-facto.</p>',
            'a_ar' => '<p>لا تربط الكود بأسماء Roles. تحقق من <strong>Permissions</strong>. الـ Roles هي مجموعات Permissions. <code>spatie/laravel-permission</code> هي المكتبة المعتمدة.</p>',
        ],
    ],
],

'lv-sanctum' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🎫',
    'title_en' => 'Sanctum',
    'title_ar' => 'Sanctum',
    'desc_en' => 'SPA cookies, mobile tokens',
    'desc_ar' => 'SPA Cookies و Mobile Tokens',
    'qa' => [
        [
            'q_en' => 'When to use Sanctum?',
            'q_ar' => 'متى تستخدم Sanctum؟',
            'a_en' => '<p>SPAs on same domain (cookie-based session auth), or mobile clients with simple personal access tokens. <strong>Not OAuth2.</strong></p>',
            'a_ar' => '<p>SPAs على نفس الـ Domain (Cookie Session Auth)، أو Mobile Clients مع Personal Access Tokens بسيطة. <strong>ليست OAuth2.</strong></p>',
        ],
        [
            'q_en' => 'SPA flow',
            'q_ar' => 'تدفق SPA',
            'a_en' => '<p><code>/sanctum/csrf-cookie</code> → login → cookie session → API requests stateful via <code>auth:sanctum</code> middleware.</p>',
            'a_ar' => '<p><code>/sanctum/csrf-cookie</code> → login → Cookie Session → API Requests Stateful عبر <code>auth:sanctum</code>.</p>',
        ],
    ],
],

'lv-passport' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🛂',
    'title_en' => 'Passport',
    'title_ar' => 'Passport',
    'desc_en' => 'Full OAuth2 server',
    'desc_ar' => 'OAuth2 Server كامل',
    'qa' => [
        [
            'q_en' => 'When to use Passport?',
            'q_ar' => 'متى تستخدم Passport؟',
            'a_en' => '<p>Full <strong>OAuth2 server</strong>: authorization code, client credentials, refresh tokens. Use when you expose your API to third-party apps.</p>',
            'a_ar' => '<p>OAuth2 Server كامل: Authorization Code و Client Credentials و Refresh Tokens. استخدمه عند فتح API لتطبيقات Third-party.</p>',
        ],
        [
            'q_en' => 'Sanctum vs Passport — senior answer',
            'q_ar' => 'Sanctum vs Passport — إجابة Senior',
            'a_en' => '<p>Pick Sanctum unless you actually need OAuth2 (third-party clients, scopes, consent screens). Sanctum is lighter and covers ~90% of real apps.</p>',
            'a_ar' => '<p>اختر Sanctum إلا إذا كنت بحاجة فعلية لـ OAuth2 (Third-party، Scopes، Consent Screens). Sanctum أخف ويُغطي ~90% من التطبيقات.</p>',
        ],
    ],
],

'lv-resources' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🔄',
    'title_en' => 'API Resources',
    'title_ar' => 'API Resources',
    'desc_en' => 'Transformation layer between models and JSON',
    'desc_ar' => 'طبقة تحويل بين Models و JSON',
    'qa' => [
        [
            'q_en' => 'Why use Resources?',
            'q_ar' => 'لماذا نستخدم Resources؟',
            'a_en' => '<p>Hide internal columns, compute derived fields, handle relations conditionally.</p>',
            'a_ar' => '<p>إخفاء الأعمدة الداخلية، حساب حقول مشتقة، تمرير العلاقات بشكل شرطي.</p>',
            'example' => "class UserResource extends JsonResource {\n    public function toArray(\$r): array {\n        return [\n            'id' => \$this->id,\n            'email' => \$this->email,\n            'posts' => PostResource::collection(\$this->whenLoaded('posts')),\n        ];\n    }\n}",
        ],
    ],
],

'lv-caching' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '⚡',
    'title_en' => 'Caching',
    'title_ar' => 'Caching',
    'desc_en' => 'Strategies, tags, stampedes',
    'desc_ar' => 'استراتيجيات وتاجات وعواصف',
    'qa' => [
        [
            'q_en' => 'Common cache patterns',
            'q_ar' => 'أنماط Caching الشائعة',
            'a_en' => '<ul><li><strong>Cache-aside (lazy):</strong> read cache; miss → fetch → store</li><li><strong>Write-through:</strong> write to cache and DB together</li><li><strong>Write-behind:</strong> async DB write</li><li><strong>TTL + jitter</strong> to prevent stampedes</li></ul>',
            'a_ar' => '<ul><li><strong>Cache-aside (Lazy):</strong> اقرأ من Cache؛ Miss → اجلب → احفظ</li><li><strong>Write-through:</strong> اكتب لـ Cache و DB معًا</li><li><strong>Write-behind:</strong> Write للـ DB غير متزامن</li><li><strong>TTL + Jitter</strong> لمنع الـ Stampedes</li></ul>',
        ],
        [
            'q_en' => 'Cache::remember()',
            'q_ar' => 'Cache::remember()',
            'a_en' => '<p>Helper that handles read-or-fetch-and-store.</p>',
            'a_ar' => '<p>Helper يجمع اقرأ-أو-اجلب-واحفظ.</p>',
            'example' => "\$user = Cache::remember(\"user.\$id\", 600, fn() => User::find(\$id));",
        ],
        [
            'q_en' => 'Cache tags',
            'q_ar' => 'Cache Tags',
            'a_en' => '<p>Only Redis/Memcached. <code>Cache::tags([\'users\'])->flush()</code> invalidates a group.</p>',
            'a_ar' => '<p>تعمل فقط مع Redis/Memcached. <code>Cache::tags([\'users\'])->flush()</code> يُلغي مجموعة.</p>',
        ],
        [
            'q_en' => 'Cache stampede',
            'q_ar' => 'Cache Stampede',
            'a_en' => '<p>When TTL expires, many concurrent requests refill → overwhelms DB. Use <code>Cache::lock()</code> or <code>remember</code> with a single-flight lock.</p>',
            'a_ar' => '<p>عند انتهاء TTL، طلبات متزامنة كثيرة تحاول إعادة التحميل → تُغرق DB. استخدم <code>Cache::lock()</code> أو Single-flight Lock.</p>',
        ],
    ],
],

'lv-testing' => [
    'part' => 'Part II — Laravel', 'part_ar' => 'الجزء الثاني — Laravel',
    'icon' => '🧪',
    'title_en' => 'Testing',
    'title_ar' => 'Testing',
    'desc_en' => 'Unit, Feature, Dusk, factories, fakes',
    'desc_ar' => 'Unit و Feature و Dusk و Factories',
    'qa' => [
        [
            'q_en' => 'Unit vs Feature vs Browser tests',
            'q_ar' => 'Unit vs Feature vs Browser Tests',
            'a_en' => '<p><strong>Unit:</strong> isolated class without framework. <strong>Feature:</strong> exercises HTTP layer with the container. <strong>Browser (Dusk):</strong> end-to-end through a real browser.</p>',
            'a_ar' => '<p><strong>Unit:</strong> Class معزول بدون Framework. <strong>Feature:</strong> يختبر طبقة HTTP مع Container. <strong>Browser (Dusk):</strong> End-to-End بمتصفح حقيقي.</p>',
        ],
        [
            'q_en' => 'Database for tests',
            'q_ar' => 'قاعدة بيانات الاختبارات',
            'a_en' => '<p><code>RefreshDatabase</code> uses transactions per test. Use real DB (Postgres/MySQL), <strong>not SQLite</strong>, for production parity.</p>',
            'a_ar' => '<p><code>RefreshDatabase</code> يستخدم Transactions لكل Test. استخدم DB حقيقية (Postgres/MySQL)، <strong>لا SQLite</strong>، للتوافق مع Production.</p>',
        ],
        [
            'q_en' => 'Factories & Seeders',
            'q_ar' => 'Factories و Seeders',
            'a_en' => '<p>Factories generate models with fake data; use states for variants. Seeders set up baseline reference data.</p>',
            'a_ar' => '<p>Factories تُنشئ Models ببيانات وهمية؛ استخدم States للتنويعات. Seeders تُعد بيانات أساسية.</p>',
        ],
        [
            'q_en' => 'Mocks vs Fakes',
            'q_ar' => 'Mocks vs Fakes',
            'a_en' => '<p>Laravel ships fakes: <code>Bus::fake()</code>, <code>Queue::fake()</code>, <code>Notification::fake()</code>, <code>Event::fake()</code>, <code>Storage::fake()</code>, <code>Http::fake()</code>. Prefer fakes over hand-rolled mocks.</p>',
            'a_ar' => '<p>Laravel توفر Fakes جاهزة. فضّل Fakes على Mocks اليدوية.</p>',
        ],
    ],
],

];
