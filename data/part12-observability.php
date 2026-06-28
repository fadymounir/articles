<?php
/** Part XII — Observability */

return [

'obs-pillars' => [
    'part' => 'Part XII — Observability', 'part_ar' => 'الجزء الثاني عشر — Observability',
    'icon' => '👁',
    'title_en' => 'Three Pillars',
    'title_ar' => 'الأركان الثلاثة',
    'desc_en' => 'Logs, metrics, traces — what each is for',
    'desc_en' => 'Logs, metrics, traces — what each is for',
    'desc_ar' => 'Logs و Metrics و Traces — لماذا كل واحد',
    'qa' => [
        [
            'q_en' => 'Monitoring vs Observability',
            'q_ar' => 'Monitoring vs Observability',
            'a_en' => '<p><strong>Monitoring:</strong> known unknowns — dashboards & alerts on metrics you already track. <strong>Observability:</strong> unknown unknowns — ability to ask new questions of your system after the fact (via rich, high-cardinality data).</p>',
            'a_ar' => '<p><strong>Monitoring:</strong> الـ Known Unknowns — Dashboards و Alerts على Metrics تتابعها أصلاً. <strong>Observability:</strong> الـ Unknown Unknowns — القدرة على طرح أسئلة جديدة عن النظام بأثر رجعي عبر بيانات غنية وعالية Cardinality.</p>',
        ],
        [
            'q_en' => 'Three pillars: logs, metrics, traces',
            'q_ar' => 'الأركان الثلاثة: Logs و Metrics و Traces',
            'a_en' => '<ul><li><strong>Logs:</strong> discrete events with context. Cheap to write, expensive to query at scale. Use <strong>structured (JSON)</strong> logs with correlation IDs.</li><li><strong>Metrics:</strong> numeric time-series (counters, gauges, histograms). Cheap to query, low cardinality only.</li><li><strong>Traces:</strong> causal chain of spans across services. Best for understanding latency and dependencies.</li></ul>',
            'a_ar' => '<ul><li><strong>Logs:</strong> أحداث منفصلة بسياق. رخيصة الكتابة، باهظة الاستعلام. استخدم <strong>Logs مهيكلة (JSON)</strong> مع Correlation IDs.</li><li><strong>Metrics:</strong> Time-series رقمية (Counters, Gauges, Histograms). رخيصة الاستعلام، Cardinality منخفض فقط.</li><li><strong>Traces:</strong> سلسلة سببية من Spans عبر الخدمات. الأفضل لفهم الـ Latency و Dependencies.</li></ul>',
        ],
        [
            'q_en' => 'Correlation IDs',
            'q_ar' => 'Correlation IDs',
            'a_en' => '<p>One ID flows through every log line and span for a single request — generated at the edge, propagated via <code>X-Request-Id</code>/<code>traceparent</code>. Without it, debugging distributed systems is brutal.</p>',
            'a_ar' => '<p>ID واحد يمر عبر كل سطر Log و Span للطلب الواحد — يُولّد عند Edge ويُمرر عبر <code>X-Request-Id</code>/<code>traceparent</code>. بدونه، تصحيح الأنظمة الموزعة كابوس.</p>',
        ],
    ],
],

'obs-otel' => [
    'part' => 'Part XII — Observability', 'part_ar' => 'الجزء الثاني عشر — Observability',
    'icon' => '📡',
    'title_en' => 'OpenTelemetry',
    'title_ar' => 'OpenTelemetry',
    'desc_en' => 'Vendor-neutral spec for traces, metrics, logs',
    'desc_ar' => 'معيار محايد للـ Traces و Metrics و Logs',
    'qa' => [
        [
            'q_en' => 'What is OpenTelemetry?',
            'q_ar' => 'ما هي OpenTelemetry؟',
            'a_en' => '<p>An open standard (CNCF) for generating and exporting telemetry: traces, metrics, and logs. Replaces vendor-specific SDKs — instrument once, export to Jaeger, Tempo, Datadog, New Relic, anything.</p>',
            'a_ar' => '<p>معيار مفتوح (CNCF) لتوليد وتصدير Telemetry: Traces و Metrics و Logs. يستبدل SDKs المُرتبطة بـ Vendor — Instrument مرة واحدة، صدّر لـ Jaeger أو Tempo أو Datadog أو أي شيء.</p>',
        ],
        [
            'q_en' => 'Core concepts',
            'q_ar' => 'المفاهيم الأساسية',
            'a_en' => '<ul><li><strong>Span:</strong> one unit of work with start/end + attributes.</li><li><strong>Trace:</strong> a tree of spans sharing a trace ID.</li><li><strong>Context propagation:</strong> <code>traceparent</code> header (W3C Trace Context).</li><li><strong>Resource:</strong> the entity emitting telemetry (service name, version, host).</li><li><strong>Collector:</strong> receives, processes, exports.</li></ul>',
            'a_ar' => '<ul><li><strong>Span:</strong> وحدة عمل بـ Start/End + Attributes.</li><li><strong>Trace:</strong> شجرة Spans تشترك في Trace ID.</li><li><strong>Context Propagation:</strong> Header الـ <code>traceparent</code> (W3C Trace Context).</li><li><strong>Resource:</strong> الكيان المُرسل (Service Name, Version, Host).</li><li><strong>Collector:</strong> يستقبل ويُعالج ويُصدّر.</li></ul>',
        ],
        [
            'q_en' => 'Sampling strategies',
            'q_ar' => 'استراتيجيات Sampling',
            'a_en' => '<p>Tracing every request is expensive. <strong>Head-based:</strong> decide at start (random %). <strong>Tail-based:</strong> decide at end (keep errors and slow requests). Tail sampling at the Collector is the production sweet spot.</p>',
            'a_ar' => '<p>تتبع كل Request مكلف. <strong>Head-based:</strong> قرار في البداية (نسبة عشوائية). <strong>Tail-based:</strong> قرار في النهاية (احتفظ بالأخطاء و Requests البطيئة). Tail Sampling في الـ Collector هو الخيار الأمثل في الإنتاج.</p>',
        ],
        [
            'q_en' => 'PHP / Laravel instrumentation',
            'q_ar' => 'Instrumentation في PHP / Laravel',
            'a_en' => '<p><code>open-telemetry/opentelemetry</code> SDK + auto-instrumentation extensions for Laravel, Guzzle, PDO. Spans propagate via <code>traceparent</code> on outbound HTTP. Export to OTLP collector.</p>',
            'a_ar' => '<p>SDK الـ <code>open-telemetry/opentelemetry</code> + Auto-instrumentation Extensions لـ Laravel و Guzzle و PDO. الـ Spans تُمرر عبر <code>traceparent</code> على HTTP الصادر. صدّر لـ OTLP Collector.</p>',
        ],
    ],
],

'obs-metrics' => [
    'part' => 'Part XII — Observability', 'part_ar' => 'الجزء الثاني عشر — Observability',
    'icon' => '📊',
    'title_en' => 'Metrics: RED & USE',
    'title_ar' => 'Metrics: RED و USE',
    'desc_en' => 'Prometheus, RED method, USE method',
    'desc_ar' => 'Prometheus وطريقتا RED و USE',
    'qa' => [
        [
            'q_en' => 'RED method (services)',
            'q_ar' => 'طريقة RED (للخدمات)',
            'a_en' => '<p>For every service expose: <strong>R</strong>equests/sec, <strong>E</strong>rrors/sec, <strong>D</strong>uration (latency distribution). Three metrics tell you 90% of what\'s happening.</p>',
            'a_ar' => '<p>لكل خدمة، اعرض: <strong>R</strong>equests/sec و <strong>E</strong>rrors/sec و <strong>D</strong>uration (توزيع Latency). ثلاث Metrics تخبرك بـ 90% مما يحدث.</p>',
        ],
        [
            'q_en' => 'USE method (resources)',
            'q_ar' => 'طريقة USE (للموارد)',
            'a_en' => '<p>For every resource (CPU, memory, disk, network): <strong>U</strong>tilization, <strong>S</strong>aturation, <strong>E</strong>rrors. Brendan Gregg\'s classic for capacity planning.</p>',
            'a_ar' => '<p>لكل مورد (CPU, Memory, Disk, Network): <strong>U</strong>tilization و <strong>S</strong>aturation و <strong>E</strong>rrors. كلاسيكية Brendan Gregg للتخطيط للسعة.</p>',
        ],
        [
            'q_en' => 'Counter vs Gauge vs Histogram',
            'q_ar' => 'Counter vs Gauge vs Histogram',
            'a_en' => '<ul><li><strong>Counter:</strong> monotonically increasing (requests_total). Use <code>rate()</code>.</li><li><strong>Gauge:</strong> a value that goes up and down (queue depth, in-flight).</li><li><strong>Histogram:</strong> distribution of observations (latency p50/p95/p99). Pre-bucketed at scrape time.</li><li><strong>Summary:</strong> like histogram but client-side percentiles — can\'t aggregate across instances.</li></ul>',
            'a_ar' => '<ul><li><strong>Counter:</strong> يزداد فقط (requests_total). استخدم <code>rate()</code>.</li><li><strong>Gauge:</strong> قيمة تصعد وتنزل (Queue Depth, In-flight).</li><li><strong>Histogram:</strong> توزيع (Latency p50/p95/p99). مُجمّع مسبقًا في Buckets.</li><li><strong>Summary:</strong> مثل Histogram لكن Percentiles على Client — لا يجمّع عبر Instances.</li></ul>',
        ],
        [
            'q_en' => 'High cardinality is the metrics killer',
            'q_ar' => 'الـ Cardinality العالي قاتل Metrics',
            'a_en' => '<p>Each unique label combination = a new time series. Putting <code>user_id</code> as a label = millions of series = OOM. Use logs/traces for high-cardinality fields, metrics for low-cardinality dimensions (route, status, method).</p>',
            'a_ar' => '<p>كل تركيبة Labels فريدة = Time Series جديدة. وضع <code>user_id</code> كـ Label = ملايين Series = OOM. استخدم Logs/Traces للحقول عالية Cardinality، و Metrics لأبعاد منخفضة (Route, Status, Method).</p>',
        ],
    ],
],

'obs-slo' => [
    'part' => 'Part XII — Observability', 'part_ar' => 'الجزء الثاني عشر — Observability',
    'icon' => '🎯',
    'title_en' => 'SLOs & Error Budgets',
    'title_ar' => 'SLOs و Error Budgets',
    'desc_en' => 'SLI, SLO, SLA, burn-rate alerts',
    'desc_ar' => 'SLI و SLO و SLA و Burn-rate Alerts',
    'qa' => [
        [
            'q_en' => 'SLI vs SLO vs SLA',
            'q_ar' => 'SLI vs SLO vs SLA',
            'a_en' => '<ul><li><strong>SLI</strong> (Indicator): what you measure (e.g. <em>fraction of HTTP requests with status &lt; 500</em>).</li><li><strong>SLO</strong> (Objective): your internal target (e.g. <em>99.9% over rolling 30 days</em>).</li><li><strong>SLA</strong> (Agreement): contractual promise to customers, usually weaker than the SLO — with financial penalties.</li></ul>',
            'a_ar' => '<ul><li><strong>SLI</strong> (Indicator): ما تقيسه (مثلاً <em>نسبة Requests الناجحة</em>).</li><li><strong>SLO</strong> (Objective): الهدف الداخلي (مثلاً <em>99.9% عبر 30 يومًا</em>).</li><li><strong>SLA</strong> (Agreement): التزام تعاقدي للعملاء، عادة أضعف من SLO، مع غرامات.</li></ul>',
        ],
        [
            'q_en' => 'Error budget',
            'q_ar' => 'Error Budget',
            'a_en' => '<p>1 − SLO. If your SLO is 99.9% over 30 days, your budget is 0.1% × 30d ≈ 43 minutes of badness. Once spent, freeze risky deploys and pay down reliability debt.</p>',
            'a_ar' => '<p>1 − SLO. إذا كان SLO هو 99.9% خلال 30 يومًا، الميزانية ≈ 43 دقيقة من الفشل. بعد استهلاكها، جمّد الـ Deploys الخطرة واعمل على الموثوقية.</p>',
        ],
        [
            'q_en' => 'Burn-rate alerts',
            'q_ar' => 'Burn-rate Alerts',
            'a_en' => '<p>Don\'t page on raw error rate. Page on <strong>burn rate</strong> — how fast you\'re consuming the budget. Google SRE pattern: <em>multi-window, multi-burn-rate</em> (fast burn 1h, slow burn 6h) keeps signal high without flapping.</p>',
            'a_ar' => '<p>لا تطلق Pages على Error Rate خام. أطلقها على <strong>Burn Rate</strong> — معدل استهلاك الميزانية. نمط Google SRE: <em>نوافذ متعددة بمعدلات احتراق متعددة</em> (سريع 1h، بطيء 6h) للحفاظ على إشارة قوية بدون Flapping.</p>',
        ],
        [
            'q_en' => 'How to write good SLOs',
            'q_ar' => 'كيف تكتب SLOs جيدة',
            'a_en' => '<ul><li>Reflect user experience, not internal mechanics</li><li>Set just below what users actually need — 100% is wrong and costly</li><li>Use windows of 28–30 days (rolling)</li><li>Tie alerts to budget burn, not threshold violations</li></ul>',
            'a_ar' => '<ul><li>اعكس تجربة المستخدم لا الميكانيكا الداخلية</li><li>اضبطها أقل قليلاً مما يحتاجه المستخدم — 100% خطأ ومكلف</li><li>استخدم نوافذ 28-30 يومًا (Rolling)</li><li>اربط Alerts بـ Budget Burn لا انتهاكات Threshold</li></ul>',
        ],
    ],
],

];
