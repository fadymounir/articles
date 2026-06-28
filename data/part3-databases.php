<?php
/** Part III — Databases */

return [

'db-sql' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '🗄',
    'title_en' => 'SQL Fundamentals',
    'title_ar' => 'أساسيات SQL',
    'desc_en' => 'DDL/DML/DCL/TCL, joins, group by, window functions',
    'desc_ar' => 'أنواع الأوامر والـ Joins و Window Functions',
    'qa' => [
        [
            'q_en' => 'DDL vs DML vs DCL vs TCL',
            'q_ar' => 'الفرق بين DDL و DML و DCL و TCL',
            'a_en' => '<p><strong>DDL:</strong> CREATE/ALTER/DROP. <strong>DML:</strong> SELECT/INSERT/UPDATE/DELETE. <strong>DCL:</strong> GRANT/REVOKE. <strong>TCL:</strong> BEGIN/COMMIT/ROLLBACK/SAVEPOINT.</p>',
            'a_ar' => '<p><strong>DDL:</strong> CREATE/ALTER/DROP. <strong>DML:</strong> SELECT/INSERT/UPDATE/DELETE. <strong>DCL:</strong> GRANT/REVOKE. <strong>TCL:</strong> BEGIN/COMMIT/ROLLBACK/SAVEPOINT.</p>',
        ],
        [
            'q_en' => 'JOIN types',
            'q_ar' => 'أنواع JOIN',
            'a_en' => '<p>INNER, LEFT, RIGHT, FULL OUTER, CROSS, SELF, LATERAL (Postgres). Most filters belong on the <code>ON</code> clause, not <code>WHERE</code>, when using outer joins.</p>',
            'a_ar' => '<p>INNER و LEFT و RIGHT و FULL OUTER و CROSS و SELF و LATERAL (Postgres). معظم الفلاتر يجب أن تكون في <code>ON</code> لا <code>WHERE</code> مع Outer Joins.</p>',
        ],
        [
            'q_en' => 'GROUP BY + HAVING',
            'q_ar' => 'GROUP BY + HAVING',
            'a_en' => '<p><code>WHERE</code> filters rows before aggregation; <code>HAVING</code> filters groups after aggregation.</p>',
            'a_ar' => '<p><code>WHERE</code> يفلتر الصفوف قبل التجميع؛ <code>HAVING</code> يفلتر المجموعات بعد التجميع.</p>',
        ],
        [
            'q_en' => 'Window functions',
            'q_ar' => 'Window Functions',
            'a_en' => '<p>Don\'t collapse rows — compute per-row across a window.</p>',
            'a_ar' => '<p>لا تُدمج الصفوف — تحسب لكل صف عبر نافذة.</p>',
            'example' => "SELECT user_id, amount,\n       SUM(amount) OVER (PARTITION BY user_id ORDER BY created_at) AS running_total\nFROM transactions;",
        ],
        [
            'q_en' => 'CTE vs subquery',
            'q_ar' => 'CTE vs Subquery',
            'a_en' => '<p>CTEs improve readability. In Postgres ≥12, CTEs are inlined by default (no longer optimization fences).</p>',
            'a_ar' => '<p>CTEs تُحسّن القراءة. في Postgres ≥12 تُدمج افتراضيًا (لم تعد حواجز للـ Optimizer).</p>',
        ],
        [
            'q_en' => 'Set operations',
            'q_ar' => 'العمليات على المجموعات',
            'a_en' => '<p><code>UNION</code> (dedup), <code>UNION ALL</code> (keep duplicates, faster), <code>INTERSECT</code>, <code>EXCEPT</code>.</p>',
            'a_ar' => '<p><code>UNION</code> (يزيل التكرار)، <code>UNION ALL</code> (يحتفظ بالتكرار وأسرع)، <code>INTERSECT</code>، <code>EXCEPT</code>.</p>',
        ],
    ],
],

