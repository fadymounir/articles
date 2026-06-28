<?php
/**
 * Conceptual SVG illustrations per topic.
 * Diagrams use CSS variables so they theme automatically (dark/light).
 *
 * Public API:
 *   topic_illustration_svg(string $slug, array $topic): string  // '' if none
 */

function topic_illustration_svg(string $slug, array $topic): string {
    static $map = [
        'php-fundamentals'     => 'svg_php_exec',
        'php-oop'              => 'svg_oop_pillars',
        'php-solid'            => 'svg_solid',
        'php-memory'           => 'svg_cow',
        'lv-lifecycle'         => 'svg_lifecycle',
        'lv-container'         => 'svg_di',
        'lv-middleware'        => 'svg_pipeline',
        'lv-eloquent'          => 'svg_nplusone',
        'lv-queues'            => 'svg_queue',
        'lv-caching'           => 'svg_cache',
        'db-acid'              => 'svg_acid',
        'db-mvcc'              => 'svg_mvcc',
        'db-isolation'         => 'svg_isolation',
        'db-locks'             => 'svg_locks',
        'db-indexes'           => 'svg_btree',
        'db-replication'       => 'svg_replication',
        'db-sharding'          => 'svg_sharding',
        'db-partitioning'      => 'svg_partitioning',
        'redis-overview'       => 'svg_redis_types',
        'redis-caching'        => 'svg_stampede',
        'docker-basics'        => 'svg_container',
        'sd-url-shortener'     => 'svg_sd_url',
        'sd-uber'              => 'svg_sd_uber',
        'sd-chat'              => 'svg_sd_chat',
        'sd-payment'           => 'svg_sd_payment',
        'arch-cqrs'            => 'svg_cqrs',
        'arch-saga'            => 'svg_saga',
        'arch-decorator'       => 'svg_decorator',
        'arch-strategy'        => 'svg_strategy',
        'async-fibers'         => 'svg_fibers',
        'async-octane'         => 'svg_octane',
        'sec-jwt'              => 'svg_jwt',
        'sec-rate-limiting'    => 'svg_token_bucket',
        'sec-owasp-api'        => 'svg_bola',
        'obs-pillars'          => 'svg_three_pillars',
        'obs-otel'             => 'svg_otel',
        'obs-slo'              => 'svg_slo',
        'msg-kafka'            => 'svg_kafka',
        'msg-outbox'           => 'svg_outbox',
        'msg-inbox'            => 'svg_inbox',
        'msg-event-sourcing'   => 'svg_event_sourcing',
        'ms-circuit-breaker'   => 'svg_circuit_breaker',
        'ms-api-gateway'       => 'svg_gateway',
        'ms-service-mesh'      => 'svg_mesh',
        'ms-grpc-rest-graphql' => 'svg_grpc',
        'k8s-basics'           => 'svg_k8s',
        'k8s-debugging'        => 'svg_pod_states',
        'cloud-aws-core'       => 'svg_aws',
        'net-http'             => 'svg_http_stack',
        'net-realtime'         => 'svg_realtime',
        'net-tls-dns-cdn'      => 'svg_tls',
        'data-dynamodb'        => 'svg_single_table',
        'data-elasticsearch'   => 'svg_inverted_index',
        'data-cdc-debezium'    => 'svg_cdc',
        'ai-rag-pipeline'      => 'svg_rag',
        'ai-vector-dbs'        => 'svg_hnsw',
        'ai-embeddings-chunking' => 'svg_embeddings',
        'ai-llm-serving'       => 'svg_llm_serving',
        'iv-system-design-framework' => 'svg_sd_framework',
        'iv-tradeoffs'         => 'svg_tradeoffs',
        // Remaining topics
        'php-patterns'         => 'svg_patterns_grid',
        'php-composer'         => 'svg_composer',
        'php-performance'      => 'svg_perf_stack',
        'lv-providers'         => 'svg_providers',
        'lv-routing'           => 'svg_routing',
        'lv-validation'        => 'svg_validation',
        'lv-events'            => 'svg_events',
        'lv-notifications'     => 'svg_notifications',
        'lv-authn'             => 'svg_authn',
        'lv-authz'             => 'svg_authz',
        'lv-sanctum'           => 'svg_sanctum',
        'lv-passport'          => 'svg_passport',
        'lv-resources'         => 'svg_resources',
        'lv-testing'           => 'svg_testing_pyramid',
        'db-sql'               => 'svg_joins',
        'db-postgresql'        => 'svg_pg_features',
        'db-mysql'             => 'svg_innodb',
        'db-transactions'      => 'svg_tx',
        'db-deadlocks'         => 'svg_deadlock',
        'db-explain'           => 'svg_explain',
        'db-query-opt'         => 'svg_query_opt',
        'redis-persistence'    => 'svg_persistence',
        'redis-cluster'        => 'svg_redis_cluster',
        'docker-dockerfile'    => 'svg_dockerfile',
        'docker-prod'          => 'svg_docker_prod',
        'sd-amazon'            => 'svg_sd_amazon',
        'sd-whatsapp'          => 'svg_sd_whatsapp',
        'sd-booking'           => 'svg_sd_booking',
        'sd-notification'      => 'svg_sd_notif',
        'arch-repository'      => 'svg_repository',
        'arch-service'         => 'svg_service_layer',
        'arch-factory'         => 'svg_factory',
        'arch-observer'        => 'svg_observer',
        'arch-adapter'         => 'svg_adapter',
        'linux-essentials'     => 'svg_linux',
        'cicd-overview'        => 'svg_cicd',
        'async-swoole'         => 'svg_swoole',
        'async-event-loops'    => 'svg_event_loop',
        'sec-owasp-web'        => 'svg_owasp_web',
        'sec-secrets-tls'      => 'svg_secret_rotation',
        'obs-metrics'          => 'svg_red_use',
        'msg-rabbit-sqs'       => 'svg_queue_vs_stream',
        'ms-api-versioning'    => 'svg_versioning',
        'k8s-helm-gitops'      => 'svg_gitops',
        'data-nosql-overview'  => 'svg_nosql_families',
        'data-mongodb'         => 'svg_embed_ref',
        'ai-evaluation'        => 'svg_evaluation',
        'lvm-octane-deep'      => 'svg_octane_state',
        'lvm-reverb'           => 'svg_reverb',
        'lvm-multi-tenancy'    => 'svg_tenancy',
        'lvm-pulse-pennant'    => 'svg_pulse',
        'lvm-static-analysis'  => 'svg_static_analysis',
        'iv-behavioral'        => 'svg_star',
    ];
    $fn = $map[$slug] ?? null;
    if (!$fn || !function_exists($fn)) return '';
    return $fn($topic);
}

/* =============================================================
   Shared SVG helpers
   =============================================================
   CSS variables consumed:
   --panel, --panel-2, --border, --accent, --accent-2, --good, --bad,
   --warn, --text, --muted
*/

function _svg_open(string $title = ''): string {
    return '<svg class="topic-illust" viewBox="0 0 800 280" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="' . htmlspecialchars($title) . '">';
}
function _svg_close(): string { return '</svg>'; }

/* Reusable building blocks ----------------------------------- */
function _box($x, $y, $w, $h, $label, $cls = 'fill-panel stroke-border', $tx_cls = 'fill-text'): string {
    return "<g><rect x='$x' y='$y' width='$w' height='$h' rx='8' class='$cls'/>"
         . "<text x='" . ($x + $w/2) . "' y='" . ($y + $h/2 + 5) . "' text-anchor='middle' class='label $tx_cls'>$label</text></g>";
}
function _arrow($x1, $y1, $x2, $y2, $cls = 'stroke-accent'): string {
    return "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' class='$cls' marker-end='url(#arrowhead)'/>";
}
function _defs(): string {
    return "<defs>
      <marker id='arrowhead' markerWidth='10' markerHeight='10' refX='9' refY='3' orient='auto'>
        <polygon points='0 0, 10 3, 0 6' class='fill-accent'/>
      </marker>
      <marker id='arrowhead-bad' markerWidth='10' markerHeight='10' refX='9' refY='3' orient='auto'>
        <polygon points='0 0, 10 3, 0 6' class='fill-bad'/>
      </marker>
      <marker id='arrowhead-good' markerWidth='10' markerHeight='10' refX='9' refY='3' orient='auto'>
        <polygon points='0 0, 10 3, 0 6' class='fill-good'/>
      </marker>
    </defs>";
}

/* =============================================================
   ACID — 4 columns showing each property
   ============================================================= */
