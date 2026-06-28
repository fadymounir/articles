<?php
/** Part VI — System Design */

return [

'sd-url-shortener' => [
    'part' => 'Part VI — System Design', 'part_ar' => 'الجزء السادس — System Design',
    'icon' => '🔗',
    'title_en' => 'URL Shortener (TinyURL / Bitly)',
    'title_ar' => 'URL Shortener',
    'desc_en' => 'Key generation, storage, redirect path',
    'desc_ar' => 'توليد المفتاح والتخزين ومسار التوجيه',
    'qa' => [
        [
            'q_en' => 'Requirements',
            'q_ar' => 'المتطلبات',
            'a_en' => '<p><strong>Functional:</strong> shorten URL, redirect, custom alias, analytics. <strong>Non-functional:</strong> ~100:1 read:write, very low redirect latency, 99.99% availability.</p>',
            'a_ar' => '<p><strong>وظيفية:</strong> تقصير URL، توجيه، Alias مخصص، تحليلات. <strong>غير وظيفية:</strong> 100:1 قراءة:كتابة، Latency منخفض جدًا، 99.99% Availability.</p>',
        ],
        [
            'q_en' => 'Capacity estimation',
            'q_ar' => 'تقدير السعة',
            'a_en' => '<p>500M new URLs / month → ~200 writes/sec. Reads ~20K/sec. 10-year storage: ~60B URLs. With ~500B/record → ~30TB.</p>',
            'a_ar' => '<p>500 مليون URL جديد شهريًا → ~200 Write/ثانية. القراءات ~20K/ثانية. تخزين 10 سنوات: ~60B URL. مع ~500 بايت/سجل → ~30TB.</p>',
        ],
        [
            'q_en' => 'Key generation',
            'q_ar' => 'توليد المفتاح',
            'a_en' => '<ul><li><strong>Base62</strong> of an auto-increment ID (predictable; avoid)</li><li><strong>Pre-generated key pool</strong> in a key-gen service (clean, scalable)</li><li><strong>Hash + collision retry</strong> (MD5/SHA-1 truncated)</li></ul>',
            'a_ar' => '<ul><li><strong>Base62</strong> لـ Auto-increment ID (متوقّع؛ تجنبه)</li><li><strong>Pre-generated Key Pool</strong> في Key-gen Service (نظيف وقابل للتوسع)</li><li><strong>Hash + Collision Retry</strong> (MD5/SHA-1 مقصوصة)</li></ul>',
        ],
        [
            'q_en' => 'Storage & redirect path',
            'q_ar' => 'التخزين ومسار التوجيه',
            'a_en' => '<p>Key-value friendly: DynamoDB / Cassandra. Or partitioned Postgres by key prefix. Redirect path: CDN edge → cache (Redis) → DB. Use 301 (cacheable) for stable mappings, 302 for fresh analytics.</p>',
            'a_ar' => '<p>Key-value مناسب: DynamoDB / Cassandra. أو Postgres مُقسّم. مسار التوجيه: CDN Edge → Cache (Redis) → DB. استخدم 301 (Cacheable) للروابط الثابتة، و 302 للتحليلات الحية.</p>',
        ],
    ],
],

'sd-amazon' => [
    'part' => 'Part VI — System Design', 'part_ar' => 'الجزء السادس — System Design',
    'icon' => '🛒',
    'title_en' => 'Amazon (E-commerce)',
    'title_ar' => 'Amazon',
    'desc_en' => 'Catalog, search, inventory, orders, saga',
    'desc_ar' => 'الكتالوج والبحث والمخزون و Saga',
    'qa' => [
        [
            'q_en' => 'Core services',
            'q_ar' => 'الخدمات الأساسية',
            'a_en' => '<p>Catalog, Search, Cart, Pricing, Inventory, Orders, Payments, Shipping, Reviews, Recommendations, Notifications, Identity.</p>',
            'a_ar' => '<p>الكتالوج، البحث، السلة، التسعير، المخزون، الطلبات، الدفع، الشحن، التقييمات، التوصيات، الإشعارات، الهوية.</p>',
        ],
        [
            'q_en' => 'Catalog & Search',
            'q_ar' => 'الكتالوج والبحث',
            'a_en' => '<p>Catalog → Postgres / DynamoDB. Search → <strong>Elasticsearch / OpenSearch</strong>. Catalog change events sync to the search index via CDC.</p>',
            'a_ar' => '<p>الكتالوج → Postgres / DynamoDB. البحث → <strong>Elasticsearch / OpenSearch</strong>. تغييرات الكتالوج تتزامن مع فهرس البحث عبر CDC.</p>',
        ],
        [
            'q_en' => 'Inventory consistency',
            'q_ar' => 'اتساق المخزون',
            'a_en' => '<p>Hot-spot risk on popular SKUs. Reserve stock at "add to cart" with TTL, or commit at order placement using SELECT FOR UPDATE / optimistic version columns. Watch for oversells under partition.</p>',
            'a_ar' => '<p>خطر Hot-spot على SKUs الشهيرة. احجز المخزون عند "إضافة للسلة" مع TTL، أو احفظ عند الطلب باستخدام SELECT FOR UPDATE. احذر Oversells تحت Partition.</p>',
        ],
        [
            'q_en' => 'Order placement = Saga',
            'q_ar' => 'إنشاء الطلب = Saga',
            'a_en' => '<p>Distributed transaction across cart, inventory, payment, shipping. Use an orchestrator saga with compensating actions.</p>',
            'a_ar' => '<p>Transaction موزعة عبر السلة والمخزون والدفع والشحن. استخدم Orchestrator Saga مع Compensating Actions.</p>',
        ],
    ],
],

'sd-whatsapp' => [
    'part' => 'Part VI — System Design', 'part_ar' => 'الجزء السادس — System Design',
    'icon' => '💬',
    'title_en' => 'WhatsApp',
    'title_ar' => 'WhatsApp',
    'desc_en' => 'WebSocket, message flow, E2E encryption',
    'desc_ar' => 'WebSocket وتدفق الرسائل والتشفير',
    'qa' => [
        [
            'q_en' => 'Core problem',
            'q_ar' => 'المشكلة الأساسية',
            'a_en' => '<p>Billions of users, billions of messages/day, real-time delivery, group chats, end-to-end encryption, offline delivery.</p>',
            'a_ar' => '<p>مليارات المستخدمين، مليارات الرسائل يوميًا، توصيل لحظي، Group Chats، تشفير End-to-End، توصيل Offline.</p>',
        ],
        [
            'q_en' => 'Connection model',
            'q_ar' => 'نموذج الاتصال',
            'a_en' => '<p>Persistent connections via <strong>WebSocket</strong> / XMPP-like protocol. Connection managers (stateful) keep socket → user mapping. Sticky routing.</p>',
            'a_ar' => '<p>اتصالات مستمرة عبر <strong>WebSocket</strong> / بروتوكول شبيه بـ XMPP. Connection Managers تحتفظ بربط Socket → User. Sticky Routing.</p>',
        ],
        [
            'q_en' => 'Message flow',
            'q_ar' => 'تدفق الرسائل',
            'a_en' => '<p>Sender → connection node → queue → receiver\'s connection node (if online) → device. If offline, store in inbox; deliver on reconnect; clear after ack.</p>',
            'a_ar' => '<p>المرسل → Connection Node → Queue → Connection Node للمستقبل (إن كان Online) → الجهاز. إن كان Offline، خزّن في Inbox؛ سلّم عند إعادة الاتصال؛ امسح بعد ACK.</p>',
        ],
        [
            'q_en' => 'E2E encryption',
            'q_ar' => 'تشفير E2E',
            'a_en' => '<p>Signal Protocol (Double Ratchet). Server never holds plaintext or keys.</p>',
            'a_ar' => '<p>بروتوكول Signal (Double Ratchet). Server لا يحمل أبدًا النص الخام أو المفاتيح.</p>',
        ],
    ],
],

'sd-uber' => [
    'part' => 'Part VI — System Design', 'part_ar' => 'الجزء السادس — System Design',
    'icon' => '🚗',
    'title_en' => 'Uber',
    'title_ar' => 'Uber',
    'desc_en' => 'Geo-index, dispatch, surge pricing',
    'desc_ar' => 'الفهارس الجغرافية و Dispatch و Surge',
    'qa' => [
        [
            'q_en' => 'Core problem',
            'q_ar' => 'المشكلة الأساسية',
            'a_en' => '<p>Match riders to nearby drivers in real time, with ETAs, surge pricing, payments, and trip tracking.</p>',
            'a_ar' => '<p>مطابقة الركاب مع سائقين قريبين في الوقت الفعلي مع ETAs و Surge Pricing والدفع وتتبع الرحلة.</p>',
        ],
        [
            'q_en' => 'Geo-index',
            'q_ar' => 'Geo Index',
            'a_en' => '<p>Drivers stream location every few seconds. Server indexes by <strong>geohash / S2 cells / H3 hexagons</strong>. Spatial query: "drivers in cell + neighbors".</p>',
            'a_ar' => '<p>السائقون يبثون موقعهم كل ثوانٍ. Server يفهرسهم عبر <strong>geohash / S2 / H3</strong>. استعلام مكاني: "سائقون في خلية + جيرانها".</p>',
        ],
        [
            'q_en' => 'Dispatch',
            'q_ar' => 'Dispatch',
            'a_en' => '<p>Stream platform (Kafka) + matching service that holds in-memory state per region (DISCO at Uber). Match → notify driver → confirm → trip created.</p>',
            'a_ar' => '<p>Stream Platform (Kafka) + Matching Service مع State في الذاكرة لكل منطقة (DISCO عند Uber). Match → إشعار للسائق → تأكيد → إنشاء الرحلة.</p>',
        ],
        [
            'q_en' => 'Surge pricing & payments',
            'q_ar' => 'Surge Pricing والدفع',
            'a_en' => '<p>Real-time demand/supply ratio per cell. Async ledger updates with idempotency keys; eventual consistency to user-facing receipt.</p>',
            'a_ar' => '<p>نسبة Demand/Supply لحظية لكل خلية. تحديثات Ledger غير متزامنة مع Idempotency Keys؛ Eventual Consistency للإيصال.</p>',
        ],
    ],
],

'sd-booking' => [
    'part' => 'Part VI — System Design', 'part_ar' => 'الجزء السادس — System Design',
    'icon' => '🏨',
    'title_en' => 'Booking (Hotels / Flights)',
    'title_ar' => 'Booking',
    'desc_en' => 'Search, inventory locking, supplier APIs',
    'desc_ar' => 'البحث وقفل المخزون و APIs الموردين',
    'qa' => [
        [
            'q_en' => 'Core problem',
            'q_ar' => 'المشكلة الأساسية',
            'a_en' => '<p>Search inventory, hold seats/rooms, prevent double-booking, support cancellations and refunds.</p>',
            'a_ar' => '<p>البحث في المخزون، حجز المقاعد/الغرف، منع Double-booking، دعم الإلغاءات والاستردادات.</p>',
        ],
        [
            'q_en' => 'Inventory locking',
            'q_ar' => 'قفل المخزون',
            'a_en' => '<p>Short-lived holds (5–10 min) — atomic decrement (Redis Lua) or DB row lock. Expire automatically if the user doesn\'t pay.</p>',
            'a_ar' => '<p>حجوزات قصيرة المدى (5-10 دقائق) — Atomic Decrement (Redis Lua) أو DB Row Lock. تنتهي تلقائيًا إن لم يدفع المستخدم.</p>',
        ],
        [
            'q_en' => 'Supplier integration',
            'q_ar' => 'دمج الموردين',
            'a_en' => '<p>Hexagonal architecture; adapter per supplier. Use sagas for partner failures.</p>',
            'a_ar' => '<p>Hexagonal Architecture؛ Adapter لكل مورد. استخدم Sagas لفشل الشركاء.</p>',
        ],
    ],
],

'sd-notification' => [
    'part' => 'Part VI — System Design', 'part_ar' => 'الجزء السادس — System Design',
    'icon' => '📨',
    'title_en' => 'Notification Service',
    'title_ar' => 'Notification Service',
    'desc_en' => 'Email, SMS, push at scale',
    'desc_ar' => 'بريد و SMS و Push على نطاق واسع',
    'qa' => [
        [
            'q_en' => 'Goal',
            'q_ar' => 'الهدف',
            'a_en' => '<p>Deliver emails, SMS, push, in-app to billions of users with retry, rate limits, dedupe, scheduling, and per-user preferences.</p>',
            'a_ar' => '<p>توصيل بريد و SMS و Push و In-app لمليارات المستخدمين مع Retry و Rate Limits و Dedupe و Scheduling وتفضيلات لكل مستخدم.</p>',
        ],
        [
            'q_en' => 'Architecture',
            'q_ar' => 'البنية',
            'a_en' => '<p>Producers → Notification API → Queue (Kafka/SQS) → Channel Workers (Email/SMS/Push) → Provider (SES, Twilio, FCM). Retry &amp; DLQ per channel.</p>',
            'a_ar' => '<p>Producers → Notification API → Queue (Kafka/SQS) → Channel Workers → Provider (SES, Twilio, FCM). Retry + DLQ لكل قناة.</p>',
        ],
        [
            'q_en' => 'Idempotency & dedupe',
            'q_ar' => 'Idempotency و Dedupe',
            'a_en' => '<p>Each notification has an idempotency key. Dedupe table or Redis SET with TTL prevents duplicates from producer retries.</p>',
            'a_ar' => '<p>كل Notification له Idempotency Key. جدول Dedupe أو Redis SET مع TTL يمنع التكرار من إعادة محاولة المنتج.</p>',
        ],
        [
            'q_en' => 'Rate limits',
            'q_ar' => 'Rate Limits',
            'a_en' => '<p>Per provider, per recipient, per channel. Token bucket implemented in Redis.</p>',
            'a_ar' => '<p>لكل Provider ولكل مستلم ولكل قناة. Token Bucket في Redis.</p>',
        ],
    ],
],

'sd-payment' => [
    'part' => 'Part VI — System Design', 'part_ar' => 'الجزء السادس — System Design',
    'icon' => '💳',
    'title_en' => 'Payment Gateway',
    'title_ar' => 'Payment Gateway',
    'desc_en' => 'Idempotency, ledger, reconciliation',
    'desc_ar' => 'Idempotency والـ Ledger والمطابقة',
    'qa' => [
        [
            'q_en' => 'Hard requirements',
            'q_ar' => 'المتطلبات الصارمة',
            'a_en' => '<p>Strong consistency. <strong>No double charges.</strong> PCI scope minimization. Audit trail. High availability. Idempotency end-to-end.</p>',
            'a_ar' => '<p>اتساق قوي. <strong>لا Double Charges.</strong> تقليل نطاق PCI. Audit Trail. توفر عالٍ. Idempotency من البداية للنهاية.</p>',
        ],
        [
            'q_en' => 'Core flow',
            'q_ar' => 'التدفق الأساسي',
            'a_en' => '<p>Tokenize card → Authorize → Capture → Settle. Webhook receivers + reconciliation jobs vs the processor.</p>',
            'a_ar' => '<p>Tokenize → Authorize → Capture → Settle. مستقبلو Webhooks + Jobs المطابقة مع المعالج.</p>',
        ],
        [
            'q_en' => 'Idempotency-Key',
            'q_ar' => 'Idempotency-Key',
            'a_en' => '<p>Every mutating endpoint accepts an Idempotency-Key. Server stores (key, response); replays return the same response.</p>',
            'a_ar' => '<p>كل Endpoint مُعدِّل يقبل Idempotency-Key. Server يخزن (key, response)؛ التكرار يُرجع نفس الرد.</p>',
        ],
        [
            'q_en' => 'Ledger',
            'q_ar' => 'Ledger',
            'a_en' => '<p>Double-entry, append-only. Don\'t update balances in place — derive from journal. Run reconciliation against the processor daily.</p>',
            'a_ar' => '<p>Double-entry وأنه Append-only. لا تُحدّث الأرصدة مباشرة — اشتقها من Journal. شغل المطابقة مع المعالج يوميًا.</p>',
        ],
        [
            'q_en' => 'Webhook delivery',
            'q_ar' => 'توصيل Webhooks',
            'a_en' => '<p>Signed payloads (HMAC), retries with backoff, at-least-once delivery → consumers must be idempotent.</p>',
            'a_ar' => '<p>Payloads موقعة (HMAC)، Retries مع Backoff، توصيل At-least-once → المستهلكون يجب أن يكونوا Idempotent.</p>',
        ],
    ],
],

'sd-chat' => [
    'part' => 'Part VI — System Design', 'part_ar' => 'الجزء السادس — System Design',
    'icon' => '💭',
    'title_en' => 'Chat Application',
    'title_ar' => 'تطبيق محادثة',
    'desc_en' => 'Fan-out, ordering, read receipts',
    'desc_ar' => 'Fan-out والترتيب وإيصالات القراءة',
    'qa' => [
        [
            'q_en' => 'Components',
            'q_ar' => 'المكونات',
            'a_en' => '<p>Auth, presence, connection manager (WebSocket), message service, fan-out service (groups), history store, push for offline, media service.</p>',
            'a_ar' => '<p>Auth و Presence و Connection Manager (WebSocket) و Message Service و Fan-out Service (مجموعات) و History Store و Push للـ Offline و Media Service.</p>',
        ],
        [
            'q_en' => 'Fan-out',
            'q_ar' => 'Fan-out',
            'a_en' => '<p><strong>Fan-out on write:</strong> push to each recipient\'s inbox. <strong>Fan-out on read:</strong> pull from a shared timeline. Chats use fan-out on write.</p>',
            'a_ar' => '<p><strong>Fan-out on Write:</strong> ادفع لـ Inbox كل مستلم. <strong>Fan-out on Read:</strong> اسحب من Timeline مشترك. المحادثات تستخدم Fan-out on Write.</p>',
        ],
        [
            'q_en' => 'Ordering & dedupe',
            'q_ar' => 'الترتيب والـ Dedupe',
            'a_en' => '<p>Monotonic message IDs per conversation (snowflake). Client dedupes by ID.</p>',
            'a_ar' => '<p>IDs رسائل متزايدة لكل محادثة (Snowflake). العميل يزيل التكرار بالـ ID.</p>',
        ],
        [
            'q_en' => 'Read receipts & typing',
            'q_ar' => 'إيصالات القراءة والكتابة',
            'a_en' => '<p>Lightweight events on a separate topic; not durable.</p>',
            'a_ar' => '<p>Events خفيفة على Topic منفصل؛ ليست Durable.</p>',
        ],
    ],
],

];