'db-postgresql' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '🐘',
    'title_en' => 'PostgreSQL',
    'title_ar' => 'PostgreSQL',
    'desc_en' => 'JSONB, VACUUM, WAL, connection pooling',
    'desc_ar' => 'JSONB و VACUUM و WAL و PgBouncer',
    'qa' => [
        [
            'q_en' => 'Why pick PostgreSQL?',
            'q_ar' => 'لماذا تختار PostgreSQL؟',
            'a_en' => '<p>Full ACID, MVCC, rich types (JSONB, arrays, ranges), GIST/GIN indexes, mature partitioning, logical replication, partial/expression indexes, transactional DDL.</p>',
            'a_ar' => '<p>ACID كامل، MVCC، أنواع غنية (JSONB, Arrays, Ranges)، فهارس GIST/GIN، Partitioning ناضج، Logical Replication، Partial/Expression Indexes، DDL داخل Transaction.</p>',
        ],
        [
            'q_en' => 'JSONB vs JSON',
            'q_ar' => 'JSONB vs JSON',
            'a_en' => '<p><strong>JSONB:</strong> binary, indexed, queryable, slightly slower to write. <strong>JSON:</strong> raw text. Use JSONB 99% of the time.</p>',
            'a_ar' => '<p><strong>JSONB:</strong> Binary و Indexed و Queryable، أبطأ قليلاً في الكتابة. <strong>JSON:</strong> نص خام. استخدم JSONB 99% من الوقت.</p>',
        ],
        [
            'q_en' => 'VACUUM & bloat',
            'q_ar' => 'VACUUM و Bloat',
            'a_en' => '<p>MVCC leaves dead tuples; <strong>autovacuum</strong> reclaims space. Tune for high-churn tables (lower <code>autovacuum_vacuum_scale_factor</code>). Watch <code>pg_stat_user_tables</code>.</p>',
            'a_ar' => '<p>MVCC تترك Dead Tuples؛ <strong>Autovacuum</strong> يستعيد المساحة. اضبط للجداول كثيرة التحديث. راقب <code>pg_stat_user_tables</code>.</p>',
        ],
        [
            'q_en' => 'WAL (Write-Ahead Log)',
            'q_ar' => 'WAL',
            'a_en' => '<p>Every change is written to WAL before data files — provides durability and powers replication and PITR (Point-In-Time Recovery).</p>',
            'a_ar' => '<p>كل تغيير يُكتب لـ WAL قبل ملفات البيانات — يضمن الـ Durability ويُمكّن Replication و PITR.</p>',
        ],
        [
            'q_en' => 'Connection pooling',
            'q_ar' => 'Connection Pooling',
            'a_en' => '<p>Postgres connections are expensive (process per connection). Use <strong>PgBouncer</strong> in transaction mode in front of Postgres.</p>',
            'a_ar' => '<p>اتصالات Postgres مكلفة (Process لكل اتصال). استخدم <strong>PgBouncer</strong> في وضع Transaction أمام Postgres.</p>',
        ],
    ],
],

'db-mysql' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '🐬',
    'title_en' => 'MySQL',
    'title_ar' => 'MySQL',
    'desc_en' => 'InnoDB, clustered indexes, isolation, utf8mb4',
    'desc_ar' => 'InnoDB والـ Clustered Indexes و utf8mb4',
    'qa' => [
        [
            'q_en' => 'InnoDB vs MyISAM',
            'q_ar' => 'InnoDB vs MyISAM',
            'a_en' => '<p>Use InnoDB. MyISAM has no transactions, no row-level locks, no crash recovery. InnoDB is default since 5.5.</p>',
            'a_ar' => '<p>استخدم InnoDB. MyISAM لا يدعم Transactions ولا Row Locks ولا Crash Recovery. InnoDB افتراضي منذ 5.5.</p>',
        ],
        [
            'q_en' => 'Clustered vs secondary indexes',
            'q_ar' => 'Clustered vs Secondary Indexes',
            'a_en' => '<p>InnoDB stores rows physically by the primary key (clustered). Secondary indexes store PK as the row pointer — long PKs bloat all indexes.</p>',
            'a_ar' => '<p>InnoDB يخزن الصفوف فيزيائيًا حسب PK (Clustered). Secondary Indexes تخزن PK كمؤشر — PK طويلة تنفخ كل الفهارس.</p>',
        ],
        [
            'q_en' => 'Default isolation level?',
            'q_ar' => 'الـ Isolation Level الافتراضي؟',
            'a_en' => '<p>REPEATABLE READ (different from Postgres\' READ COMMITTED). MySQL avoids phantom reads via <strong>gap locks</strong>.</p>',
            'a_ar' => '<p>REPEATABLE READ (مختلف عن Postgres الذي يستخدم READ COMMITTED). MySQL يتجنب Phantom Reads عبر <strong>Gap Locks</strong>.</p>',
        ],
        [
            'q_en' => 'utf8 vs utf8mb4',
            'q_ar' => 'utf8 vs utf8mb4',
            'a_en' => '<p>Always use <code>utf8mb4</code> (real UTF-8, supports emoji and full BMP). Legacy <code>utf8</code> is 3-byte only.</p>',
            'a_ar' => '<p>استخدم دائمًا <code>utf8mb4</code> (UTF-8 حقيقي يدعم Emoji). <code>utf8</code> القديم 3 بايت فقط.</p>',
        ],
    ],
],