function svg_acid(): string {
    $cols = [
        ['A', 'Atomicity',   'All or nothing'],
        ['C', 'Consistency', 'Rules hold'],
        ['I', 'Isolation',   'Look serial'],
        ['D', 'Durability',  'Survives crash'],
    ];
    $svg = _svg_open('ACID properties') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='38' text-anchor='middle' class='title fill-accent'>ACID guarantees</text>";
    foreach ($cols as $i => [$letter, $name, $sub]) {
        $x = 40 + $i * 185;
        $svg .= "<rect x='$x' y='70' width='160' height='170' rx='12' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+80) . "' y='130' text-anchor='middle' class='big-letter fill-accent'>$letter</text>";
        $svg .= "<text x='" . ($x+80) . "' y='180' text-anchor='middle' class='label fill-text'>$name</text>";
        $svg .= "<text x='" . ($x+80) . "' y='210' text-anchor='middle' class='small fill-muted'>$sub</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   B-Tree — index structure
   ============================================================= */
function svg_btree(): string {
    $svg = _svg_open('B-tree index') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>B-Tree Index</text>";
    // Root
    $svg .= _box(340, 60, 120, 40, '50 | 100', 'fill-accent stroke-accent', 'fill-bg');
    // 3 children
    $svg .= _box(120, 140, 120, 40, '10 | 30',  'fill-panel-2 stroke-border');
    $svg .= _box(340, 140, 120, 40, '60 | 80',  'fill-panel-2 stroke-border');
    $svg .= _box(560, 140, 120, 40, '110|150',  'fill-panel-2 stroke-border');
    // Arrows from root to children
    foreach ([180, 400, 620] as $cx) {
        $svg .= _arrow(400, 102, $cx, 138);
    }
    // 6 leaves
    $leafLabels = ['5,8','15,25','40,55','65,75','85,95','115,140'];
    $xs = [40, 200, 280, 440, 520, 680];
    foreach ($xs as $i => $x) {
        $svg .= _box($x, 220, 80, 38, $leafLabels[$i], 'fill-bg stroke-border');
    }
    // Arrows
    foreach ([[180,140,80,220],[180,140,240,220],[400,140,320,220],[400,140,480,220],[620,140,560,220],[620,140,720,220]] as [$x1,$y1,$x2,$y2]) {
        $svg .= "<line x1='$x1' y1='$y1' x2='" . ($x2+40) . "' y2='" . ($y2-2) . "' class='stroke-accent-2'/>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   Locks — two transactions, one waiting
   ============================================================= */
function svg_locks(): string {
    $svg = _svg_open('Row locks') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Row lock contention</text>";
    // Tx1
    $svg .= _box(60,  80, 180, 60, 'Tx1 (has X lock)', 'fill-good stroke-good', 'fill-bg');
    // Row
    $svg .= _box(300, 70, 200, 80, "row id=1\nbalance=500", 'fill-panel-2 stroke-accent-2');
    // Tx2 waiting
    $svg .= _box(560, 80, 180, 60, 'Tx2 (waiting)', 'fill-bad stroke-bad', 'fill-bg');
    // Arrows
    $svg .= "<line x1='240' y1='110' x2='298' y2='110' class='stroke-good' marker-end='url(#arrowhead-good)'/>";
    $svg .= "<line x1='558' y1='110' x2='502' y2='110' class='stroke-bad' marker-end='url(#arrowhead-bad)' stroke-dasharray='6 4'/>";
    $svg .= "<text x='400' y='185' text-anchor='middle' class='small fill-muted'>Tx1 holds exclusive lock. Tx2 blocks until Tx1 commits/rollbacks.</text>";
    $svg .= "<text x='400' y='220' text-anchor='middle' class='small fill-muted'>SELECT ... FOR UPDATE acquires X. Use the same lock order everywhere to avoid deadlocks.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   MVCC — timeline with row versions
   ============================================================= */
function svg_mvcc(): string {
    $svg = _svg_open('MVCC versions') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>MVCC — multi-version snapshots</text>";
    // Timeline arrow
    $svg .= "<line x1='60' y1='230' x2='760' y2='230' class='stroke-border'/>";
    $svg .= "<polygon points='760,230 750,225 750,235' class='fill-border'/>";
    $svg .= "<text x='760' y='255' text-anchor='end' class='small fill-muted'>time →</text>";
    // Versions of a row
    $versions = [
        [120, 'v1 xmin=5  xmax=12', 'fill-muted'],
        [300, 'v2 xmin=12 xmax=20', 'fill-muted'],
        [480, 'v3 xmin=20 xmax=∞',  'fill-accent'],
    ];
    foreach ($versions as [$x, $label, $cls]) {
        $svg .= "<rect x='$x' y='110' width='160' height='50' rx='8' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+80) . "' y='140' text-anchor='middle' class='label $cls'>$label</text>";
        $svg .= "<line x1='" . ($x+80) . "' y1='160' x2='" . ($x+80) . "' y2='225' class='stroke-border' stroke-dasharray='3 3'/>";
    }
    // Reader snapshot
    $svg .= "<rect x='620' y='70' width='140' height='50' rx='8' class='fill-accent-2 stroke-accent-2'/>";
    $svg .= "<text x='690' y='100' text-anchor='middle' class='label fill-bg'>Reader @ t=15</text>";
    $svg .= "<line x1='620' y1='95' x2='460' y2='130' class='stroke-accent-2' marker-end='url(#arrowhead)' stroke-dasharray='5 3'/>";
    $svg .= "<text x='400' y='192' text-anchor='middle' class='small fill-muted'>Each transaction sees the snapshot consistent with its start time. No reader/writer blocking.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Isolation levels — comparison
   ============================================================= */
function svg_isolation(): string {
    $rows = [
        ['Read Uncommitted', '✗', '✗', '✗'],
        ['Read Committed',   '✓', '✗', '✗'],
        ['Repeatable Read',  '✓', '✓', '✗/✓*'],
        ['Serializable',     '✓', '✓', '✓'],
    ];
    $svg = _svg_open('Isolation levels');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='34' text-anchor='middle' class='title fill-accent'>Isolation levels — anomalies prevented</text>";
    // Header
    $cols = [220, 380, 530, 680];
    $heads = ['Level','Dirty read','Non-repeatable','Phantom'];
    foreach ($heads as $i => $h) {
        $svg .= "<text x='" . ($cols[$i] ?? 80) . "' y='80' text-anchor='middle' class='label fill-accent'>$h</text>";
    }
    $svg .= "<text x='80' y='80' text-anchor='start' class='label fill-accent'>Level</text>";
    foreach ($rows as $r => $row) {
        $y = 110 + $r * 35;
        $svg .= "<text x='80' y='$y' class='label fill-text'>{$row[0]}</text>";
        foreach ([1,2,3] as $c) {
            $colour = $row[$c] === '✓' ? 'fill-good' : ($row[$c] === '✗' ? 'fill-bad' : 'fill-warn');
            $svg .= "<text x='" . $cols[$c] . "' y='$y' text-anchor='middle' class='label $colour'>{$row[$c]}</text>";
        }
    }
    $svg .= "<text x='80' y='258' class='small fill-muted'>* MySQL RR prevents phantoms via gap locks; Postgres RR allows them; Postgres Serializable uses SSI.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Replication — primary + replicas
   ============================================================= */
function svg_replication(): string {
    $svg = _svg_open('Replication topology') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Primary → replicas</text>";
    $svg .= _box(330, 90, 140, 70, 'PRIMARY\nread/write', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(80,  200, 160, 50, 'Replica 1\nread-only', 'fill-panel-2 stroke-border');
    $svg .= _box(320, 200, 160, 50, 'Replica 2\nread-only', 'fill-panel-2 stroke-border');
    $svg .= _box(560, 200, 160, 50, 'Replica 3\nread-only', 'fill-panel-2 stroke-border');
    foreach ([160, 400, 640] as $tx) {
        $svg .= "<line x1='400' y1='162' x2='$tx' y2='198' class='stroke-accent' marker-end='url(#arrowhead)'/>";
    }
    $svg .= "<text x='400' y='185' text-anchor='middle' class='small fill-muted'>async WAL stream — beware replication lag</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Sharding — data split by shard key
   ============================================================= */
function svg_sharding(): string {
    $svg = _svg_open('Sharding') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Sharding by user_id</text>";
    $svg .= _box(330, 60, 140, 50, 'Router', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $labels = ['Shard 0\nhash%4=0','Shard 1\nhash%4=1','Shard 2\nhash%4=2','Shard 3\nhash%4=3'];
    foreach ($labels as $i => $l) {
        $x = 50 + $i * 185;
        $svg .= _box($x, 170, 160, 80, $l, 'fill-panel-2 stroke-border');
        $svg .= "<line x1='400' y1='112' x2='" . ($x+80) . "' y2='168' class='stroke-accent' marker-end='url(#arrowhead)'/>";
    }
    $svg .= "<text x='400' y='268' text-anchor='middle' class='small fill-muted'>Independent DBs. Cross-shard joins/txns are painful; pick the shard key carefully.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Partitioning
   ============================================================= */
function svg_partitioning(): string {
    $svg = _svg_open('Partitioning');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Range partitioning by month</text>";
    $svg .= _box(330, 60, 140, 50, 'orders (logical)', 'fill-accent stroke-accent', 'fill-bg');
    $parts = ['p_2025_10','p_2025_11','p_2025_12','p_2026_01'];
    foreach ($parts as $i => $p) {
        $x = 50 + $i * 185;
        $svg .= _box($x, 180, 160, 70, $p, 'fill-panel-2 stroke-border');
        $svg .= "<line x1='400' y1='112' x2='" . ($x+80) . "' y2='178' class='stroke-accent-2' stroke-dasharray='4 3'/>";
    }
    $svg .= "<text x='400' y='265' text-anchor='middle' class='small fill-muted'>One DB, many physical tables. Partition pruning at query time; drop old partitions instantly.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Request lifecycle (Laravel)
   ============================================================= */
function svg_lifecycle(): string {
    $svg = _svg_open('Laravel request lifecycle') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Laravel request lifecycle</text>";
    $steps = ['Client','Nginx','PHP-FPM','Kernel','Middleware','Controller','Response','Terminating MW'];
    $row1 = array_slice($steps, 0, 4);
    $row2 = array_slice($steps, 4, 4);
    foreach ($row1 as $i => $s) {
        $x = 40 + $i * 195;
        $svg .= _box($x, 75, 160, 50, $s, 'fill-panel-2 stroke-border');
        if ($i < 3) $svg .= _arrow($x+160, 100, $x+193, 100);
    }
    // Connect last of row1 to first of row2 going down then left
    $svg .= "<path d='M 760 125 V 165 H 200 V 195' class='stroke-accent' fill='none' marker-end='url(#arrowhead)'/>";
    foreach ($row2 as $i => $s) {
        $x = 40 + (3 - $i) * 195;
        $svg .= _box($x, 195, 160, 50, $s, 'fill-panel-2 stroke-border');
        if ($i < 3) $svg .= _arrow($x, 220, $x-35, 220);
    }
    return $svg . _svg_close();
}

/* =============================================================
   Middleware pipeline
   ============================================================= */
function svg_pipeline(): string {
    $svg = _svg_open('Middleware pipeline') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Middleware pipeline</text>";
    $names = ['CORS','Auth','Throttle','CSRF','Controller'];
    foreach ($names as $i => $n) {
        $x = 30 + $i * 152;
        $cls = ($i === 4) ? 'fill-accent stroke-accent' : 'fill-panel-2 stroke-border';
        $tx  = ($i === 4) ? 'fill-bg' : 'fill-text';
        $svg .= _box($x, 110, 132, 60, $n, $cls, $tx);
        if ($i < 4) $svg .= _arrow($x+132, 140, $x+150, 140);
    }
    $svg .= "<text x='400' y='220' text-anchor='middle' class='small fill-muted'>Each middleware can act before (request) and after (response). Decorator-style chain.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   N+1 problem
   ============================================================= */
function svg_nplusone(): string {
    $svg = _svg_open('N+1 query problem');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>N+1 vs eager loading</text>";
    // Bad path
    $svg .= "<text x='200' y='75' text-anchor='middle' class='label fill-bad'>❌ Lazy (1 + N queries)</text>";
    for ($i = 0; $i < 5; $i++) {
        $svg .= "<rect x='" . (60 + $i*60) . "' y='90' width='50' height='30' rx='4' class='fill-bad'/>";
    }
    $svg .= "<text x='200' y='145' text-anchor='middle' class='small fill-muted'>1 query for posts + N queries for authors</text>";
    // Good path
    $svg .= "<text x='600' y='75' text-anchor='middle' class='label fill-good'>✓ Eager (2 queries)</text>";
    $svg .= "<rect x='500' y='90' width='80' height='30' rx='4' class='fill-good'/>";
    $svg .= "<rect x='620' y='90' width='80' height='30' rx='4' class='fill-good'/>";
    $svg .= "<text x='600' y='145' text-anchor='middle' class='small fill-muted'>Post::with('author')->get()</text>";
    $svg .= "<text x='400' y='220' text-anchor='middle' class='label fill-text'>Always eager-load relations used in loops.</text>";
    $svg .= "<text x='400' y='250' text-anchor='middle' class='small fill-muted'>Model::preventLazyLoading() in local/staging catches this in dev.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Queue / worker
   ============================================================= */
function svg_queue(): string {
    $svg = _svg_open('Queue') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Producers → Queue → Workers</text>";
    $svg .= _box(40, 110, 140, 60, 'Producer\n(app)', 'fill-panel-2 stroke-border');
    // Queue as stacked messages
    for ($i = 0; $i < 5; $i++) {
        $svg .= "<rect x='" . (240 + $i*55) . "' y='115' width='45' height='50' rx='4' class='fill-accent'/>";
    }
    $svg .= "<text x='340' y='200' text-anchor='middle' class='small fill-muted'>jobs: emails, reports, webhooks…</text>";
    $svg .= _box(580, 70, 160, 50, 'Worker A', 'fill-panel-2 stroke-border');
    $svg .= _box(580, 150, 160, 50, 'Worker B', 'fill-panel-2 stroke-border');
    $svg .= _arrow(180, 140, 235, 140);
    $svg .= _arrow(515, 140, 578, 95);
    $svg .= _arrow(515, 140, 578, 175);
    $svg .= "<text x='400' y='250' text-anchor='middle' class='small fill-muted'>At-least-once delivery → make jobs idempotent. Use Horizon to supervise.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Cache — pattern + stampede mitigation
   ============================================================= */
function svg_cache(): string {
    $svg = _svg_open('Caching') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Cache-aside</text>";
    $svg .= _box(40,  120, 140, 60, 'Client', 'fill-panel-2 stroke-border');
    $svg .= _box(330, 120, 140, 60, 'Cache (Redis)', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(620, 120, 140, 60, 'Database', 'fill-panel-2 stroke-border');
    $svg .= _arrow(180, 140, 328, 140);
    $svg .= "<text x='254' y='130' text-anchor='middle' class='small fill-muted'>1. read</text>";
    $svg .= _arrow(470, 150, 618, 150);
    $svg .= "<text x='544' y='168' text-anchor='middle' class='small fill-muted'>2. miss → fetch</text>";
    $svg .= "<path d='M 690 120 V 100 H 400 V 120' fill='none' class='stroke-accent-2' marker-end='url(#arrowhead)'/>";
    $svg .= "<text x='545' y='92' text-anchor='middle' class='small fill-muted'>3. populate</text>";
    $svg .= "<path d='M 330 145 V 220 H 110 V 180' fill='none' class='stroke-accent-2' marker-end='url(#arrowhead)'/>";
    $svg .= "<text x='220' y='240' text-anchor='middle' class='small fill-muted'>4. respond</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Stampede (Redis caching)
   ============================================================= */
function svg_stampede(): string {
    $svg = _svg_open('Cache stampede') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Cache stampede mitigation</text>";
    // Many clients hitting a single expired key
    for ($i = 0; $i < 6; $i++) {
        $svg .= "<circle cx='" . (90 + $i * 20) . "' cy='120' r='10' class='fill-bad'/>";
    }
    $svg .= _box(280, 90, 160, 70, 'Cache (miss)', 'fill-warn stroke-warn');
    $svg .= "<line x1='180' y1='120' x2='278' y2='120' class='stroke-bad' marker-end='url(#arrowhead-bad)'/>";
    // Single lock holder rebuilds
    $svg .= _box(540, 90, 160, 70, "Lock holder\nrebuilds", 'fill-good stroke-good', 'fill-bg');
    $svg .= _arrow(440, 125, 538, 125);
    $svg .= "<text x='400' y='210' text-anchor='middle' class='label fill-text'>Fixes: SET NX EX lock, TTL jitter, stale-while-revalidate.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Kafka — topic, partitions, consumers
   ============================================================= */
function svg_kafka(): string {
    $svg = _svg_open('Kafka topic') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='30' text-anchor='middle' class='title fill-accent'>Kafka topic — partitions and consumer groups</text>";
    // Producer
    $svg .= _box(20, 110, 110, 50, 'Producer', 'fill-panel-2 stroke-border');
    // 3 partitions
    for ($p = 0; $p < 3; $p++) {
        $y = 60 + $p * 60;
        $svg .= "<text x='160' y='" . ($y+30) . "' class='small fill-muted'>P$p</text>";
        for ($m = 0; $m < 6; $m++) {
            $svg .= "<rect x='" . (185 + $m * 32) . "' y='" . ($y + 12) . "' width='28' height='30' rx='3' class='fill-accent'/>";
        }
    }
    // Consumer groups
    $svg .= _box(420, 70, 150, 40, 'Group A (1)', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(420, 130, 150, 40, 'Group A (2)', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(420, 190, 150, 40, 'Group B',     'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(620, 130, 150, 40, 'Analytics',   'fill-panel-2 stroke-border');
    $svg .= "<text x='700' y='245' text-anchor='middle' class='small fill-muted'>each group reads independently</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Outbox pattern
   ============================================================= */
function svg_outbox(): string {
    $svg = _svg_open('Outbox pattern') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='30' text-anchor='middle' class='title fill-accent'>Outbox pattern — atomic save + event</text>";
    $svg .= _box(30, 90, 200, 130, "Postgres\n• orders\n• outbox (same TX)", 'fill-panel-2 stroke-accent');
    $svg .= _box(320, 110, 160, 80, "Relay\n(or Debezium)", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(570, 110, 200, 80, 'Broker (Kafka)', 'fill-panel-2 stroke-border');
    $svg .= _arrow(232, 150, 318, 150);
    $svg .= _arrow(482, 150, 568, 150);
    $svg .= "<text x='400' y='250' text-anchor='middle' class='small fill-muted'>One DB transaction commits business state + outbox row. Relay publishes at-least-once.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Inbox pattern
   ============================================================= */
function svg_inbox(): string {
    $svg = _svg_open('Inbox pattern') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='30' text-anchor='middle' class='title fill-accent'>Inbox pattern — consumer idempotency</text>";
    $svg .= _box(30, 110, 160, 70, 'Broker', 'fill-panel-2 stroke-border');
    $svg .= _box(240, 80, 200, 130, "Consumer\n• check inbox (PK)\n• do work\n• ack", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(490, 110, 280, 70, "Postgres\n• inbox (message_id UNIQUE)\n• business tables", 'fill-panel-2 stroke-accent');
    $svg .= _arrow(190, 145, 238, 145);
    $svg .= _arrow(440, 145, 488, 145);
    $svg .= "<text x='400' y='250' text-anchor='middle' class='small fill-muted'>Insert message_id in same TX as side effect → duplicates fail on unique constraint.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Event sourcing
   ============================================================= */
function svg_event_sourcing(): string {
    $svg = _svg_open('Event sourcing') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='30' text-anchor='middle' class='title fill-accent'>Event sourcing</text>";
    // Event stream
    $events = ['Created','Paid','Shipped','Delivered'];
    foreach ($events as $i => $e) {
        $svg .= "<rect x='" . (50 + $i*180) . "' y='110' width='150' height='50' rx='8' class='fill-accent'/>";
        $svg .= "<text x='" . (125 + $i*180) . "' y='140' text-anchor='middle' class='label fill-bg'>$e</text>";
        if ($i < count($events)-1) {
            $svg .= "<line x1='" . (200 + $i*180) . "' y1='135' x2='" . (228 + $i*180) . "' y2='135' class='stroke-accent' marker-end='url(#arrowhead)'/>";
        }
    }
    $svg .= "<text x='400' y='90' text-anchor='middle' class='label fill-text'>Order #42 — event log</text>";
    $svg .= "<text x='400' y='205' text-anchor='middle' class='small fill-muted'>Current state = fold(events). Periodic snapshots avoid replay cost.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Circuit Breaker state machine
   ============================================================= */
function svg_circuit_breaker(): string {
    $svg = _svg_open('Circuit breaker') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Circuit breaker states</text>";
    // 3 circles
    $states = [
        [180, 'Closed',    'fill-good',   'normal'],
        [400, 'Open',      'fill-bad',    'fail fast'],
        [620, 'Half-open', 'fill-warn',   'probe'],
    ];
    foreach ($states as [$cx, $name, $cls, $sub]) {
        $svg .= "<circle cx='$cx' cy='150' r='65' class='$cls'/>";
        $svg .= "<text x='$cx' y='148' text-anchor='middle' class='label fill-bg'>$name</text>";
        $svg .= "<text x='$cx' y='170' text-anchor='middle' class='small fill-bg'>$sub</text>";
    }
    // Arrows
    $svg .= "<path d='M 245 130 Q 290 90 335 130' fill='none' class='stroke-accent' marker-end='url(#arrowhead)'/>";
    $svg .= "<text x='290' y='90' text-anchor='middle' class='small fill-muted'>error threshold</text>";
    $svg .= "<path d='M 465 130 Q 510 90 555 130' fill='none' class='stroke-accent' marker-end='url(#arrowhead)'/>";
    $svg .= "<text x='510' y='90' text-anchor='middle' class='small fill-muted'>cooldown elapsed</text>";
    $svg .= "<path d='M 555 170 Q 380 230 245 170' fill='none' class='stroke-accent' marker-end='url(#arrowhead)'/>";
    $svg .= "<text x='400' y='250' text-anchor='middle' class='small fill-muted'>probe succeeds → back to closed</text>";
    return $svg . _svg_close();
}

/* =============================================================
   API Gateway
   ============================================================= */
function svg_gateway(): string {
    $svg = _svg_open('API Gateway') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='30' text-anchor='middle' class='title fill-accent'>API Gateway</text>";
    $svg .= _box(30, 110, 130, 60, 'Clients', 'fill-panel-2 stroke-border');
    $svg .= _box(220, 80, 200, 120, "Gateway\n• auth\n• rate limit\n• routing\n• transforms", 'fill-accent stroke-accent', 'fill-bg');
    $services = ['Catalog','Orders','Payments'];
    foreach ($services as $i => $s) {
        $svg .= _box(500, 70 + $i * 70, 250, 50, $s, 'fill-panel-2 stroke-border');
        $svg .= _arrow(420, 140, 498, 95 + $i * 70);
    }
    $svg .= _arrow(160, 140, 218, 140);
    return $svg . _svg_close();
}

/* =============================================================
   Service mesh
   ============================================================= */
function svg_mesh(): string {
    $svg = _svg_open('Service mesh');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='30' text-anchor='middle' class='title fill-accent'>Service mesh — sidecars carry the network</text>";
    for ($i = 0; $i < 3; $i++) {
        $x = 80 + $i * 240;
        // Pod boundary
        $svg .= "<rect x='$x' y='80' width='180' height='160' rx='10' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x + 90) . "' y='105' text-anchor='middle' class='small fill-muted'>Pod</text>";
        $svg .= _box($x + 15, 120, 70, 80, 'app', 'fill-accent stroke-accent', 'fill-bg');
        $svg .= _box($x + 95, 120, 70, 80, 'envoy', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    }
    // mTLS arrows between sidecars
    $svg .= "<line x1='245' y1='160' x2='335' y2='160' class='stroke-good' stroke-dasharray='4 3'/>";
    $svg .= "<line x1='485' y1='160' x2='575' y2='160' class='stroke-good' stroke-dasharray='4 3'/>";
    $svg .= "<text x='400' y='265' text-anchor='middle' class='small fill-muted'>app→sidecar→sidecar→app. mTLS, retries, traces handled by the sidecar.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   gRPC vs REST vs GraphQL
   ============================================================= */
function svg_grpc(): string {
    $svg = _svg_open('gRPC vs REST vs GraphQL');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>gRPC vs REST vs GraphQL</text>";
    $cols = [
        ['REST',    'HTTP/1+JSON', 'Public APIs'],
        ['gRPC',    'HTTP/2+Proto', 'Service-to-service'],
        ['GraphQL', 'HTTP+JSON',    'Aggregating views'],
    ];
    foreach ($cols as $i => [$h, $proto, $use]) {
        $x = 50 + $i * 240;
        $svg .= "<rect x='$x' y='70' width='220' height='180' rx='12' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+110) . "' y='110' text-anchor='middle' class='title fill-accent'>$h</text>";
        $svg .= "<text x='" . ($x+110) . "' y='160' text-anchor='middle' class='label fill-text'>$proto</text>";
        $svg .= "<text x='" . ($x+110) . "' y='205' text-anchor='middle' class='small fill-muted'>Best for: $use</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   K8s — pod / node / cluster
   ============================================================= */
function svg_k8s(): string {
    $svg = _svg_open('K8s');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>K8s — containers in pods in nodes</text>";
    $svg .= "<rect x='30' y='60' width='740' height='200' rx='14' class='fill-panel-2 stroke-border'/>";
    $svg .= "<text x='400' y='82' text-anchor='middle' class='small fill-muted'>Cluster</text>";
    for ($n = 0; $n < 2; $n++) {
        $nx = 60 + $n * 360;
        $svg .= "<rect x='$nx' y='100' width='340' height='140' rx='10' class='fill-bg stroke-accent-2'/>";
        $svg .= "<text x='" . ($nx + 170) . "' y='120' text-anchor='middle' class='small fill-muted'>Node " . ($n+1) . "</text>";
        for ($p = 0; $p < 2; $p++) {
            $px = $nx + 15 + $p * 160;
            $svg .= "<rect x='$px' y='135' width='150' height='95' rx='8' class='fill-panel-2 stroke-accent'/>";
            $svg .= "<text x='" . ($px + 75) . "' y='155' text-anchor='middle' class='small fill-accent'>Pod</text>";
            $svg .= _box($px + 10, 165, 130, 55, 'container', 'fill-accent stroke-accent', 'fill-bg');
        }
    }
    return $svg . _svg_close();
}

/* =============================================================
   Pod states
   ============================================================= */
function svg_pod_states(): string {
    $svg = _svg_open('Pod failure states');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>K8s pod failure states</text>";
    $items = [
        ['CrashLoopBackOff', 'container keeps exiting'],
        ['OOMKilled',        'over memory limit'],
        ['ImagePullBackOff', 'can\'t fetch image'],
        ['Pending',          'no node fits'],
    ];
    foreach ($items as $i => [$name, $why]) {
        $y = 75 + $i * 45;
        $svg .= "<rect x='40'  y='$y' width='260' height='34' rx='6' class='fill-bad'/>";
        $svg .= "<text x='170' y='" . ($y + 22) . "' text-anchor='middle' class='label fill-bg'>$name</text>";
        $svg .= "<text x='320' y='" . ($y + 22) . "' class='label fill-text'>→ $why</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   AWS core services
   ============================================================= */
function svg_aws(): string {
    $svg = _svg_open('AWS');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>AWS core building blocks</text>";
    $cells = [
        ['EC2','VMs'], ['ECS/EKS','Containers'], ['Lambda','Serverless'], ['S3','Object storage'],
        ['RDS','Managed SQL'], ['DynamoDB','NoSQL'], ['SQS','Queues'], ['CloudFront','CDN'],
    ];
    foreach ($cells as $i => [$name, $sub]) {
        $col = $i % 4;
        $row = intdiv($i, 4);
        $x = 40 + $col * 190;
        $y = 70 + $row * 95;
        $svg .= "<rect x='$x' y='$y' width='170' height='80' rx='10' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+85) . "' y='" . ($y+32) . "' text-anchor='middle' class='label fill-accent'>$name</text>";
        $svg .= "<text x='" . ($x+85) . "' y='" . ($y+55) . "' text-anchor='middle' class='small fill-muted'>$sub</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   HTTP version stack
   ============================================================= */
function svg_http_stack(): string {
    $svg = _svg_open('HTTP versions');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>HTTP/1.1 vs HTTP/2 vs HTTP/3</text>";
    $stacks = [
        ['HTTP/1.1', 'TCP', 'IP', 'fill-muted'],
        ['HTTP/2',   'TCP + TLS', 'IP', 'fill-accent'],
        ['HTTP/3',   'QUIC (over UDP) + TLS 1.3', 'IP', 'fill-accent-2'],
    ];
    foreach ($stacks as $i => [$top, $mid, $bot, $cls]) {
        $x = 60 + $i * 240;
        $svg .= "<rect x='$x' y='80' width='200' height='50' rx='8' class='$cls'/>";
        $svg .= "<text x='" . ($x+100) . "' y='110' text-anchor='middle' class='label fill-bg'>$top</text>";
        $svg .= "<rect x='$x' y='135' width='200' height='50' rx='8' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+100) . "' y='165' text-anchor='middle' class='label fill-text'>$mid</text>";
        $svg .= "<rect x='$x' y='190' width='200' height='40' rx='8' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+100) . "' y='215' text-anchor='middle' class='label fill-muted'>$bot</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   WebSocket / SSE / Long-polling comparison
   ============================================================= */
function svg_realtime(): string {
    $svg = _svg_open('Realtime comparison') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Real-time options</text>";
    $cols = [
        ['Long polling', '↔ HTTP', 'fill-muted'],
        ['SSE',          '↓ HTTP', 'fill-accent'],
        ['WebSocket',    '↕ ws',   'fill-accent-2'],
    ];
    foreach ($cols as $i => [$name, $arrow, $cls]) {
        $x = 60 + $i * 240;
        $svg .= "<rect x='$x' y='80' width='200' height='160' rx='12' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+100) . "' y='120' text-anchor='middle' class='title fill-accent'>$name</text>";
        $svg .= "<text x='" . ($x+100) . "' y='175' text-anchor='middle' class='big-letter $cls'>$arrow</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   TLS handshake
   ============================================================= */
function svg_tls(): string {
    $svg = _svg_open('TLS 1.3') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>TLS 1.3 handshake (1-RTT)</text>";
    $svg .= "<text x='120' y='75' text-anchor='middle' class='label fill-accent'>Client</text>";
    $svg .= "<text x='680' y='75' text-anchor='middle' class='label fill-accent'>Server</text>";
    $svg .= "<line x1='120' y1='90' x2='120' y2='250' class='stroke-border'/>";
    $svg .= "<line x1='680' y1='90' x2='680' y2='250' class='stroke-border'/>";
    $msgs = [
        [120, 130, 680, 130, 'ClientHello + key share',                'stroke-accent'],
        [680, 170, 120, 170, 'ServerHello + cert + Finished',          'stroke-accent-2'],
        [120, 210, 680, 210, 'Client Finished + application data',     'stroke-good'],
    ];
    foreach ($msgs as [$x1,$y1,$x2,$y2,$label,$cls]) {
        $svg .= "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' class='$cls' marker-end='url(#arrowhead)'/>";
        $svg .= "<text x='400' y='" . ($y1 - 6) . "' text-anchor='middle' class='small fill-muted'>$label</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   DynamoDB single-table
   ============================================================= */
function svg_single_table(): string {
    $svg = _svg_open('Single-table design');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>DynamoDB single-table</text>";
    $rows = [
        ['USER#1', 'PROFILE',         'name="Alice"'],
        ['USER#1', 'ORDER#2026-01-1', 'total=120'],
        ['USER#1', 'ORDER#2026-01-2', 'total=80'],
        ['USER#2', 'PROFILE',         'name="Bob"'],
        ['USER#2', 'ADDRESS#home',    'cairo'],
    ];
    $svg .= "<text x='80'  y='90' class='label fill-accent'>PK</text>";
    $svg .= "<text x='280' y='90' class='label fill-accent'>SK</text>";
    $svg .= "<text x='540' y='90' class='label fill-accent'>attrs</text>";
    foreach ($rows as $i => $r) {
        $y = 115 + $i * 30;
        $svg .= "<text x='80'  y='$y' class='label fill-text'>$r[0]</text>";
        $svg .= "<text x='280' y='$y' class='label fill-text'>$r[1]</text>";
        $svg .= "<text x='540' y='$y' class='label fill-muted'>$r[2]</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   Inverted index
   ============================================================= */
function svg_inverted_index(): string {
    $svg = _svg_open('Inverted index');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Inverted index (search)</text>";
    $svg .= "<text x='160' y='80' text-anchor='middle' class='label fill-accent'>Term</text>";
    $svg .= "<text x='560' y='80' text-anchor='middle' class='label fill-accent'>Postings (doc IDs)</text>";
    $rows = [
        ['php',     '[1, 3, 7, 12]'],
        ['laravel', '[1, 3, 12, 18]'],
        ['cache',   '[3, 7, 22]'],
        ['redis',   '[7, 22, 41]'],
    ];
    foreach ($rows as $i => [$t, $p]) {
        $y = 115 + $i * 35;
        $svg .= "<rect x='60' y='" . ($y-22) . "' width='200' height='28' rx='5' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='160' y='" . ($y-2) . "' text-anchor='middle' class='label fill-text'>$t</text>";
        $svg .= "<text x='560' y='" . ($y-2) . "' text-anchor='middle' class='label fill-muted'>$p</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   CDC
   ============================================================= */
function svg_cdc(): string {
    $svg = _svg_open('CDC') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Change Data Capture</text>";
    $svg .= _box(30, 120, 180, 60, "Postgres\nWAL", 'fill-panel-2 stroke-accent');
    $svg .= _box(270, 120, 180, 60, 'Debezium', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(510, 120, 180, 60, 'Kafka', 'fill-panel-2 stroke-border');
    $svg .= _arrow(210, 150, 268, 150);
    $svg .= _arrow(450, 150, 508, 150);
    // Consumers
    $svg .= _box(700, 60, 90, 40, 'Search', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(700, 130, 90, 40, 'Cache', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(700, 200, 90, 40, 'Lake', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    return $svg . _svg_close();
}

/* =============================================================
   RAG pipeline
   ============================================================= */
function svg_rag(): string {
    $svg = _svg_open('RAG pipeline') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='30' text-anchor='middle' class='title fill-accent'>RAG pipeline</text>";
    // Ingest row
    $svg .= "<text x='20'  y='75' class='small fill-muted'>Ingest:</text>";
    $items_i = ['Docs','Chunk','Embed','Vector DB'];
    foreach ($items_i as $i => $n) {
        $x = 80 + $i * 170;
        $svg .= _box($x, 85, 150, 45, $n, 'fill-panel-2 stroke-border');
        if ($i < 3) $svg .= _arrow($x+150, 107, $x+168, 107);
    }
    // Query row
    $svg .= "<text x='20'  y='185' class='small fill-muted'>Query:</text>";
    $items_q = ['Question','Embed','Top-K + rerank','LLM','Answer + cites'];
    foreach ($items_q as $i => $n) {
        $x = 80 + $i * 142;
        $svg .= _box($x, 195, 130, 45, $n, 'fill-accent stroke-accent', 'fill-bg');
        if ($i < 4) $svg .= _arrow($x+130, 217, $x+140, 217);
    }
    return $svg . _svg_close();
}

/* =============================================================
   HNSW
   ============================================================= */
function svg_hnsw(): string {
    $svg = _svg_open('HNSW');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>HNSW — hierarchical graph for ANN</text>";
    $layers = [
        [70,  [400], 'sparse top'],
        [140, [200,400,600], 'mid layer'],
        [210, [100,200,300,400,500,600,700], 'dense bottom'],
    ];
    foreach ($layers as [$y, $xs, $label]) {
        $svg .= "<text x='20' y='" . ($y+5) . "' class='small fill-muted'>$label</text>";
        foreach ($xs as $x) {
            $svg .= "<circle cx='$x' cy='$y' r='8' class='fill-accent'/>";
        }
        // connect adjacent
        for ($i = 0; $i < count($xs) - 1; $i++) {
            $svg .= "<line x1='" . $xs[$i] . "' y1='$y' x2='" . $xs[$i+1] . "' y2='$y' class='stroke-accent-2'/>";
        }
    }
    // Cross-layer links
    $svg .= "<line x1='400' y1='78' x2='400' y2='132' class='stroke-accent-2' stroke-dasharray='3 3'/>";
    $svg .= "<line x1='200' y1='148' x2='200' y2='202' class='stroke-accent-2' stroke-dasharray='3 3'/>";
    $svg .= "<line x1='600' y1='148' x2='600' y2='202' class='stroke-accent-2' stroke-dasharray='3 3'/>";
    $svg .= "<text x='400' y='258' text-anchor='middle' class='small fill-muted'>Search descends from top; follows neighbours nearest to the query.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Embeddings & chunking
   ============================================================= */
function svg_embeddings(): string {
    $svg = _svg_open('Embeddings');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Text → vector (embedding)</text>";
    $svg .= _box(40, 110, 200, 70, "'Senior PHP\nbackend interview'", 'fill-panel-2 stroke-border');
    $svg .= _box(310, 110, 180, 70, 'Embedding model', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _arrow(240, 145, 308, 145);
    $svg .= _arrow(490, 145, 555, 145);
    // Vector representation
    $svg .= "<text x='670' y='90' text-anchor='middle' class='small fill-muted'>[0.21, -0.05, 0.83, ..., 0.11]</text>";
    for ($i = 0; $i < 8; $i++) {
        $h = 5 + ($i * 7 % 50);
        $svg .= "<rect x='" . (565 + $i * 25) . "' y='" . (165 - $h) . "' width='18' height='$h' class='fill-accent-2'/>";
    }
    $svg .= "<text x='670' y='190' text-anchor='middle' class='small fill-muted'>768–3072 dims</text>";
    return $svg . _svg_close();
}

/* =============================================================
   LLM serving
   ============================================================= */
function svg_llm_serving(): string {
    $svg = _svg_open('LLM serving') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='30' text-anchor='middle' class='title fill-accent'>LLM serving patterns</text>";
    $svg .= _box(40, 110, 150, 60, 'Client', 'fill-panel-2 stroke-border');
    $svg .= _box(230, 110, 170, 60, "Gateway\n+ prompt cache", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(450, 80, 150, 50, 'Primary LLM', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(450, 150, 150, 50, 'Fallback LLM', 'fill-warn stroke-warn');
    $svg .= _box(650, 110, 130, 60, 'SSE stream', 'fill-panel-2 stroke-border');
    $svg .= _arrow(190, 140, 228, 140);
    $svg .= _arrow(400, 140, 448, 105);
    $svg .= _arrow(400, 140, 448, 175);
    $svg .= _arrow(600, 140, 648, 140);
    $svg .= "<text x='400' y='240' text-anchor='middle' class='small fill-muted'>Stream tokens, cache prompt prefix, fall back on errors, cap per-tenant tokens.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   PHP execution flow
   ============================================================= */
function svg_php_exec(): string {
    $svg = _svg_open('PHP execution') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>How PHP executes your code</text>";
    $steps = ['Source','Lexer','Parser','AST','Compiler','Opcodes','Zend VM','Output'];
    foreach ($steps as $i => $s) {
        $col = $i % 4;
        $row = intdiv($i, 4);
        $x = 40 + $col * 195;
        $y = 80 + $row * 90;
        $cls = ($s === 'Opcodes' || $s === 'Zend VM') ? 'fill-accent stroke-accent' : 'fill-panel-2 stroke-border';
        $tx  = ($s === 'Opcodes' || $s === 'Zend VM') ? 'fill-bg' : 'fill-text';
        $svg .= _box($x, $y, 160, 55, $s, $cls, $tx);
        if ($col < 3) $svg .= _arrow($x+160, $y+27, $x+193, $y+27);
    }
    $svg .= "<path d='M 760 135 V 165 H 200 V 195' class='stroke-accent' fill='none' marker-end='url(#arrowhead)'/>";
    return $svg . _svg_close();
}

/* =============================================================
   OOP pillars
   ============================================================= */
function svg_oop_pillars(): string {
    $cols = [
        ['🔒', 'Encapsulation'],
        ['🧬', 'Inheritance'],
        ['🎭', 'Polymorphism'],
        ['🎯', 'Abstraction'],
    ];
    $svg = _svg_open('OOP pillars');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='36' text-anchor='middle' class='title fill-accent'>The 4 OOP pillars</text>";
    foreach ($cols as $i => [$emoji, $name]) {
        $x = 40 + $i * 185;
        $svg .= "<rect x='$x' y='80' width='160' height='160' rx='12' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+80) . "' y='150' text-anchor='middle' class='big-letter'>$emoji</text>";
        $svg .= "<text x='" . ($x+80) . "' y='205' text-anchor='middle' class='label fill-text'>$name</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   SOLID
   ============================================================= */
function svg_solid(): string {
    $letters = [
        ['S', 'Single Responsibility'],
        ['O', 'Open / Closed'],
        ['L', 'Liskov Substitution'],
        ['I', 'Interface Segregation'],
        ['D', 'Dependency Inversion'],
    ];
    $svg = _svg_open('SOLID');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='34' text-anchor='middle' class='title fill-accent'>SOLID principles</text>";
    foreach ($letters as $i => [$L, $name]) {
        $x = 30 + $i * 152;
        $svg .= "<rect x='$x' y='75' width='140' height='170' rx='12' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+70) . "' y='150' text-anchor='middle' class='big-letter fill-accent'>$L</text>";
        $svg .= "<text x='" . ($x+70) . "' y='200' text-anchor='middle' class='small fill-muted'>$name</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   Copy-on-Write (memory)
   ============================================================= */
function svg_cow(): string {
    $svg = _svg_open('Copy-on-write');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Copy-On-Write (refcount)</text>";
    // Before write
    $svg .= "<text x='200' y='75' text-anchor='middle' class='label fill-accent'>Before write</text>";
    $svg .= _box(60, 100, 100, 40, '$a', 'fill-panel-2 stroke-border');
    $svg .= _box(60, 160, 100, 40, '$b', 'fill-panel-2 stroke-border');
    $svg .= _box(220, 130, 140, 40, "shared\nrefcount=2", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _arrow(160, 120, 218, 145);
    $svg .= _arrow(160, 180, 218, 165);
    // After write
    $svg .= "<text x='600' y='75' text-anchor='middle' class='label fill-accent'>After \$b[0] = …</text>";
    $svg .= _box(440, 100, 100, 40, '$a', 'fill-panel-2 stroke-border');
    $svg .= _box(440, 200, 100, 40, '$b', 'fill-panel-2 stroke-border');
    $svg .= _box(580, 100, 140, 40, "copy A\nrefcount=1", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(580, 200, 140, 40, "copy B\nrefcount=1", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _arrow(540, 120, 578, 120);
    $svg .= _arrow(540, 220, 578, 220);
    return $svg . _svg_close();
}

/* =============================================================
   DI / container
   ============================================================= */
function svg_di(): string {
    $svg = _svg_open('Service container') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Service container — automatic resolution</text>";
    $svg .= _box(40, 110, 160, 70, 'Controller', 'fill-panel-2 stroke-border');
    $svg .= _box(280, 110, 240, 70, "Container\n(reflection)", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(580, 60, 180, 50, 'UserService', 'fill-panel-2 stroke-border');
    $svg .= _box(580, 130, 180, 50, 'Logger', 'fill-panel-2 stroke-border');
    $svg .= _box(580, 200, 180, 50, 'Cache', 'fill-panel-2 stroke-border');
    $svg .= _arrow(200, 145, 278, 145);
    $svg .= _arrow(520, 145, 578, 85);
    $svg .= _arrow(520, 145, 578, 155);
    $svg .= _arrow(520, 145, 578, 225);
    return $svg . _svg_close();
}

/* =============================================================
   Redis types
   ============================================================= */
function svg_redis_types(): string {
    $types = ['String','List','Set','Sorted Set','Hash','Stream','HLL','Geo'];
    $svg = _svg_open('Redis types');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Redis core data types</text>";
    foreach ($types as $i => $t) {
        $col = $i % 4;
        $row = intdiv($i, 4);
        $x = 40 + $col * 190;
        $y = 80 + $row * 90;
        $svg .= "<rect x='$x' y='$y' width='170' height='75' rx='10' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+85) . "' y='" . ($y+45) . "' text-anchor='middle' class='label fill-accent'>$t</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   Container
   ============================================================= */
function svg_container(): string {
    $svg = _svg_open('Container');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Container vs VM</text>";
    $svg .= "<text x='200' y='80' text-anchor='middle' class='label fill-accent'>VM</text>";
    $svg .= _box(50, 100, 300, 30, 'App', 'fill-panel-2 stroke-border');
    $svg .= _box(50, 135, 300, 30, 'Guest OS', 'fill-warn stroke-warn');
    $svg .= _box(50, 170, 300, 30, 'Hypervisor', 'fill-bad stroke-bad', 'fill-bg');
    $svg .= _box(50, 205, 300, 30, 'Host OS', 'fill-muted stroke-border', 'fill-bg');
    $svg .= "<text x='600' y='80' text-anchor='middle' class='label fill-accent'>Container</text>";
    $svg .= _box(450, 100, 300, 30, 'App', 'fill-panel-2 stroke-border');
    $svg .= _box(450, 135, 300, 30, 'Container runtime', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(450, 170, 300, 65, 'Host OS (shared kernel)', 'fill-muted stroke-border', 'fill-bg');
    return $svg . _svg_close();
}

/* =============================================================
   System designs
   ============================================================= */
function svg_sd_url(): string {
    $svg = _svg_open('URL shortener') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>URL Shortener</text>";
    $svg .= _box(30, 120, 130, 50, 'Client', 'fill-panel-2 stroke-border');
    $svg .= _box(195, 80, 130, 50, 'CDN edge', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(195, 165, 130, 50, 'API', 'fill-panel-2 stroke-border');
    $svg .= _box(370, 80, 130, 50, 'Cache', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(370, 165, 130, 50, 'Key-gen', 'fill-panel-2 stroke-border');
    $svg .= _box(550, 120, 220, 50, 'DynamoDB / Postgres', 'fill-panel-2 stroke-accent');
    $svg .= _arrow(160, 145, 193, 105);
    $svg .= _arrow(160, 145, 193, 185);
    $svg .= _arrow(325, 105, 368, 105);
    $svg .= _arrow(325, 185, 368, 185);
    $svg .= _arrow(500, 105, 548, 145);
    $svg .= _arrow(500, 185, 548, 145);
    return $svg . _svg_close();
}

function svg_sd_uber(): string {
    $svg = _svg_open('Uber dispatch') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Uber — match riders to drivers</text>";
    $svg .= _box(30, 70, 130, 50, 'Rider', 'fill-panel-2 stroke-border');
    $svg .= _box(30, 200, 130, 50, 'Driver', 'fill-panel-2 stroke-border');
    $svg .= _box(200, 130, 160, 60, 'Kafka', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(400, 70, 180, 60, 'Matching (DISCO)', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(400, 190, 180, 60, "Geo index\n(S2/H3)", 'fill-panel-2 stroke-accent');
    $svg .= _box(620, 130, 150, 60, 'Surge pricing', 'fill-warn stroke-warn');
    $svg .= _arrow(160, 95, 198, 145);
    $svg .= _arrow(160, 225, 198, 175);
    $svg .= _arrow(360, 160, 398, 100);
    $svg .= _arrow(360, 160, 398, 220);
    $svg .= _arrow(580, 100, 618, 150);
    return $svg . _svg_close();
}

function svg_sd_chat(): string {
    $svg = _svg_open('Chat') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Chat — connection manager + fan-out</text>";
    $svg .= _box(30, 80, 120, 50, 'Sender', 'fill-panel-2 stroke-border');
    $svg .= _box(30, 170, 120, 50, 'Receiver', 'fill-panel-2 stroke-border');
    $svg .= _box(180, 130, 160, 50, 'WS gateway', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(370, 130, 160, 50, 'Message service', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(560, 70, 180, 50, 'Inbox store', 'fill-panel-2 stroke-accent');
    $svg .= _box(560, 170, 180, 50, 'Push (offline)', 'fill-panel-2 stroke-border');
    $svg .= _arrow(150, 105, 180, 145);
    $svg .= _arrow(150, 195, 180, 165);
    $svg .= _arrow(340, 155, 368, 155);
    $svg .= _arrow(530, 155, 558, 95);
    $svg .= _arrow(530, 155, 558, 195);
    return $svg . _svg_close();
}

function svg_sd_payment(): string {
    $svg = _svg_open('Payments') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Payment gateway — idempotency end-to-end</text>";
    $svg .= _box(30, 120, 130, 50, 'Client\n+ Idem-Key', 'fill-panel-2 stroke-border');
    $svg .= _box(190, 120, 160, 50, 'API\n(dedupe)', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(380, 70, 180, 50, 'Ledger (append-only)', 'fill-panel-2 stroke-accent');
    $svg .= _box(380, 170, 180, 50, 'Processor (Stripe…)', 'fill-panel-2 stroke-border');
    $svg .= _box(600, 120, 170, 50, 'Webhook verifier', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _arrow(160, 145, 188, 145);
    $svg .= _arrow(350, 145, 378, 95);
    $svg .= _arrow(350, 145, 378, 195);
    $svg .= _arrow(560, 195, 598, 145);
    return $svg . _svg_close();
}

/* =============================================================
   CQRS
   ============================================================= */
function svg_cqrs(): string {
    $svg = _svg_open('CQRS') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>CQRS — split read and write models</text>";
    $svg .= _box(30, 120, 130, 60, 'Client', 'fill-panel-2 stroke-border');
    $svg .= _box(200, 70,  170, 50, 'Command API', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(200, 180, 170, 50, 'Query API',   'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(420, 70,  170, 50, 'Write DB',    'fill-panel-2 stroke-accent');
    $svg .= _box(420, 180, 170, 50, 'Read DB / view', 'fill-panel-2 stroke-accent-2');
    $svg .= _box(630, 125, 140, 50, 'Projector', 'fill-warn stroke-warn');
    $svg .= _arrow(160, 145, 200, 95);
    $svg .= _arrow(160, 165, 200, 205);
    $svg .= _arrow(370, 95, 420, 95);
    $svg .= _arrow(370, 205, 420, 205);
    $svg .= "<path d='M 590 95 H 700 V 130' fill='none' class='stroke-accent' marker-end='url(#arrowhead)'/>";
    $svg .= "<path d='M 700 175 V 205 H 590' fill='none' class='stroke-accent' marker-end='url(#arrowhead)'/>";
    return $svg . _svg_close();
}

/* =============================================================
   Saga
   ============================================================= */
function svg_saga(): string {
    $svg = _svg_open('Saga') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Saga — orchestrated order flow</text>";
    $svg .= _box(330, 70, 140, 50, 'Orchestrator', 'fill-accent stroke-accent', 'fill-bg');
    $services = ['Order','Inventory','Payment','Shipping'];
    foreach ($services as $i => $s) {
        $x = 30 + $i * 195;
        $svg .= _box($x, 200, 160, 50, $s, 'fill-panel-2 stroke-border');
        $svg .= _arrow(400, 122, $x + 80, 198);
    }
    $svg .= "<text x='400' y='265' text-anchor='middle' class='small fill-muted'>Each step has a compensating action — on failure they roll back forward.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Decorator
   ============================================================= */
function svg_decorator(): string {
    $svg = _svg_open('Decorator') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Decorator — wrap to add behavior</text>";
    $svg .= "<rect x='60' y='80' width='680' height='160' rx='14' class='fill-panel-2 stroke-border'/>";
    $svg .= "<text x='95' y='100' class='small fill-muted'>LoggingRepo</text>";
    $svg .= "<rect x='130' y='115' width='550' height='100' rx='12' class='fill-bg stroke-accent-2'/>";
    $svg .= "<text x='165' y='135' class='small fill-muted'>CachedRepo</text>";
    $svg .= "<rect x='200' y='150' width='400' height='50' rx='10' class='fill-accent stroke-accent'/>";
    $svg .= "<text x='400' y='180' text-anchor='middle' class='label fill-bg'>UserRepository (core)</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Strategy
   ============================================================= */
function svg_strategy(): string {
    $svg = _svg_open('Strategy');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Strategy — same interface, many impls</text>";
    $svg .= _box(40, 130, 160, 50, 'Context', 'fill-panel-2 stroke-border');
    $svg .= _box(260, 130, 180, 50, 'Strategy interface', 'fill-accent stroke-accent', 'fill-bg');
    $impls = ['Standard ship','Express ship','SameDay ship'];
    foreach ($impls as $i => $n) {
        $svg .= _box(500, 70 + $i*70, 220, 50, $n, 'fill-panel-2 stroke-accent-2');
        $svg .= _arrow(440, 155, 500, 95 + $i*70);
    }
    $svg .= _arrow(200, 155, 258, 155);
    return $svg . _svg_close();
}

/* =============================================================
   Fibers
   ============================================================= */
function svg_fibers(): string {
    $svg = _svg_open('PHP Fibers');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Fibers — stackful coroutines</text>";
    $svg .= "<text x='400' y='65' text-anchor='middle' class='small fill-muted'>One PHP process, many fibers; yield on I/O, resume when ready.</text>";
    $colors = ['fill-accent','fill-accent-2','fill-good','fill-warn'];
    for ($i = 0; $i < 4; $i++) {
        $y = 100 + $i * 40;
        $svg .= "<text x='40' y='" . ($y+15) . "' class='small fill-muted'>fiber " . ($i+1) . "</text>";
        for ($j = 0; $j < 8; $j++) {
            $w = 60;
            $x = 110 + $j * 80 + ($i * 5);
            $cls = $colors[$i];
            $opacity = ($j + $i) % 3 ? '' : ' opacity="0.35"';
            $svg .= "<rect x='$x' y='$y' width='$w' height='22' rx='4' class='$cls'$opacity/>";
        }
    }
    $svg .= "<text x='400' y='265' text-anchor='middle' class='small fill-muted'>blocks = CPU; gaps = I/O wait → another fiber runs</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Octane
   ============================================================= */
function svg_octane(): string {
    $svg = _svg_open('Octane') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Octane — boot once, serve many</text>";
    $svg .= "<text x='200' y='75' text-anchor='middle' class='label fill-bad'>PHP-FPM</text>";
    for ($i = 0; $i < 3; $i++) {
        $y = 95 + $i * 50;
        $svg .= _box(40, $y, 130, 30, 'boot', 'fill-bad');
        $svg .= _box(180, $y, 130, 30, 'request', 'fill-panel-2 stroke-border');
    }
    $svg .= "<text x='600' y='75' text-anchor='middle' class='label fill-good'>Octane</text>";
    $svg .= _box(440, 95, 130, 30, 'boot once', 'fill-good');
    for ($i = 0; $i < 3; $i++) {
        $svg .= _box(580 + $i*40, 95, 30, 30, '', 'fill-accent');
    }
    $svg .= _box(440, 145, 130, 30, 'request', 'fill-panel-2 stroke-border');
    $svg .= _box(580, 145, 130, 30, 'request', 'fill-panel-2 stroke-border');
    $svg .= _box(440, 195, 130, 30, 'request', 'fill-panel-2 stroke-border');
    $svg .= _box(580, 195, 130, 30, 'request', 'fill-panel-2 stroke-border');
    return $svg . _svg_close();
}

/* =============================================================
   JWT
   ============================================================= */
function svg_jwt(): string {
    $svg = _svg_open('JWT');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>JWT = header.payload.signature</text>";
    $svg .= "<rect x='40' y='110' width='220' height='80' rx='10' class='fill-accent'/>";
    $svg .= "<text x='150' y='145' text-anchor='middle' class='label fill-bg'>HEADER</text>";
    $svg .= "<text x='150' y='170' text-anchor='middle' class='small fill-bg'>{alg, typ}</text>";
    $svg .= "<rect x='290' y='110' width='220' height='80' rx='10' class='fill-accent-2'/>";
    $svg .= "<text x='400' y='145' text-anchor='middle' class='label fill-bg'>PAYLOAD</text>";
    $svg .= "<text x='400' y='170' text-anchor='middle' class='small fill-bg'>{sub, exp, jti…}</text>";
    $svg .= "<rect x='540' y='110' width='220' height='80' rx='10' class='fill-good'/>";
    $svg .= "<text x='650' y='145' text-anchor='middle' class='label fill-bg'>SIGNATURE</text>";
    $svg .= "<text x='650' y='170' text-anchor='middle' class='small fill-bg'>HMAC / RS256</text>";
    $svg .= "<text x='400' y='240' text-anchor='middle' class='small fill-muted'>Pin alg on verify side. Short TTL. Don't store in localStorage.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Token bucket
   ============================================================= */
function svg_token_bucket(): string {
    $svg = _svg_open('Token bucket') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Token bucket rate limiter</text>";
    // Faucet
    $svg .= "<text x='200' y='75' text-anchor='middle' class='label fill-accent'>refill rate</text>";
    for ($i = 0; $i < 5; $i++) {
        $svg .= "<circle cx='" . (140 + $i*30) . "' cy='105' r='8' class='fill-accent'/>";
    }
    // Bucket
    $svg .= "<path d='M 130 130 L 280 130 L 260 230 L 150 230 Z' class='fill-panel-2 stroke-accent'/>";
    for ($i = 0; $i < 6; $i++) {
        $svg .= "<circle cx='" . (170 + ($i%3)*35) . "' cy='" . (190 + ($i>=3 ? -25 : 0)) . "' r='8' class='fill-accent'/>";
    }
    // Out
    $svg .= "<text x='400' y='160' text-anchor='middle' class='label fill-good'>request consumes a token</text>";
    $svg .= _arrow(285, 175, 380, 175);
    $svg .= _box(420, 145, 260, 60, 'allowed', 'fill-good stroke-good', 'fill-bg');
    $svg .= "<text x='400' y='245' text-anchor='middle' class='small fill-muted'>Empty bucket → 429 + Retry-After.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   BOLA
   ============================================================= */
function svg_bola(): string {
    $svg = _svg_open('BOLA');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>BOLA — Broken Object Level Authorization</text>";
    $svg .= "<text x='200' y='75' text-anchor='middle' class='label fill-bad'>❌ vulnerable</text>";
    $svg .= _box(40, 100, 320, 50, "GET /orders/42  → Order::find(42)", 'fill-bad', 'fill-bg');
    $svg .= _box(40, 165, 320, 50, 'attacker iterates IDs, reads all orders', 'fill-panel-2 stroke-bad');
    $svg .= "<text x='600' y='75' text-anchor='middle' class='label fill-good'>✓ fixed</text>";
    $svg .= _box(440, 100, 320, 50, "GET /orders/42 → \$user->orders()->find(42)", 'fill-good', 'fill-bg');
    $svg .= _box(440, 165, 320, 50, 'scoped by current user', 'fill-panel-2 stroke-good');
    $svg .= "<text x='400' y='250' text-anchor='middle' class='small fill-muted'>BOLA is ~40% of all API attacks (OWASP API1).</text>";
    return $svg . _svg_close();
}

/* =============================================================
   Three pillars (observability)
   ============================================================= */
function svg_three_pillars(): string {
    $cols = [
        ['📄','Logs','events with context','fill-accent'],
        ['📊','Metrics','low-card time series','fill-accent-2'],
        ['🔗','Traces','causal spans','fill-good'],
    ];
    $svg = _svg_open('Observability pillars');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='40' text-anchor='middle' class='title fill-accent'>Three pillars of observability</text>";
    foreach ($cols as $i => [$emoji, $title, $sub, $cls]) {
        $x = 30 + $i * 260;
        $svg .= "<rect x='$x' y='80' width='240' height='160' rx='12' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+120) . "' y='140' text-anchor='middle' class='big-letter'>$emoji</text>";
        $svg .= "<text x='" . ($x+120) . "' y='185' text-anchor='middle' class='label $cls'>$title</text>";
        $svg .= "<text x='" . ($x+120) . "' y='215' text-anchor='middle' class='small fill-muted'>$sub</text>";
    }
    return $svg . _svg_close();
}

/* =============================================================
   OTel
   ============================================================= */
function svg_otel(): string {
    $svg = _svg_open('OpenTelemetry') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>OpenTelemetry data flow</text>";
    $svg .= _box(30, 70, 140, 50, 'App + SDK', 'fill-panel-2 stroke-border');
    $svg .= _box(30, 200, 140, 50, 'App + SDK', 'fill-panel-2 stroke-border');
    $svg .= _box(220, 130, 180, 70, 'OTel Collector', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(450, 70, 150, 50, 'Jaeger / Tempo', 'fill-panel-2 stroke-border');
    $svg .= _box(450, 140, 150, 50, 'Prometheus', 'fill-panel-2 stroke-border');
    $svg .= _box(450, 210, 150, 50, 'Loki / S3', 'fill-panel-2 stroke-border');
    $svg .= _box(640, 140, 130, 50, 'Datadog / NR', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _arrow(170, 95, 218, 145);
    $svg .= _arrow(170, 225, 218, 185);
    $svg .= _arrow(400, 165, 448, 95);
    $svg .= _arrow(400, 165, 448, 165);
    $svg .= _arrow(400, 165, 448, 235);
    $svg .= _arrow(600, 165, 638, 165);
    return $svg . _svg_close();
}

/* =============================================================
   SLO
   ============================================================= */
function svg_slo(): string {
    $svg = _svg_open('SLO');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>SLO 99.9% — error budget burn</text>";
    // Axes
    $svg .= "<line x1='60' y1='240' x2='760' y2='240' class='stroke-border'/>";
    $svg .= "<line x1='60' y1='240' x2='60' y2='80' class='stroke-border'/>";
    // SLO line at y=120 (top region = budget, below = consumed)
    $svg .= "<line x1='60' y1='120' x2='760' y2='120' class='stroke-warn' stroke-dasharray='5 5'/>";
    $svg .= "<text x='70' y='114' class='small fill-warn'>SLO target</text>";
    // Cumulative burn
    $svg .= "<polyline points='60,240 150,235 250,225 350,210 450,180 550,150 650,135 760,128' fill='none' class='stroke-accent'/>";
    $svg .= "<text x='400' y='265' text-anchor='middle' class='small fill-muted'>Page on burn rate; freeze deploys when budget runs out.</text>";
    return $svg . _svg_close();
}

/* =============================================================
   SD framework
   ============================================================= */
function svg_sd_framework(): string {
    $steps = [
        '1. Requirements','2. Capacity','3. API','4. Data','5. High-level','6. Deep dive','7. Tradeoffs',
    ];
    $svg = _svg_open('SD framework') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>System design — 7-step structure</text>";
    foreach ($steps as $i => $s) {
        $col = $i % 4;
        $row = intdiv($i, 4);
        $x = 30 + $col * 195;
        $y = 70 + $row * 95;
        $cls = $i === 5 ? 'fill-accent stroke-accent' : 'fill-panel-2 stroke-border';
        $tx  = $i === 5 ? 'fill-bg' : 'fill-text';
        $svg .= _box($x, $y, 165, 60, $s, $cls, $tx);
        if ($col < 3 && isset($steps[$i+1])) $svg .= _arrow($x+165, $y+30, $x+193, $y+30);
    }
    $svg .= "<path d='M 760 130 V 158 H 195 V 188' class='stroke-accent' fill='none' marker-end='url(#arrowhead)'/>";
    return $svg . _svg_close();
}

/* =============================================================
   Tradeoffs
   ============================================================= */
function svg_tradeoffs(): string {
    $axes = [
        ['Consistency','Availability'],
        ['Latency','Throughput'],
        ['Cost','Durability'],
        ['Build','Buy'],
    ];
    $svg = _svg_open('Tradeoffs');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Senior trade-off axes</text>";
    foreach ($axes as $i => [$l, $r]) {
        $y = 80 + $i * 50;
        $svg .= "<line x1='200' y1='$y' x2='600' y2='$y' class='stroke-border'/>";
        $svg .= "<circle cx='400' cy='$y' r='10' class='fill-accent'/>";
        $svg .= "<text x='190' y='" . ($y+5) . "' text-anchor='end' class='label fill-text'>$l</text>";
        $svg .= "<text x='610' y='" . ($y+5) . "' text-anchor='start' class='label fill-text'>$r</text>";
    }
    return $svg . _svg_close();
}

/* ============================================================
   Remaining illustrations
   ============================================================ */

function svg_patterns_grid(): string {
    $items = ['Singleton','Factory','Strategy','Observer','Decorator','Adapter','Repository','Builder','Command'];
    $svg = _svg_open('Design patterns');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Common design patterns</text>";
    foreach ($items as $i => $n) {
        $col = $i % 5;
        $row = intdiv($i, 5);
        $x = 30 + $col * 152;
        $y = 70 + $row * 90;
        $svg .= "<rect x='$x' y='$y' width='140' height='75' rx='10' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+70) . "' y='" . ($y+45) . "' text-anchor='middle' class='label fill-accent'>$n</text>";
    }
    return $svg . _svg_close();
}

function svg_composer(): string {
    $svg = _svg_open('Composer') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Composer flow</text>";
    $svg .= _box(30, 110, 160, 60, "composer.json\n(constraints)", 'fill-panel-2 stroke-border');
    $svg .= _box(220, 110, 160, 60, "Resolver\n(packagist)", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(410, 110, 160, 60, "composer.lock\n(exact)", 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(600, 110, 170, 60, "vendor/\n+ autoload", 'fill-good stroke-good', 'fill-bg');
    $svg .= _arrow(190, 140, 218, 140);
    $svg .= _arrow(380, 140, 408, 140);
    $svg .= _arrow(570, 140, 598, 140);
    $svg .= "<text x='400' y='230' text-anchor='middle' class='small fill-muted'>Prod: composer install --no-dev --optimize-autoloader from the lock</text>";
    return $svg . _svg_close();
}

function svg_perf_stack(): string {
    $items = [
        ['OPcache + preload', 'fill-good'],
        ['Octane / FrankenPHP', 'fill-accent'],
        ['Redis cache + tags', 'fill-accent-2'],
        ['Queue heavy work', 'fill-warn'],
        ['PgBouncer pool', 'fill-good'],
        ['Route/config/view cache', 'fill-accent'],
    ];
    $svg = _svg_open('Performance');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>PHP performance knobs</text>";
    foreach ($items as $i => [$label, $cls]) {
        $col = $i % 2;
        $row = intdiv($i, 2);
        $x = 60 + $col * 360;
        $y = 70 + $row * 60;
        $svg .= "<rect x='$x' y='$y' width='340' height='44' rx='8' class='$cls'/>";
        $svg .= "<text x='" . ($x+170) . "' y='" . ($y+28) . "' text-anchor='middle' class='label fill-bg'>$label</text>";
    }
    return $svg . _svg_close();
}

function svg_providers(): string {
    $svg = _svg_open('Service providers') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>register() then boot()</text>";
    $svg .= _box(60, 120, 280, 80, "register()\nbind only, no resolution", 'fill-warn stroke-warn');
    $svg .= _box(460, 120, 280, 80, "boot()\nuse services freely", 'fill-good stroke-good', 'fill-bg');
    $svg .= _arrow(340, 160, 458, 160);
    $svg .= "<text x='400' y='230' text-anchor='middle' class='small fill-muted'>All providers register before any boot — guarantees ordering.</text>";
    return $svg . _svg_close();
}

function svg_routing(): string {
    $svg = _svg_open('Routing') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Route matching</text>";
    $routes = [
        ['GET',    '/users',            'UserController@index'],
        ['POST',   '/users',            'UserController@store'],
        ['GET',    '/users/{user}',     'UserController@show'],
        ['PUT',    '/users/{user}',     'UserController@update'],
        ['DELETE', '/users/{user}',     'UserController@destroy'],
    ];
    $svg .= "<text x='90'  y='80' class='label fill-accent'>Method</text>";
    $svg .= "<text x='220' y='80' class='label fill-accent'>Path</text>";
    $svg .= "<text x='500' y='80' class='label fill-accent'>Action</text>";
    foreach ($routes as $i => [$m,$p,$a]) {
        $y = 110 + $i * 30;
        $cls = ['GET'=>'fill-good','POST'=>'fill-accent','PUT'=>'fill-warn','DELETE'=>'fill-bad'][$m] ?? 'fill-muted';
        $svg .= "<rect x='60' y='" . ($y-20) . "' width='80' height='26' rx='4' class='$cls'/>";
        $svg .= "<text x='100' y='" . ($y-2) . "' text-anchor='middle' class='small fill-bg'>$m</text>";
        $svg .= "<text x='160' y='" . ($y-2) . "' class='label fill-text'>$p</text>";
        $svg .= "<text x='420' y='" . ($y-2) . "' class='small fill-muted'>$a</text>";
    }
    return $svg . _svg_close();
}

function svg_validation(): string {
    $svg = _svg_open('Validation') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Form Request → controller</text>";
    $svg .= _box(30, 110, 150, 60, 'Client\nrequest', 'fill-panel-2 stroke-border');
    $svg .= _box(210, 110, 180, 60, 'FormRequest\n(authorize + rules)', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(420, 60, 160, 50, 'Controller', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(420, 170, 160, 50, '422 errors', 'fill-bad stroke-bad', 'fill-bg');
    $svg .= _arrow(180, 140, 208, 140);
    $svg .= _arrow(390, 130, 418, 90);
    $svg .= _arrow(390, 150, 418, 190);
    $svg .= "<text x='500' y='110' text-anchor='middle' class='small fill-muted'>pass</text>";
    $svg .= "<text x='500' y='165' text-anchor='middle' class='small fill-muted'>fail</text>";
    return $svg . _svg_close();
}

function svg_events(): string {
    $svg = _svg_open('Events') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Event → fan-out to listeners</text>";
    $svg .= _box(60, 130, 200, 50, 'OrderPlaced', 'fill-accent stroke-accent', 'fill-bg');
    $listeners = ['SendInvoice','UpdateStock','NotifyWarehouse','PingAnalytics'];
    foreach ($listeners as $i => $l) {
        $y = 70 + $i * 50;
        $svg .= _box(450, $y, 240, 38, $l, 'fill-panel-2 stroke-border');
        $svg .= _arrow(260, 155, 448, $y + 19);
    }
    return $svg . _svg_close();
}

function svg_notifications(): string {
    $svg = _svg_open('Notifications') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Notification → channels</text>";
    $svg .= _box(60, 130, 200, 50, 'Notification', 'fill-accent stroke-accent', 'fill-bg');
    $channels = ['mail','database','vonage (SMS)','slack','broadcast'];
    foreach ($channels as $i => $c) {
        $y = 60 + $i * 40;
        $svg .= _box(450, $y, 240, 30, $c, 'fill-panel-2 stroke-border');
        $svg .= _arrow(260, 155, 448, $y + 15);
    }
    return $svg . _svg_close();
}

function svg_authn(): string {
    $svg = _svg_open('Authentication') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Guard + Provider</text>";
    $svg .= _box(40, 130, 130, 50, 'Request', 'fill-panel-2 stroke-border');
    $svg .= _box(200, 130, 150, 50, 'Guard\n(session/token)', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(380, 130, 170, 50, 'User Provider\n(eloquent/db)', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(580, 130, 170, 50, 'Users table', 'fill-panel-2 stroke-accent');
    $svg .= _arrow(170, 155, 198, 155);
    $svg .= _arrow(350, 155, 378, 155);
    $svg .= _arrow(550, 155, 578, 155);
    return $svg . _svg_close();
}

function svg_authz(): string {
    $svg = _svg_open('Authorization') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Gates vs Policies</text>";
    $svg .= _box(60, 80, 320, 70, "Gate\n(closure, global checks)", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(60, 170, 320, 70, "Policy\n(class, per-model checks)", 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(460, 80, 280, 70, "Gate::allows('admin-area')", 'fill-panel-2 stroke-border');
    $svg .= _box(460, 170, 280, 70, "Gate::authorize('view', \$post)", 'fill-panel-2 stroke-border');
    $svg .= _arrow(380, 115, 458, 115);
    $svg .= _arrow(380, 205, 458, 205);
    return $svg . _svg_close();
}

function svg_sanctum(): string {
    $svg = _svg_open('Sanctum') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Sanctum SPA cookie flow</text>";
    $steps = ['GET /sanctum/csrf-cookie','POST /login','API requests (cookie)','auth:sanctum middleware'];
    foreach ($steps as $i => $s) {
        $y = 80 + $i * 45;
        $svg .= "<rect x='60' y='" . ($y-22) . "' width='40' height='32' rx='6' class='fill-accent'/>";
        $svg .= "<text x='80' y='" . ($y-2) . "' text-anchor='middle' class='label fill-bg'>" . ($i+1) . "</text>";
        $svg .= "<rect x='120' y='" . ($y-22) . "' width='620' height='32' rx='6' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='140' y='" . ($y-2) . "' class='label fill-text'>$s</text>";
    }
    return $svg . _svg_close();
}

function svg_passport(): string {
    $svg = _svg_open('Passport OAuth2') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>OAuth2 authorization code flow</text>";
    $svg .= "<text x='120' y='70' text-anchor='middle' class='label fill-accent'>App</text>";
    $svg .= "<text x='680' y='70' text-anchor='middle' class='label fill-accent'>Authorization server</text>";
    $svg .= "<line x1='120' y1='85' x2='120' y2='250' class='stroke-border'/>";
    $svg .= "<line x1='680' y1='85' x2='680' y2='250' class='stroke-border'/>";
    $msgs = [
        [120, 120, 680, 120, '1. redirect → /authorize (with client_id, scope)'],
        [680, 160, 120, 160, '2. authorization code'],
        [120, 200, 680, 200, '3. exchange code → access + refresh tokens'],
        [680, 240, 120, 240, '4. tokens'],
    ];
    foreach ($msgs as [$x1,$y1,$x2,$y2,$label]) {
        $svg .= "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' class='stroke-accent' marker-end='url(#arrowhead)'/>";
        $svg .= "<text x='400' y='" . ($y1-6) . "' text-anchor='middle' class='small fill-muted'>$label</text>";
    }
    return $svg . _svg_close();
}

function svg_resources(): string {
    $svg = _svg_open('API Resources') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Model → Resource → JSON</text>";
    $svg .= _box(40, 110, 180, 80, "User model\n(all columns)", 'fill-panel-2 stroke-accent');
    $svg .= _box(290, 110, 210, 80, "UserResource\nfilter + transform", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(560, 110, 200, 80, "JSON\n{id, email, posts?}", 'fill-good stroke-good', 'fill-bg');
    $svg .= _arrow(220, 150, 288, 150);
    $svg .= _arrow(500, 150, 558, 150);
    $svg .= "<text x='400' y='240' text-anchor='middle' class='small fill-muted'>Hide internal columns, compute derived fields, whenLoaded() relations.</text>";
    return $svg . _svg_close();
}

function svg_testing_pyramid(): string {
    $svg = _svg_open('Test pyramid');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Test pyramid</text>";
    // Triangle
    $svg .= "<polygon points='400,70 250,240 550,240' class='fill-panel-2 stroke-border'/>";
    // Slices
    $svg .= "<polygon points='400,70 360,115 440,115' class='fill-bad'/>";
    $svg .= "<text x='600' y='95' class='label fill-bad'>Browser (Dusk)</text>";
    $svg .= "<polygon points='360,115 440,115 320,170 480,170' class='fill-warn'/>";
    $svg .= "<text x='600' y='150' class='label fill-warn'>Feature</text>";
    $svg .= "<polygon points='320,170 480,170 250,240 550,240' class='fill-good'/>";
    $svg .= "<text x='600' y='215' class='label fill-good'>Unit (lots, fast)</text>";
    return $svg . _svg_close();
}

function svg_joins(): string {
    $svg = _svg_open('SQL Joins');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>JOIN types</text>";
    $kinds = [
        [150,'INNER',  [['A',true],['∩',true],['B',false]]],
        [400,'LEFT',   [['A',true],['∩',true],['B',false]]],
        [650,'FULL',   [['A',true],['∩',true],['B',true]]],
    ];
    foreach ($kinds as [$cx, $label, $regions]) {
        $svg .= "<text x='$cx' y='90' text-anchor='middle' class='label fill-accent'>$label</text>";
        // Two overlapping circles
        $svg .= "<circle cx='" . ($cx-25) . "' cy='180' r='55' class='fill-panel-2 stroke-border' opacity='0.6'/>";
        $svg .= "<circle cx='" . ($cx+25) . "' cy='180' r='55' class='fill-panel-2 stroke-border' opacity='0.6'/>";
        // Highlight regions
        if ($label === 'INNER') {
            $svg .= "<ellipse cx='$cx' cy='180' rx='25' ry='40' class='fill-accent'/>";
        } elseif ($label === 'LEFT') {
            $svg .= "<circle cx='" . ($cx-25) . "' cy='180' r='55' class='fill-accent' opacity='0.85'/>";
        } else {
            $svg .= "<circle cx='" . ($cx-25) . "' cy='180' r='55' class='fill-accent' opacity='0.85'/>";
            $svg .= "<circle cx='" . ($cx+25) . "' cy='180' r='55' class='fill-accent' opacity='0.85'/>";
        }
        $svg .= "<text x='" . ($cx-25) . "' y='185' text-anchor='middle' class='label fill-bg'>A</text>";
        $svg .= "<text x='" . ($cx+25) . "' y='185' text-anchor='middle' class='label fill-bg'>B</text>";
    }
    return $svg . _svg_close();
}

function svg_pg_features(): string {
    $items = ['ACID','MVCC','JSONB','GIN/GiST','Window fns','Partial idx','CTE','Logical replication','PartitioningHelm','LISTEN/NOTIFY','Full-text','BRIN'];
    $svg = _svg_open('Postgres');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>PostgreSQL feature stack</text>";
    foreach ($items as $i => $f) {
        $col = $i % 4;
        $row = intdiv($i, 4);
        $x = 30 + $col * 195;
        $y = 65 + $row * 65;
        $svg .= "<rect x='$x' y='$y' width='180' height='50' rx='8' class='fill-panel-2 stroke-accent'/>";
        $svg .= "<text x='" . ($x+90) . "' y='" . ($y+32) . "' text-anchor='middle' class='label fill-accent'>$f</text>";
    }
    return $svg . _svg_close();
}

function svg_innodb(): string {
    $svg = _svg_open('InnoDB B+tree') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>InnoDB clustered index</text>";
    $svg .= _box(340, 70, 120, 40, '50 | 100', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(160, 130, 120, 40, '10 | 30', 'fill-panel-2 stroke-border');
    $svg .= _box(340, 130, 120, 40, '60 | 80', 'fill-panel-2 stroke-border');
    $svg .= _box(520, 130, 120, 40, '110|150', 'fill-panel-2 stroke-border');
    // Leaves with row data
    foreach ([60, 220, 400, 580] as $i => $x) {
        $svg .= "<rect x='$x' y='195' width='160' height='60' rx='8' class='fill-good'/>";
        $svg .= "<text x='" . ($x+80) . "' y='220' text-anchor='middle' class='label fill-bg'>rows</text>";
        $svg .= "<text x='" . ($x+80) . "' y='240' text-anchor='middle' class='small fill-bg'>{full row data}</text>";
    }
    $svg .= _arrow(400, 112, 220, 128);
    $svg .= _arrow(400, 112, 400, 128);
    $svg .= _arrow(400, 112, 580, 128);
    return $svg . _svg_close();
}

function svg_tx(): string {
    $svg = _svg_open('Transactions');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Transaction</text>";
    $svg .= _box(40, 130, 150, 50, 'BEGIN', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(220, 90, 250, 60, 'UPDATE balances ...', 'fill-panel-2 stroke-border');
    $svg .= _box(220, 165, 250, 60, 'UPDATE ledger ...', 'fill-panel-2 stroke-border');
    $svg .= _box(510, 90, 250, 60, 'COMMIT', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(510, 165, 250, 60, 'ROLLBACK', 'fill-bad stroke-bad', 'fill-bg');
    $svg .= "<line x1='190' y1='155' x2='218' y2='120' class='stroke-accent'/>";
    $svg .= "<line x1='190' y1='155' x2='218' y2='195' class='stroke-accent'/>";
    $svg .= "<line x1='470' y1='120' x2='508' y2='120' class='stroke-good'/>";
    $svg .= "<line x1='470' y1='195' x2='508' y2='195' class='stroke-bad'/>";
    return $svg . _svg_close();
}

function svg_deadlock(): string {
    $svg = _svg_open('Deadlock') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Deadlock — circular wait</text>";
    $svg .= _box(80, 80, 180, 70, 'Tx1\nholds row A', 'fill-warn stroke-warn');
    $svg .= _box(540, 80, 180, 70, 'Tx2\nholds row B', 'fill-warn stroke-warn');
    $svg .= _box(80, 180, 180, 70, 'wants row B', 'fill-bad', 'fill-bg');
    $svg .= _box(540, 180, 180, 70, 'wants row A', 'fill-bad', 'fill-bg');
    $svg .= "<path d='M 170 150 V 175' class='stroke-bad' marker-end='url(#arrowhead-bad)'/>";
    $svg .= "<path d='M 630 150 V 175' class='stroke-bad' marker-end='url(#arrowhead-bad)'/>";
    $svg .= "<path d='M 265 215 H 535' class='stroke-bad' stroke-dasharray='5 4' marker-end='url(#arrowhead-bad)'/>";
    $svg .= "<path d='M 535 110 H 265' class='stroke-bad' stroke-dasharray='5 4' marker-end='url(#arrowhead-bad)'/>";
    return $svg . _svg_close();
}

function svg_explain(): string {
    $svg = _svg_open('EXPLAIN') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>EXPLAIN ANALYZE — plan tree</text>";
    $svg .= _box(330, 60, 140, 40, 'Hash Join', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(170, 130, 140, 40, 'Seq Scan users', 'fill-bad stroke-bad', 'fill-bg');
    $svg .= _box(490, 130, 140, 40, 'Hash', 'fill-panel-2 stroke-border');
    $svg .= _box(490, 200, 180, 40, 'Index Scan orders', 'fill-good stroke-good', 'fill-bg');
    $svg .= "<line x1='400' y1='100' x2='240' y2='128' class='stroke-accent'/>";
    $svg .= "<line x1='400' y1='100' x2='560' y2='128' class='stroke-accent'/>";
    $svg .= "<line x1='560' y1='170' x2='580' y2='198' class='stroke-accent'/>";
    $svg .= "<text x='400' y='265' text-anchor='middle' class='small fill-muted'>Seq Scan on a large table → missing index.</text>";
    return $svg . _svg_close();
}

function svg_query_opt(): string {
    $svg = _svg_open('Query optimization') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Slow query optimization loop</text>";
    $steps = ['EXPLAIN ANALYZE','Find Seq Scans','Add index','Rewrite SQL','Measure'];
    foreach ($steps as $i => $s) {
        $x = 30 + $i * 152;
        $svg .= _box($x, 120, 140, 60, $s, 'fill-panel-2 stroke-border');
        if ($i < 4) $svg .= _arrow($x+140, 150, $x+150, 150);
    }
    $svg .= "<path d='M 770 180 V 220 H 100 V 180' fill='none' class='stroke-accent-2' stroke-dasharray='4 3' marker-end='url(#arrowhead)'/>";
    return $svg . _svg_close();
}

function svg_persistence(): string {
    $svg = _svg_open('Redis persistence');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>RDB snapshots vs AOF log</text>";
    $svg .= "<text x='200' y='75' text-anchor='middle' class='label fill-accent'>RDB</text>";
    for ($i = 0; $i < 4; $i++) {
        $svg .= "<rect x='" . (60 + $i*80) . "' y='95' width='60' height='60' rx='8' class='fill-accent'/>";
        $svg .= "<text x='" . (90 + $i*80) . "' y='130' text-anchor='middle' class='small fill-bg'>snap" . ($i+1) . "</text>";
    }
    $svg .= "<text x='200' y='185' text-anchor='middle' class='small fill-muted'>periodic full dump → small, fast load</text>";
    $svg .= "<text x='600' y='75' text-anchor='middle' class='label fill-accent-2'>AOF</text>";
    for ($i = 0; $i < 10; $i++) {
        $svg .= "<rect x='" . (450 + $i*30) . "' y='95' width='22' height='60' rx='3' class='fill-accent-2'/>";
    }
    $svg .= "<text x='600' y='185' text-anchor='middle' class='small fill-muted'>every write appended → durable</text>";
    return $svg . _svg_close();
}

function svg_redis_cluster(): string {
    $svg = _svg_open('Redis Cluster') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Redis Cluster — 16384 hash slots</text>";
    $shards = [
        [140, 'Master 1','slots 0..5460'],
        [400, 'Master 2','slots 5461..10922'],
        [660, 'Master 3','slots 10923..16383'],
    ];
    foreach ($shards as [$cx, $name, $slots]) {
        $svg .= "<circle cx='$cx' cy='130' r='55' class='fill-accent'/>";
        $svg .= "<text x='$cx' y='128' text-anchor='middle' class='label fill-bg'>$name</text>";
        $svg .= "<text x='$cx' y='148' text-anchor='middle' class='small fill-bg'>$slots</text>";
        $svg .= "<circle cx='" . ($cx-30) . "' cy='220' r='25' class='fill-panel-2 stroke-accent-2'/>";
        $svg .= "<circle cx='" . ($cx+30) . "' cy='220' r='25' class='fill-panel-2 stroke-accent-2'/>";
        $svg .= "<text x='" . ($cx-30) . "' y='225' text-anchor='middle' class='small fill-accent-2'>R</text>";
        $svg .= "<text x='" . ($cx+30) . "' y='225' text-anchor='middle' class='small fill-accent-2'>R</text>";
    }
    return $svg . _svg_close();
}

function svg_dockerfile(): string {
    $svg = _svg_open('Dockerfile') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Multi-stage build</text>";
    $svg .= _box(40, 80, 320, 170, "Stage 1: deps\nFROM composer\nRUN composer install", 'fill-panel-2 stroke-warn');
    $svg .= _box(440, 80, 320, 170, "Stage 2: runtime\nFROM php:8.3-fpm-alpine\nCOPY --from=deps vendor/\nCOPY . .", 'fill-good stroke-good', 'fill-bg');
    $svg .= _arrow(360, 165, 438, 165);
    $svg .= "<text x='400' y='270' text-anchor='middle' class='small fill-muted'>Only the final image is shipped — small &amp; secure.</text>";
    return $svg . _svg_close();
}

function svg_docker_prod(): string {
    $svg = _svg_open('Docker production');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Container stack</text>";
    $svg .= _box(40, 80, 230, 50, 'Nginx / Caddy', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(40, 145, 230, 50, 'PHP-FPM (app)', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(40, 210, 230, 50, 'Queue worker', 'fill-panel-2 stroke-border');
    $svg .= _box(310, 80, 220, 80, 'Redis', 'fill-bad', 'fill-bg');
    $svg .= _box(310, 180, 220, 80, 'PostgreSQL', 'fill-good', 'fill-bg');
    $svg .= _box(570, 80, 200, 80, 'Object storage\n(S3)', 'fill-warn');
    $svg .= _box(570, 180, 200, 80, 'Logs / metrics\n(Loki / Prom)', 'fill-panel-2 stroke-border');
    return $svg . _svg_close();
}

function svg_sd_amazon(): string {
    $svg = _svg_open('Amazon') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Amazon — order placement saga</text>";
    $services = [
        [30,  80, 'Catalog'],
        [180, 80, 'Cart'],
        [330, 80, 'Pricing'],
        [480, 80, 'Inventory'],
        [630, 80, 'Orders'],
        [30,  180, 'Payments'],
        [180, 180, 'Shipping'],
        [330, 180, 'Reviews'],
        [480, 180, 'Recos'],
        [630, 180, 'Notif'],
    ];
    foreach ($services as [$x, $y, $name]) {
        $svg .= _box($x, $y, 140, 50, $name, 'fill-panel-2 stroke-accent');
    }
    return $svg . _svg_close();
}

function svg_sd_whatsapp(): string {
    $svg = _svg_open('WhatsApp') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>WhatsApp — connection model</text>";
    $svg .= _box(30, 130, 130, 50, 'Sender', 'fill-panel-2 stroke-border');
    $svg .= _box(200, 80, 180, 50, 'Conn Manager A', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(200, 180, 180, 50, 'Offline inbox', 'fill-warn');
    $svg .= _box(420, 130, 180, 50, 'Conn Manager B', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(640, 130, 130, 50, 'Recipient', 'fill-panel-2 stroke-border');
    $svg .= _arrow(160, 155, 198, 105);
    $svg .= _arrow(380, 105, 418, 155);
    $svg .= _arrow(600, 155, 638, 155);
    $svg .= _arrow(290, 130, 290, 178);
    $svg .= "<text x='290' y='258' text-anchor='middle' class='small fill-muted'>Persistent WebSocket, sticky routing, E2E encrypted (Signal Protocol).</text>";
    return $svg . _svg_close();
}

function svg_sd_booking(): string {
    $svg = _svg_open('Booking') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Booking — inventory hold (TTL)</text>";
    $svg .= _box(30, 130, 140, 50, 'Client', 'fill-panel-2 stroke-border');
    $svg .= _box(210, 130, 180, 50, 'Booking service', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(430, 80, 180, 50, 'Hold (Redis 10m)', 'fill-warn');
    $svg .= _box(430, 180, 180, 50, 'Inventory DB', 'fill-panel-2 stroke-accent');
    $svg .= _box(650, 130, 130, 50, 'Pay or expire', 'fill-good stroke-good', 'fill-bg');
    $svg .= _arrow(170, 155, 208, 155);
    $svg .= _arrow(390, 155, 428, 105);
    $svg .= _arrow(390, 155, 428, 205);
    $svg .= _arrow(610, 155, 648, 155);
    return $svg . _svg_close();
}

function svg_sd_notif(): string {
    $svg = _svg_open('Notifications') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Notification service</text>";
    $svg .= _box(30, 130, 130, 50, 'Producer', 'fill-panel-2 stroke-border');
    $svg .= _box(200, 130, 130, 50, 'API', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(370, 130, 130, 50, 'Kafka / SQS', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(540, 70, 110, 40, 'Email', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(540, 130, 110, 40, 'SMS',   'fill-good stroke-good', 'fill-bg');
    $svg .= _box(540, 190, 110, 40, 'Push',  'fill-good stroke-good', 'fill-bg');
    $svg .= _box(680, 130, 100, 50, 'Provider', 'fill-panel-2 stroke-border');
    foreach ([85, 145, 205] as $cy) $svg .= _arrow(500, 155, 538, $cy + 10);
    foreach ([85, 145, 205] as $cy) $svg .= _arrow(650, $cy + 10, 678, 155);
    $svg .= _arrow(160, 155, 198, 155);
    $svg .= _arrow(330, 155, 368, 155);
    return $svg . _svg_close();
}

function svg_repository(): string {
    $svg = _svg_open('Repository') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Repository pattern</text>";
    $svg .= _box(40, 130, 180, 60, 'Service', 'fill-panel-2 stroke-border');
    $svg .= _box(290, 130, 220, 60, 'UserRepository\n(interface)', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(580, 70, 200, 50, 'EloquentUserRepo', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(580, 140, 200, 50, 'InMemoryUserRepo', 'fill-warn');
    $svg .= _box(580, 210, 200, 50, 'CachedUserRepo', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _arrow(220, 160, 288, 160);
    foreach ([95, 165, 235] as $y) $svg .= _arrow(510, 160, 578, $y);
    return $svg . _svg_close();
}

function svg_service_layer(): string {
    $svg = _svg_open('Service layer') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Thin controller, fat service</text>";
    $layers = [
        ['Controller (thin)', 'fill-panel-2 stroke-border'],
        ['Service (business logic)', 'fill-accent stroke-accent'],
        ['Repository / Eloquent', 'fill-accent-2 stroke-accent-2'],
        ['Database', 'fill-good stroke-good'],
    ];
    foreach ($layers as $i => [$label, $cls]) {
        $y = 70 + $i * 50;
        $tx = ($i >= 1) ? 'fill-bg' : 'fill-text';
        $svg .= _box(150, $y, 500, 40, $label, $cls, $tx);
    }
    return $svg . _svg_close();
}

function svg_factory(): string {
    $svg = _svg_open('Factory') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Factory — picks the right class</text>";
    $svg .= _box(30, 130, 180, 60, "Caller\n(type='stripe')", 'fill-panel-2 stroke-border');
    $svg .= _box(260, 130, 220, 60, "PaymentFactory::make()", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(540, 70, 230, 50, 'StripeGateway', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(540, 140, 230, 50, 'PaypalGateway', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(540, 210, 230, 50, 'AdyenGateway', 'fill-good stroke-good', 'fill-bg');
    $svg .= _arrow(210, 160, 258, 160);
    foreach ([95, 165, 235] as $y) $svg .= _arrow(480, 160, 538, $y);
    return $svg . _svg_close();
}

function svg_observer(): string {
    $svg = _svg_open('Observer') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Observer — subject notifies many</text>";
    $svg .= _box(60, 130, 180, 60, 'Subject', 'fill-accent stroke-accent', 'fill-bg');
    $observers = ['Observer A','Observer B','Observer C','Observer D'];
    foreach ($observers as $i => $o) {
        $y = 70 + $i * 50;
        $svg .= _box(420, $y, 250, 38, $o, 'fill-panel-2 stroke-border');
        $svg .= _arrow(240, 155, 418, $y + 19);
    }
    return $svg . _svg_close();
}

function svg_adapter(): string {
    $svg = _svg_open('Adapter') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Adapter — bridge incompatible interfaces</text>";
    $svg .= _box(40, 130, 170, 60, "App\n(PaymentInterface)", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(280, 130, 220, 60, "StripeAdapter\n(implements ours)", 'fill-warn stroke-warn');
    $svg .= _box(570, 130, 200, 60, "Stripe SDK\n(legacy interface)", 'fill-panel-2 stroke-border');
    $svg .= _arrow(210, 160, 278, 160);
    $svg .= _arrow(500, 160, 568, 160);
    return $svg . _svg_close();
}

function svg_linux(): string {
    $svg = _svg_open('Linux');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Linux user space → kernel</text>";
    $layers = [
        ['User processes (PHP, Nginx, workers)', 'fill-panel-2 stroke-border', 70],
        ['System calls', 'fill-warn', 120],
        ['Kernel (scheduler, vm, fs, net)', 'fill-accent stroke-accent', 160],
        ['Hardware (CPU, RAM, NIC, disks)', 'fill-muted', 220],
    ];
    foreach ($layers as [$label, $cls, $y]) {
        $tx = (strpos($cls,'panel-2') !== false || strpos($cls,'muted') !== false) ? 'fill-text' : 'fill-bg';
        $svg .= _box(60, $y, 680, 40, $label, $cls, $tx);
    }
    return $svg . _svg_close();
}

function svg_cicd(): string {
    $svg = _svg_open('CI/CD');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>CI/CD pipeline</text>";
    $stages = ['Checkout','Lint','Static analysis','Tests','Build image','Push','Staging','Smoke','Prod'];
    foreach ($stages as $i => $s) {
        $col = $i % 5;
        $row = intdiv($i, 5);
        $x = 30 + $col * 152;
        $y = 80 + $row * 90;
        $cls = ($s === 'Tests' || $s === 'Prod') ? 'fill-accent stroke-accent' : 'fill-panel-2 stroke-border';
        $tx  = ($s === 'Tests' || $s === 'Prod') ? 'fill-bg' : 'fill-text';
        $svg .= _box($x, $y, 140, 50, $s, $cls, $tx);
        if ($col < 4 && isset($stages[$i+1])) $svg .= _arrow($x+140, $y+25, $x+150, $y+25);
    }
    return $svg . _svg_close();
}

function svg_swoole(): string {
    $svg = _svg_open('Swoole');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Swoole event loop + coroutines</text>";
    $svg .= "<circle cx='400' cy='150' r='80' class='fill-panel-2 stroke-accent'/>";
    $svg .= "<text x='400' y='155' text-anchor='middle' class='label fill-accent'>Event loop</text>";
    $items = [
        [220, 80, 'mysql query'],
        [580, 80, 'curl call'],
        [220, 220, 'redis get'],
        [580, 220, 'file read'],
    ];
    foreach ($items as [$x, $y, $l]) {
        $svg .= _box($x - 70, $y - 15, 140, 30, $l, 'fill-accent', 'fill-bg');
        $svg .= "<line x1='" . ($x > 400 ? 480 : 320) . "' y1='150' x2='$x' y2='$y' class='stroke-accent-2' stroke-dasharray='4 3'/>";
    }
    return $svg . _svg_close();
}

function svg_event_loop(): string {
    $svg = _svg_open('Event loop');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>ReactPHP / AmphP event loop</text>";
    $stages = ['Timers','I/O poll','Immediates','Idle'];
    foreach ($stages as $i => $s) {
        $angle = $i * 90;
        $cx = 400 + 100 * cos(deg2rad($angle));
        $cy = 150 + 100 * sin(deg2rad($angle));
        $svg .= "<circle cx='$cx' cy='$cy' r='40' class='fill-accent'/>";
        $svg .= "<text x='$cx' y='" . ($cy+5) . "' text-anchor='middle' class='label fill-bg'>$s</text>";
    }
    $svg .= "<circle cx='400' cy='150' r='30' class='fill-panel-2 stroke-accent-2'/>";
    $svg .= "<text x='400' y='155' text-anchor='middle' class='small fill-accent-2'>tick</text>";
    return $svg . _svg_close();
}

function svg_owasp_web(): string {
    $items = [
        'A01 Broken Access Control',
        'A02 Cryptographic Failures',
        'A03 Injection',
        'A04 Insecure Design',
        'A05 Misconfiguration',
        'A06 Vulnerable Components',
        'A07 Auth Failures',
        'A08 Integrity Failures',
        'A09 Logging Failures',
        'A10 SSRF',
    ];
    $svg = _svg_open('OWASP Top 10');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='30' text-anchor='middle' class='title fill-accent'>OWASP Web Top 10 (2021)</text>";
    foreach ($items as $i => $n) {
        $col = $i % 2;
        $row = $i % 5;
        $x = 40 + $col * 380;
        $y = 60 + $row * 40;
        $svg .= "<rect x='$x' y='$y' width='360' height='32' rx='6' class='fill-bad'/>";
        $svg .= "<text x='" . ($x+10) . "' y='" . ($y+22) . "' class='label fill-bg'>$n</text>";
    }
    return $svg . _svg_close();
}

function svg_secret_rotation(): string {
    $svg = _svg_open('Secret rotation') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Two-key rotation window</text>";
    $svg .= _box(30, 120, 200, 70, "v17 (old)\naccept until cutover", 'fill-warn stroke-warn');
    $svg .= _box(290, 120, 220, 70, "Rotation window\naccept both", 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(570, 120, 200, 70, "v18 (new)\nactive going forward", 'fill-good stroke-good', 'fill-bg');
    $svg .= _arrow(230, 155, 288, 155);
    $svg .= _arrow(510, 155, 568, 155);
    $svg .= "<text x='400' y='240' text-anchor='middle' class='small fill-muted'>No downtime; clients drift to new key, retire old after grace window.</text>";
    return $svg . _svg_close();
}

function svg_red_use(): string {
    $svg = _svg_open('RED + USE');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>RED (services) + USE (resources)</text>";
    $left = [['R','Rate'],['E','Errors'],['D','Duration']];
    $right = [['U','Utilization'],['S','Saturation'],['E','Errors']];
    $svg .= "<text x='200' y='75' text-anchor='middle' class='label fill-accent'>RED — services</text>";
    foreach ($left as $i => [$L, $name]) {
        $y = 100 + $i * 50;
        $svg .= "<circle cx='80' cy='$y' r='20' class='fill-accent'/>";
        $svg .= "<text x='80' y='" . ($y+5) . "' text-anchor='middle' class='big-letter fill-bg'>$L</text>";
        $svg .= "<text x='130' y='" . ($y+5) . "' class='label fill-text'>$name</text>";
    }
    $svg .= "<text x='600' y='75' text-anchor='middle' class='label fill-accent-2'>USE — resources</text>";
    foreach ($right as $i => [$L, $name]) {
        $y = 100 + $i * 50;
        $svg .= "<circle cx='480' cy='$y' r='20' class='fill-accent-2'/>";
        $svg .= "<text x='480' y='" . ($y+5) . "' text-anchor='middle' class='big-letter fill-bg'>$L</text>";
        $svg .= "<text x='530' y='" . ($y+5) . "' class='label fill-text'>$name</text>";
    }
    return $svg . _svg_close();
}

function svg_queue_vs_stream(): string {
    $svg = _svg_open('Queue vs Stream');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Queue vs Stream</text>";
    $svg .= "<text x='200' y='70' text-anchor='middle' class='label fill-accent'>Queue (RabbitMQ / SQS)</text>";
    for ($i = 0; $i < 5; $i++) {
        $svg .= "<rect x='" . (60 + $i*55) . "' y='95' width='45' height='40' rx='4' class='fill-accent'/>";
    }
    $svg .= "<text x='200' y='165' text-anchor='middle' class='small fill-muted'>consumed → removed</text>";
    $svg .= "<text x='600' y='70' text-anchor='middle' class='label fill-accent-2'>Stream (Kafka)</text>";
    for ($i = 0; $i < 8; $i++) {
        $svg .= "<rect x='" . (440 + $i*38) . "' y='95' width='32' height='40' rx='4' class='fill-accent-2'/>";
    }
    $svg .= "<text x='600' y='165' text-anchor='middle' class='small fill-muted'>append-only log, replayable</text>";
    $svg .= "<text x='600' y='195' text-anchor='middle' class='small fill-muted'>group A reads independently of group B</text>";
    return $svg . _svg_close();
}

function svg_versioning(): string {
    $svg = _svg_open('API versioning');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>API versioning side-by-side</text>";
    $svg .= _box(40, 80, 720, 70, "GET /v1/users  (legacy)", 'fill-warn');
    $svg .= _box(40, 170, 720, 70, "GET /v2/users  (current — new shape, new fields)", 'fill-good stroke-good', 'fill-bg');
    return $svg . _svg_close();
}

function svg_gitops(): string {
    $svg = _svg_open('GitOps') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>GitOps — Git is the source of truth</text>";
    $svg .= _box(30, 130, 150, 60, 'Git repo\n(manifests)', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(220, 130, 180, 60, 'Argo CD / Flux\n(in-cluster)', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(440, 130, 180, 60, 'K8s API server', 'fill-panel-2 stroke-border');
    $svg .= _box(660, 130, 120, 60, 'Workloads', 'fill-good stroke-good', 'fill-bg');
    $svg .= _arrow(180, 160, 218, 160);
    $svg .= _arrow(400, 160, 438, 160);
    $svg .= _arrow(620, 160, 658, 160);
    $svg .= "<text x='400' y='250' text-anchor='middle' class='small fill-muted'>Revert commit = rollback. Audit history for free.</text>";
    return $svg . _svg_close();
}

function svg_nosql_families(): string {
    $items = [
        ['Key-value', 'Redis, DynamoDB', 'fill-accent'],
        ['Document', 'MongoDB, CouchDB', 'fill-accent-2'],
        ['Wide-column', 'Cassandra, BigTable', 'fill-good'],
        ['Graph', 'Neo4j, Arango', 'fill-warn'],
    ];
    $svg = _svg_open('NoSQL');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Four NoSQL families</text>";
    foreach ($items as $i => [$n, $eg, $cls]) {
        $col = $i % 2;
        $row = intdiv($i, 2);
        $x = 50 + $col * 380;
        $y = 70 + $row * 100;
        $svg .= "<rect x='$x' y='$y' width='340' height='75' rx='12' class='fill-panel-2 stroke-border'/>";
        $svg .= "<circle cx='" . ($x+40) . "' cy='" . ($y+38) . "' r='22' class='$cls'/>";
        $svg .= "<text x='" . ($x+85) . "' y='" . ($y+32) . "' class='label fill-text'>$n</text>";
        $svg .= "<text x='" . ($x+85) . "' y='" . ($y+58) . "' class='small fill-muted'>$eg</text>";
    }
    return $svg . _svg_close();
}

function svg_embed_ref(): string {
    $svg = _svg_open('Embed vs Reference');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Embed vs Reference</text>";
    $svg .= "<text x='200' y='75' text-anchor='middle' class='label fill-accent'>Embed</text>";
    $svg .= "<rect x='40' y='95' width='320' height='150' rx='10' class='fill-accent'/>";
    $svg .= "<text x='200' y='130' text-anchor='middle' class='label fill-bg'>order {</text>";
    $svg .= "<rect x='80' y='150' width='240' height='35' rx='6' class='fill-panel-2 stroke-border'/>";
    $svg .= "<text x='200' y='172' text-anchor='middle' class='small fill-text'>items: [{...}, {...}]</text>";
    $svg .= "<text x='200' y='220' text-anchor='middle' class='label fill-bg'>}</text>";
    $svg .= "<text x='600' y='75' text-anchor='middle' class='label fill-accent-2'>Reference</text>";
    $svg .= "<rect x='440' y='95' width='150' height='80' rx='10' class='fill-accent-2'/>";
    $svg .= "<text x='515' y='130' text-anchor='middle' class='label fill-bg'>order {</text>";
    $svg .= "<text x='515' y='155' text-anchor='middle' class='small fill-bg'>itemIds: [3,7]</text>";
    $svg .= "<rect x='620' y='95' width='150' height='80' rx='10' class='fill-panel-2 stroke-accent-2'/>";
    $svg .= "<text x='695' y='135' text-anchor='middle' class='label fill-text'>items</text>";
    $svg .= "<text x='695' y='160' text-anchor='middle' class='small fill-muted'>separate collection</text>";
    $svg .= "<line x1='590' y1='135' x2='620' y2='135' class='stroke-accent-2' marker-end='url(#arrowhead)'/>";
    return $svg . _svg_close();
}

function svg_evaluation(): string {
    $svg = _svg_open('LLM Eval');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>RAGAS metrics</text>";
    $metrics = [
        ['Faithfulness',     0.92, 'fill-good'],
        ['Answer relevancy', 0.88, 'fill-accent'],
        ['Context precision',0.74, 'fill-warn'],
        ['Context recall',   0.81, 'fill-accent-2'],
    ];
    foreach ($metrics as $i => [$name, $val, $cls]) {
        $y = 80 + $i * 45;
        $svg .= "<text x='220' y='" . ($y+18) . "' text-anchor='end' class='label fill-text'>$name</text>";
        $svg .= "<rect x='240' y='" . ($y) . "' width='500' height='30' rx='6' class='fill-panel-2 stroke-border'/>";
        $svg .= "<rect x='240' y='" . ($y) . "' width='" . (int)($val * 500) . "' height='30' rx='6' class='$cls'/>";
        $svg .= "<text x='" . (250 + (int)($val * 500)) . "' y='" . ($y+20) . "' class='label fill-text'>" . number_format($val, 2) . "</text>";
    }
    return $svg . _svg_close();
}

function svg_octane_state(): string {
    $svg = _svg_open('Octane state');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Octane worker — binding lifetimes</text>";
    $rows = [
        ['singleton', 'lives forever in worker',  'fill-bad'],
        ['bind',      'fresh every resolve',       'fill-good'],
        ['scoped',    'lives one request, reset',  'fill-accent'],
    ];
    foreach ($rows as $i => [$kind, $desc, $cls]) {
        $y = 90 + $i * 60;
        $svg .= "<rect x='40' y='$y' width='200' height='44' rx='8' class='$cls'/>";
        $svg .= "<text x='140' y='" . ($y+27) . "' text-anchor='middle' class='label fill-bg'>$kind</text>";
        $svg .= "<rect x='260' y='$y' width='500' height='44' rx='8' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='280' y='" . ($y+27) . "' class='label fill-text'>$desc</text>";
    }
    return $svg . _svg_close();
}

function svg_reverb(): string {
    $svg = _svg_open('Reverb') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Reverb — WebSocket channels</text>";
    $svg .= _box(30, 130, 130, 50, 'Browser', 'fill-panel-2 stroke-border');
    $svg .= _box(200, 130, 160, 50, 'Reverb (ws)', 'fill-accent stroke-accent', 'fill-bg');
    $svg .= _box(400, 70, 180, 40, 'public channel', 'fill-good stroke-good', 'fill-bg');
    $svg .= _box(400, 130, 180, 40, 'private channel', 'fill-warn');
    $svg .= _box(400, 190, 180, 40, 'presence channel', 'fill-accent-2 stroke-accent-2', 'fill-bg');
    $svg .= _box(610, 130, 160, 50, 'Redis pub/sub', 'fill-bad', 'fill-bg');
    $svg .= "<line x1='160' y1='155' x2='198' y2='155' class='stroke-accent' marker-end='url(#arrowhead)' stroke-dasharray='3 3'/>";
    foreach ([90, 150, 210] as $cy) $svg .= _arrow(360, 155, 398, $cy);
    $svg .= _arrow(580, 155, 608, 155);
    return $svg . _svg_close();
}

function svg_tenancy(): string {
    $svg = _svg_open('Multi-tenancy');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Multi-tenancy strategies</text>";
    $kinds = [
        [120, 'Single DB',     '+ tenant_id column', 'fill-good'],
        [400, 'Schema-per-tenant', 'Postgres schemas', 'fill-accent'],
        [680, 'DB-per-tenant', 'isolated DB',         'fill-warn'],
    ];
    foreach ($kinds as [$cx, $name, $sub, $cls]) {
        $svg .= "<rect x='" . ($cx-110) . "' y='80' width='220' height='170' rx='14' class='fill-panel-2 stroke-border'/>";
        $svg .= "<rect x='" . ($cx-90) . "' y='100' width='180' height='40' rx='6' class='$cls'/>";
        $svg .= "<text x='$cx' y='126' text-anchor='middle' class='label fill-bg'>$name</text>";
        $svg .= "<text x='$cx' y='180' text-anchor='middle' class='small fill-muted'>$sub</text>";
        for ($i = 0; $i < 3; $i++) {
            $svg .= "<rect x='" . ($cx-90 + $i*60) . "' y='205' width='50' height='30' rx='4' class='fill-accent-2'/>";
        }
    }
    return $svg . _svg_close();
}

function svg_pulse(): string {
    $svg = _svg_open('Pulse');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>Pulse dashboard</text>";
    $widgets = [
        ['Slow queries', 'fill-bad'],
        ['Slow requests', 'fill-warn'],
        ['Queue depth', 'fill-accent'],
        ['Cache hits %', 'fill-good'],
        ['Exceptions', 'fill-bad'],
        ['Active users', 'fill-accent-2'],
    ];
    foreach ($widgets as $i => [$n, $cls]) {
        $col = $i % 3;
        $row = intdiv($i, 3);
        $x = 30 + $col * 260;
        $y = 70 + $row * 100;
        $svg .= "<rect x='$x' y='$y' width='240' height='80' rx='10' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+15) . "' y='" . ($y+25) . "' class='small fill-muted'>$n</text>";
        // little chart bars
        for ($b = 0; $b < 8; $b++) {
            $h = 10 + (($b * 13 + $i * 7) % 35);
            $svg .= "<rect x='" . ($x + 20 + $b * 26) . "' y='" . ($y + 70 - $h) . "' width='20' height='$h' rx='2' class='$cls'/>";
        }
    }
    return $svg . _svg_close();
}

function svg_static_analysis(): string {
    $svg = _svg_open('Static analysis') . _defs();
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='32' text-anchor='middle' class='title fill-accent'>PHP code quality pipeline</text>";
    $tools = ['Pint (style)','PHPStan (types)','Rector (codemods)','Pest (tests)'];
    foreach ($tools as $i => $t) {
        $x = 30 + $i * 195;
        $svg .= _box($x, 120, 175, 60, $t, 'fill-accent stroke-accent', 'fill-bg');
        if ($i < 3) $svg .= _arrow($x + 175, 150, $x + 193, 150);
    }
    $svg .= "<text x='400' y='230' text-anchor='middle' class='small fill-muted'>Run in CI; pre-commit hooks lock formatting locally.</text>";
    return $svg . _svg_close();
}

function svg_star(): string {
    $cols = [
        ['S', 'Situation', 'context (1 sentence)'],
        ['T', 'Task',      'your specific goal'],
        ['A', 'Action',    'what YOU did'],
        ['R', 'Result',    'measured outcome'],
    ];
    $svg = _svg_open('STAR');
    $svg .= "<rect width='800' height='280' rx='14' class='fill-panel'/>";
    $svg .= "<text x='400' y='34' text-anchor='middle' class='title fill-accent'>STAR — behavioral story structure</text>";
    foreach ($cols as $i => [$L, $name, $sub]) {
        $x = 30 + $i * 195;
        $svg .= "<rect x='$x' y='70' width='180' height='180' rx='12' class='fill-panel-2 stroke-border'/>";
        $svg .= "<text x='" . ($x+90) . "' y='145' text-anchor='middle' class='big-letter fill-accent'>$L</text>";
        $svg .= "<text x='" . ($x+90) . "' y='190' text-anchor='middle' class='label fill-text'>$name</text>";
        $svg .= "<text x='" . ($x+90) . "' y='220' text-anchor='middle' class='small fill-muted'>$sub</text>";
    }
    return $svg . _svg_close();
}

