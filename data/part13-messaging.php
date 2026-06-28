<?php
/** Part XIII — Messaging & Event-Driven */

return [

'msg-kafka' => [
    'part' => 'Part XIII — Messaging & Events', 'part_ar' => 'الجزء الثالث عشر — Messaging و Events',
    'icon' => '🪵',
    'title_en' => 'Kafka Deep Dive',
    'title_ar' => 'Kafka بعمق',
    'desc_en' => 'Partitions, consumer groups, ordering, exactly-once',
    'desc_ar' => 'Partitions و Consumer Groups والترتيب و Exactly-once',
    'qa' => [
        [
            'q_en' => 'What is Kafka, in one paragraph?',
            'q_ar' => 'ما هي Kafka في فقرة؟',
            'a_en' => '<p>A distributed, append-only, partitioned commit log. Producers append messages to <strong>topics</strong>; each topic is split into <strong>partitions</strong> for parallelism; consumers read at their own pace by tracking an <strong>offset</strong>. Retention is time/size based — data persists even after consumption, enabling replay.</p>',
            'a_ar' => '<p>Commit Log موزّع Append-only مُقسّم. Producers يُضيفون رسائل لـ <strong>Topics</strong>؛ كل Topic مُقسّم لـ <strong>Partitions</strong> للتوازي؛ Consumers يقرؤون بإيقاعهم عبر تتبع <strong>Offset</strong>. Retention زمني/حجمي — البيانات تبقى بعد الاستهلاك مما يُمكّن Replay.</p>',
        ],
        [
            'q_en' => 'Partitions, keys, and ordering',
            'q_ar' => 'الـ Partitions والمفاتيح والترتيب',
            'a_en' => '<p>Ordering is guaranteed <strong>within a partition</strong>, not across topic. Producers route by hashing a <strong>key</strong> — same key → same partition → ordered. Choose keys carefully: <code>user_id</code> for per-user ordering; <code>order_id</code> for per-order ordering.</p>',
            'a_ar' => '<p>الترتيب مضمون <strong>داخل Partition</strong> فقط لا عبر Topic كله. Producers يوزعون عبر Hashing الـ <strong>Key</strong> — نفس Key → نفس Partition → ترتيب. اختر المفاتيح بعناية: <code>user_id</code> للترتيب لكل مستخدم؛ <code>order_id</code> لكل طلب.</p>',
        ],
        [
            'q_en' => 'Consumer groups',
            'q_ar' => 'Consumer Groups',
            'a_en' => '<p>A group ID identifies one logical consumer. Partitions are split among the group members — adding a consumer to a group <em>parallelizes</em>; a different group ID = independent reads (broadcast). Max useful consumers = partition count.</p>',
            'a_ar' => '<p>Group ID يُحدّد Consumer واحدًا منطقيًا. الـ Partitions تُقسّم على أعضاء المجموعة — إضافة Consumer <em>توازي</em>؛ Group ID مختلف = قراءات مستقلة (Broadcast). أقصى عدد Consumers مفيد = عدد Partitions.</p>',
        ],
        [
            'q_en' => 'Delivery semantics',
            'q_ar' => 'دلالات التوصيل',
            'a_en' => '<ul><li><strong>At-most-once:</strong> commit offset before processing → drops on crash.</li><li><strong>At-least-once</strong> (default): process then commit → duplicates on crash, <em>requires idempotent consumers</em>.</li><li><strong>Exactly-once:</strong> producer idempotence + transactional API (Kafka Streams). Real but operationally heavier.</li></ul>',
            'a_ar' => '<ul><li><strong>At-most-once:</strong> Commit Offset قبل المعالجة → فقدان عند Crash.</li><li><strong>At-least-once</strong> (افتراضي): عالج ثم Commit → تكرار عند Crash، <em>يتطلب Consumers Idempotent</em>.</li><li><strong>Exactly-once:</strong> Producer Idempotence + Transactional API (Kafka Streams). حقيقي لكن أثقل تشغيليًا.</li></ul>',
        ],
        [
            'q_en' => 'Compaction vs deletion',
            'q_ar' => 'Compaction vs Deletion',
            'a_en' => '<p><strong>Delete (default):</strong> retention by time/size. <strong>Compact:</strong> keep only the latest message per key — turns a topic into a queryable state store. Used for stream-table joins, CDC streams.</p>',
            'a_ar' => '<p><strong>Delete (افتراضي):</strong> Retention بالزمن/الحجم. <strong>Compact:</strong> احتفظ بآخر رسالة لكل Key فقط — تُحوّل Topic إلى مخزن حالة قابل للاستعلام. تُستخدم في Stream-table Joins و CDC.</p>',
        ],
    ],
],

'msg-rabbit-sqs' => [
    'part' => 'Part XIII — Messaging & Events', 'part_ar' => 'الجزء الثالث عشر — Messaging و Events',
    'icon' => '🐰',
    'title_en' => 'RabbitMQ, SQS, SNS, Kafka — when to use what',
    'title_ar' => 'RabbitMQ و SQS و SNS و Kafka — متى أيهم',
    'desc_en' => 'Trade-offs across queues vs streams',
    'desc_ar' => 'المقايضات بين Queues و Streams',
    'qa' => [
        [
            'q_en' => 'Queue vs stream — the fundamental split',
            'q_ar' => 'Queue vs Stream — الفصل الأساسي',
            'a_en' => '<p><strong>Queue (RabbitMQ, SQS):</strong> messages are consumed and removed; designed for work distribution; ordering is best-effort. <strong>Stream (Kafka):</strong> append-only log, multiple independent consumers, replay, strict ordering per partition.</p>',
            'a_ar' => '<p><strong>Queue (RabbitMQ, SQS):</strong> الرسائل تُستهلك وتُحذف؛ مصممة لتوزيع العمل؛ الترتيب Best-effort. <strong>Stream (Kafka):</strong> Append-only Log، Consumers مستقلون متعددون، Replay، ترتيب صارم لكل Partition.</p>',
        ],
        [
            'q_en' => 'RabbitMQ strengths',
            'q_ar' => 'نقاط قوة RabbitMQ',
            'a_en' => '<ul><li>Flexible routing (exchanges: direct, topic, fanout, headers)</li><li>Per-message ack, dead letter exchanges</li><li>Lower operational overhead than Kafka for small/medium workloads</li><li>Push model (vs Kafka pull)</li></ul>',
            'a_ar' => '<ul><li>Routing مرن (Exchanges: direct, topic, fanout, headers)</li><li>Ack لكل رسالة، Dead Letter Exchanges</li><li>تشغيل أبسط من Kafka للأعباء الصغيرة والمتوسطة</li><li>نموذج Push (مقابل Pull في Kafka)</li></ul>',
        ],
        [
            'q_en' => 'SQS Standard vs FIFO',
            'q_ar' => 'SQS Standard vs FIFO',
            'a_en' => '<p><strong>Standard:</strong> at-least-once, best-effort order, unlimited throughput. <strong>FIFO:</strong> exactly-once + strict order, 3000 msg/s with batching. SQS visibility timeout replaces explicit ACKs.</p>',
            'a_ar' => '<p><strong>Standard:</strong> At-least-once، ترتيب Best-effort، Throughput بلا حد. <strong>FIFO:</strong> Exactly-once + ترتيب صارم، 3000 رسالة/ث مع Batching. Visibility Timeout يستبدل ACK الصريح.</p>',
        ],
        [
            'q_en' => 'SNS — when to use',
            'q_ar' => 'SNS — متى تستخدم',
            'a_en' => '<p>Pub/sub fanout to multiple SQS queues, Lambda, HTTP endpoints, email/SMS. Pair SNS → SQS when you want fanout + reliable queue semantics per consumer.</p>',
            'a_ar' => '<p>Pub/sub Fanout لعدة SQS Queues و Lambda و HTTP و Email/SMS. ادمج SNS → SQS عندما تريد Fanout + Queue موثوقة لكل مستهلك.</p>',
        ],
    ],
],

'msg-outbox' => [
    'part' => 'Part XIII — Messaging & Events', 'part_ar' => 'الجزء الثالث عشر — Messaging و Events',
    'icon' => '📤',
    'title_en' => 'Outbox Pattern',
    'title_ar' => 'نمط Outbox',
    'desc_en' => 'Atomic "save + emit event" without 2PC',
    'desc_ar' => 'حفظ + إرسال حدث ذرّيًا بدون 2PC',
    'qa' => [
        [
            'q_en' => 'The problem outbox solves',
            'q_ar' => 'المشكلة التي يحلها Outbox',
            'a_en' => '<p>"Update DB + publish event" is two systems — without coordination you risk DB committed but event lost, or event sent but DB rolled back. Without outbox, your business state and your event stream drift apart.</p>',
            'a_ar' => '<p>"تحديث DB + نشر Event" نظامان — بدون تنسيق، إما DB Committed و Event ضائع، أو Event مُرسل و DB Rolled Back. بدون Outbox، حالة العمل وStream الأحداث يتباعدان.</p>',
        ],
        [
            'q_en' => 'How the outbox works',
            'q_ar' => 'كيف يعمل Outbox',
            'a_en' => '<p>In the same DB transaction that updates business state, insert a row into an <code>outbox</code> table. A separate <strong>relay process</strong> (or CDC via Debezium) reads the outbox and publishes to Kafka/RabbitMQ — at-least-once. Consumers must be idempotent.</p>',
            'a_ar' => '<p>في نفس Transaction الذي يحدث حالة العمل، أدرج صفًا في جدول <code>outbox</code>. <strong>Relay Process</strong> مستقل (أو CDC عبر Debezium) يقرأ Outbox وينشر لـ Kafka/RabbitMQ — At-least-once. Consumers يجب أن يكونوا Idempotent.</p>',
            'example' => "BEGIN;\n  INSERT INTO orders (...) VALUES (...);\n  INSERT INTO outbox (aggregate_id, type, payload)\n    VALUES (?, 'OrderPlaced', ?);\nCOMMIT;\n\n-- Relay job (every N seconds):\nSELECT * FROM outbox WHERE published_at IS NULL ORDER BY id LIMIT 500;\n-- publish to broker, then UPDATE published_at",
        ],
        [
            'q_en' => 'Why not just publish inside the transaction?',
            'q_ar' => 'لماذا لا أنشر داخل Transaction مباشرة؟',
            'a_en' => '<p>The transaction may commit after the publish — or roll back after. Network calls inside a transaction also hold locks. Outbox decouples the two and never loses events.</p>',
            'a_ar' => '<p>الـ Transaction قد يـ Commit بعد النشر أو Rollback بعده. النداءات الشبكية داخل Transaction تحبس Locks. Outbox يفصل الاثنين ولا يُضيع الأحداث أبدًا.</p>',
        ],
    ],
],

'msg-inbox' => [
    'part' => 'Part XIII — Messaging & Events', 'part_ar' => 'الجزء الثالث عشر — Messaging و Events',
    'icon' => '📥',
    'title_en' => 'Inbox Pattern',
    'title_ar' => 'نمط Inbox',
    'desc_en' => 'Consumer-side idempotency for at-least-once',
    'desc_ar' => 'Idempotency على جانب المستهلك',
    'qa' => [
        [
            'q_en' => 'What problem does Inbox solve?',
            'q_ar' => 'ما المشكلة التي يحلها Inbox؟',
            'a_en' => '<p>At-least-once delivery means consumers will see duplicates. The inbox table stores already-processed message IDs; processing first checks the inbox in the same transaction as the side effect.</p>',
            'a_ar' => '<p>At-least-once تعني أن المستهلكين سيرون تكرارات. جدول Inbox يخزن IDs الرسائل المُعالجة؛ المعالجة تتحقق من Inbox في نفس Transaction مع التأثير الجانبي.</p>',
        ],
        [
            'q_en' => 'Inbox schema',
            'q_ar' => 'مخطط Inbox',
            'a_en' => '<p>Primary key on <code>message_id</code> (the broker\'s id, or a producer-supplied idempotency key). Insert fails on duplicate → skip processing.</p>',
            'a_ar' => '<p>Primary Key على <code>message_id</code> (ID الـ Broker أو Idempotency Key من المنتج). Insert يفشل عند التكرار → تخطي المعالجة.</p>',
            'example' => "BEGIN;\n  INSERT INTO inbox (message_id) VALUES (?);  -- fails if dup\n  -- the real work (e.g. UPDATE balances)\nCOMMIT;",
        ],
        [
            'q_en' => 'Compare to producer-side exactly-once',
            'q_ar' => 'مقارنة بـ Exactly-once على Producer',
            'a_en' => '<p>Kafka exactly-once works inside Kafka — your DB side effect is still external. The Inbox extends the guarantee end-to-end into your DB. Cheap and portable across brokers.</p>',
            'a_ar' => '<p>Exactly-once في Kafka يعمل داخل Kafka — تأثيرك على DB لا يزال خارجيًا. Inbox يمد الضمان End-to-End إلى DB. رخيص ومحمول عبر Brokers مختلفة.</p>',
        ],
    ],
],

'msg-event-sourcing' => [
    'part' => 'Part XIII — Messaging & Events', 'part_ar' => 'الجزء الثالث عشر — Messaging و Events',
    'icon' => '📜',
    'title_en' => 'Event Sourcing',
    'title_ar' => 'Event Sourcing',
    'desc_en' => 'Persist events as source of truth; derive state',
    'desc_ar' => 'حفظ الأحداث كمصدر للحقيقة واشتقاق الحالة',
    'qa' => [
        [
            'q_en' => 'What is Event Sourcing?',
            'q_ar' => 'ما هو Event Sourcing؟',
            'a_en' => '<p>Instead of storing current state, store the <strong>sequence of events</strong> that produced it. Current state is a fold over events. Get audit log for free, time-travel debugging, and natural fit with CQRS projections.</p>',
            'a_ar' => '<p>بدلاً من تخزين الحالة الحالية، نخزن <strong>سلسلة الأحداث</strong> التي أنتجتها. الحالة الحالية = Fold على الأحداث. تحصل على Audit Log مجانًا، وتصحيح بالعودة الزمنية، وتكامل طبيعي مع CQRS Projections.</p>',
        ],
        [
            'q_en' => 'Snapshots',
            'q_ar' => 'Snapshots',
            'a_en' => '<p>Replaying thousands of events is slow. Periodically snapshot the aggregate state; on load, apply latest snapshot + events since.</p>',
            'a_ar' => '<p>إعادة تشغيل آلاف الأحداث بطيء. خذ Snapshot دوريًا للحالة؛ عند التحميل طبّق آخر Snapshot + الأحداث التالية له.</p>',
        ],
        [
            'q_en' => 'When NOT to use Event Sourcing',
            'q_ar' => 'متى لا تستخدم Event Sourcing',
            'a_en' => '<p>Simple CRUD. Domains without natural events. Teams new to async/eventual consistency. The operational cost of versioned events + projections + replay tooling is real.</p>',
            'a_ar' => '<p>CRUD بسيط. Domains بلا أحداث طبيعية. فرق جديدة على Async/Eventual Consistency. التكلفة التشغيلية لإصدارات الأحداث + Projections + أدوات Replay حقيقية.</p>',
        ],
    ],
],

];
