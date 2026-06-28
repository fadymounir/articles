<?php
/** Part XVII — Modern Data */

return [

'data-nosql-overview' => [
    'part' => 'Part XVII — Modern Data', 'part_ar' => 'الجزء السابع عشر — البيانات الحديثة',
    'icon' => '🗂',
    'title_en' => 'NoSQL Overview',
    'title_ar' => 'نظرة عامة على NoSQL',
    'desc_en' => 'Document, key-value, wide-column, graph',
    'desc_ar' => 'Document و Key-Value و Wide-Column و Graph',
    'qa' => [
        [
            'q_en' => 'The four NoSQL families',
            'q_ar' => 'عائلات NoSQL الأربع',
            'a_en' => '<ul><li><strong>Key-value</strong> (Redis, DynamoDB, RocksDB) — simplest, fastest, no querying inside the value</li><li><strong>Document</strong> (MongoDB, CouchDB) — JSON with secondary indexes</li><li><strong>Wide-column</strong> (Cassandra, ScyllaDB, BigTable) — denormalized rows partitioned by key, designed for write throughput</li><li><strong>Graph</strong> (Neo4j, ArangoDB) — nodes + edges with relationship-first queries</li></ul>',
            'a_ar' => '<ul><li><strong>Key-value</strong> (Redis, DynamoDB) — الأبسط والأسرع، بلا استعلام داخل القيمة</li><li><strong>Document</strong> (MongoDB, CouchDB) — JSON بفهارس ثانوية</li><li><strong>Wide-column</strong> (Cassandra, ScyllaDB, BigTable) — صفوف Denormalized مُقسّمة بالـ Key، مصمم لـ Write Throughput</li><li><strong>Graph</strong> (Neo4j) — Nodes + Edges بقدرات Relationship-first</li></ul>',
        ],
        [
            'q_en' => 'When NoSQL beats SQL',
            'q_ar' => 'متى NoSQL أفضل من SQL',
            'a_en' => '<ul><li>Access patterns known in advance and limited</li><li>Massive horizontal scale with low-cost writes</li><li>Wide-range geo distribution</li><li>Schema-flexible documents (events, logs)</li></ul><p>Default to Postgres until you have a concrete reason — most teams that picked NoSQL early regretted it.</p>',
            'a_ar' => '<ul><li>أنماط الوصول معروفة مسبقًا ومحدودة</li><li>توسع أفقي ضخم بكلفة كتابة منخفضة</li><li>توزيع جغرافي عالمي</li><li>Documents مرنة المخطط (Events, Logs)</li></ul><p>افتراضيًا اختر Postgres حتى يكون لديك سبب محدد — معظم من اختاروا NoSQL مبكرًا ندموا.</p>',
        ],
    ],
],

'data-mongodb' => [
    'part' => 'Part XVII — Modern Data', 'part_ar' => 'الجزء السابع عشر — البيانات الحديثة',
    'icon' => '🍃',
    'title_en' => 'MongoDB',
    'title_ar' => 'MongoDB',
    'desc_en' => 'Documents, embed vs reference, sharding',
    'desc_ar' => 'Documents و Embed vs Reference و Sharding',
    'qa' => [
        [
            'q_en' => 'Embed vs reference',
            'q_ar' => 'Embed vs Reference',
            'a_en' => '<p><strong>Embed</strong> when you fetch the parent and child together, the child has no independent lifecycle, and array size is bounded. <strong>Reference</strong> when the child is queried independently, large/unbounded, or shared across parents.</p>',
            'a_ar' => '<p><strong>Embed</strong> عندما تجلب الأب والابن معًا، والابن بلا دورة حياة مستقلة، وحجم Array محدود. <strong>Reference</strong> عندما يُستعلم عن الابن مستقلاً، أو حجمه كبير/غير محدود، أو مشترك بين آباء متعددين.</p>',
        ],
        [
            'q_en' => 'Indexes and the 1KB limit',
            'q_ar' => 'الفهارس وحد 1KB',
            'a_en' => '<p>Single-field, compound, multikey (on arrays), text, geospatial, partial, TTL (auto-delete by time). Indexed value limit is ~1KB per entry. Compound index follows the same leftmost-prefix rule as SQL.</p>',
            'a_ar' => '<p>Single-field و Compound و Multikey (على Arrays) و Text و Geospatial و Partial و TTL (حذف تلقائي بالزمن). حد القيمة المفهرسة ~1KB لكل Entry. Compound يتبع نفس قاعدة Leftmost Prefix.</p>',
        ],
        [
            'q_en' => 'Replica sets and sharding',
            'q_ar' => 'Replica Sets و Sharding',
            'a_en' => '<p>A replica set = primary + secondaries with automatic failover. Sharding splits data by a <strong>shard key</strong> across many replica sets. Pick the shard key carefully — bad choices create hot partitions.</p>',
            'a_ar' => '<p>Replica Set = Primary + Secondaries مع Failover تلقائي. Sharding يُقسّم البيانات بـ <strong>Shard Key</strong> عبر Replica Sets. اختر Shard Key بحذر — اختيارات سيئة تُنتج Hot Partitions.</p>',
        ],
        [
            'q_en' => 'Transactions in MongoDB',
            'q_ar' => 'Transactions في MongoDB',
            'a_en' => '<p>Multi-document ACID transactions are supported since 4.0. But they\'re slower and contention-prone — design schemas to keep related data in one document and avoid needing transactions in the first place.</p>',
            'a_ar' => '<p>Transactions ACID متعددة الـ Documents مدعومة منذ 4.0. لكنها أبطأ وعرضة لـ Contention — صمم Schemas بحيث تبقى البيانات المرتبطة في Document واحد وتجنب الحاجة لها أصلاً.</p>',
        ],
    ],
],

'data-dynamodb' => [
    'part' => 'Part XVII — Modern Data', 'part_ar' => 'الجزء السابع عشر — البيانات الحديثة',
    'icon' => '⚡',
    'title_en' => 'DynamoDB & Single-Table Design',
    'title_ar' => 'DynamoDB و Single-Table Design',
    'desc_en' => 'PK/SK, access patterns, GSI',
    'desc_ar' => 'PK/SK وأنماط الوصول و GSI',
    'qa' => [
        [
            'q_en' => 'Why single-table?',
            'q_ar' => 'لماذا Single-Table؟',
            'a_en' => '<p>DynamoDB is fast only when you fetch by partition+sort key. Cross-table joins don\'t exist. Putting all entities in one table lets you query related items with a single <code>Query</code> (e.g. user + their orders).</p>',
            'a_ar' => '<p>DynamoDB سريع فقط عند الجلب بـ Partition + Sort Key. لا يوجد Joins بين Tables. وضع كل الكيانات في جدول واحد يسمح بجلب عناصر مرتبطة في <code>Query</code> واحد (المستخدم + طلباته).</p>',
        ],
        [
            'q_en' => 'PK / SK pattern',
            'q_ar' => 'نمط PK / SK',
            'a_en' => '<p><strong>Partition key</strong> distributes data; <strong>Sort key</strong> orders within a partition and enables <code>begins_with</code>/range queries. Common: <code>USER#123</code> + <code>PROFILE</code> / <code>ORDER#2026-01-01</code> / <code>ADDRESS#shipping</code>.</p>',
            'a_ar' => '<p><strong>Partition Key</strong> يوزع البيانات؛ <strong>Sort Key</strong> يُرتب داخل Partition ويُمكّن استعلامات <code>begins_with</code>/Range. شائع: <code>USER#123</code> + <code>PROFILE</code> / <code>ORDER#2026-01-01</code>.</p>',
        ],
        [
            'q_en' => 'Global Secondary Index (GSI)',
            'q_ar' => 'GSI',
            'a_en' => '<p>A different PK/SK over the same data — enables alternative access patterns. Eventually consistent by default. Add one per access pattern; cost grows accordingly.</p>',
            'a_ar' => '<p>PK/SK مختلفان على نفس البيانات — يُمكنان أنماط وصول بديلة. Eventually Consistent افتراضيًا. أضف واحدًا لكل نمط وصول؛ التكلفة ترتفع.</p>',
        ],
        [
            'q_en' => 'Hot partitions',
            'q_ar' => 'Hot Partitions',
            'a_en' => '<p>A partition key getting disproportionate traffic gets throttled even if your table\'s overall capacity is high. Fix: distribute via salts (<code>USER#123#0..9</code>) or rethink the key.</p>',
            'a_ar' => '<p>Partition Key يحصل على Traffic مفرط يُخنق حتى لو سعة الجدول الكلية عالية. الحل: وزّع عبر Salts (<code>USER#123#0..9</code>) أو أعد التفكير في Key.</p>',
        ],
    ],
],

'data-elasticsearch' => [
    'part' => 'Part XVII — Modern Data', 'part_ar' => 'الجزء السابع عشر — البيانات الحديثة',
    'icon' => '🔎',
    'title_en' => 'Elasticsearch / OpenSearch',
    'title_ar' => 'Elasticsearch / OpenSearch',
    'desc_en' => 'Search index, mapping, analyzers, relevance',
    'desc_ar' => 'فهرس البحث والـ Mapping والـ Analyzers والـ Relevance',
    'qa' => [
        [
            'q_en' => 'Inverted index — the core idea',
            'q_ar' => 'Inverted Index — الفكرة الأساسية',
            'a_en' => '<p>Tokenize documents into terms; for each term store the postings list (which documents contain it, where). Queries do set operations over postings.</p>',
            'a_ar' => '<p>قسّم الـ Documents لـ Terms؛ لكل Term خزّن Postings List (أي Documents تحتوي عليه وأين). الاستعلامات تجري عمليات مجموعات على Postings.</p>',
        ],
        [
            'q_en' => 'Mapping & analyzers',
            'q_ar' => 'Mapping و Analyzers',
            'a_en' => '<p>The mapping declares field types and which analyzer tokenizes them. <strong>Standard, English, Arabic</strong> analyzers handle language quirks. <strong>Keyword</strong> fields are not analyzed — for exact match, sorting, aggregations.</p>',
            'a_ar' => '<p>الـ Mapping يحدد أنواع الحقول و Analyzer لكل واحد. <strong>Standard و English و Arabic</strong> Analyzers تتعامل مع خصوصيات اللغة. الحقول <strong>keyword</strong> لا تُحلل — للمطابقة الدقيقة والترتيب والـ Aggregations.</p>',
        ],
        [
            'q_en' => 'Relevance — BM25 in one line',
            'q_ar' => 'Relevance — BM25 في سطر',
            'a_en' => '<p>The default scoring: rewards matching terms (TF), discounts common terms (IDF), normalizes by document length. <strong>function_score</strong> blends business signals (recency, popularity) with relevance.</p>',
            'a_ar' => '<p>التقييم الافتراضي: يكافئ مطابقة Terms (TF)، يخصم Terms الشائعة (IDF)، يُسوّي بحجم Document. <strong>function_score</strong> يدمج إشارات العمل (الحداثة، الشعبية) مع Relevance.</p>',
        ],
        [
            'q_en' => 'Shards, replicas, refresh',
            'q_ar' => 'Shards و Replicas و Refresh',
            'a_en' => '<p>Index is split into <strong>shards</strong> for write parallelism; each has <strong>replicas</strong> for HA. <strong>Refresh interval</strong> (default 1s) controls how often new docs become searchable. Raise it (30s) for bulk loads.</p>',
            'a_ar' => '<p>الفهرس مُقسّم لـ <strong>Shards</strong> للتوازي في الكتابة؛ كل واحد له <strong>Replicas</strong> لـ HA. <strong>Refresh Interval</strong> (افتراضي 1 ث) يتحكم في متى تصبح Docs قابلة للبحث. ارفعه (30 ث) للـ Bulk Loads.</p>',
        ],
    ],
],

'data-cdc-debezium' => [
    'part' => 'Part XVII — Modern Data', 'part_ar' => 'الجزء السابع عشر — البيانات الحديثة',
    'icon' => '🔄',
    'title_en' => 'CDC with Debezium',
    'title_ar' => 'CDC مع Debezium',
    'desc_en' => 'Stream DB changes from the WAL/binlog to Kafka',
    'desc_ar' => 'بث تغييرات DB من WAL/binlog إلى Kafka',
    'qa' => [
        [
            'q_en' => 'What is Change Data Capture?',
            'q_ar' => 'ما هو CDC؟',
            'a_en' => '<p>Tap the database\'s replication log to emit a stream of row-level changes (insert/update/delete) to a broker. Powers search index sync, cache invalidation, data lake ingestion, audit, the Outbox pattern.</p>',
            'a_ar' => '<p>الاستفادة من Replication Log في DB لبث تغييرات الصفوف (Insert/Update/Delete) لـ Broker. يُشغّل مزامنة فهارس البحث، وإبطال Cache، وتغذية Data Lake، و Audit، ونمط Outbox.</p>',
        ],
        [
            'q_en' => 'Debezium connectors',
            'q_ar' => 'Debezium Connectors',
            'a_en' => '<p>Kafka Connect-based connectors for MySQL (binlog), PostgreSQL (logical replication via <code>pgoutput</code>), MongoDB (oplog), SQL Server, Oracle. Emit standardized change events.</p>',
            'a_ar' => '<p>Connectors مبنية على Kafka Connect لـ MySQL (binlog) و PostgreSQL (Logical Replication عبر <code>pgoutput</code>) و MongoDB (oplog) و SQL Server و Oracle. تُصدر Change Events موحدة.</p>',
        ],
        [
            'q_en' => 'Pitfalls',
            'q_ar' => 'مخاطر',
            'a_en' => '<ul><li>Snapshot vs streaming consistency at startup</li><li>Schema evolution requires consumer handling</li><li>WAL retention must outlast the consumer\'s lag</li><li>Soft deletes look like updates — handle the convention</li></ul>',
            'a_ar' => '<ul><li>الاتساق بين Snapshot و Streaming عند البدء</li><li>تطور Schema يحتاج معالجة من Consumers</li><li>Retention الـ WAL يجب أن يتجاوز تأخر Consumer</li><li>Soft Deletes تبدو كـ Updates — تعامل مع الاتفاقية</li></ul>',
        ],
    ],
],

];