'db-transactions' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '💸',
    'title_en' => 'Transactions',
    'title_ar' => 'Transactions',
    'desc_en' => 'Atomic units of work, savepoints, pitfalls',
    'desc_ar' => 'وحدات العمل الذرية والـ Savepoints',
    'qa' => [
        [
            'q_en' => 'What is a transaction?',
            'q_ar' => 'ما هو Transaction؟',
            'a_en' => '<p>An atomic unit of work — either all statements commit or none.</p>',
            'a_ar' => '<p>وحدة عمل ذرية — كل العبارات تُحفظ أو لا شيء.</p>',
            'example' => "BEGIN;\n  UPDATE accounts SET balance = balance - 100 WHERE id = 1;\n  UPDATE accounts SET balance = balance + 100 WHERE id = 2;\nCOMMIT;",
        ],
        [
            'q_en' => 'Common pitfall: long transactions',
            'q_ar' => 'فخ شائع: Transactions طويلة',
            'a_en' => '<p>They hold locks and bloat MVCC. Keep them short. <strong>Never</strong> do HTTP calls or queue dispatch inside an open transaction.</p>',
            'a_ar' => '<p>تحبس Locks وتُضخم MVCC. اجعلها قصيرة. <strong>لا تفعل أبدًا</strong> HTTP Calls أو Dispatch Jobs داخل Transaction مفتوحة.</p>',
        ],
        [
            'q_en' => 'Savepoints & nested transactions',
            'q_ar' => 'Savepoints والـ Nested Transactions',
            'a_en' => '<p>Most engines don\'t truly nest. Laravel\'s <code>DB::transaction</code> uses savepoints for nesting. Inner failure rolls back to its savepoint.</p>',
            'a_ar' => '<p>معظم Engines لا تدعم Nesting حقيقي. Laravel <code>DB::transaction</code> تستخدم Savepoints. فشل الـ Inner يُرجع للـ Savepoint.</p>',
        ],
    ],
],

'db-acid' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '💎',
    'title_en' => 'ACID Properties',
    'title_ar' => 'خصائص ACID',
    'desc_en' => 'Atomicity, Consistency, Isolation, Durability — and BASE',
    'desc_ar' => 'الخصائص الأربع — مع BASE و CAP',
    'qa' => [
        [
            'q_en' => 'Explain ACID — senior answer',
            'q_ar' => 'اشرح ACID — إجابة Senior',
            'a_en' => '<p><strong>A — Atomicity:</strong> all-or-nothing. <strong>C — Consistency:</strong> constraints and invariants hold before and after. <strong>I — Isolation:</strong> concurrent txns appear serial. <strong>D — Durability:</strong> committed data survives crashes (WAL + fsync).</p><p>In production payments, ACID guarantees money is never deducted without being credited — even during failures.</p>',
            'a_ar' => '<p><strong>A — Atomicity:</strong> الكل أو لا شيء. <strong>C — Consistency:</strong> القيود تبقى صحيحة قبل وبعد. <strong>I — Isolation:</strong> Transactions المتزامنة تظهر متتابعة. <strong>D — Durability:</strong> البيانات تبقى بعد الأعطال (WAL + fsync).</p><p>في أنظمة الدفع، ACID يضمن ألا يُخصم المال دون قَيد له — حتى أثناء الأعطال.</p>',
            'bad_en' => 'ACID means Atomicity Consistency Isolation Durability.',
            'bad_ar' => 'ACID = Atomicity Consistency Isolation Durability.',
            'tip_en' => 'Connect each property to a production scenario, e.g. "Durability is what saves the bank when the database crashes mid-transfer."',
            'tip_ar' => 'اربط كل خاصية بسيناريو إنتاجي، مثلاً "Durability هي ما يُنقذ البنك إذا تعطلت DB في منتصف التحويل".',
        ],
        [
            'q_en' => 'What is BASE?',
            'q_ar' => 'ما هو BASE؟',
            'a_en' => '<p><strong>B</strong>asically <strong>A</strong>vailable, <strong>S</strong>oft state, <strong>E</strong>ventual consistency. Tradeoff in distributed NoSQL stores (DynamoDB, Cassandra). Often paired with CAP discussions.</p>',
            'a_ar' => '<p><strong>B</strong>asically <strong>A</strong>vailable و <strong>S</strong>oft state و <strong>E</strong>ventual consistency. Tradeoff في NoSQL الموزعة (DynamoDB, Cassandra). كثيرًا ما يُذكر مع CAP.</p>',
        ],
        [
            'q_en' => 'CAP theorem',
            'q_ar' => 'نظرية CAP',
            'a_en' => '<p>Under network partitions, choose between Consistency and Availability. RDBMS are typically CP; many NoSQL are AP.</p>',
            'a_ar' => '<p>تحت Network Partition، اختر بين Consistency و Availability. RDBMS غالبًا CP؛ كثير من NoSQL AP.</p>',
        ],
    ],
],

