<?php
/** Part XX — Interview Tactics */

return [

'iv-system-design-framework' => [
    'part' => 'Part XX — Interview Tactics', 'part_ar' => 'الجزء العشرون — تكتيكات المقابلة',
    'icon' => '🎯',
    'title_en' => 'System Design Framework',
    'title_ar' => 'إطار حل System Design',
    'desc_en' => 'A repeatable 7-step structure for the 45-min loop',
    'desc_ar' => 'بنية مكررة من 7 خطوات لجلسة 45 دقيقة',
    'qa' => [
        [
            'q_en' => 'The 7 steps',
            'q_ar' => 'الخطوات السبع',
            'a_en' => '<ol><li><strong>Requirements clarification</strong> (5 min) — functional, non-functional, scope-cut what\'s out.</li><li><strong>Capacity estimation</strong> (2-3 min) — users, RPS, data size, bandwidth.</li><li><strong>API design</strong> (5 min) — key endpoints + payloads.</li><li><strong>Data model</strong> (5 min) — main entities, picks of DB.</li><li><strong>High-level architecture</strong> (5 min) — boxes, arrows.</li><li><strong>Deep dives</strong> (15 min) — interviewer picks: scaling, sharding, hot path, durability.</li><li><strong>Bottlenecks &amp; tradeoffs</strong> (5 min) — what breaks first, what you\'d do next.</li></ol>',
            'a_ar' => '<ol><li><strong>توضيح المتطلبات</strong> (5 د) — وظيفية، غير وظيفية، استبعاد ما هو خارج النطاق.</li><li><strong>تقدير السعة</strong> (2-3 د) — مستخدمون، RPS، حجم بيانات، Bandwidth.</li><li><strong>تصميم API</strong> (5 د) — Endpoints رئيسية + Payloads.</li><li><strong>نموذج البيانات</strong> (5 د) — كيانات رئيسية، اختيار DB.</li><li><strong>البنية عالية المستوى</strong> (5 د) — Boxes + Arrows.</li><li><strong>Deep Dives</strong> (15 د) — يختار المُقابل.</li><li><strong>Bottlenecks &amp; Tradeoffs</strong> (5 د) — ما يكسر أولاً وماذا بعد.</li></ol>',
        ],
        [
            'q_en' => 'Capacity estimation cheatsheet',
            'q_ar' => 'مذكرة تقدير السعة',
            'a_en' => '<ul><li>1 day ≈ 86,400 s ≈ 10⁵ s</li><li>1 MB ≈ 10⁶ B</li><li>100M DAU × 10 actions = 1B events/day ≈ 10K/s avg, ~100K/s peak (10× burst)</li><li>Disk: estimate row size × rows × replication factor × retention</li><li>Bandwidth: avg payload × RPS × 2 (request + response)</li></ul>',
            'a_ar' => '<ul><li>اليوم ≈ 86,400 ث ≈ 10⁵ ث</li><li>1 MB ≈ 10⁶ B</li><li>100M DAU × 10 إجراءات = 1B Event/يوم ≈ 10K/ث متوسط، ~100K/ث ذروة</li><li>القرص: حجم الصف × عدد الصفوف × Replication × Retention</li><li>Bandwidth: متوسط Payload × RPS × 2</li></ul>',
        ],
        [
            'q_en' => 'Drive the conversation',
            'q_ar' => 'قُد المحادثة',
            'a_en' => '<p>Don\'t wait to be asked. Narrate your decisions: <em>"I\'m picking Postgres here because we need transactional consistency; in five minutes I\'ll come back and discuss how we\'d shard if we got past 100K writes/sec."</em> Interviewers grade clarity of thought, not just correctness.</p>',
            'a_ar' => '<p>لا تنتظر السؤال. اسرد قراراتك: <em>"أختار Postgres هنا لأننا نحتاج اتساقًا معاملاتيًا؛ بعد 5 دقائق سأرجع وأناقش كيف نُجزّئ لو تجاوزنا 100K كتابة/ث."</em> المُقابلون يقيّمون وضوح التفكير لا الإجابة فقط.</p>',
        ],
    ],
],

'iv-tradeoffs' => [
    'part' => 'Part XX — Interview Tactics', 'part_ar' => 'الجزء العشرون — تكتيكات المقابلة',
    'icon' => '⚖️',
    'title_en' => 'Articulating Trade-offs',
    'title_ar' => 'صياغة الـ Trade-offs',
    'desc_en' => 'The #1 gap killing candidates in 2026',
    'desc_ar' => 'الفجوة #1 التي تُسقط المرشحين في 2026',
    'qa' => [
        [
            'q_en' => 'The pattern interviewers love',
            'q_ar' => 'النمط الذي يعشقه المقابلون',
            'a_en' => '<p>"<strong>Option A</strong> gives us <em>X</em> but costs <em>Y</em>; <strong>Option B</strong> flips that. Because the requirements emphasize <em>X</em>, I\'m picking A. If later <em>Y</em> becomes the priority, we\'d revisit." Three sentences, but it shows decision-making instead of regurgitation.</p>',
            'a_ar' => '<p>"<strong>الخيار A</strong> يعطي <em>X</em> بكلفة <em>Y</em>؛ <strong>الخيار B</strong> العكس. لأن المتطلبات تُؤكد <em>X</em>، أختار A. إذا أصبحت <em>Y</em> أولوية، نُراجع." ثلاث جمل، لكنها تُظهر اتخاذ قرار لا حفظًا.</p>',
        ],
        [
            'q_en' => 'Common trade-off axes you should keep ready',
            'q_ar' => 'محاور Trade-offs يجب أن تكون جاهزة',
            'a_en' => '<ul><li>Consistency vs availability (CAP)</li><li>Latency vs throughput</li><li>Cost vs durability (replication / retention)</li><li>Read vs write optimization</li><li>Simplicity vs flexibility</li><li>Build vs buy</li><li>Now-pain vs later-pain (tech debt)</li></ul>',
            'a_ar' => '<ul><li>Consistency vs Availability (CAP)</li><li>Latency vs Throughput</li><li>Cost vs Durability</li><li>Read vs Write Optimization</li><li>Simplicity vs Flexibility</li><li>Build vs Buy</li><li>ألم الآن vs ألم لاحقًا (Tech Debt)</li></ul>',
        ],
        [
            'q_en' => 'Avoid the "describe components" trap',
            'q_ar' => 'تجنب فخ "وصف المكونات"',
            'a_en' => '<p>200+ interviews reviewed in 2026 found the killer gap: candidates listed services but never said "I chose this <em>because</em> …". Every component choice gets a justification. No buzzwords without reason.</p>',
            'a_ar' => '<p>200+ مقابلة في 2026 كشفت الفجوة القاتلة: المرشحون يعددون خدمات دون أن يقولوا "اخترت هذا <em>لأن</em>…". كل اختيار يحتاج تبريرًا. لا Buzzwords بلا سبب.</p>',
        ],
        [
            'q_en' => 'Cost &amp; ops thinking',
            'q_ar' => 'التفكير في التكلفة والتشغيل',
            'a_en' => '<p>2026 loops explicitly grade cost reasoning. Mention dollar estimates ("a Kafka cluster of this size is ~$5K/mo"), on-call burden ("this adds a stateful component my team has to operate"), and migration risk.</p>',
            'a_ar' => '<p>مقابلات 2026 تُقيّم التكلفة صراحة. اذكر تقديرات (Kafka بهذا الحجم ~$5K/شهر)، عبء On-call (مكوّن Stateful إضافي يجب على فريقي تشغيله)، ومخاطر الترحيل.</p>',
        ],
    ],
],

'iv-behavioral' => [
    'part' => 'Part XX — Interview Tactics', 'part_ar' => 'الجزء العشرون — تكتيكات المقابلة',
    'icon' => '🗣',
    'title_en' => 'Behavioral & STAR',
    'title_ar' => 'الـ Behavioral و STAR',
    'desc_en' => 'Structured stories that land',
    'desc_ar' => 'قصص منظمة تترك أثرًا',
    'qa' => [
        [
            'q_en' => 'STAR — what each letter does',
            'q_ar' => 'STAR — ماذا يفعل كل حرف',
            'a_en' => '<ul><li><strong>S — Situation:</strong> 1 sentence, context only.</li><li><strong>T — Task:</strong> what specifically was on your plate.</li><li><strong>A — Action:</strong> the bulk of the answer. What <em>you</em> did, not "we".</li><li><strong>R — Result:</strong> measurable outcome, with numbers.</li></ul><p>Keep stories under 3 minutes. The interviewer can ask for depth.</p>',
            'a_ar' => '<ul><li><strong>S — Situation:</strong> جملة واحدة سياق فقط.</li><li><strong>T — Task:</strong> ما كان عليك تحديدًا.</li><li><strong>A — Action:</strong> معظم الإجابة. ما فعلته <em>أنت</em> لا "نحن".</li><li><strong>R — Result:</strong> نتيجة قابلة للقياس بأرقام.</li></ul><p>قصص أقل من 3 دقائق. المُقابل يستطيع طلب التفصيل.</p>',
        ],
        [
            'q_en' => 'Stories every senior should have ready',
            'q_ar' => 'قصص يجب أن تكون جاهزة لأي Senior',
            'a_en' => '<ul><li>A production incident I owned end-to-end</li><li>A conflict with another engineer / team / PM I resolved</li><li>A bad decision I made and how I corrected it</li><li>A project I led without formal authority</li><li>A time I changed a teammate\'s mind with data</li><li>A time I delivered under a tight deadline by cutting scope</li></ul>',
            'a_ar' => '<ul><li>حادثة Production توليتها كاملة</li><li>نزاع مع مهندس/فريق/PM وحللته</li><li>قرار سيئ اتخذته ثم صححته</li><li>مشروع قُدته بلا سلطة رسمية</li><li>أقنعت زميلًا بتغيير رأيه عبر البيانات</li><li>وفّيت بـ Deadline ضيق بقص النطاق</li></ul>',
        ],
        [
            'q_en' => 'Anti-patterns',
            'q_ar' => 'أنماط مرفوضة',
            'a_en' => '<ul><li>"We did X" — interviewers want <em>your</em> contribution</li><li>No numbers in the result</li><li>Picking a story where you were the hero of everything — sounds rehearsed</li><li>Trash-talking former colleagues</li></ul>',
            'a_ar' => '<ul><li>"نحن فعلنا" — المقابل يريد دورك <em>أنت</em></li><li>لا أرقام في النتيجة</li><li>قصة كنت فيها بطل كل شيء — تبدو محفوظة</li><li>إساءة لزملاء سابقين</li></ul>',
        ],
        [
            'q_en' => '"Tell me about a time you disagreed with your manager"',
            'q_ar' => '"حدّثني عن مرة اختلفت فيها مع مديرك"',
            'a_en' => '<p>Common trap. Show disagreement without insubordination: <em>"I voiced concerns with data, listened to their reasoning, agreed on a compromise, and committed even after the decision didn\'t fully go my way."</em> "Disagree and commit" is the senior signal.</p>',
            'a_ar' => '<p>فخ شائع. أظهر اختلافًا بدون عصيان: <em>"عبّرت عن قلقي بالبيانات، استمعت لسببه، اتفقنا على حل وسط، والتزمت حتى لو لم يكن القرار كما أردت."</em> "Disagree and Commit" هي إشارة Senior.</p>',
        ],
    ],
],

];
