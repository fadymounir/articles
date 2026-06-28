<?php
/** Part XVIII — AI / LLM / RAG */

return [

'ai-rag-pipeline' => [
    'part' => 'Part XVIII — AI & LLM', 'part_ar' => 'الجزء الثامن عشر — AI و LLM',
    'icon' => '🧠',
    'title_en' => 'RAG Pipeline Design',
    'title_ar' => 'تصميم RAG Pipeline',
    'desc_en' => 'Retrieval-Augmented Generation end-to-end',
    'desc_ar' => 'Retrieval-Augmented Generation من البداية للنهاية',
    'qa' => [
        [
            'q_en' => 'What is RAG and why?',
            'q_ar' => 'ما هي RAG ولماذا؟',
            'a_en' => '<p>Retrieval-Augmented Generation: at query time, retrieve relevant chunks from your knowledge base and inject them into the LLM prompt. Solves three LLM problems: <strong>hallucination</strong>, <strong>stale knowledge</strong>, and <strong>private data</strong> the model never saw.</p>',
            'a_ar' => '<p>Retrieval-Augmented Generation: عند الاستعلام، استرجع أجزاء مرتبطة من قاعدة معرفتك وأدخلها في prompt الـ LLM. تحل ثلاث مشاكل: <strong>الهلوسة</strong>، <strong>المعرفة القديمة</strong>، و<strong>البيانات الخاصة</strong> التي لم يرها النموذج.</p>',
        ],
        [
            'q_en' => 'The pipeline at a glance',
            'q_ar' => 'الـ Pipeline في لمحة',
            'a_en' => '',
            'a_ar' => '',
            'extra_html_en' => '<div class="flow"><span>Docs</span><span class="arrow">→</span><span>Chunk</span><span class="arrow">→</span><span>Embed</span><span class="arrow">→</span><span>Vector DB</span></div><div class="flow"><span>Query</span><span class="arrow">→</span><span>Embed Q</span><span class="arrow">→</span><span>Top-K search</span><span class="arrow">→</span><span>Rerank</span><span class="arrow">→</span><span>LLM (prompt+context)</span><span class="arrow">→</span><span>Answer + citations</span></div>',
            'extra_html_ar' => '<div class="flow"><span>Docs</span><span class="arrow">→</span><span>Chunk</span><span class="arrow">→</span><span>Embed</span><span class="arrow">→</span><span>Vector DB</span></div><div class="flow"><span>سؤال</span><span class="arrow">→</span><span>Embed</span><span class="arrow">→</span><span>Top-K</span><span class="arrow">→</span><span>Rerank</span><span class="arrow">→</span><span>LLM</span><span class="arrow">→</span><span>إجابة + مصادر</span></div>',
        ],
        [
            'q_en' => 'Naïve vs production RAG',
            'q_ar' => 'RAG ساذجة vs RAG إنتاجية',
            'a_en' => '<ul><li><strong>Query rewriting</strong> — clarify ambiguous user questions</li><li><strong>Hybrid retrieval</strong> — combine vector (semantic) with BM25 (lexical)</li><li><strong>Reranker</strong> (cross-encoder) on top-50 → keep top-5</li><li><strong>Metadata filters</strong> (tenant, language, recency)</li><li><strong>Citations</strong> in the response</li><li><strong>Guardrails</strong>: refuse if no good context</li></ul>',
            'a_ar' => '<ul><li><strong>Query Rewriting</strong> — توضيح أسئلة غامضة</li><li><strong>Hybrid Retrieval</strong> — Vector (دلالي) + BM25 (لفظي)</li><li><strong>Reranker</strong> (Cross-encoder) على Top-50 → احتفظ بـ Top-5</li><li><strong>Metadata Filters</strong> (Tenant, لغة, حداثة)</li><li><strong>Citations</strong> في الإجابة</li><li><strong>Guardrails</strong>: ارفض إذا لم تجد سياقًا جيدًا</li></ul>',
        ],
        [
            'q_en' => 'Common failure mode',
            'q_ar' => 'فشل شائع',
            'a_en' => '<p>Retrieval returns irrelevant chunks; LLM generates a confident wrong answer. Mitigations: better embeddings, hybrid search, rerank, lower the <em>top-k</em> threshold by score, return "I don\'t know" when scores are low.</p>',
            'a_ar' => '<p>Retrieval يُرجع Chunks غير مرتبطة؛ LLM يُولّد إجابة خاطئة بثقة. الحلول: Embeddings أفضل، Hybrid Search، Rerank، حد Top-k حسب Score، وأرجع "لا أعلم" عندما تكون Scores منخفضة.</p>',
        ],
    ],
],

'ai-vector-dbs' => [
    'part' => 'Part XVIII — AI & LLM', 'part_ar' => 'الجزء الثامن عشر — AI و LLM',
    'icon' => '🧭',
    'title_en' => 'Vector Databases',
    'title_ar' => 'قواعد بيانات Vector',
    'desc_en' => 'pgvector, Pinecone, Weaviate, ANN, HNSW',
    'desc_ar' => 'pgvector و Pinecone و Weaviate و ANN و HNSW',
    'qa' => [
        [
            'q_en' => 'Why a vector DB?',
            'q_ar' => 'لماذا Vector DB؟',
            'a_en' => '<p>Embeddings are high-dimensional vectors (768–3072 dims). Linear cosine over millions of vectors is too slow. Vector DBs use <strong>Approximate Nearest Neighbor (ANN)</strong> indexes (HNSW, IVF) to answer top-k similarity in milliseconds at the cost of slight recall loss.</p>',
            'a_ar' => '<p>الـ Embeddings vectors ذات أبعاد عالية (768-3072). Cosine خطي على ملايين الـ Vectors بطيء جدًا. Vector DBs تستخدم فهارس <strong>ANN</strong> (HNSW, IVF) للإجابة على Top-k في ملي ثانية بفقدان طفيف في Recall.</p>',
        ],
        [
            'q_en' => 'pgvector vs dedicated vector DBs',
            'q_ar' => 'pgvector vs Vector DBs مخصصة',
            'a_en' => '<ul><li><strong>pgvector (Postgres):</strong> uses your existing DB; supports HNSW since v0.5; great when ≤ ~10M vectors and you want filters joined to relational data.</li><li><strong>Pinecone / Weaviate / Qdrant / Milvus:</strong> built from scratch for vectors; scale to billions; managed hybrid search, metadata filters, namespaces.</li></ul>',
            'a_ar' => '<ul><li><strong>pgvector (Postgres):</strong> يستخدم DB الموجودة؛ يدعم HNSW منذ v0.5؛ مناسب حتى ~10M vector.</li><li><strong>Pinecone / Weaviate / Qdrant / Milvus:</strong> مبنية من الصفر للـ Vectors؛ تصل للمليارات؛ Hybrid Search و Metadata Filters و Namespaces.</li></ul>',
        ],
        [
            'q_en' => 'HNSW in one paragraph',
            'q_ar' => 'HNSW في فقرة',
            'a_en' => '<p>Hierarchical Navigable Small World: a multi-layer graph where each node links to neighbors. Search starts at the top (sparse) layer and descends, greedily following links closer to the query. Excellent recall and latency tradeoff. Tunable via <code>M</code>, <code>ef_construction</code>, <code>ef_search</code>.</p>',
            'a_ar' => '<p>Hierarchical Navigable Small World: رسم بياني متعدد الطبقات حيث كل Node مرتبط بجيرانه. البحث يبدأ من الطبقة العلوية (المتناثرة) وينزل، متبعًا الروابط الأقرب للاستعلام. مقايضة ممتازة بين Recall و Latency. يُضبط عبر <code>M</code> و <code>ef_construction</code> و <code>ef_search</code>.</p>',
        ],
        [
            'q_en' => 'Distance metrics',
            'q_ar' => 'مقاييس المسافة',
            'a_en' => '<p><strong>Cosine</strong> for normalized embeddings (most common). <strong>Dot product</strong> when magnitudes matter. <strong>Euclidean (L2)</strong> rarely. Match the metric to what the embedding model was trained for.</p>',
            'a_ar' => '<p><strong>Cosine</strong> للـ Embeddings المُسواة (الأشهر). <strong>Dot Product</strong> عندما يهم Magnitude. <strong>Euclidean (L2)</strong> نادرًا. اختر المقياس حسب ما دُرّب عليه نموذج الـ Embedding.</p>',
        ],
    ],
],

'ai-embeddings-chunking' => [
    'part' => 'Part XVIII — AI & LLM', 'part_ar' => 'الجزء الثامن عشر — AI و LLM',
    'icon' => '🧬',
    'title_en' => 'Embeddings & Chunking',
    'title_ar' => 'Embeddings و Chunking',
    'desc_en' => 'Picking models, semantic chunking, hybrid search',
    'desc_ar' => 'اختيار النماذج، Semantic Chunking، Hybrid Search',
    'qa' => [
        [
            'q_en' => 'Picking an embedding model',
            'q_ar' => 'اختيار نموذج Embedding',
            'a_en' => '<ul><li>Match training language and domain</li><li>Higher dim = potentially better recall, higher cost &amp; storage</li><li>Test on the MTEB leaderboard for your task</li><li>Prefer <strong>multilingual</strong> models if you serve Arabic/English content</li><li>Consistency matters more than model choice — never mix models in the same index</li></ul>',
            'a_ar' => '<ul><li>طابق لغة التدريب والمجال</li><li>أبعاد أعلى = Recall أفضل غالبًا، تكلفة وتخزين أكثر</li><li>اختبر على MTEB Leaderboard</li><li>فضّل النماذج <strong>متعددة اللغات</strong> للمحتوى العربي/الإنجليزي</li><li>الاتساق أهم من النموذج — لا تخلط نماذج في نفس Index</li></ul>',
        ],
        [
            'q_en' => 'Fixed chunks vs semantic chunking',
            'q_ar' => 'Fixed Chunks vs Semantic Chunking',
            'a_en' => '<p><strong>Fixed</strong> (e.g. 500 tokens with 50 overlap): simple, fast, often cuts mid-sentence. <strong>Semantic</strong>: respect markdown headings, paragraphs, list items; some libraries even use embedding similarity to find topic shifts. Senior-grade RAG uses semantic chunking.</p>',
            'a_ar' => '<p><strong>Fixed</strong> (مثلاً 500 Tokens مع 50 Overlap): بسيط وسريع لكنه يقطع منتصف الجملة. <strong>Semantic</strong>: يحترم عناوين Markdown والفقرات؛ بعض المكتبات تستخدم تشابه Embedding لإيجاد تحولات الموضوع. الـ RAG على مستوى Senior يستخدم Semantic Chunking.</p>',
        ],
        [
            'q_en' => 'Hybrid search (BM25 + vectors)',
            'q_ar' => 'Hybrid Search (BM25 + Vectors)',
            'a_en' => '<p>Vector retrieval misses exact-term matches (model numbers, names). BM25 misses semantic paraphrases. Combine them with <strong>Reciprocal Rank Fusion</strong> or weighted sum — almost always beats either alone.</p>',
            'a_ar' => '<p>Vector Retrieval يفقد المطابقات الحرفية (أرقام موديلات، أسماء). BM25 يفقد الباراف raisingات الدلالية. ادمجهما عبر <strong>Reciprocal Rank Fusion</strong> أو Weighted Sum — يتفوق دائمًا تقريبًا على أي منهما وحده.</p>',
        ],
    ],
],

'ai-llm-serving' => [
    'part' => 'Part XVIII — AI & LLM', 'part_ar' => 'الجزء الثامن عشر — AI و LLM',
    'icon' => '🤖',
    'title_en' => 'LLM Serving Patterns',
    'title_ar' => 'أنماط تقديم LLM',
    'desc_en' => 'Latency budgets, streaming, caching, fallback',
    'desc_ar' => 'ميزانيات Latency و Streaming و Caching و Fallback',
    'qa' => [
        [
            'q_en' => 'Latency budget for chat',
            'q_ar' => 'ميزانية Latency للمحادثة',
            'a_en' => '<p>Time-to-first-token (TTFT) is what users feel. Target ≤ 1s. Strategies: SSE streaming, smaller fast model for first response, prompt caching, regional routing to nearest inference endpoint.</p>',
            'a_ar' => '<p>Time-to-first-token (TTFT) هو ما يشعر به المستخدم. استهدف ≤ 1 ث. الاستراتيجيات: SSE Streaming، نموذج صغير سريع للرد الأول، Prompt Caching، توجيه إقليمي لأقرب Endpoint.</p>',
        ],
        [
            'q_en' => 'Prompt caching',
            'q_ar' => 'Prompt Caching',
            'a_en' => '<p>Providers (Anthropic, OpenAI) cache the static prefix of a prompt; repeated prefixes are billed at a fraction of the cost. Put system prompts and RAG context <em>at the top, immutable</em>.</p>',
            'a_ar' => '<p>المزودون (Anthropic, OpenAI) يخزنون البداية الثابتة من Prompt؛ التكرارات تُحسب بكسر من التكلفة. ضع System Prompt و RAG Context <em>في الأعلى وثابتًا</em>.</p>',
        ],
        [
            'q_en' => 'Graceful degradation',
            'q_ar' => 'Graceful Degradation',
            'a_en' => '<ul><li>Primary model fails / rate-limited → fall back to alternate provider/model</li><li>If RAG retrieval times out → still answer with a "no context found" template</li><li>Apply per-tenant <strong>token budgets</strong> to avoid wallet drain</li><li>Show "thinking…" UX so users don\'t bail on cold latency</li></ul>',
            'a_ar' => '<ul><li>فشل النموذج الأساسي / Rate-limit → انتقل لمزود/نموذج بديل</li><li>Timeout في Retrieval → أجب بقالب "لا سياق"</li><li>طبّق <strong>Token Budgets</strong> لكل Tenant لتجنب الاستنزاف</li><li>أظهر "يفكر…" حتى لا يهرب المستخدم</li></ul>',
        ],
        [
            'q_en' => 'Versioning prompts & models',
            'q_ar' => 'إصدارات Prompts والنماذج',
            'a_en' => '<p>Treat prompts like code: in git, with PRs, with golden tests. Pin model versions (don\'t use floating <code>gpt-4o</code> in prod — pin <code>gpt-4o-2024-11-20</code>). A/B test new prompts against held-out evals before rolling out.</p>',
            'a_ar' => '<p>عامل Prompts كالكود: في Git، مع PRs، مع Golden Tests. ثبّت إصدارات النماذج (لا تستخدم <code>gpt-4o</code> العائم في الإنتاج — ثبّت <code>gpt-4o-2024-11-20</code>). A/B-test الـ Prompts الجديدة قبل النشر.</p>',
        ],
    ],
],

'ai-evaluation' => [
    'part' => 'Part XVIII — AI & LLM', 'part_ar' => 'الجزء الثامن عشر — AI و LLM',
    'icon' => '📏',
    'title_en' => 'LLM Evaluation',
    'title_ar' => 'تقييم LLM',
    'desc_en' => 'RAGAS, LLM-as-judge, held-out evals',
    'desc_ar' => 'RAGAS و LLM-as-judge و Held-out Evals',
    'qa' => [
        [
            'q_en' => 'Why evaluation is the bottleneck',
            'q_ar' => 'لماذا التقييم هو العقبة',
            'a_en' => '<p>Without solid evals, you have no idea whether prompt v17 is better than v16. Production AI projects live or die on evaluation infrastructure, not model choice.</p>',
            'a_ar' => '<p>بدون تقييم متين، لن تعرف هل Prompt v17 أفضل من v16. مشاريع AI الإنتاجية تعيش أو تموت على بنية التقييم، لا على اختيار النموذج.</p>',
        ],
        [
            'q_en' => 'RAGAS metrics',
            'q_ar' => 'مقاييس RAGAS',
            'a_en' => '<ul><li><strong>Faithfulness</strong>: does the answer stick to the retrieved context?</li><li><strong>Answer relevancy</strong>: does it address the question?</li><li><strong>Context precision/recall</strong>: did retrieval find the right chunks?</li></ul>',
            'a_ar' => '<ul><li><strong>Faithfulness</strong>: هل الإجابة ملتزمة بالسياق؟</li><li><strong>Answer Relevancy</strong>: هل تجيب على السؤال؟</li><li><strong>Context Precision/Recall</strong>: هل وجد Retrieval Chunks الصحيحة؟</li></ul>',
        ],
        [
            'q_en' => 'LLM-as-judge — caveats',
            'q_ar' => 'LLM-as-judge — تحفظات',
            'a_en' => '<p>Cheap and scalable but biased: prefers verbose, well-formatted answers, agrees with itself, drifts. Always anchor with a held-out human-labeled dataset and audit a sample regularly.</p>',
            'a_ar' => '<p>رخيص وقابل للتوسع لكنه متحيز: يفضّل الإجابات المطولة المنسقة، يوافق نفسه، ينحرف. ثبّته دائمًا بمجموعة بشرية مُصنّفة وراجع عينة دوريًا.</p>',
        ],
        [
            'q_en' => 'CI for prompts',
            'q_ar' => 'CI للـ Prompts',
            'a_en' => '<p>Run the eval suite on every prompt/model change. Block merge if scores regress past a threshold. Snapshot a small set of "trap" examples that previous bugs broke.</p>',
            'a_ar' => '<p>شغّل مجموعة الـ Evals عند كل تغير Prompt/نموذج. ابلوك الـ Merge إذا انخفضت الـ Scores. خزّن مجموعة "أمثلة فخ" كسرت أخطاء سابقة.</p>',
        ],
    ],
],

];
