<?php
/** Part IV — Redis */

return [

'redis-overview' => [
    'part' => 'Part IV — Redis', 'part_ar' => 'الجزء الرابع — Redis',
    'icon' => '🟥',
    'title_en' => 'Redis Overview',
    'title_ar' => 'نظرة عامة على Redis',
    'desc_en' => 'In-memory store, why it\'s fast, data types',
    'desc_ar' => 'مخزن في الذاكرة وأنواع البيانات',
    'qa' => [
        [
            'q_en' => 'What is Redis?',
            'q_ar' => 'ما هو Redis؟',
            'a_en' => '<p>In-memory data structure store. Single-threaded command execution, persistent options (RDB snapshots, AOF), replication, clustering, scripting (Lua), pub/sub, streams.</p>',
            'a_ar' => '<p>مخزن هياكل بيانات في الذاكرة. تنفيذ Single-threaded للأوامر، خيارات Persistence (RDB Snapshots, AOF)، Replication، Clustering، Lua Scripting، Pub/Sub، Streams.</p>',
        ],
        [
            'q_en' => 'Why is Redis fast?',
            'q_ar' => 'لماذا Redis سريع؟',
            'a_en' => '<ul><li>In-memory</li><li>Single-threaded command loop — no lock contention</li><li>Efficient encodings (ziplist, listpack, intset)</li><li>Optimized network model (epoll)</li></ul>',
            'a_ar' => '<ul><li>في الذاكرة</li><li>Single-threaded Loop — لا Lock Contention</li><li>تشفيرات فعّالة (ziplist, listpack, intset)</li><li>نموذج شبكة محسّن (epoll)</li></ul>',
        ],
        [
            'q_en' => 'Core data types',
            'q_ar' => 'أنواع البيانات الأساسية',
            'a_en' => '<p>Strings, Lists, Sets, Sorted Sets (ZSET — leaderboards!), Hashes, Streams (Kafka-lite), HyperLogLog (cardinality), Bitmaps, Geospatial.</p>',
            'a_ar' => '<p>Strings و Lists و Sets و Sorted Sets (ZSET — Leaderboards!) و Hashes و Streams و HyperLogLog و Bitmaps و Geospatial.</p>',
        ],
    ],
],

'redis-persistence' => [
    'part' => 'Part IV — Redis', 'part_ar' => 'الجزء الرابع — Redis',
    'icon' => '💾',
    'title_en' => 'Persistence',
    'title_ar' => 'Persistence',
    'desc_en' => 'RDB snapshots vs AOF log',
    'desc_ar' => 'RDB Snapshots vs AOF Log',
    'qa' => [
        [
            'q_en' => 'Persistence options',
            'q_ar' => 'خيارات Persistence',
            'a_en' => '<p><strong>RDB:</strong> periodic snapshots. <strong>AOF:</strong> log every write (fsync policies: always / everysec / no). Production often uses <strong>both</strong>. RDB is small/fast to load; AOF is durable.</p>',
            'a_ar' => '<p><strong>RDB:</strong> Snapshots دورية. <strong>AOF:</strong> Log لكل Write (fsync: always / everysec / no). Production يستخدم غالبًا <strong>الاثنين</strong>. RDB صغير وسريع التحميل؛ AOF أكثر Durable.</p>',
        ],
        [
            'q_en' => 'Eviction policies',
            'q_ar' => 'سياسات Eviction',
            'a_en' => '<p><code>noeviction</code>, <code>allkeys-lru</code>, <code>volatile-lru</code>, <code>allkeys-lfu</code>, <code>volatile-lfu</code>, <code>allkeys-random</code>, <code>volatile-ttl</code>. For caches, <strong>allkeys-lfu</strong> often wins.</p>',
            'a_ar' => '<p><code>noeviction</code> و <code>allkeys-lru</code> و <code>volatile-lru</code> و <code>allkeys-lfu</code> و <code>volatile-lfu</code> و <code>allkeys-random</code> و <code>volatile-ttl</code>. للـ Caches، <strong>allkeys-lfu</strong> غالبًا الأفضل.</p>',
        ],
    ],
],

'redis-caching' => [
    'part' => 'Part IV — Redis', 'part_ar' => 'الجزء الرابع — Redis',
    'icon' => '🌀',
    'title_en' => 'Caching Patterns',
    'title_ar' => 'أنماط Caching',
    'desc_en' => 'Stampede, invalidation, versioned keys',
    'desc_ar' => 'Stampede و Invalidation و Versioned Keys',
    'qa' => [
        [
            'q_en' => 'Cache stampede / dog-pile',
            'q_ar' => 'Cache Stampede / Dog-pile',
            'a_en' => '<p>Key expires → many requests hit the DB simultaneously. Mitigations: distributed lock (<code>SET NX EX</code>) so only one rebuilds, TTL jitter, stale-while-revalidate, request coalescing.</p>',
            'a_ar' => '<p>Key ينتهي → طلبات كثيرة تضرب DB في نفس الوقت. الحلول: Distributed Lock (<code>SET NX EX</code>) ليُعيد البناء واحد فقط، TTL Jitter، Stale-while-revalidate.</p>',
        ],
        [
            'q_en' => 'Cache invalidation strategies',
            'q_ar' => 'استراتيجيات Invalidation',
            'a_en' => '<ul><li><strong>TTL:</strong> simple, eventually correct</li><li><strong>Write-through / write-behind</strong></li><li><strong>Event-driven invalidation</strong> (publish on model events)</li><li><strong>Versioned keys:</strong> <code>user:123:v17</code> — bump version on update</li></ul>',
            'a_ar' => '<ul><li><strong>TTL:</strong> بسيط</li><li><strong>Write-through / Write-behind</strong></li><li><strong>Event-driven</strong> (نشر عند Model events)</li><li><strong>Versioned Keys:</strong> <code>user:123:v17</code> — ارفع النسخة عند التحديث</li></ul>',
        ],
    ],
],

'redis-cluster' => [
    'part' => 'Part IV — Redis', 'part_ar' => 'الجزء الرابع — Redis',
    'icon' => '🌐',
    'title_en' => 'Cluster, Sentinel, Locks',
    'title_ar' => 'Cluster و Sentinel و Locks',
    'desc_en' => 'High availability and distributed locks',
    'desc_ar' => 'High Availability و Distributed Locks',
    'qa' => [
        [
            'q_en' => 'Redis Cluster vs Sentinel',
            'q_ar' => 'Redis Cluster vs Sentinel',
            'a_en' => '<p><strong>Sentinel:</strong> HA + automatic failover, single shard. <strong>Cluster:</strong> sharded across nodes via 16384 hash slots, supports failover. Use Cluster when one node can\'t fit the data.</p>',
            'a_ar' => '<p><strong>Sentinel:</strong> HA + Failover تلقائي، Shard واحد. <strong>Cluster:</strong> مُقسّم على Nodes عبر 16384 Hash Slot، يدعم Failover. استخدم Cluster عندما لا تكفي Node واحدة.</p>',
        ],
        [
            'q_en' => 'When NOT to use Redis',
            'q_ar' => 'متى لا تستخدم Redis؟',
            'a_en' => '<ul><li>As source of truth for transactional data</li><li>Complex queries / joins</li><li>Datasets that don\'t fit in RAM (cost &gt; value)</li></ul>',
            'a_ar' => '<ul><li>كمصدر حقيقة للبيانات المعاملاتية</li><li>Queries معقدة أو Joins</li><li>بيانات لا تتسع في RAM (التكلفة أكبر من الفائدة)</li></ul>',
        ],
        [
            'q_en' => 'Distributed locks (Redlock)',
            'q_ar' => 'Distributed Locks (Redlock)',
            'a_en' => '<p>Redlock has known correctness debates. For single-region, simple <code>SET key val NX PX ttl</code> + fencing token covers most cases. Always design for the lock to expire safely.</p>',
            'a_ar' => '<p>Redlock عليه نقاشات حول الدقة. لمنطقة واحدة، <code>SET key val NX PX ttl</code> + Fencing Token يكفي لمعظم الحالات. صمم دائمًا بحيث ينتهي القفل بأمان.</p>',
        ],
        [
            'q_en' => 'Pipelining vs Transactions vs Lua',
            'q_ar' => 'Pipelining vs Transactions vs Lua',
            'a_en' => '<p><strong>Pipeline:</strong> batch, no atomicity. <strong>MULTI/EXEC:</strong> atomic batch. <strong>Lua scripts:</strong> atomic + conditional logic server-side (great for check-and-set).</p>',
            'a_ar' => '<p><strong>Pipeline:</strong> Batch بدون Atomicity. <strong>MULTI/EXEC:</strong> Batch ذرية. <strong>Lua:</strong> ذرية + منطق شرطي على Server (ممتازة لـ Check-and-set).</p>',
        ],
    ],
],

];