'db-isolation' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '🔒',
    'title_en' => 'Isolation Levels',
    'title_ar' => 'مستويات العزل',
    'desc_en' => 'Read Uncommitted, Read Committed, Repeatable Read, Serializable',
    'desc_ar' => 'المستويات الأربعة و SSI',
    'qa' => [
        [
            'q_en' => 'The four isolation levels',
            'q_ar' => 'مستويات العزل الأربعة',
            'a_en' => '',
            'a_ar' => '',
            'extra_html_en' => '<table><tr><th>Level</th><th>Dirty Read</th><th>Non-repeatable</th><th>Phantom</th></tr><tr><td>Read Uncommitted</td><td>✓</td><td>✓</td><td>✓</td></tr><tr><td>Read Committed</td><td>✗</td><td>✓</td><td>✓</td></tr><tr><td>Repeatable Read</td><td>✗</td><td>✗</td><td>✓ (✗ in MySQL via gap locks)</td></tr><tr><td>Serializable</td><td>✗</td><td>✗</td><td>✗</td></tr></table>',
            'extra_html_ar' => '<table><tr><th>المستوى</th><th>Dirty Read</th><th>Non-repeatable</th><th>Phantom</th></tr><tr><td>Read Uncommitted</td><td>✓</td><td>✓</td><td>✓</td></tr><tr><td>Read Committed</td><td>✗</td><td>✓</td><td>✓</td></tr><tr><td>Repeatable Read</td><td>✗</td><td>✗</td><td>✓ (✗ في MySQL بـ Gap Locks)</td></tr><tr><td>Serializable</td><td>✗</td><td>✗</td><td>✗</td></tr></table>',
        ],
        [
            'q_en' => 'Defaults',
            'q_ar' => 'الافتراضيات',
            'a_en' => '<p>PostgreSQL → <strong>Read Committed</strong>. MySQL InnoDB → <strong>Repeatable Read</strong>.</p>',
            'a_ar' => '<p>PostgreSQL → <strong>Read Committed</strong>. MySQL InnoDB → <strong>Repeatable Read</strong>.</p>',
        ],
        [
            'q_en' => 'Serializable in Postgres',
            'q_ar' => 'Serializable في Postgres',
            'a_en' => '<p>Implemented via <strong>SSI</strong> (Serializable Snapshot Isolation). Detects conflicts and retries; no global lock.</p>',
            'a_ar' => '<p>مُنفّذ عبر <strong>SSI</strong> (Serializable Snapshot Isolation). يكتشف التعارضات ويُعيد المحاولة؛ بدون Global Lock.</p>',
        ],
    ],
],

'db-mvcc' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '🌀',
    'title_en' => 'MVCC',
    'title_ar' => 'MVCC',
    'desc_en' => 'Multi-Version Concurrency Control',
    'desc_ar' => 'التحكم بالتزامن متعدد النسخ',
    'qa' => [
        [
            'q_en' => 'What is MVCC?',
            'q_ar' => 'ما هو MVCC؟',
            'a_en' => '<p>Multi-Version Concurrency Control: writers don\'t block readers because each transaction sees a snapshot. Each row has visibility metadata (<code>xmin</code>/<code>xmax</code> in Postgres).</p>',
            'a_ar' => '<p>Multi-Version Concurrency Control: Writers لا يحبسون Readers لأن كل Transaction ترى Snapshot. كل صف له metadata رؤية (<code>xmin</code>/<code>xmax</code> في Postgres).</p>',
        ],
        [
            'q_en' => 'Cost of MVCC',
            'q_ar' => 'تكلفة MVCC',
            'a_en' => '<p>Dead row versions accumulate until vacuumed (Postgres) or purged (InnoDB undo logs grow with long transactions).</p>',
            'a_ar' => '<p>نسخ الصفوف الميتة تتراكم حتى يتم Vacuum (Postgres) أو Purge (InnoDB Undo Logs تكبر مع Transactions الطويلة).</p>',
        ],
    ],
],

