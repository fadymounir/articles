<?php
/** Part XIV — Microservices & Resilience */

return [

'ms-circuit-breaker' => [
    'part' => 'Part XIV — Microservices', 'part_ar' => 'الجزء الرابع عشر — Microservices',
    'icon' => '🔌',
    'title_en' => 'Circuit Breaker, Retry, Bulkhead',
    'title_ar' => 'Circuit Breaker و Retry و Bulkhead',
    'desc_en' => 'Stability patterns for distributed calls',
    'desc_ar' => 'أنماط الاستقرار للاستدعاءات الموزعة',
    'qa' => [
        [
            'q_en' => 'Circuit Breaker — the idea',
            'q_ar' => 'Circuit Breaker — الفكرة',
            'a_en' => '<p>A wrapper around a remote call with three states: <strong>Closed</strong> (calls pass), <strong>Open</strong> (calls fail fast), <strong>Half-Open</strong> (limited probes to test recovery). Stops cascading failure when a downstream is dying.</p>',
            'a_ar' => '<p>غلاف حول استدعاء بعيد بثلاث حالات: <strong>Closed</strong> (الاستدعاءات تمر)، <strong>Open</strong> (فشل سريع)، <strong>Half-Open</strong> (تجارب محدودة لاختبار التعافي). يوقف التتالي عندما تموت Downstream.</p>',
        ],
        [
            'q_en' => 'Retry with exponential backoff + jitter',
            'q_ar' => 'Retry مع Exponential Backoff + Jitter',
            'a_en' => '<p>Retry transient errors only (5xx, timeouts, 429). Wait <code>min(cap, base × 2^attempt)</code> + random jitter to avoid synchronized retry storms. Always cap attempts (3–5). Never retry non-idempotent writes without an idempotency key.</p>',
            'a_ar' => '<p>أعد المحاولة فقط على أخطاء عابرة (5xx, Timeouts, 429). انتظر <code>min(cap, base × 2^attempt)</code> + Jitter عشوائي لتجنب عواصف Retries المتزامنة. حدّ المحاولات (3-5). لا تُعد كتابة غير Idempotent بدون Idempotency Key.</p>',
            'example' => "// Wait time per attempt (ms)\nfor (\$i = 0; \$i < 5; \$i++) {\n    try { return \$client->call(); } catch (\\Throwable \$e) {\n        if (!\$transient(\$e)) throw \$e;\n        usleep(min(10_000_000, 100_000 * (2 ** \$i)) + random_int(0, 100_000));\n    }\n}\nthrow new RetryExhaustedException();",
        ],
        [
            'q_en' => 'Bulkhead pattern',
            'q_ar' => 'نمط Bulkhead',
            'a_en' => '<p>Like ship compartments — isolate pools of resources so a flood in one area doesn\'t sink the whole ship. Concretely: separate HTTP client / thread pool / DB connection pool per downstream so a slow service can\'t starve everyone else.</p>',
            'a_ar' => '<p>مثل غرف السفينة — اعزل مجمعات الموارد حتى لا يُغرق فيضان في منطقة السفينة كلها. عمليًا: افصل HTTP Client / Thread Pool / DB Pool لكل Downstream حتى لا تجوّع خدمة بطيئة الجميع.</p>',
        ],
        [
            'q_en' => 'Timeouts and deadline propagation',
            'q_ar' => 'Timeouts و Deadline Propagation',
            'a_en' => '<p>Always set timeouts — the default in many libs is "forever". Better: <strong>deadline propagation</strong> — pass remaining time downstream so chained calls don\'t exceed the original budget. gRPC supports this natively; HTTP needs a header convention.</p>',
            'a_ar' => '<p>اضبط Timeouts دائمًا — الافتراضي في كثير من المكتبات "للأبد". الأفضل: <strong>Deadline Propagation</strong> — مرّر الوقت المتبقي للأسفل حتى لا تتجاوز الاستدعاءات المتسلسلة الميزانية الأصلية. gRPC يدعمه أصلاً؛ HTTP يحتاج اتفاقًا على Header.</p>',
        ],
    ],
],

'ms-api-gateway' => [
    'part' => 'Part XIV — Microservices', 'part_ar' => 'الجزء الرابع عشر — Microservices',
    'icon' => '🚪',
    'title_en' => 'API Gateway',
    'title_ar' => 'API Gateway',
    'desc_en' => 'Single entry point: auth, rate limit, routing',
    'desc_ar' => 'نقطة دخول موحدة للـ Auth و Rate Limit و Routing',
    'qa' => [
        [
            'q_en' => 'What does an API gateway do?',
            'q_ar' => 'ماذا تفعل API Gateway؟',
            'a_en' => '<ul><li>TLS termination</li><li>Authentication / authorization</li><li>Rate limiting and quotas</li><li>Request/response transformation</li><li>Routing &amp; load balancing to services</li><li>Caching, request shaping</li><li>Observability hooks (logs/metrics/traces)</li></ul>',
            'a_ar' => '<ul><li>إنهاء TLS</li><li>Authentication / Authorization</li><li>Rate Limiting و Quotas</li><li>تحويل Request/Response</li><li>Routing و Load Balancing</li><li>Caching و تشكيل الطلب</li><li>روابط Observability</li></ul>',
        ],
        [
            'q_en' => 'Common API gateways',
            'q_ar' => 'Gateways شائعة',
            'a_en' => '<p>Cloud-managed: AWS API Gateway, GCP Cloud Endpoints, Azure APIM. OSS: <strong>Kong</strong>, <strong>APISIX</strong>, <strong>Tyk</strong>, <strong>Envoy</strong>+control plane. Service mesh ingress (Istio Gateway, Linkerd).</p>',
            'a_ar' => '<p>Cloud-managed: AWS API Gateway و GCP Cloud Endpoints و Azure APIM. OSS: <strong>Kong</strong> و <strong>APISIX</strong> و <strong>Tyk</strong> و <strong>Envoy</strong> + Control Plane. Service Mesh Ingress (Istio Gateway, Linkerd).</p>',
        ],
        [
            'q_en' => 'BFF (Backend for Frontend)',
            'q_ar' => 'BFF (Backend for Frontend)',
            'a_en' => '<p>A small gateway per client type (web, iOS, Android). Each BFF tailors aggregation, fields, and pagination to its client. Decouples mobile release cycles from backend churn.</p>',
            'a_ar' => '<p>Gateway صغير لكل نوع عميل (Web, iOS, Android). كل BFF يُكيّف التجميع والحقول والـ Pagination لعميله. يفصل دورات إصدار الموبايل عن تغييرات الـ Backend.</p>',
        ],
    ],
],

'ms-service-mesh' => [
    'part' => 'Part XIV — Microservices', 'part_ar' => 'الجزء الرابع عشر — Microservices',
    'icon' => '🕸',
    'title_en' => 'Service Mesh',
    'title_ar' => 'Service Mesh',
    'desc_en' => 'Sidecars for mTLS, retries, traffic shaping',
    'desc_ar' => 'Sidecars لـ mTLS و Retries و Traffic Shaping',
    'qa' => [
        [
            'q_en' => 'What is a service mesh?',
            'q_ar' => 'ما هي Service Mesh؟',
            'a_en' => '<p>Cross-cutting networking concerns moved out of app code into a <strong>sidecar proxy</strong> (Envoy/Linkerd-proxy) injected next to each pod. The mesh handles mTLS, retries, timeouts, traffic shifting, observability — your app keeps speaking plain HTTP.</p>',
            'a_ar' => '<p>تنقل اهتمامات الشبكات المتقاطعة من كود التطبيق إلى <strong>Sidecar Proxy</strong> (Envoy/Linkerd-proxy) يُحقن بجانب كل Pod. الـ Mesh تتولى mTLS و Retries و Timeouts و Traffic Shifting و Observability — وتطبيقك يبقى يتحدث HTTP عاديًا.</p>',
        ],
        [
            'q_en' => 'Istio vs Linkerd vs Cilium',
            'q_ar' => 'Istio vs Linkerd vs Cilium',
            'a_en' => '<ul><li><strong>Istio:</strong> most features, highest complexity.</li><li><strong>Linkerd:</strong> simpler, Rust proxy, opinionated.</li><li><strong>Cilium Service Mesh:</strong> eBPF-based, no sidecars, lower overhead.</li></ul>',
            'a_ar' => '<ul><li><strong>Istio:</strong> أكثر مميزات وأعلى تعقيد.</li><li><strong>Linkerd:</strong> أبسط، Proxy بـ Rust، رأيي.</li><li><strong>Cilium Service Mesh:</strong> مبني على eBPF بلا Sidecars، Overhead أقل.</li></ul>',
        ],
        [
            'q_en' => 'When NOT to use a mesh',
            'q_ar' => 'متى لا تستخدم Mesh',
            'a_en' => '<p>Few services, single language, simple traffic. The mesh adds operational complexity, CPU/latency overhead, and learning curve. Reach for one when you have many services in heterogeneous languages, or you need mTLS everywhere.</p>',
            'a_ar' => '<p>قلة خدمات، لغة واحدة، Traffic بسيط. الـ Mesh تضيف تعقيدًا تشغيليًا و CPU/Latency Overhead ومنحنى تعلم. استخدمها عند تعدد الخدمات بلغات مختلفة أو الحاجة لـ mTLS في كل مكان.</p>',
        ],
    ],
],

'ms-grpc-rest-graphql' => [
    'part' => 'Part XIV — Microservices', 'part_ar' => 'الجزء الرابع عشر — Microservices',
    'icon' => '🔄',
    'title_en' => 'gRPC vs REST vs GraphQL',
    'title_ar' => 'gRPC vs REST vs GraphQL',
    'desc_en' => 'When to pick which protocol',
    'desc_ar' => 'متى تختار أيهم',
    'qa' => [
        [
            'q_en' => 'Quick comparison',
            'q_ar' => 'مقارنة سريعة',
            'a_en' => '',
            'a_ar' => '',
            'extra_html_en' => '<table><tr><th></th><th>REST</th><th>gRPC</th><th>GraphQL</th></tr><tr><td>Transport</td><td>HTTP/1 or 2, JSON</td><td>HTTP/2, Protobuf</td><td>HTTP, JSON</td></tr><tr><td>Schema</td><td>OpenAPI (optional)</td><td>.proto (mandatory)</td><td>SDL (mandatory)</td></tr><tr><td>Streaming</td><td>SSE/WebSocket</td><td>Native bidi streaming</td><td>Subscriptions (ws)</td></tr><tr><td>Best for</td><td>Public APIs, simple</td><td>Service-to-service</td><td>Aggregating views, mobile</td></tr><tr><td>Browser support</td><td>Native</td><td>Needs gRPC-Web proxy</td><td>Native</td></tr></table>',
            'extra_html_ar' => '<table><tr><th></th><th>REST</th><th>gRPC</th><th>GraphQL</th></tr><tr><td>النقل</td><td>HTTP/1 أو 2، JSON</td><td>HTTP/2، Protobuf</td><td>HTTP، JSON</td></tr><tr><td>المخطط</td><td>OpenAPI (اختياري)</td><td>.proto (إلزامي)</td><td>SDL (إلزامي)</td></tr><tr><td>Streaming</td><td>SSE/WebSocket</td><td>ثنائي الاتجاه أصلي</td><td>Subscriptions (ws)</td></tr><tr><td>الأنسب لـ</td><td>APIs عامة</td><td>Service-to-service</td><td>تجميع للموبايل</td></tr><tr><td>دعم المتصفح</td><td>أصلي</td><td>يحتاج gRPC-Web</td><td>أصلي</td></tr></table>',
        ],
        [
            'q_en' => 'GraphQL pitfalls',
            'q_ar' => 'مخاطر GraphQL',
            'a_en' => '<ul><li>N+1 query explosion → use DataLoader/batching</li><li>Query complexity attacks → impose depth/complexity limits</li><li>Caching is harder (POST + variable queries)</li><li>Field-level authorization is easy to get wrong</li></ul>',
            'a_ar' => '<ul><li>انفجار Queries من نوع N+1 → استخدم DataLoader/Batching</li><li>هجمات Query Complexity → افرض حدودًا للعمق والتعقيد</li><li>Caching أصعب (POST + متغيرات)</li><li>Field-level Authorization سهل أن يخطئ فيه المرء</li></ul>',
        ],
        [
            'q_en' => 'gRPC strengths',
            'q_ar' => 'نقاط قوة gRPC',
            'a_en' => '<p>Binary Protobuf is smaller/faster. Code generation in many languages. Bidirectional streaming. Strongly typed. Pairs well with service mesh. Best for internal service-to-service calls.</p>',
            'a_ar' => '<p>Protobuf Binary أصغر وأسرع. توليد كود لعدة لغات. Bidirectional Streaming. Typed بقوة. يتكامل مع Service Mesh. الأفضل للنداءات الداخلية بين الخدمات.</p>',
        ],
    ],
],

'ms-api-versioning' => [
    'part' => 'Part XIV — Microservices', 'part_ar' => 'الجزء الرابع عشر — Microservices',
    'icon' => '🏷',
    'title_en' => 'API Versioning',
    'title_ar' => 'API Versioning',
    'desc_en' => 'Strategies and backwards-compatibility rules',
    'desc_ar' => 'الاستراتيجيات وقواعد التوافق للخلف',
    'qa' => [
        [
            'q_en' => 'Strategies',
            'q_ar' => 'الاستراتيجيات',
            'a_en' => '<ul><li><strong>URI:</strong> <code>/v1/users</code> — most common, easy to route</li><li><strong>Header:</strong> <code>Accept: application/vnd.api+json;v=2</code> — clean URLs, harder to debug</li><li><strong>Query string:</strong> <code>?v=2</code> — easy but messy</li></ul>',
            'a_ar' => '<ul><li><strong>URI:</strong> <code>/v1/users</code> — الأشهر، سهل التوجيه</li><li><strong>Header:</strong> <code>Accept: application/vnd.api+json;v=2</code> — URLs نظيفة، أصعب في التصحيح</li><li><strong>Query String:</strong> <code>?v=2</code> — سهل لكن غير أنيق</li></ul>',
        ],
        [
            'q_en' => 'Non-breaking vs breaking changes',
            'q_ar' => 'تغييرات Non-breaking vs Breaking',
            'a_en' => '<p><strong>Safe (additive):</strong> new field, new optional query param, new endpoint, new enum value if client treats unknowns as default. <strong>Breaking:</strong> remove field, rename field, tighten validation, change types, change error codes.</p>',
            'a_ar' => '<p><strong>آمنة (إضافية):</strong> حقل جديد، Query Param اختياري، Endpoint جديد، Enum Value جديد إذا كان العميل يعامل المجهول كافتراضي. <strong>كاسرة:</strong> حذف حقل، إعادة تسمية، تشديد Validation، تغيير أنواع، تغيير أكواد الأخطاء.</p>',
        ],
        [
            'q_en' => 'Deprecation lifecycle',
            'q_ar' => 'دورة حياة الـ Deprecation',
            'a_en' => '<p>Announce → return <code>Deprecation</code>/<code>Sunset</code> headers → log usage to identify callers → contact them → enforce removal after agreed window (6–12 months for public APIs).</p>',
            'a_ar' => '<p>أعلن → أرسل Headers <code>Deprecation</code>/<code>Sunset</code> → سجّل الاستخدام لتعرف من يتصل → تواصل معهم → فرض الإزالة بعد نافذة متفق عليها (6-12 شهرًا للـ APIs العامة).</p>',
        ],
    ],
],

];
