<?php
/** Part XVI — Networking */

return [

'net-http' => [
    'part' => 'Part XVI — Networking', 'part_ar' => 'الجزء السادس عشر — الشبكات',
    'icon' => '🌐',
    'title_en' => 'HTTP/1.1 vs HTTP/2 vs HTTP/3',
    'title_ar' => 'HTTP/1.1 vs HTTP/2 vs HTTP/3',
    'desc_en' => 'Multiplexing, head-of-line blocking, QUIC',
    'desc_ar' => 'Multiplexing و HoL Blocking و QUIC',
    'qa' => [
        [
            'q_en' => 'HTTP/1.1 limitations',
            'q_ar' => 'حدود HTTP/1.1',
            'a_en' => '<p>One in-flight request per TCP connection (pipelining never worked in practice). Browsers open 6 connections per origin. Result: <strong>head-of-line blocking</strong>, slow page loads, lots of TCP overhead.</p>',
            'a_ar' => '<p>طلب واحد في الـ Flight لكل اتصال TCP (Pipelining لم ينجح عمليًا). المتصفحات تفتح 6 اتصالات لكل Origin. النتيجة: <strong>HoL Blocking</strong>، تحميل صفحات بطيء، Overhead كثيف لـ TCP.</p>',
        ],
        [
            'q_en' => 'HTTP/2 improvements',
            'q_ar' => 'تحسينات HTTP/2',
            'a_en' => '<ul><li><strong>Multiplexing:</strong> many streams per TCP connection</li><li><strong>HPACK header compression</strong></li><li><strong>Server push</strong> (now deprecated by browsers)</li><li>Still vulnerable to TCP-level head-of-line blocking — a lost packet stalls all streams</li></ul>',
            'a_ar' => '<ul><li><strong>Multiplexing:</strong> عدة Streams على اتصال TCP واحد</li><li><strong>HPACK ضغط Headers</strong></li><li><strong>Server Push</strong> (هُجر الآن)</li><li>لا يزال يعاني من HoL على مستوى TCP — حزمة ضائعة تعطل كل Streams</li></ul>',
        ],
        [
            'q_en' => 'HTTP/3 + QUIC',
            'q_ar' => 'HTTP/3 + QUIC',
            'a_en' => '<p>HTTP/3 runs over <strong>QUIC</strong> (UDP). Streams are independent → no TCP-level HoL. 0-RTT handshake for resumed connections. Connection survives IP changes (great for mobile). TLS 1.3 is built in.</p>',
            'a_ar' => '<p>HTTP/3 يعمل فوق <strong>QUIC</strong> (UDP). الـ Streams مستقلة → لا HoL على مستوى TCP. مصافحة 0-RTT للاتصالات المستأنفة. الاتصال يصمد عند تغير IP (ممتاز للموبايل). TLS 1.3 مدمج.</p>',
        ],
        [
            'q_en' => 'How do I serve HTTP/3 today?',
            'q_ar' => 'كيف أقدم HTTP/3 اليوم؟',
            'a_en' => '<p><strong>Caddy</strong>, <strong>nginx ≥1.25</strong>, <strong>FrankenPHP</strong>, <strong>Cloudflare</strong> all support it. Browsers auto-upgrade via the <code>Alt-Svc</code> header. Most of the work is configuration; your PHP code doesn\'t change.</p>',
            'a_ar' => '<p><strong>Caddy</strong> و <strong>nginx ≥1.25</strong> و <strong>FrankenPHP</strong> و <strong>Cloudflare</strong> كلها تدعمه. المتصفحات تتطور تلقائيًا عبر Header الـ <code>Alt-Svc</code>. معظم العمل إعدادات؛ كود PHP لا يتغير.</p>',
        ],
    ],
],

'net-tls-dns-cdn' => [
    'part' => 'Part XVI — Networking', 'part_ar' => 'الجزء السادس عشر — الشبكات',
    'icon' => '🔐',
    'title_en' => 'TLS, DNS, CDN essentials',
    'title_ar' => 'أساسيات TLS و DNS و CDN',
    'desc_en' => 'Handshake, DNS resolution, CDN cache invalidation',
    'desc_ar' => 'المصافحة، حل DNS، إبطال Cache في CDN',
    'qa' => [
        [
            'q_en' => 'TLS 1.3 handshake summary',
            'q_ar' => 'ملخص مصافحة TLS 1.3',
            'a_en' => '<p>1-RTT: ClientHello (with key share) → ServerHello + certificate + Finished → Client Finished + application data. Resumed sessions can do 0-RTT (with replay-attack tradeoffs).</p>',
            'a_ar' => '<p>1-RTT: ClientHello (مع Key Share) → ServerHello + Certificate + Finished → Client Finished + بيانات. الاتصالات المستأنفة يمكنها 0-RTT (مع مقايضات Replay-attack).</p>',
        ],
        [
            'q_en' => 'DNS in production',
            'q_ar' => 'DNS في الإنتاج',
            'a_en' => '<ul><li>Use short TTLs (60-300s) for things you might fail over</li><li>Use long TTLs (24h+) for stable records — reduces query load</li><li><strong>DNS caching at the resolver</strong> can hide outages for hours; engineers underestimate this</li><li><strong>Multi-value records</strong> + health checks (Route 53) for client-side load balancing</li><li><strong>CNAME at the apex</strong> isn\'t valid → use ALIAS / ANAME records</li></ul>',
            'a_ar' => '<ul><li>استخدم TTLs قصيرة (60-300 ث) للسجلات القابلة للـ Failover</li><li>طويلة (24h+) للمستقرة</li><li><strong>DNS Caching عند Resolver</strong> قد يُخفي أعطالاً لساعات</li><li><strong>Multi-value Records</strong> + Health Checks للـ LB من الـ Client</li><li><strong>CNAME عند Apex</strong> غير صالح → استخدم ALIAS / ANAME</li></ul>',
        ],
        [
            'q_en' => 'CDN cache layers',
            'q_ar' => 'طبقات Cache في CDN',
            'a_en' => '<p>Browser → Edge POP → Mid-tier → Origin Shield → Origin. Each layer can cache. Use <code>Cache-Control: s-maxage</code> for CDN-only TTL, <code>stale-while-revalidate</code> for warm fallback, and a deterministic <strong>cache key</strong> (no random query strings).</p>',
            'a_ar' => '<p>Browser → Edge POP → Mid-tier → Origin Shield → Origin. كل طبقة قد تُعمل Cache. استخدم <code>Cache-Control: s-maxage</code> للـ CDN فقط، <code>stale-while-revalidate</code> للـ Fallback الدافئ، و <strong>Cache Key</strong> ثابت (بدون Query Strings عشوائية).</p>',
        ],
        [
            'q_en' => 'Cache invalidation strategies',
            'q_ar' => 'استراتيجيات إبطال الـ Cache',
            'a_en' => '<ol><li><strong>Versioned URLs</strong> (<code>/app.v17.js</code>) — best, immutable</li><li><strong>Surrogate keys / tags</strong> (Fastly, Varnish) — purge by tag on data change</li><li><strong>Explicit purge API</strong> — last resort, slow + costly</li></ol>',
            'a_ar' => '<ol><li><strong>URLs بإصدار</strong> (<code>/app.v17.js</code>) — الأفضل وغير قابل للتغيير</li><li><strong>Surrogate Keys / Tags</strong> (Fastly, Varnish) — Purge بالـ Tag عند تغير البيانات</li><li><strong>API Purge صريح</strong> — كملاذ أخير، بطيء ومكلف</li></ol>',
        ],
    ],
],

'net-realtime' => [
    'part' => 'Part XVI — Networking', 'part_ar' => 'الجزء السادس عشر — الشبكات',
    'icon' => '⚡',
    'title_en' => 'WebSocket vs SSE vs Long Polling',
    'title_ar' => 'WebSocket vs SSE vs Long Polling',
    'desc_en' => 'Real-time options compared',
    'desc_ar' => 'خيارات الـ Real-time مقارنة',
    'qa' => [
        [
            'q_en' => 'Quick comparison',
            'q_ar' => 'مقارنة سريعة',
            'a_en' => '',
            'a_ar' => '',
            'extra_html_en' => '<table><tr><th></th><th>Long Polling</th><th>SSE</th><th>WebSocket</th></tr><tr><td>Direction</td><td>Client→Server (one shot at a time)</td><td>Server→Client only</td><td>Bi-directional</td></tr><tr><td>Protocol</td><td>HTTP</td><td>HTTP (text/event-stream)</td><td>ws:// (HTTP upgrade)</td></tr><tr><td>Reconnect</td><td>Manual</td><td>Automatic</td><td>Manual</td></tr><tr><td>Browser support</td><td>Universal</td><td>All except old IE</td><td>Universal</td></tr><tr><td>Best for</td><td>Quick fix, legacy</td><td>Notifications, stock prices, server logs</td><td>Chats, games, collaborative editing</td></tr></table>',
            'extra_html_ar' => '<table><tr><th></th><th>Long Polling</th><th>SSE</th><th>WebSocket</th></tr><tr><td>الاتجاه</td><td>Client→Server</td><td>Server→Client فقط</td><td>ثنائي الاتجاه</td></tr><tr><td>البروتوكول</td><td>HTTP</td><td>HTTP (text/event-stream)</td><td>ws:// (HTTP Upgrade)</td></tr><tr><td>إعادة الاتصال</td><td>يدوي</td><td>تلقائي</td><td>يدوي</td></tr><tr><td>دعم المتصفح</td><td>عام</td><td>كل المتصفحات تقريبًا</td><td>عام</td></tr><tr><td>الأنسب لـ</td><td>إصلاح سريع</td><td>إشعارات وأسعار وLogs</td><td>محادثات وألعاب وتحرير تشاركي</td></tr></table>',
        ],
        [
            'q_en' => 'When SSE beats WebSocket',
            'q_ar' => 'متى SSE أفضل من WebSocket',
            'a_en' => '<p>Server-pushed, one-way streams (notifications, dashboards, AI token streaming). SSE works through plain HTTP/2, supports auto-reconnect with <code>Last-Event-ID</code>, and is dead-simple in browsers (<code>EventSource</code>).</p>',
            'a_ar' => '<p>Streams من السيرفر بـ اتجاه واحد (إشعارات، Dashboards، Streaming Tokens من LLM). SSE يعمل عبر HTTP/2 عادي، يدعم إعادة الاتصال تلقائيًا مع <code>Last-Event-ID</code>، وبسيط جدًا في المتصفح (<code>EventSource</code>).</p>',
        ],
        [
            'q_en' => 'WebSocket scaling concerns',
            'q_ar' => 'تحديات Scaling لـ WebSocket',
            'a_en' => '<p>Persistent connections = stateful. Need sticky sessions or a pub/sub layer (Redis pub/sub, NATS, Kafka) so any node can fan out to any subscriber. Plan for <strong>file descriptors</strong>, <strong>ephemeral port exhaustion</strong>, and <strong>graceful drain</strong> on deploy.</p>',
            'a_ar' => '<p>اتصالات مستمرة = Stateful. تحتاج Sticky Sessions أو طبقة Pub/Sub (Redis Pub/Sub, NATS, Kafka) حتى يستطيع أي Node Fan-out لأي مشترك. خطط لـ <strong>File Descriptors</strong> و <strong>Ephemeral Port Exhaustion</strong> و <strong>Graceful Drain</strong> عند النشر.</p>',
        ],
    ],
],

];