'db-locks' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '🔐',
    'title_en' => 'Locks',
    'title_ar' => 'الـ Locks',
    'desc_en' => 'Row vs table, shared vs exclusive, advisory',
    'desc_ar' => 'أنواع الـ Locks و SELECT FOR UPDATE',
    'qa' => [
        [
            'q_en' => 'Row vs table; shared vs exclusive',
            'q_ar' => 'Row vs Table؛ Shared vs Exclusive',
            'a_en' => '<p><strong>Shared (S):</strong> multiple readers OK. <strong>Exclusive (X):</strong> one writer. InnoDB uses row-level locks via the clustered index.</p>',
            'a_ar' => '<p><strong>Shared (S):</strong> Readers متعددون. <strong>Exclusive (X):</strong> Writer واحد. InnoDB يستخدم Row Locks عبر Clustered Index.</p>',
        ],
        [
            'q_en' => 'SELECT ... FOR UPDATE',
            'q_ar' => 'SELECT ... FOR UPDATE',
            'a_en' => '<p>Acquires a row exclusive lock. Use for "read-then-update" patterns.</p>',
            'a_ar' => '<p>يحصل على Row Exclusive Lock. استخدمه لنمط "اقرأ ثم حدّث".</p>',
            'example' => "BEGIN;\nSELECT * FROM wallets WHERE id = 1 FOR UPDATE;\n-- safely compute new balance\nUPDATE wallets SET balance = ? WHERE id = 1;\nCOMMIT;",
        ],
        [
            'q_en' => 'Advisory locks',
            'q_ar' => 'Advisory Locks',
            'a_en' => '<p>Application-defined locks (Postgres <code>pg_advisory_lock</code>). Useful for cron-style "only one worker runs this".</p>',
            'a_ar' => '<p>Locks يُعرّفها التطبيق (<code>pg_advisory_lock</code>). مفيدة لـ Cron "Worker واحد فقط ينفذ".</p>',
        ],
        [
            'q_en' => 'Optimistic vs pessimistic locking',
            'q_ar' => 'Optimistic vs Pessimistic Locking',
            'a_en' => '<p><strong>Pessimistic:</strong> lock the row. <strong>Optimistic:</strong> version column; UPDATE with <code>WHERE version = ?</code>; retry on mismatch. Optimistic wins under low contention.</p>',
            'a_ar' => '<p><strong>Pessimistic:</strong> اقفل الصف. <strong>Optimistic:</strong> عمود Version؛ UPDATE مع <code>WHERE version = ?</code> وأعِد المحاولة. Optimistic أفضل عند Contention منخفض.</p>',
        ],
    ],
],

'db-deadlocks' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '☠️',
    'title_en' => 'Deadlocks',
    'title_ar' => 'Deadlocks',
    'desc_en' => 'Detection, avoidance, retry strategies',
    'desc_ar' => 'الاكتشاف والتجنب وإعادة المحاولة',
    'qa' => [
        [
            'q_en' => 'What is a deadlock?',
            'q_ar' => 'ما هو Deadlock؟',
            'a_en' => '<p>Two transactions each hold a lock the other needs. The engine kills one (the victim) and you retry.</p>',
            'a_ar' => '<p>كل Transaction تحبس قفلًا تحتاجه الأخرى. الـ Engine يقتل واحدة (الضحية) وأنت تُعيد المحاولة.</p>',
        ],
        [
            'q_en' => 'How to avoid',
            'q_ar' => 'كيف تتجنب',
            'a_en' => '<ul><li>Always lock rows in the <strong>same order</strong> across code paths</li><li>Keep transactions short</li><li>Use the smallest scope possible (row, not table)</li><li>Retry deadlock victims (40001/1213) with backoff</li></ul>',
            'a_ar' => '<ul><li>اقفل الصفوف بنفس <strong>الترتيب</strong> في كل مكان</li><li>اجعل Transactions قصيرة</li><li>استخدم أصغر Scope (صف لا جدول)</li><li>أعِد محاولة Deadlocks (40001/1213) مع Backoff</li></ul>',
        ],
    ],
],

