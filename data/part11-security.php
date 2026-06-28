<?php
/** Part XI — Security */

return [

'sec-owasp-web' => [
    'part' => 'Part XI — Security', 'part_ar' => 'الجزء الحادي عشر — الأمان',
    'icon' => '🛡',
    'title_en' => 'OWASP Top 10 (Web)',
    'title_ar' => 'OWASP Top 10 للويب',
    'desc_en' => 'A01–A10: from broken access control to SSRF',
    'desc_ar' => 'من Broken Access Control إلى SSRF',
    'qa' => [
        [
            'q_en' => 'List the OWASP Top 10 (2021)',
            'q_ar' => 'عدد OWASP Top 10 (2021)',
            'a_en' => '<ol><li><strong>A01 Broken Access Control</strong> — most common in 2021</li><li><strong>A02 Cryptographic Failures</strong></li><li><strong>A03 Injection</strong> (SQLi, command, LDAP)</li><li><strong>A04 Insecure Design</strong></li><li><strong>A05 Security Misconfiguration</strong></li><li><strong>A06 Vulnerable & Outdated Components</strong></li><li><strong>A07 Identification & Authentication Failures</strong></li><li><strong>A08 Software & Data Integrity Failures</strong></li><li><strong>A09 Security Logging & Monitoring Failures</strong></li><li><strong>A10 Server-Side Request Forgery (SSRF)</strong></li></ol>',
            'a_ar' => '<ol><li><strong>A01 Broken Access Control</strong> — الأكثر شيوعًا</li><li><strong>A02 Cryptographic Failures</strong></li><li><strong>A03 Injection</strong> (SQLi, Command, LDAP)</li><li><strong>A04 Insecure Design</strong></li><li><strong>A05 Security Misconfiguration</strong></li><li><strong>A06 Vulnerable & Outdated Components</strong></li><li><strong>A07 Authentication Failures</strong></li><li><strong>A08 Integrity Failures</strong></li><li><strong>A09 Logging Failures</strong></li><li><strong>A10 SSRF</strong></li></ol>',
        ],
        [
            'q_en' => 'SQL Injection — show prevention in PHP',
            'q_ar' => 'حقن SQL — كيفية منعه',
            'a_en' => '<p>Use parameterized queries (PDO) or the framework\'s query builder. Never concatenate user input.</p>',
            'a_ar' => '<p>استخدم Parameterized Queries (PDO) أو Query Builder. لا تجمع Input المستخدم بسلاسل.</p>',
            'example' => "// ❌ Vulnerable\n\$pdo->query(\"SELECT * FROM users WHERE email='\$email'\");\n\n// ✅ Safe\n\$stmt = \$pdo->prepare('SELECT * FROM users WHERE email = ?');\n\$stmt->execute([\$email]);\n\n// ✅ Eloquent (parameterised by default)\nUser::where('email', \$email)->first();",
        ],
        [
            'q_en' => 'XSS — types and defense',
            'q_ar' => 'XSS — الأنواع والدفاع',
            'a_en' => '<p><strong>Stored:</strong> persisted then served (most dangerous). <strong>Reflected:</strong> bounced off the server. <strong>DOM-based:</strong> client-side only.</p><p>Defense: contextual output encoding (Blade <code>{{ }}</code> auto-escapes), <strong>Content Security Policy (CSP)</strong>, HttpOnly + Secure + SameSite cookies, <code>X-Content-Type-Options: nosniff</code>.</p>',
            'a_ar' => '<p><strong>Stored:</strong> يُخزن ثم يُعرض (الأخطر). <strong>Reflected:</strong> يرتد من السيرفر. <strong>DOM-based:</strong> داخل المتصفح فقط.</p><p>الدفاع: Output Encoding حسب السياق (Blade <code>{{ }}</code> يهرب تلقائيًا)، <strong>CSP</strong>، Cookies بـ HttpOnly + Secure + SameSite، <code>X-Content-Type-Options: nosniff</code>.</p>',
        ],
        [
            'q_en' => 'CSRF and how Laravel handles it',
            'q_ar' => 'CSRF وكيف يتعامل معها Laravel',
            'a_en' => '<p>An attacker tricks the user\'s browser into sending state-changing requests using the victim\'s session. Defense: anti-CSRF tokens on every state-changing request + <code>SameSite=Lax</code> cookies. Laravel adds <code>@csrf</code> to forms and <code>VerifyCsrfToken</code> middleware checks the token.</p>',
            'a_ar' => '<p>مهاجم يخدع متصفح المستخدم لإرسال طلبات مُعدِّلة باستخدام Session الضحية. الدفاع: Anti-CSRF Tokens مع كل Request مُعدِّل + Cookies بـ <code>SameSite=Lax</code>. Laravel يضيف <code>@csrf</code> للنماذج و <code>VerifyCsrfToken</code> Middleware يتحقق.</p>',
        ],
        [
            'q_en' => 'SSRF — what is it?',
            'q_ar' => 'ما هي SSRF؟',
            'a_en' => '<p>Server-Side Request Forgery: the app fetches a URL supplied by the user — attacker points it to internal services (<code>http://169.254.169.254/</code> AWS IMDS, <code>http://localhost:6379</code>). Defense: allow-list of domains, block private CIDRs (10/8, 172.16/12, 192.168/16, 169.254/16), disable redirects.</p>',
            'a_ar' => '<p>Server-Side Request Forgery: التطبيق يجلب URL يحدده المستخدم — المهاجم يوجهه لخدمات داخلية (<code>http://169.254.169.254/</code> AWS IMDS، <code>http://localhost:6379</code>). الدفاع: Allow-list للنطاقات، حظر CIDRs الخاصة، تعطيل Redirects.</p>',
        ],
    ],
],

'sec-owasp-api' => [
    'part' => 'Part XI — Security', 'part_ar' => 'الجزء الحادي عشر — الأمان',
    'icon' => '🔓',
    'title_en' => 'OWASP API Top 10 (2023)',
    'title_ar' => 'OWASP API Top 10 (2023)',
    'desc_en' => 'BOLA, BFLA, unrestricted resource consumption',
    'desc_ar' => 'BOLA و BFLA والاستهلاك غير المحدود',
    'qa' => [
        [
            'q_en' => 'API Top 10 — 2023 edition',
            'q_ar' => 'API Top 10 — إصدار 2023',
            'a_en' => '<ol><li><strong>API1 Broken Object Level Authorization (BOLA)</strong> — #1 attack vector</li><li>API2 Broken Authentication</li><li>API3 Broken Object Property Level Authorization (BOPLA)</li><li>API4 Unrestricted Resource Consumption</li><li><strong>API5 Broken Function Level Authorization (BFLA)</strong></li><li>API6 Unrestricted Access to Sensitive Business Flows</li><li>API7 SSRF</li><li>API8 Security Misconfiguration</li><li>API9 Improper Inventory Management</li><li>API10 Unsafe Consumption of APIs</li></ol>',
            'a_ar' => '<ol><li><strong>API1 BOLA</strong> — رقم 1 في الهجمات</li><li>API2 Broken Authentication</li><li>API3 BOPLA</li><li>API4 Unrestricted Resource Consumption</li><li><strong>API5 BFLA</strong></li><li>API6 Sensitive Business Flows</li><li>API7 SSRF</li><li>API8 Misconfiguration</li><li>API9 Improper Inventory</li><li>API10 Unsafe Consumption</li></ol>',
        ],
        [
            'q_en' => 'BOLA — concrete example',
            'q_ar' => 'BOLA — مثال محدد',
            'a_en' => '<p>Endpoint <code>GET /api/orders/{id}</code> returns the order — but does NOT check the order belongs to the calling user. Attacker iterates IDs and reads everyone\'s orders.</p>',
            'a_ar' => '<p>Endpoint <code>GET /api/orders/{id}</code> يُرجع الطلب — لكن لا يتحقق أن الطلب يخص المستخدم المُصادق. المهاجم يُكرر الـ IDs ويقرأ طلبات الجميع.</p>',
            'example' => "// ❌ Vulnerable\npublic function show(\$id) {\n    return Order::findOrFail(\$id);\n}\n\n// ✅ Fixed — scope by current user\npublic function show(\$id) {\n    return auth()->user()->orders()->findOrFail(\$id);\n}\n\n// ✅ Even better — Policy\nGate::authorize('view', \$order);",
        ],
        [
            'q_en' => 'BFLA — Broken Function Level Authorization',
            'q_ar' => 'BFLA — Broken Function Level Authorization',
            'a_en' => '<p>A regular user calls an admin-only endpoint that exists in the API but isn\'t exposed in the UI. Defense: explicit role/permission check at every sensitive endpoint, default-deny.</p>',
            'a_ar' => '<p>مستخدم عادي يستدعي Endpoint مخصص للـ Admin موجود في API لكن غير ظاهر في UI. الدفاع: تحقق صريح من Role/Permission في كل Endpoint حساس، Default-Deny.</p>',
        ],
        [
            'q_en' => 'Mass assignment is API3 / BOPLA',
            'q_ar' => 'Mass Assignment هو API3 / BOPLA',
            'a_en' => '<p>Client sends <code>{"role": "admin"}</code> in a profile update, app blindly assigns. Defense: <code>$fillable</code> whitelist, Form Requests with explicit validated keys, never <code>$guarded = []</code>.</p>',
            'a_ar' => '<p>العميل يُرسل <code>{"role": "admin"}</code> في تحديث الملف، التطبيق يُعيّنها بدون فحص. الدفاع: <code>$fillable</code> whitelist، Form Requests بمفاتيح صريحة، تجنب <code>$guarded = []</code>.</p>',
        ],
        [
            'q_en' => 'API4 Unrestricted Resource Consumption',
            'q_ar' => 'API4 الاستهلاك غير المحدود',
            'a_en' => '<p>No rate limits, no pagination caps, accepting huge payloads → DoS or wallet drain. Defense: per-route rate limit (token bucket), max body size, max page size, query complexity limits (GraphQL).</p>',
            'a_ar' => '<p>بدون Rate Limits ولا حدود Pagination، قبول Payloads ضخمة → DoS أو استنزاف. الدفاع: Rate Limit لكل Route (Token Bucket)، حجم Body أقصى، حد لـ Page Size، حدود Query Complexity (GraphQL).</p>',
        ],
    ],
],

'sec-jwt' => [
    'part' => 'Part XI — Security', 'part_ar' => 'الجزء الحادي عشر — الأمان',
    'icon' => '🎟',
    'title_en' => 'JWT Pitfalls',
    'title_ar' => 'مخاطر JWT',
    'desc_en' => 'Algorithm confusion, revocation, refresh',
    'desc_ar' => 'Algorithm Confusion والإلغاء و Refresh',
    'qa' => [
        [
            'q_en' => 'What is a JWT?',
            'q_ar' => 'ما هو JWT؟',
            'a_en' => '<p>A signed (and optionally encrypted) token: <code>header.payload.signature</code>. Self-contained — the server can validate without a DB lookup. Used for stateless auth.</p>',
            'a_ar' => '<p>Token موقع (وأحيانًا مُشفّر): <code>header.payload.signature</code>. مكتفٍ ذاتيًا — يستطيع السيرفر التحقق دون استعلام DB. يُستخدم لـ Stateless Auth.</p>',
        ],
        [
            'q_en' => 'Algorithm confusion — the classic JWT bug',
            'q_ar' => 'Algorithm Confusion — الخطأ الكلاسيكي',
            'a_en' => '<p>Server uses RS256 (asymmetric) but the library accepts whatever <code>alg</code> the token claims. Attacker sets <code>alg: HS256</code> and signs with the public key (now used as HMAC secret). Defense: <strong>pin the algorithm</strong> on the verify side; never accept <code>alg: none</code>.</p>',
            'a_ar' => '<p>السيرفر يستخدم RS256 لكن المكتبة تقبل أي <code>alg</code> يحدده Token. المهاجم يضع <code>alg: HS256</code> ويوقع بالـ Public Key (المستخدم الآن كـ HMAC Secret). الدفاع: <strong>ثبّت الخوارزمية</strong> عند التحقق، ولا تقبل <code>alg: none</code>.</p>',
        ],
        [
            'q_en' => 'How do you revoke a JWT?',
            'q_ar' => 'كيف تُلغي JWT؟',
            'a_en' => '<p>You can\'t — that\'s the JWT tradeoff. Common patterns: short TTL (5–15 min) + refresh token, <strong>jti</strong> claim + Redis blacklist on logout, opaque refresh + JWT access pattern, or just don\'t use JWT for sessions.</p>',
            'a_ar' => '<p>لا تستطيع — هذه مقايضة JWT. أنماط شائعة: TTL قصير (5-15 دقيقة) + Refresh Token، استخدام <strong>jti</strong> + Redis Blacklist عند تسجيل الخروج، Refresh Opaque + JWT Access، أو لا تستخدم JWT للـ Sessions أصلاً.</p>',
        ],
        [
            'q_en' => 'Where to store JWT on the client?',
            'q_ar' => 'أين تخزن JWT على العميل؟',
            'a_en' => '<p><strong>Not localStorage</strong> — XSS reads it. Best: HttpOnly + Secure + SameSite=Strict cookie. Pair with CSRF protection.</p>',
            'a_ar' => '<p><strong>ليس في localStorage</strong> — XSS يقرأها. الأفضل: Cookie بـ HttpOnly + Secure + SameSite=Strict مع حماية CSRF.</p>',
        ],
        [
            'q_en' => 'Senior insight',
            'q_ar' => 'رؤية Senior',
            'a_en' => '<p>JWT is misused for session management. For a typical web app, <strong>opaque session tokens stored server-side</strong> (Sanctum cookie sessions) are simpler, revokable, and just as fast at small scale. Reach for JWT only when you have a real reason: cross-service propagation, public APIs without DB lookups, federated identity.</p>',
            'a_ar' => '<p>JWT يُساء استخدامها لإدارة الـ Sessions. لتطبيق Web عادي، <strong>Opaque Session Tokens مخزنة على السيرفر</strong> (Sanctum Cookies) أبسط وقابلة للإلغاء ومماثلة في السرعة. استخدم JWT فقط عند سبب حقيقي: نشر بين خدمات، APIs عامة دون DB Lookup، Federated Identity.</p>',
        ],
    ],
],

'sec-rate-limiting' => [
    'part' => 'Part XI — Security', 'part_ar' => 'الجزء الحادي عشر — الأمان',
    'icon' => '🚧',
    'title_en' => 'Rate Limiting Algorithms',
    'title_ar' => 'خوارزميات Rate Limiting',
    'desc_en' => 'Token bucket, leaky bucket, fixed/sliding window',
    'desc_ar' => 'Token Bucket و Leaky Bucket و Sliding Window',
    'qa' => [
        [
            'q_en' => 'The four algorithms',
            'q_ar' => 'الخوارزميات الأربع',
            'a_en' => '<ul><li><strong>Fixed Window:</strong> count requests in a calendar window. Simple, but burst at window boundaries (2× limit).</li><li><strong>Sliding Window Log:</strong> store timestamps; accurate but memory-heavy.</li><li><strong>Sliding Window Counter:</strong> weighted average of current + previous window — Stripe-style, low memory.</li><li><strong>Token Bucket:</strong> tokens refill at a rate; consume per request; allows controlled bursts.</li><li><strong>Leaky Bucket:</strong> requests queue, drain at fixed rate — smooths traffic.</li></ul>',
            'a_ar' => '<ul><li><strong>Fixed Window:</strong> عدّ Requests في نافذة. بسيط لكن Burst عند الحدود.</li><li><strong>Sliding Window Log:</strong> خزن Timestamps؛ دقيق لكن ذاكرة عالية.</li><li><strong>Sliding Window Counter:</strong> متوسط مرجح بين النافذة الحالية والسابقة.</li><li><strong>Token Bucket:</strong> Tokens تتراكم بمعدل؛ تُستهلك لكل Request؛ يسمح بـ Bursts.</li><li><strong>Leaky Bucket:</strong> Requests في طابور، تسحب بمعدل ثابت — تسوي Traffic.</li></ul>',
        ],
        [
            'q_en' => 'Implement a token bucket in Redis (Lua)',
            'q_ar' => 'تنفيذ Token Bucket في Redis (Lua)',
            'a_en' => '<p>Atomicity is key — use a Lua script so refill + consume happen in one round-trip.</p>',
            'a_ar' => '<p>الذرية أساسية — استخدم Lua Script حتى يحدث Refill + Consume في Round-trip واحد.</p>',
            'example' => "-- KEYS[1] = bucket key,  ARGV: now, rate, capacity, cost\nlocal data = redis.call('HMGET', KEYS[1], 'tokens', 'ts')\nlocal tokens   = tonumber(data[1]) or tonumber(ARGV[3])\nlocal lastTs   = tonumber(data[2]) or tonumber(ARGV[1])\nlocal refill   = (tonumber(ARGV[1]) - lastTs) * tonumber(ARGV[2])\ntokens         = math.min(tonumber(ARGV[3]), tokens + refill)\nif tokens < tonumber(ARGV[4]) then return 0 end\ntokens = tokens - tonumber(ARGV[4])\nredis.call('HMSET', KEYS[1], 'tokens', tokens, 'ts', ARGV[1])\nreturn 1",
        ],
        [
            'q_en' => 'Where to enforce limits',
            'q_ar' => 'أين تُفرض الحدود',
            'a_en' => '<p>Defense in depth: edge (CDN / WAF), API gateway, then app middleware. App-level rate limits should be <em>per user / API key / IP</em> and per endpoint, not global.</p>',
            'a_ar' => '<p>دفاع متعدد الطبقات: Edge (CDN / WAF)، API Gateway، ثم Middleware. الحدود على مستوى التطبيق يجب أن تكون <em>لكل مستخدم / API Key / IP</em> ولكل Endpoint، لا Global.</p>',
        ],
        [
            'q_en' => '429 response headers',
            'q_ar' => 'Headers ردّ 429',
            'a_en' => '<p>Return <code>429 Too Many Requests</code> with <code>Retry-After</code> seconds and the modern <code>RateLimit-Limit / RateLimit-Remaining / RateLimit-Reset</code> (draft RFC).</p>',
            'a_ar' => '<p>أرسل <code>429 Too Many Requests</code> مع <code>Retry-After</code> بالثواني والـ <code>RateLimit-Limit / RateLimit-Remaining / RateLimit-Reset</code> الحديثة (مسودة RFC).</p>',
        ],
    ],
],

'sec-secrets-tls' => [
    'part' => 'Part XI — Security', 'part_ar' => 'الجزء الحادي عشر — الأمان',
    'icon' => '🔑',
    'title_en' => 'Secrets, TLS, mTLS',
    'title_ar' => 'الـ Secrets و TLS و mTLS',
    'desc_en' => 'Secret rotation, TLS handshake, mutual TLS',
    'desc_ar' => 'تدوير الـ Secrets و TLS و mTLS',
    'qa' => [
        [
            'q_en' => 'Where do secrets live in production?',
            'q_ar' => 'أين تعيش الـ Secrets في الإنتاج؟',
            'a_en' => '<p>Not in <code>.env</code> committed to git. Use a secret manager: AWS Secrets Manager, GCP Secret Manager, HashiCorp Vault, Doppler, 1Password. Mount at runtime, never log them, scope by IAM role.</p>',
            'a_ar' => '<p>ليس في <code>.env</code> داخل Git. استخدم Secret Manager: AWS Secrets Manager أو HashiCorp Vault أو Doppler. حمّلها وقت التشغيل، لا تسجّلها، وقيّدها بـ IAM Role.</p>',
        ],
        [
            'q_en' => 'How and why to rotate secrets',
            'q_ar' => 'كيف ولماذا تُدوّر الـ Secrets',
            'a_en' => '<p>Limits blast radius if a secret leaks. Pattern: <strong>two-key window</strong> — accept old + new during rotation, then retire old. Encrypted data uses key versions so re-encryption is gradual.</p>',
            'a_ar' => '<p>يحدّ من نطاق الضرر إذا تسرّب Secret. النمط: <strong>نافذة مفتاحين</strong> — اقبل القديم والجديد أثناء التدوير، ثم تخلص من القديم. البيانات المشفرة تستخدم Key Versions ليكون إعادة التشفير تدريجيًا.</p>',
        ],
        [
            'q_en' => 'TLS handshake essentials',
            'q_ar' => 'أساسيات مصافحة TLS',
            'a_en' => '<p>TLS 1.3 simplified to 1-RTT (or 0-RTT with PSK): ClientHello → ServerHello + Certificate + Finished → Client Finished. Forward secrecy by default via ephemeral DH.</p>',
            'a_ar' => '<p>TLS 1.3 بسّطت لـ 1-RTT (أو 0-RTT مع PSK): ClientHello → ServerHello + Certificate + Finished → Client Finished. Forward Secrecy افتراضي عبر Ephemeral DH.</p>',
        ],
        [
            'q_en' => 'What is mTLS and when use it?',
            'q_ar' => 'ما هي mTLS ومتى تُستخدم؟',
            'a_en' => '<p>Mutual TLS — both client and server present certificates. Used for service-to-service auth in a mesh (Istio, Linkerd), or for high-trust APIs where you control both ends.</p>',
            'a_ar' => '<p>TLS متبادلة — كلٌ من العميل والسيرفر يقدم Certificate. تُستخدم للمصادقة Service-to-Service في Mesh (Istio, Linkerd)، أو لـ APIs عالية الثقة بين أطراف تتحكم بها.</p>',
        ],
    ],
],

];