'db-indexes' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '📑',
    'title_en' => 'Indexes',
    'title_ar' => 'الفهارس',
    'desc_en' => 'B-Tree, GIN, GiST, BRIN, composite, partial',
    'desc_ar' => 'أنواع الفهارس والـ Composite و Partial',
    'qa' => [
        [
            'q_en' => 'B-Tree (the default)',
            'q_ar' => 'B-Tree (الافتراضي)',
            'a_en' => '<p>Balanced tree, supports equality and range. The bread and butter index.</p>',
            'a_ar' => '<p>شجرة متوازنة، تدعم Equality و Range. الفهرس الأساسي.</p>',
        ],
        [
            'q_en' => 'Hash, GIN, GiST, BRIN (Postgres)',
            'q_ar' => 'Hash و GIN و GiST و BRIN',
            'a_en' => '<ul><li><strong>Hash:</strong> equality only</li><li><strong>GIN:</strong> inverted index — JSONB, arrays, full-text</li><li><strong>GiST:</strong> geometric/range types</li><li><strong>BRIN:</strong> very small index for naturally ordered huge tables (time-series)</li></ul>',
            'a_ar' => '<ul><li><strong>Hash:</strong> Equality فقط</li><li><strong>GIN:</strong> Inverted Index — JSONB و Arrays و Full-text</li><li><strong>GiST:</strong> أنواع هندسية/Range</li><li><strong>BRIN:</strong> فهرس صغير جدًا لجداول ضخمة مرتبة طبيعيًا (Time-series)</li></ul>',
        ],
        [
            'q_en' => 'Composite index column order',
            'q_ar' => 'ترتيب أعمدة الـ Composite Index',
            'a_en' => '<p>Leftmost prefix rule. <code>(a,b,c)</code> serves <code>(a)</code>, <code>(a,b)</code>, <code>(a,b,c)</code> — not <code>(b)</code> alone.</p>',
            'a_ar' => '<p>قاعدة Leftmost Prefix. <code>(a,b,c)</code> يخدم <code>(a)</code> و <code>(a,b)</code> و <code>(a,b,c)</code> — لا <code>(b)</code> وحده.</p>',
        ],
        [
            'q_en' => 'Covering indexes',
            'q_ar' => 'Covering Indexes',
            'a_en' => '<p>Include all columns needed by a query so the index alone answers it.</p>',
            'a_ar' => '<p>يحتوي على كل أعمدة Query حتى يُجيب عليها الفهرس وحده.</p>',
        ],
        [
            'q_en' => 'Partial & expression indexes (Postgres)',
            'q_ar' => 'Partial و Expression Indexes',
            'a_en' => '<p>Index only matching rows or computed values.</p>',
            'a_ar' => '<p>يفهرس فقط الصفوف المطابقة أو القيم المحسوبة.</p>',
            'example' => "CREATE INDEX ON orders(user_id) WHERE status = 'pending';\nCREATE INDEX ON users (LOWER(email));",
        ],
        [
            'q_en' => 'Common index mistakes',
            'q_ar' => 'أخطاء الفهارس الشائعة',
            'a_en' => '<ul><li>Indexing low-cardinality columns (booleans alone — useless)</li><li>Functions wrapping the column (<code>WHERE LOWER(x)=...</code> kills the index)</li><li>Too many indexes — every write pays</li></ul>',
            'a_ar' => '<ul><li>فهرسة أعمدة Low Cardinality (Booleans وحدها — بلا فائدة)</li><li>Functions تغلف العمود (<code>WHERE LOWER(x)=...</code> يقتل الفهرس)</li><li>فهارس كثيرة — كل Write يدفع الثمن</li></ul>',
        ],
    ],
],

'db-explain' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '🔍',
    'title_en' => 'EXPLAIN ANALYZE',
    'title_ar' => 'EXPLAIN ANALYZE',
    'desc_en' => 'Reading query plans, BUFFERS, fixing slow queries',
    'desc_ar' => 'قراءة الـ Plan وإصلاح الـ Queries البطيئة',
    'qa' => [
        [
            'q_en' => 'What does EXPLAIN show?',
            'q_ar' => 'ماذا يُظهر EXPLAIN؟',
            'a_en' => '<p>The planner\'s plan: scan types (seq, index, bitmap), join methods (nested loop, hash, merge), estimated and actual rows, cost, time.</p>',
            'a_ar' => '<p>خطة المُخطّط: أنواع المسح (Seq, Index, Bitmap)، طرق Join (Nested Loop, Hash, Merge)، الصفوف المتوقعة والفعلية، التكلفة، الوقت.</p>',
        ],
        [
            'q_en' => 'Reading it',
            'q_ar' => 'قراءة الـ Plan',
            'a_en' => '<ul><li><strong>Seq Scan</strong> on large tables → missing index</li><li><strong>Big diff</strong> between estimated and actual rows → <code>ANALYZE</code>, fix stats</li><li><strong>Nested Loop</strong> on huge inputs → consider hash join</li><li><strong>Sort/Spill to disk</strong> → bump <code>work_mem</code> or add an index supporting the sort</li></ul>',
            'a_ar' => '<ul><li><strong>Seq Scan</strong> على جداول كبيرة → فهرس مفقود</li><li><strong>فرق كبير</strong> بين Estimated و Actual rows → نفّذ <code>ANALYZE</code></li><li><strong>Nested Loop</strong> على Inputs ضخمة → فكر في Hash Join</li><li><strong>Sort/Spill to disk</strong> → ارفع <code>work_mem</code> أو أضف فهرسًا للترتيب</li></ul>',
        ],
        [
            'q_en' => 'EXPLAIN (ANALYZE, BUFFERS)',
            'q_ar' => 'EXPLAIN (ANALYZE, BUFFERS)',
            'a_en' => '<p>Adds buffer hits/reads — reveals cache effectiveness. Use BUFFERS in real diagnostics.</p>',
            'a_ar' => '<p>يُظهر Buffer Hits/Reads — يكشف فعالية الـ Cache. استخدم BUFFERS في التشخيص الحقيقي.</p>',
        ],
    ],
],

'db-query-opt' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '⚡',
    'title_en' => 'Query Optimization',
    'title_ar' => 'تحسين الاستعلامات',
    'desc_en' => 'Sargable predicates, keyset pagination, batching',
    'desc_ar' => 'Predicates قابلة للفهرسة و Keyset Pagination',
    'qa' => [
        [
            'q_en' => 'Senior optimization checklist',
            'q_ar' => 'قائمة Senior للتحسين',
            'a_en' => '<ol><li>Reproduce with EXPLAIN ANALYZE BUFFERS</li><li>Confirm the right indexes — composite, partial, covering</li><li>Check selectivity; rewrite predicates so they are <strong>sargable</strong></li><li>Cut <code>SELECT *</code> — fetch only needed columns</li><li>Avoid OR; use UNION ALL when each branch is selective</li><li>Use <strong>LIMIT</strong> with stable ordering for keyset pagination</li><li>Batch in chunks; avoid per-row updates from the app</li><li>Consider materialized views / summary tables for heavy reads</li></ol>',
            'a_ar' => '<ol><li>أعِد إنتاج المشكلة مع EXPLAIN ANALYZE BUFFERS</li><li>تأكد من وجود الفهارس المناسبة</li><li>تحقق من Selectivity؛ اجعل Predicates قابلة للفهرسة (<strong>Sargable</strong>)</li><li>تخلص من <code>SELECT *</code></li><li>تجنب OR؛ استخدم UNION ALL</li><li>استخدم <strong>LIMIT</strong> مع ترتيب ثابت لـ Keyset Pagination</li><li>اعمل Batch؛ تجنب التحديثات لكل صف</li><li>فكر في Materialized Views للقراءات الثقيلة</li></ol>',
        ],
        [
            'q_en' => 'Keyset pagination vs OFFSET',
            'q_ar' => 'Keyset Pagination vs OFFSET',
            'a_en' => '<p>OFFSET scans and discards rows — O(N). Keyset (<code>WHERE id &gt; ? ORDER BY id LIMIT 50</code>) is O(log N). Always prefer keyset for deep paging.</p>',
            'a_ar' => '<p>OFFSET يمسح ويتجاهل الصفوف — O(N). Keyset (<code>WHERE id &gt; ? ORDER BY id LIMIT 50</code>) هو O(log N). فضّله للـ Pagination العميق.</p>',
        ],
    ],
],

'db-partitioning' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '🔪',
    'title_en' => 'Partitioning',
    'title_ar' => 'Partitioning',
    'desc_en' => 'Range, list, hash strategies',
    'desc_ar' => 'استراتيجيات Range و List و Hash',
    'qa' => [
        [
            'q_en' => 'Why partition?',
            'q_ar' => 'لماذا Partitioning؟',
            'a_en' => '<p>Manage huge tables: faster vacuum, faster maintenance, partition pruning at query time, easy data retention (DROP old partitions).</p>',
            'a_ar' => '<p>إدارة الجداول الضخمة: Vacuum أسرع، صيانة أسهل، Partition Pruning أثناء الـ Query، حذف بيانات قديمة بسهولة.</p>',
        ],
        [
            'q_en' => 'Strategies',
            'q_ar' => 'الاستراتيجيات',
            'a_en' => '<ul><li><strong>Range:</strong> time-series (per month)</li><li><strong>List:</strong> by region/tenant</li><li><strong>Hash:</strong> even distribution</li></ul>',
            'a_ar' => '<ul><li><strong>Range:</strong> Time-series (شهري)</li><li><strong>List:</strong> حسب Region/Tenant</li><li><strong>Hash:</strong> توزيع متساوٍ</li></ul>',
        ],
        [
            'q_en' => 'Partitioning ≠ Sharding',
            'q_ar' => 'Partitioning ≠ Sharding',
            'a_en' => '<p>Partitioning is one DB, many tables. Sharding is many independent DBs.</p>',
            'a_ar' => '<p>Partitioning = DB واحد بجداول كثيرة. Sharding = عدة DBs مستقلة.</p>',
        ],
    ],
],

'db-replication' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '🔁',
    'title_en' => 'Replication',
    'title_ar' => 'Replication',
    'desc_en' => 'Sync vs async, logical vs physical',
    'desc_ar' => 'متزامن وغير متزامن و Logical و Physical',
    'qa' => [
        [
            'q_en' => 'Sync vs async',
            'q_ar' => 'Sync vs Async',
            'a_en' => '<p><strong>Async:</strong> primary doesn\'t wait — faster, risk losing recent writes if primary fails. <strong>Sync:</strong> primary waits for replica ack — safer, higher latency.</p>',
            'a_ar' => '<p><strong>Async:</strong> Primary لا ينتظر — أسرع، خطر فقدان آخر Writes إذا تعطل Primary. <strong>Sync:</strong> Primary ينتظر تأكيد Replica — أأمن لكن أبطأ.</p>',
        ],
        [
            'q_en' => 'Logical vs physical replication',
            'q_ar' => 'Logical vs Physical Replication',
            'a_en' => '<p><strong>Physical (streaming WAL):</strong> byte-for-byte. <strong>Logical:</strong> per-table, allows different schemas; used for upgrades and CDC.</p>',
            'a_ar' => '<p><strong>Physical (Streaming WAL):</strong> Byte لـ Byte. <strong>Logical:</strong> لكل جدول، يسمح بمخططات مختلفة؛ يُستخدم للترقيات و CDC.</p>',
        ],
        [
            'q_en' => 'Read replicas in Laravel',
            'q_ar' => 'Read Replicas في Laravel',
            'a_en' => '<p>Laravel supports separate read/write connections. Beware <strong>replication lag</strong>: read-after-write may miss. Force write connection when needed.</p>',
            'a_ar' => '<p>Laravel يدعم اتصالات Read/Write منفصلة. احذر من <strong>Replication Lag</strong>: Read-after-write قد يفشل. أجبر Write Connection عند الحاجة.</p>',
            'example' => "'mysql' => [\n  'read'  => ['host' => ['replica1','replica2']],\n  'write' => ['host' => ['primary']],\n],",
        ],
    ],
],

'db-sharding' => [
    'part' => 'Part III — Databases', 'part_ar' => 'الجزء الثالث — قواعد البيانات',
    'icon' => '🪓',
    'title_en' => 'Sharding',
    'title_ar' => 'Sharding',
    'desc_en' => 'Horizontal split, consistent hashing, tradeoffs',
    'desc_ar' => 'التقسيم الأفقي و Consistent Hashing',
    'qa' => [
        [
            'q_en' => 'What is sharding?',
            'q_ar' => 'ما هو Sharding؟',
            'a_en' => '<p>Splitting data across independent DB instances by a shard key (user_id, tenant_id, geo). Each shard is a full DB. Read/write scales horizontally.</p>',
            'a_ar' => '<p>تقسيم البيانات على DBs مستقلة بمفتاح Sharding (user_id, tenant_id, geo). كل Shard هو DB كامل. Read/Write يتسع أفقيًا.</p>',
        ],
        [
            'q_en' => 'Costs',
            'q_ar' => 'التكاليف',
            'a_en' => '<ul><li>Cross-shard joins are painful</li><li>Cross-shard transactions need 2PC or sagas</li><li>Rebalancing is hard — use <strong>consistent hashing</strong> or directory-based mapping</li><li>Schema migrations multiply by shard count</li></ul>',
            'a_ar' => '<ul><li>Cross-shard joins مؤلمة</li><li>Cross-shard transactions تحتاج 2PC أو Sagas</li><li>Rebalancing صعب — استخدم <strong>Consistent Hashing</strong></li><li>Schema Migrations تتضاعف بعدد Shards</li></ul>',
            'tip_en' => 'Don\'t shard until you must. Try vertical scaling, read replicas, partitioning, and caching first.',
            'tip_ar' => 'لا تعمل Sharding إلا عند الضرورة. جرّب Vertical Scaling و Read Replicas و Partitioning و Caching أولاً.',
        ],
    ],
],

];
